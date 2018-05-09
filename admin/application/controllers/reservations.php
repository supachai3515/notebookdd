<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//call model inti 
		$this->load->model('initdata_model');
		$this->load->model('reservations_model');
		$this->load->library('pagination');
		$this->is_logged_in();

	}

	//page view
	public function index($page=0)
	{

		$config['base_url'] = base_url('reservations/index');
		$config['total_rows'] = $this->reservations_model->get_reservations_count();
		$config['per_page'] = 10; 
        /* This Application Must Be Used With BootStrap 3 *  */
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config); 
		$data['reservations_list'] = $this->reservations_model->get_reservations($page, $config['per_page']);
		$data['order_status_list'] = $this->reservations_model->get_order_status();
		$data['links_pagination'] = $this->pagination->create_links();

		$data['menus_list'] = $this->initdata_model->get_menu();

		//call script
        $data['menu_id'] ='10';
		$data['content'] = 'reservations';
		$data['header'] = array('title' => 'reservations| '.$this->config->item('sitename'),
								'description' =>  'reservations| '.$this->config->item('tagline'),
								'author' => 'www.notebookdd.com',
								'keyword' =>  'notebookdd');
		$this->load->view('template/layout', $data);	
	}


	//page search
	public function search()
	{

		$return_data = $this->reservations_model->get_reservations_search();
		$data['reservations_list'] = $return_data['result_reservations'];
		$data['data_search'] = $return_data['data_search'];
		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['order_status_list'] = $this->reservations_model->get_order_status();

        $data['menu_id'] ='10';
		$data['content'] = 'reservations';
		$data['header'] = array('title' => 'reservations| '.$this->config->item('sitename'),
								'description' =>  'reservations| '.$this->config->item('tagline'),
								'author' => 'www.notebookdd.com',
								'keyword' =>  'notebookdd');
		$this->load->view('template/layout', $data);	

	}

	//page edit
	public function edit($reservations_id)
	{
		$this->is_logged_in();
		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['reservations_data'] = $this->reservations_model->get_reservations_id($reservations_id);
		$data['reservations_detail'] = $this->reservations_model->get_reservations_detail_id($reservations_id);
		$data['order_status_list'] = $this->reservations_model->get_order_status();
		$data['order_status_history_list'] = $this->reservations_model->get_order_status_history($reservations_id);
		$data['order_reservations'] = $this->reservations_model->get_reservations_order_id($reservations_id);
		
		
        $data['menu_id'] ='10';
		$data['content'] = 'reservations_edit';
		$data['header'] = array('title' => 'reservations| '.$this->config->item('sitename'),
								'description' =>  'reservations| '.$this->config->item('tagline'),
								'author' => 'www.notebookdd.com',
								'keyword' =>  'notebookdd');
		$this->load->view('template/layout', $data);	

	}



	public function update_status($reservations_id)
	{
		$this->is_logged_in();

		if($reservations_id != ""){

			$this->reservations_model->update_status_new($reservations_id);
			redirect('reservations/edit/'.$reservations_id);
		}
		else {
			redirect('reservations');
		}

	}

	public function update_tracking($reservations_id)
	{
		$this->is_logged_in();

		if($reservations_id!=""){

			$this->reservations_model->update_tracking($reservations_id);

			$sql =" SELECT * FROM  orders WHERE id= '".$reservations_id."' ";
			$re = $this->db->query($sql);
			$result_order_email =  $re->row_array();

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

	        $this->email->from('notebookdd.notreply@gmail.com', 'notebookdd ได้ส่งของให้กับ ใบสั่งซื้อเลขที่ #'.$reservations_id);
	        $this->email->to($result_order_email["email"]);
	        $this->email->subject('notebookdd ได้ส่งของให้กับ ใบสั่งซื้อเลขที่ #'.$order_id.' จาก notebookdd.com');
	        $this->email->message($this->sendmail_order_tracking($result_order_email["id"]));
	        if($this->email->send())
		    {
		      redirect('reservations/edit/'.$reservations_id);
		    }

		    else
		    {
		       show_error($this->email->print_debugger());
		    }

			
		}
		else {
			redirect('reservations');
		}
	}



	// update
	public function update($reservations_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		//save reservations
		
		if($reservations_id!=""){
			
			$this->reservations_model->update_reservations($reservations_id);
			redirect('reservations/edit/'.$reservations_id);
			
		}
		else {
			redirect('reservations');
		}

	}  

	// update
	public function update_reservations($reservations_id)
	{
		
		if($reservations_id!=""){

			date_default_timezone_set("Asia/Bangkok");
			//save reservations
			$this->reservations_model->update_reservations_date($reservations_id);

			 redirect('reservations/edit/'.$reservations_id);
		}
		else{
			redirect('reservations');

		}

	}

	public function sandmail_reservations($reservations_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		if($reservations_id!=""){
			

			$sql =" SELECT * FROM  orders WHERE id= '".$reservations_id."' ";
			$re = $this->db->query($sql);
			$result_order_email =  $re->row_array();

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

	        $this->email->from('notebookdd.notreply@gmail.com', 'Notebookdd');
	        $this->email->to($result_order_email["email"]);
	        $this->email->subject('ยืนยันการจองสินค้า ใบจองเลขที่ #BO'.$result_order_email["id"].' จาก notebookdd.com');
	        $this->email->message($this->sendmail_reservations_comfirm($result_order_email["id"]));
	        if($this->email->send())
		    {
		    	$data_order = array(
					'is_sendmail' => '1'			
				);

				$where = "id = '".$reservations_id."'"; 
				$this->db->update("orders", $data_order, $where);

			    redirect('reservations/edit/'.$reservations_id);
		    }

		    else
		    {
		       show_error($this->email->print_debugger());
		    }
		}
		else {
			redirect('reservations');
		}

	}


	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
			redirect('login');		
		}		
	}


	function sendmail_order_tracking($orderId)
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
							        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #000;">vat</td>
							        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #000;">@vat</td>
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
							<p>ตรวจสอบสถานะการสั่งซื้อ  <a href="@linkstatus" target="_blank"> ที่นี่</a></p>
				        </td>
				    </tr>
				</table>
				'; 


		$sql =" SELECT * FROM  orders WHERE id= '".$orderId."' ";
		$re = $this->db->query($sql);
		$result_order =  $re->row_array();

		$sql_reservations ="SELECT * FROM order_reservations where order_id ='".$orderId."'";
		$re = $this->db->query($sql_reservations);
		$result_reservations = $re->row_array();

		$date1=date_create($result_order['date']);

		$date2=date_create($result_reservations['start_date']);
        $date3=date_create($result_reservations['expirtdate']);
		$header_str ='
					<td>
					 	<h2 class="aligncenter">ทางเราได้จัดส่งสินค้า tracking number : '.$result_order['trackpost'].'</h2>
				       <p">ระยะเวลาการรอสินค้า : '.date_format($date2,"d/m/Y").' - '.date_format($date3,"d/m/Y").' </p>
				       <p>เลขที่ใบสั่งซื้อ #'.$result_order['id'].'<br/> 
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
			            <strong style="color:red;"><u>สินค้าจอง</u></strong>
						<br><br>
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

			$result =  str_replace("@linkstatus", 'http://www.notebookdd.com/status/'.$result_order['ref_id'],$result);

			if($result_order["is_reservations"])
			{
				$result =  str_replace("@reservations",$reservations_str,$result);
			}
			else{
				$result =  str_replace("@reservations","",$result);
			}
			

			$result =  str_replace("@header",$header_str,$result);

			$result =  str_replace("@address",$address,$result);
			$result =  str_replace("@listOrder",$orderList,$result);
			$result =  str_replace("@vat",number_format($result_order['vat'],2),$result);
			$result =  str_replace("@sumtotal",number_format($result_order['total'],2),$result);

			return $result;

	}

	function sendmail_reservations_comfirm($orderId)
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
							        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #000;">vat</td>
							        <td style="padding: 8px;text-align: left;border-bottom: 1px solid #000;">@vat บาท</td>
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
							<p>ตรวจสอบสถานะการสั่งซื้อ  <a href="@linkstatus" target="_blank"> ที่นี่</a></p>
				        </td>
				    </tr>
				</table>
				'; 


		$sql =" SELECT * FROM  orders WHERE id= '".$orderId."' ";
		$re = $this->db->query($sql);
		$result_order =  $re->row_array();

		$sql_reservations ="SELECT * FROM order_reservations where order_id ='".$orderId."'";
		$re = $this->db->query($sql_reservations);
		$result_reservations = $re->row_array();

		$date1=date_create($result_order['date']);

		$date2=date_create($result_reservations['start_date']);
        $date3=date_create($result_reservations['expirtdate']);
		$header_str ='
					<td>
				       <h2 class="aligncenter">ระยะเวลาการรอสินค้า : '.$result_reservations['wating_date'].' วัน หลังจากการยืนยัน </h2>
				       <p>เลขที่ใบจอง #BO'.$result_order['id'].'<br/> 
				        วันที่สั่งซื้อ : '.date_format($date1,"d/m/Y H:i").'</p>
				        <p> กรุณายืนยันการจอง :   <a href="'.'http://www.notebookdd.com/confirm/?ref_id='.$result_order['ref_id'].'" target="_blank">ยืนยันการจอง</a></p>
				        
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
			            <strong style="color:red;"><u>สินค้าจอง</u></strong>
						<br><br>
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

			$result =  str_replace("@linkstatus", 'http://www.notebookdd.com/status/'.$result_order['ref_id'],$result);

			if($result_order["is_reservations"])
			{
				$result =  str_replace("@reservations",$reservations_str,$result);
			}
			else{
				$result =  str_replace("@reservations","",$result);
			}
			

			$result =  str_replace("@header",$header_str,$result);

			$result =  str_replace("@address",$address,$result);
			$result =  str_replace("@listOrder",$orderList,$result);
			$result =  str_replace("@vat",number_format($result_order['vat'],2),$result);
			$result =  str_replace("@sumtotal",number_format($result_order['total'],2),$result);

			return $result;

	}

}

/* End of file reservations.php */
/* Location: ./application/controllers/reservations.php */