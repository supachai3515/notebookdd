<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//call model inti 
		$this->load->model('initdata_model');
		$this->load->model('home_model');
		$this->load->model('products_model');
		$this->load->library('pagination');
	}

	public function index()
	{

		//header meta tag 
		$data['header'] = array('title' => $this->config->item('sitename'),
								'description' =>  $this->config->item('tagline'),
								'author' => 'notebookdd.com',
								'keyword' =>  'อะไหล่ notebook, อะไหล่โน๊ตบุ๊ค, อะไหล่จอ lcd, ขายอะไหล่โน๊ตบุ๊ค , จอโน๊ตบุ๊ค, แบตโน๊ตบุ๊ค, อะแดปเตอร์โน๊ตบุ๊ค,  Mainboard โน๊ตบุ๊ค, ซ่อมโน๊ตบุ๊ค');
		//get menu database 
		$this->load->model('initdata_model');
		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['menu_type'] = $this->initdata_model->get_type();
		$data['menu_brands'] = $this->initdata_model->get_brands();
		$data['brand_oftype'] = $this->products_model->get_brand_oftype();

		//get slider list
	    $sql =" SELECT *  FROM  slider p  ORDER BY p.id ";
		$re = $this->db->query($sql);
		$data['slider_list'] = $re->result_array();

		//list product
		$data['product_new'] = $this->home_model->get_products_new();
		$data['product_sale'] = $this->home_model->get_products_sale();


		$data['content'] = 'home_new';
		$data['script_file']= "js/home_js";
		//load layout
		$this->load->view('template/layout', $data);	
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */