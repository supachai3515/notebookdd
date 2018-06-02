<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//call model inti 
		$this->load->model('initdata_model');
		$this->load->library('pagination');
		$this->load->model('dealer_model');
	}

	public function index()
	{
		//header meta tag 
		$data['header'] = array('title' => 'ลงชื่อเข้าใช้ | '.$this->config->item('sitename'),
								'description' =>  'ลงชื่อเข้าใช้ | '.$this->config->item('tagline'),
								'author' => 'www.notebookdd.com',
								'keyword' =>  'ลงชื่อเข้าใช้ | '.$this->config->item('tagline') );

		//get menu database 
		$this->load->model('initdata_model');
		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['menu_type'] = $this->initdata_model->get_type();
		$data['menu_brands'] = $this->initdata_model->get_brands();


		//$data['content'] = 'payment';
		$data['content'] = 'signin_new';

		$this->load->view('template/layout', $data);
	}

	public function register()
	{
		$value = json_decode(file_get_contents("php://input"));

		$phone ="";
		$nid = "";
		$addressVat =""; 

		if(isset($value->phone))
		{
			$phone = $value->phone;
		}
		if(isset($value->nid))
		{
			$nid = $value->nid;
		}
		if(isset($value->addressVat))
		{
			$addressVat = $value->addressVat;
		}

		if($value->password != $value->confirm_password){
			$data['error'] = true;
				$data['message'] = ' ใส่รหัสผ่านไม่ตรงกัน';
				print json_encode($data);
				return;

		}
		


		date_default_timezone_set("Asia/Bangkok");
			$data_member = array(
				'first_name' => $value->name,
				'last_name' => $value->lastname,
				'company' => $value->shop,
				'username' => $value->email,
				'password' => $value->password,
				'email' => $value->email,
				'tel' => $phone,
				'mobile' => $value->mobile,
				'verify' => '0',
				'tax_number' => $nid,
				'address_receipt' => $value->address,
				'address_tax' => $addressVat,
				'date' => date("Y-m-d H:i:s"),
				'is_active' => '1',

			);

			$query = $this->db->query(" SELECT COUNT(email) as connt_id FROM  members WHERE email ='".$value->email."' ");
			$row = $query->row_array();
			if($row['connt_id']==1)
			{
				$data['error'] = true;
				$data['message'] = $value->email.' มีการสมัครแล้ว';
				print json_encode($data);
				//$where = "id = '".$sku_str."'"; 
				//$this->db->update("product_type", $data_product, $where);
			
			}
			else {

				
				$this->db->insert("members", $data_member);
   				$insert_id = $this->db->insert_id();
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
		        $sub ="ขอบคุณการสมัคร Dealer - ".$value->name .' '.$value->lastname;

		        $this->email->from('notebookdd.notreply@gmail.com', "Notebookdd");
	        	$this->email->to($value->email.',simpleitnotebook@gmail.com');
		        $this->email->subject($sub);
		        $this->email->message($this->sendmail_dealer($insert_id));
		        $this->email->send();
			     
				//$insert_id = $this->db->insert_id();
		   		//return  $insert_id;
			}
	}

	public function signin()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		if(empty($user) or empty($pass)){
			$this->session->set_flashdata('msg', 'ชื่อผู้ใช้หรือรหัสผ่านไม่สามารถว่างได้');
			redirect('login');
		}
				
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', $this->input->post('password'));
		$query = $this->db->get("members");
		
		if($query->num_rows() == 1)
		{
			$dealerInfo =  $this->dealer_model->get_dealerInfo($this->input->post('username'));

			$data = array(
				'username' => $user,
				'permission' => 2,
				'verify' => $dealerInfo['verify'],
				'id' => $dealerInfo['id'],
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('home');
		}
		else 
		{
			$this->session->set_flashdata('msg', 'ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง');
			redirect('login');
		}

	}

}

/* End of file payment.php */
/* Location: ./application/controllers/payment.php */