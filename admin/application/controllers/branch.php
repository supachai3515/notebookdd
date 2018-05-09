<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//call model inti 
		$this->load->model('initdata_model');
		$this->load->model('branch_model');
		$this->load->library('pagination');
		$this->is_logged_in();

	}

	//page view
	public function index($page=0)
	{

		$config['base_url'] = base_url('branch/index');
		$config['total_rows'] = $this->branch_model->get_branch_count();
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
		$data['branch_list'] = $this->branch_model->get_branch($page, $config['per_page']);
		$data['links_pagination'] = $this->pagination->create_links();

		$data['menus_list'] = $this->initdata_model->get_menu();

		//call script
        $data['menu_id'] ='14';
		$data['content'] = 'branch';
		$data['header'] = array('title' => 'branch | '.$this->config->item('sitename'),
								'description' =>  'branch | '.$this->config->item('tagline'),
								'author' => 'www.notebookdd.com',
								'keyword' =>  'notebookdd');
		$this->load->view('template/layout', $data);	
	}


	//page search
	public function search()
	{

		$return_data = $this->branch_model->get_branch_search();
		$data['branch_list'] = $return_data['result_branch'];
		$data['data_search'] = $return_data['data_search'];
		$data['menus_list'] = $this->initdata_model->get_menu();

        $data['menu_id'] ='14';
		$data['content'] = 'branch';
		$data['header'] = array('title' => 'branch | '.$this->config->item('sitename'),
								'description' =>  'branch | '.$this->config->item('tagline'),
								'author' => 'www.notebookdd.com',
								'keyword' =>  'notebookdd');
		$this->load->view('template/layout', $data);	

	}

	//page edit
	public function edit($branch_id)
	{
		$this->is_logged_in();
		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['branch_data'] = $this->branch_model->get_branch_id($branch_id);
        $data['menu_id'] ='14';
		$data['content'] = 'branch_edit';
		$data['header'] = array('title' => 'branch | '.$this->config->item('sitename'),
								'description' =>  'branch | '.$this->config->item('tagline'),
								'author' => 'www.notebookdd.com',
								'keyword' =>  'notebookdd');
		$this->load->view('template/layout', $data);	

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

	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
			redirect('login');		
		}		
	}

}

/* End of file branch.php */
/* Location: ./application/controllers/branch.php */