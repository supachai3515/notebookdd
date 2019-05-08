<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class documents extends BaseController
{
	public function __construct(){

		parent::__construct();
        session_start();
		$this->load->model('documents_model');
        $this->load->model('members_model');
		$this->isLoggedIn();

	}

	//page view
	public function index($page=0)
	{

		$data = $this->get_data_check("is_view");
        if (!is_null($data)) {
			$count = $this->documents_model->get_documents_count();
            $data['links_pagination'] = $this->pagination_compress("members/index", $count, $this->config->item('pre_page'));
            $data['documents_list'] = $this->documents_model->get_documents($page, $this->config->item('pre_page'));
			$data['script_file']= "js/product_add_js";
            $data['content'] = 'documents';
            $data["header"] = $this->get_header("documents");
            $this->load->view("template/layout_main", $data);
		}
	}

	//page search
	public function search()
	{

		$data = $this->get_data_check("is_view");
        if (!is_null($data)) {
			$count = $this->documents_model->get_documents_count();
			$data['documents_list'] = $return_data['result_documents'];
			$data['data_search'] = $return_data['data_search'];
			$data['script_file']= "js/product_add_js";

            $data['content'] = 'documents';
            $data["header"] = $this->get_header("documents");
            $this->load->view("template/layout_main", $data);
		}


	}

		// insert
	public function add()
	{
		$data = $this->get_data_check("is_add");
		if (!is_null($data)) {
			date_default_timezone_set("Asia/Bangkok");
			//save document
			$document_id ="";
			$document_id = $this->documents_model->save_document();

			if($document_id !=""){
				redirect('documents/edit/'.$document_id);
			}
			else {
				redirect('documents');
			}	
		}
	} 

	//page edit
	public function edit($document_id)
	{


		$data = $this->get_data_check("is_edit");
		if (!is_null($data)) {
				$data['document_data'] = $this->documents_model->get_document($document_id);
				//call script
				$data['script_file']= "js/product_js";
				$data['content'] = 'documents_edit';
				$data["header"] = $this->get_header("Products");
				$this->load->view('template/layout_main', $data);	
		}

	}

	// update
	public function update($document_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		//save document
		$this->documents_model->update_document($document_id);

		if($document_id!=""){
			redirect('documents/edit/'.$document_id);
		}
		else {
			redirect('documents');
		}

	} 

}

/* End of file prrducts.php */
/* Location: ./application/controllers/prrducts.php */
