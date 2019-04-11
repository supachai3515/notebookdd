<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//call model inti 
		$this->load->model('initdata_model');
	}

	public function index()
	{

		$username_login = array();
		$isUsername =0;
		
		if($this->session->userdata('is_logged_in')) {
			if($this->session->userdata('permission')=='2' )
			{
				$isUsername = 1;
			    $sql = "SELECT * FROM members WHERE username = '".$this->session->userdata('username')."' ";
				$query = $this->db->query($sql);
				$row = $query->row_array();
	            $username_login = array(
	                'FullName' => $row['first_name'],
	                'LastName' => $row['last_name'],
	                'ARecieve' => $row['address_receipt'],
	                'Company' => $row['company'],
	                'AVat' => $row['address_tax'],
	                'Mobile' => $row['mobile'],
	                'Nid' => $row['tax_number'],
	                'Email' => $row['email']
	            );

			}

		}
		$data['username_login'] = $username_login;
		$data['isUsername'] = $isUsername;

		//header meta tag 
		$data['header'] = array('title' => 'ยืนยันการสั่งซื้อ | '.$this->config->item('sitename'),
								'description' =>  'ยืนยันการสั่งซื้อ | '.$this->config->item('tagline'),
								'author' => 'www.notebookdd.com',
								'keyword' =>  'ยืนยันการสั่งซื้อ | '.$this->config->item('tagline') );
		//get menu database 
		$this->load->model('initdata_model');
		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['menu_type'] = $this->initdata_model->get_type();
		$data['menu_brands'] = $this->initdata_model->get_brands();


        //content file view
		$data['content'] = 'checkout_new';
		// if have file script
		$data['script_file']= "js/cart_js";
		//load layout
		$this->load->view('template/layout', $data);
	}

	public function save()
	{
		return;

	    $name =  $this->input->post('txtName');
	    $address =  $this->input->post('txtAddress');
	    $tel =  $this->input->post('txtTel');
	    $email =  $this->input->post('txtEmail');	    
	    $shipping  =  $this->input->post('txtTransport');

	    $tax_id =  "";
	    $tax_address =  "";
	    $tax_company = "";

	    $is_tax =  $this->input->post('purchase');
	    if( $is_tax =="on"){
	    	$is_tax =1 ;
	    	$tax_id =  $this->input->post('IDCARD');
	    	$tax_address =  $this->input->post('purchase_address');
	    	$tax_company =  $this->input->post('company');
	    }
	    else{ $is_tax = 0 ;}


	    $customer_id = "";

	    if($this->session->userdata('is_logged_in')) {
	    	$customer_id = $this->session->userdata('id');

	    }

		$order_status_id  = "1";
		$is_reservations = "0";
		$quantity  = 0;
		$vat  = 0;
		$discount  = 0;
		$total  = 0;


	    foreach ($this->cart->contents() as $items) {

	    	$quantity  = $quantity + $items['qty'];
			$total  = $total + ($items['price']* $items['qty']);
			if($items['is_reservations'] == "1")
			{
				$is_reservations="1";
			}
		}

		if($is_tax ==1)
		{
			$vat  = ($total * 7) / 100;
		}

		$total  = ($total + $vat) + 100;


	    $this->db->trans_begin();
	    $ref_order_id = md5("notebookdd".date("YmdHis")."notebookdd_gen_order_id");
	    $order_id="";
	    if($quantity == 0){
	    	redirect('cart','refresh');
	    }

	    date_default_timezone_set("Asia/Bangkok");
        $data = array(
        	'date' => date("Y-m-d H:i:s"),
			'name' => $name ,
			'address' =>  $address,
			'tel' =>  $tel ,
			'email' =>  $email ,
			'tax_id' =>   $tax_id ,
			'tax_address' =>   $tax_address,
			'tax_company' =>   $tax_company ,
			'shipping' =>   $shipping ,
			'shipping_charge' => 100 ,
			'is_tax' =>   $is_tax ,
			'customer_id' =>   $customer_id ,
			'order_status_id' =>   $order_status_id ,
			'is_reservations' =>   $is_reservations ,
			'quantity' =>   $quantity ,
			'vat' =>   $vat ,
			'discount' =>   $discount ,
			'total' =>   $total,
			'ref_id' =>   $ref_order_id ,
            );

		$this->db->insert('orders', $data);
		$order_id = $this->db->insert_id();
		$linenumber =1;

		foreach ($this->cart->contents() as $items)
		{

			$total_detail  = $items['price'] * $items['qty'];
			$vat_detail  = 0;

			if($is_tax == 1)
			{
				$vat_detail  = ($total_detail * 7) / 100;
				
			}

			$total_detail  = $total_detail + $vat_detail;

	    	$data_detail = array(
		    	'order_id' =>   $order_id ,
				'product_id' =>   $items['id'],
				'linenumber' =>   $linenumber,				
				'quantity' =>   $items['qty'],
				'price' =>   $items['price'] ,
				'discount' =>   0 ,
				'vat' =>   $vat_detail ,
				'total' =>   $total_detail 
            );

	    	$this->db->insert('order_detail', $data_detail); 
	    	$linenumber++;
		}

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    redirect('cart','refresh');
		}
		else
		{
		    $this->db->trans_commit();
		    $this->cart->destroy();

		    //sendmail
		    $email_config = Array(
	            'protocol'  => 'smtp',
	            'smtp_host' => 'ssl://smtp.googlemail.com',
	            'smtp_port' => '465',
	            'smtp_user' => 'notebookdd.notreply@gmail.com',
	            'smtp_pass' => 'noteb00kdd',
	            'mailtype'  => 'html',
	            'starttls'  => true,
	            'newline'   => "\r\n"
	        );

	        $this->load->library('email', $email_config);

	        $sub ="เลขที่ใบสั่งซื้อ #".$order_id;
	        if($is_reservations == "1")
	        {
	        	$sub ="เลขที่ใบจอง #BO".$order_id;
	        }

	        $this->email->from('notebookdd.notreply@gmail.com', "Notebookdd");
	        $this->email->to($email.',simpleitnotebook@gmail.com');
	        $this->email->subject($sub);
	        $this->email->message($this->sendmail_order($order_id));
	        if($this->email->send())
		     {
		     	// $this->email->from('notebookdd.notreply@gmail.com', "Notebookdd");
	       // 	 	$this->email->to('supachai.wi@gmail.com');
	       //  	$this->email->subject('ได้รับการสั่งซื้อ '.$sub);
	       //  	$this->email->message($this->sendmail_order($order_id));
	       //  	$this->email->send();
		      redirect('status/'.$ref_order_id );
		     }
		     else
		    {
		    	redirect('status/'.$ref_order_id );
		       //show_error($this->email->print_debugger());
		    }
    
		}

	}

	function sendmail_order($orderId)
	{
			
		$result='
				<table class="main" width="100%" cellpadding="0" cellspacing="0" style="color:#000;">
				    <tr>
				        @header
				    </tr>
				    <tr>
				        <td>
				            <b>ที่อยู่จัดส่งสินค้า<b><br><br>
				            @address
							<br><br>
				       </td>
				    </tr>
				    @reservations
				    <tr style="padding: 20px;">
				        <td>
				           <table cellpadding="0" cellspacing="0" style="border-collapse: collapse;width: 100%;">
	                            <tr>
	                                <th style="text-align: left;padding: 8px;background-color: #000;color: white;">รายละเอียด</th>
	                                <th style="text-align: left;padding: 8px;background-color: #000;color: white;">ราคาต่อชิ้น</th>
	                                <th style="text-align: left;padding: 8px;background-color: #000;color: white;">จำนวน</th>
	                                <th style="text-align: left;padding: 8px;background-color: #000;color: white;">ราคารวม</th>
	                            </tr>
	                            @listOrder
	                        </table>
				        </td>
				    </tr>
				    <tr>
				        <td>
				            <table style="border-collapse: collapse;width: 100%;">
							    <tr>
							        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #000;">ค่าจัดส่ง</td>
							        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #000;">100 บาท</td>
							    </tr>
							    <tr>
							        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #000;">รามราคาสุทธิ</td>
							        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #000;">@sumtotal บาท</td>
							    </tr>
							</table>
				        </td>
				    </tr>
				    <tr>
				        <td>
				            
				            <h4>วิธีการชำระเงิน และแจ้งการโอนเงิน :</h4>
				            <p style="text-align:left">
								1.) ชื่อบัญชี นายสมิด ตรวจมรคา ธนาคารกรุงเทพ สาขาพาราไดซ์ พาร์ค เลขที่บัญชี : 0687-076-380 <br/>
								2.) ชื่อบัญชี นายสมิด ตรวจมรคา ธนาคารไทยพาณิชย์ สาขาพาราไดซ์ พาร์ค เลขที่บัญชี : 175-2203-837 <br/>
								3.) ชื่อบัญชี นายสมิด ตรวจมรคา กสิกรไทย สาขาพาราไดซ์ พาร์ค เลขที่บัญชี : 628-2014-074 <br/>
								* เมื่อชำระเงินแล้ว กรุณาโทรแจ้ง 061 478 8949 LINE ID: @notebookdd หรือแจ้งที่ อีเมล์ simpleitnotebook@gmail.com
							</p>
							<p>ตรวจสอบสถานะการสั่งซื้อ  <a href="@linkstatus" target="_blank"> ที่นี่</a></p>
				        </td>
				    </tr>
				</table>
				'; 


		$sql =" SELECT * FROM  orders WHERE id= '".$orderId."' ";
		$re = $this->db->query($sql);
		$result_order =  $re->row_array();

		$date1=date_create($result_order['date']);
		$header_str ='
					<td>
				       <h2 class="aligncenter">ขอบคุณสำหรับการสั่งซื้อ (www.notebookdd.com)</h2>
				       <p>เลขที่ใบสั่งซื้อ #'.$result_order['id'].'<br/> 
				        วันที่สั่งซื้อ : '.date_format($date1,"d/m/Y H:i").'</p>
				    </td>
		';

		$header_bo ='
					<td>
				       <h2 class="aligncenter">ขอบคุณสำหรับการสั่งซื้อ (www.notebookdd.com)</h2>
				       <p>เลขที่ใบจอง #BO'.$result_order['id'].'<br/> 
				        วันที่สั่งซื้อ : '.date_format($date1,"d/m/Y H:i").'</p>
				    </td>
		';
	
		$address = '
				<strong>ชื่อ: </strong>'.$result_order["name"].'<br>
	            <strong>ที่อยู่: </strong>'.$result_order['address'].'<br>
	            <strong>เบอร์ติดต่อ: </strong>'.$result_order["tel"].'<br>
	            <strong>อีเมล์: </strong>'.$result_order["email"].'<br>
	            <strong>ประเภทการจัดส่ง: </strong>'.$result_order["shipping"].'<br>
			';


			$reservations_str ='
				<tr>
			        <td>
			             <p> <h4>การจองสินค้า หรือการสั่งซื้อแบบ By Order</h4>
                            - ทางร้านติดต่อกลับเพื่อแจ้งเงื่อนไข เช่นระยะเวลาการดําเนินการ ราคาที่สั่งซื้ออาจมีการเปลี่ยนแปลง  <br/>
                            - กรณีที่ลูกค้าตกลงยอมรับในเงื่อนไข ลูกค้าโอนเงินเต็มจํานวนที่ตกลง และแจ้ง confirm order ทางร้านจึงจะดําเนินการให้  <br/>
                            - ทางร้านขอสงวนสิทธิในการเปลี่ยนแปลงราคา สินค้า หรือ การยกเลิกการสั่งซื้อ โดยคืนเงินเต็มจํานวนตามที่ลูกค้าจ่ายเข้ามา</p>
						<br><br>
						<p>*** ทางร้านขอสงวนสิทธิการเปลี่ยนแปลงราคาสินค้า***</p>
			       </td>
			    </tr>

			';

		$sql_detail ="SELECT * ,r.price price_order FROM order_detail r INNER JOIN  products p ON r.product_id = p.id
						WHERE r.order_id ='".$result_order['id']."' ORDER BY r.linenumber ";
		$re = $this->db->query($sql_detail);
		$order_detail = $re->result_array();

		 $orderList="";

		foreach ($order_detail as  $value) {

			  $orderList = $orderList.'

			   <tr>
                <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">
                    sku : '.$value["sku"].'<br/>
                    <a target="_blank" href="'.base_url("product/".$value["sku"]).'">
                        '.$value["name"].'
                    </a>
                </td>
                <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">
                    '.number_format($value["price_order"],2).'
                </td>
                <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">'.$value["quantity"].'</td>
                <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">'.number_format($value["price_order"]*$value["quantity"],2).'</td>
              </tr>
			  ';
		}


			$result =  str_replace("@name", $result_order["name"],$result);
			$result =  str_replace("@orderId", $result_order['id'] ,$result);
			$result =  str_replace("@orderDate",date("Y-m-d H:i:s"),$result);

			$result =  str_replace("@linkstatus", base_url('status/'.$result_order['ref_id']),$result);

			if($result_order["is_reservations"])
			{
				$result =  str_replace("@header",$header_bo,$result);

				$result =  str_replace("@reservations",$reservations_str,$result);
			}
			else{
				$result =  str_replace("@header",$header_str,$result);
				$result =  str_replace("@reservations","",$result);
			}
			

			
			$result =  str_replace("@address",$address,$result);
			$result =  str_replace("@listOrder",$orderList,$result);
			$result =  str_replace("@sumtotal",number_format($result_order['total'],2),$result);

			return $result;

	}


}

/* End of file checkout.php */
/* Location: ./application/controllers/checkout.php */