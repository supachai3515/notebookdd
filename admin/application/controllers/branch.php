

<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";
class Branch extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        session_start();
		$this->load->model('initdata_model');
		$this->load->model('branch_model');
        $this->isLoggedIn();
    }

	//page view
	public function index($page=0)
	{

		$data = $this->get_data_check("is_view");
        if (!is_null($data)) {
            $count = $this->branch_model->get_branch_count();
            $data["links_pagination"] = $this->pagination_compress("slider/index", $count, $this->config->item("pre_page"));
            $data["branch_list"] = $this->branch_model->get_branch($page, $this->config->item("pre_page"));
            $data["links_pagination"] = $this->pagination->create_links();
            $data["content"] = "branch";
            $data["header"] = $this->get_header("Branch");
            $this->load->view("template/layout_main", $data);
		}	
	}


	//page search
	public function search()
	{


		$data = $this->get_data_check("is_view");
		if (!is_null($data)) {

			$return_data = $this->branch_model->get_branch_search();
			$data['branch_list'] = $return_data['result_branch'];

			$data['data_search'] = $return_data['data_search'];

			//$data['script_file']= "js/product_add_js";
			$data["content"] = "branch";
			$data["header"] = $this->get_header("branch");
			$this->load->view("template/layout_main", $data);
		}

	}

	//page edit
	public function edit($branch_id)
	{


		$data = $this->get_data_check("is_edit");
		if (!is_null($data)) {
			$data['branch_data'] = $this->branch_model->get_branch_id($branch_id);
			$data["content"] = "branch_edit";
			$data["header"] = $this->get_header("branch_edit");
			$this->load->view("template/layout_main", $data);
		}
	}

	// update
	public function update($branch_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		//save branch
		$this->branch_model->update_branch($branch_id);

		if($branch_id!=""){
			redirect('branch/edit/'.$branch_id);
		}
		else {
			redirect('branch');
		}

	}  

}

/* End of file branch.php */
/* Location: ./application/controllers/branch.php */