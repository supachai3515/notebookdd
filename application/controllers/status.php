<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//call model inti 
		$this->load->model('initdata_model');
		$this->load->library('pagination');
	}

	public function index($ref_order_id="")
	{
		if($ref_order_id != ""){

		//header meta tag 
		$data['header'] = array('title' => 'สถานะสินค้า | '.$this->config->item('sitename'),
								'description' =>  'สถานะสินค้า | '.$this->config->item('tagline'),
								'author' => 'www.batterynb.com',
								'keyword' =>  'สถานะสินค้า | '.$this->config->item('tagline') );

		//get menu database 
		$this->load->model('initdata_model');
		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['menu_type'] = $this->initdata_model->get_type();
		$data['menu_brands'] = $this->initdata_model->get_brands();

		$sql ="SELECT * FROM orders WHERE ref_id = '".$ref_order_id."'"; 
		$query = $this->db->query($sql);
		$row = $query->row_array();

		if(count($row) == 0){
			redirect('product','refresh');
		}
		$data['order'] = $row;

		$sql_detail ="SELECT * ,r.price price_order FROM order_detail r INNER JOIN  products p ON r.product_id = p.id
						WHERE r.order_id ='".$row['id']."' ORDER BY r.linenumber ";
		$re = $this->db->query($sql_detail);
		$data['order_detail'] = $re->result_array();

		$sql_reservations ="SELECT * FROM order_reservations where order_id ='".$row['id']."'";
		$re = $this->db->query($sql_reservations);
		$data['order_reservations'] = $re->row_array();

		$data['content'] = 'status';
		$this->load->view('template/layout', $data);
		}
		else{
			redirect('product','refresh');
		}
	
	}
}
/* End of file status.php */
/* Location: ./application/controllers/status.php */