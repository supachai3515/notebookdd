<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";

class Orders extends BaseController 
{
	public function __construct(){
		parent::__construct();
        session_start();
        $this->load->model('orders_model');
        $this->load->library('my_upload');
        $this->load->library('upload');
        $this->isLoggedIn();

	}

	//page view
	public function index($page=0)
	{

		$data = $this->get_data_check("is_view");
        if (!is_null($data)) {
            $count = $this->orders_model->get_orders_count();
            $data["links_pagination"] = $this->pagination_compress("orders/index", $count, $this->config->item("pre_page"));
            $data["orders_list"] = $this->orders_model->get_orders($page, $this->config->item("pre_page"));
            $data["links_pagination"] = $this->pagination->create_links();

            $data['order_status_list'] = $this->orders_model->get_order_status();

            $data["content"] = "orders";
            $data["header"] = $this->get_header("orders");
            $this->load->view("template/layout_main", $data);
		}
	}


	//page search
	public function search()
	{
		$data = $this->get_data_check("is_view");
        if (!is_null($data)) {
            $return_data = $this->orders_model->get_orders_search();
            $data['orders_list'] = $return_data['result_orders'];
            $data['data_search'] = $return_data['data_search'];
            $data['order_status_list'] = $this->orders_model->get_order_status();
            $data["content"] = "orders";
            $data["header"] = $this->get_header("orders");
            $this->load->view("template/layout_main", $data);
        }

	}

	//page edit
	public function edit($orders_id)
	{

		$data = $this->get_data_check("is_edit");
        if (!is_null($data)) {
            $data['orders_data'] = $this->orders_model->get_orders_id($orders_id);
            $data['orders_detail'] = $this->orders_model->get_orders_detail_id($orders_id);
            $data['order_status_list'] = $this->orders_model->get_order_status();
            $data['order_status_history_list'] = $this->orders_model->get_order_status_history($orders_id);

            //$data['script_file']= "js/order_js";
            $data["content"] = "orders_edit";
            $data["header"] = $this->get_header("Order edit");
            $this->load->view("template/layout_main", $data);
        }
	}



	public function update_status($orders_id)
	{
		$this->is_logged_in();

		$this->orders_model->update_status($orders_id);

		if($orders_id!=""){
			redirect('orders/edit/'.$orders_id);
		}
		else {
			redirect('orders');
		}

	}

	public function update_tracking($orders_id)
	{
		$this->is_logged_in();

		$this->orders_model->update_tracking($orders_id);

		if($orders_id!=""){

			$sql =" SELECT * FROM  orders WHERE id= '".$orders_id."' ";
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

	        $this->email->from('notebookdd.notreply@gmail.com', 'notebookdd ได้ส่งของให้กับ ใบสั่งซื้อเลขที่ #'.$orders_id);
	        $this->email->to($result_order_email["email"]);
	        $this->email->subject('notebookdd ได้ส่งของให้กับ ใบสั่งซื้อเลขที่ #'.$order_id.' จาก notebookdd.com');
	        $this->email->message($this->sendmail_order_tracking($result_order_email["id"]));
	        if($this->email->send())
		    {
		      redirect('orders/edit/'.$orders_id);
		    }

		    else
		    {
		       show_error($this->email->print_debugger());
		    }

			//redirect('orders/edit/'.$orders_id);
		}
		else {
			redirect('orders');
		}
	}


	// update
	public function update($orders_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		//save orders
		$this->orders_model->update_orders($orders_id);

		if($orders_id!=""){
			redirect('orders/edit/'.$orders_id);
		}
		else {
			redirect('orders');
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

		$date1=date_create($result_order['date']);
		$header_str ='
					<td>
				       <h2 class="aligncenter">ทางเราได้จัดส่งสินค้า tracking number : '.$result_order['trackpost'].'</h2>
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
			            <strong style="color:red;"><u>สินค้าจอง</u> กรุณารอทางร้านติดต่อกลับเพื่อทำการยืนยันการจองอีกครั้ง อาจจะใช้เวลา 3 - 30 วัน</strong>
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

/* End of file orders.php */
/* Location: ./application/controllers/orders.php */