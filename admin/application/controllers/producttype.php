<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";

class Producttype extends BaseController {
	public function __construct(){
		parent::__construct();
		session_start();
		//call model inti 
		$this->load->model('initdata_model');
		$this->load->model('producttype_model');
		$this->isLoggedIn();
	}

	//page view
	public function index($page=0)
	{

		$data = $this->get_data_check("is_view");
		if (!is_null($data)) {



			$count = $this->producttype_model->get_producttype_count();
			$data['links_pagination'] = $this->pagination_compress("producttype/index", $count, $this->config->item('pre_page'));
			$data['producttype_list'] = $this->producttype_model->get_producttype($page, $this->config->item('pre_page'));

			//$data['script_file']= "js/product_add_js";
			$data["content"] = "producttype";
			$data["header"] = $this->get_header("producttype");
			$this->load->view("template/layout_main", $data);

		}
	}


	//page search
	public function search()
	{

		$data = $this->get_data_check("is_view");
		if (!is_null($data)) {

			$return_data = $this->producttype_model->get_producttype_search();
			$data['producttype_list'] = $return_data['result_producttype'];

			//$data['script_file']= "js/product_add_js";
			$data["content"] = "producttype";
			$data["header"] = $this->get_header("producttype");
			$this->load->view("template/layout_main", $data);

		}


	}

	//page edit
	public function edit($producttype_id)
	{
		$data = $this->get_data_check("is_edit");
		if (!is_null($data)) {
			$data['producttype_data'] = $this->producttype_model->get_producttype_id($producttype_id);
	
			$data["content"] = "producttype_edit";
			$data["header"] = $this->get_header("producttype_edit");
			$this->load->view("template/layout_main", $data);
		}
	}

	// update
	public function update($producttype_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		//save producttype
		$this->producttype_model->update_producttype($producttype_id);

		if($producttype_id!=""){
			redirect('producttype/edit/'.$producttype_id);
		}
		else {
			redirect('producttype');
		}

	}  

	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
			redirect('login');		
		}		
	}

}

/* End of file producttype.php */
/* Location: ./application/controllers/producttype.php */