<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";
class Productbrand extends BaseController {
	public function __construct(){
		parent::__construct();
		session_start();
		//call model inti 
		$this->load->model('initdata_model');
		$this->load->model('productbrand_model');
		$this->load->library('pagination');
		$this->isLoggedIn();

	}

	//page view
	public function index($page=0)
	{

		$data = $this->get_data_check("is_view");
		if (!is_null($data)) {

			$count = $this->productbrand_model->get_productbrand_count();
			$data['links_pagination'] = $this->pagination_compress("productbrand/index", $count, $this->config->item('pre_page'));
			$data['productbrand_list'] = $this->productbrand_model->get_productbrand($page, $this->config->item('pre_page'));

			//$data['script_file']= "js/product_add_js";
			$data["content"] = "productbrand";
			$data["header"] = $this->get_header("productbrand");
			$this->load->view("template/layout_main", $data);

		}
	}


	//page search
	public function search()
	{

		$data = $this->get_data_check("is_view");
		if (!is_null($data)) {

		$return_data = $this->productbrand_model->get_productbrand_search();
		$data['productbrand_list'] = $return_data['result_productbrand'];
		$data['data_search'] = $return_data['data_search'];

		$data["content"] = "productbrand";
		$data["header"] = $this->get_header("productbrand");
		$this->load->view("template/layout_main", $data);	

		}

	}

	//page edit
	public function edit($productbrand_id)
	{
		$data = $this->get_data_check("is_edit");
		if (!is_null($data)) {

			$data['productbrand_data'] = $this->productbrand_model->get_productbrand_id($productbrand_id);
	
			$data["content"] = "productbrand_edit";
			$data["header"] = $this->get_header("productbrand edit");
			$this->load->view("template/layout_main", $data);	

		}

	}

	// update
	public function update($productbrand_id)
	{

		$data = $this->get_data_check("is_edit");
		if (!is_null($data)) {

			date_default_timezone_set("Asia/Bangkok");
			//save productbrand
			$this->productbrand_model->update_productbrand($productbrand_id);

			if($productbrand_id!=""){
				redirect('productbrand/edit/'.$productbrand_id);
			}
			else {
				redirect('productbrand');
			}
		}

	}  

}

/* End of file productbrand.php */
/* Location: ./application/controllers/productbrand.php */