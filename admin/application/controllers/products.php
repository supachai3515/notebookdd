<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//call model inti 
		$this->load->model('initdata_model');
		$this->load->model('products_model');
		$this->load->library('my_upload');
		$this->load->library('pagination');
		$this->is_logged_in();

	}

	//page view
	public function index($page=0)
	{

		$config['base_url'] = base_url('products/index');
		$config['total_rows'] = $this->products_model->get_products_count();
		$config['per_page'] = 10; 
		//config for bootstrap pagination class integration
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
		$data['products_list'] = $this->products_model->get_products($page, $config['per_page']);
		
		$data['links_pagination'] = $this->pagination->create_links();
		
		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['brands_list'] = $this->products_model->get_brands();
		$data['type_list'] = $this->products_model->get_type();
		$data['branch_list'] = $this->products_model->get_branch();

		//defalut search
		$data_search['all_promotion'] = "1";
		$data_search['is_active'] = "1";
		$data['data_search'] = $data_search;

		//call script
		$data['script_file']= "js/product_add_js";
        $data['menu_id'] ='1';
		$data['content'] = 'products';
		$data['header'] = array('title' => 'Products | '.$this->config->item('sitename'),
								'description' =>  'Products | '.$this->config->item('tagline'),
								'author' => 'www.wisadev.com',
								'keyword' =>  'wisadev e-commerce');
		$this->load->view('template/layout', $data);	
	}
	//page edit
	public function edit($product_id)
	{
		$this->is_logged_in();
		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['brands_list'] = $this->products_model->get_brands();
		$data['type_list'] = $this->products_model->get_type();
		$data['product_data'] = $this->products_model->get_product($product_id);
		$data['images_list'] = $this->products_model->get_images($product_id);
		//call script
		$data['script_file']= "js/product_js";
        $data['menu_id'] ='1';
		$data['content'] = 'product_edit';
		$data['header'] = array('title' => 'Products | '.$this->config->item('sitename'),
								'description' =>  'Products | '.$this->config->item('tagline'),
								'author' => 'www.wisadev.com',
								'keyword' =>  'wisadev e-commerce');
		$this->load->view('template/layout', $data);	
	}
	//page search
	public function search()
	{
		$return_data = $this->products_model->get_products_search();
		$data['products_list'] = $return_data['result_products'];
		$data['data_search'] = $return_data['data_search'];
		$data['sql'] = $return_data['sql'];

		$data['menus_list'] = $this->initdata_model->get_menu();
		$data['brands_list'] = $this->products_model->get_brands();
		$data['type_list'] = $this->products_model->get_type();
		$data['branch_list'] = $this->products_model->get_branch();

		//call script
		$data['script_file']= "js/product_add_js";
        $data['menu_id'] ='1';
		$data['content'] = 'products';
		$data['header'] = array('title' => 'Products | '.$this->config->item('sitename'),
								'description' =>  'Products | '.$this->config->item('tagline'),
								'author' => 'www.wisadev.com',
								'keyword' =>  'wisadev e-commerce');
		$this->load->view('template/layout', $data);	
	}

	// insert
	public function add()
	{
		date_default_timezone_set("Asia/Bangkok");
		//save product
		$product_id ="";
		$product_id = $this->products_model->save_product();
		echo $product_id;

		$image_name = ""; 
		$dir ='./uploads/'.date("Ym").'/';
		$dir_insert ='uploads/'.date("Ym").'/';

		if($product_id!="")
		{
			$this->my_upload->upload($_FILES["image_field"]);
		    if ( $this->my_upload->uploaded == true  ) {
		      $this->my_upload->allowed         = array('image/*');
		      $this->my_upload->file_name_body_pre = 'thumb_';
		      //$this->my_upload->file_new_name_body    = 'image_resized_' . $now;
		      $this->my_upload->image_resize          = true;
		      $this->my_upload->image_x               = 800;
		      $this->my_upload->image_ratio_y         = true;
		      $this->my_upload->process($dir);

		      if ( $this->my_upload->processed == true ) {

		        $image_name  = $this->my_upload->file_dst_name;
		        $this->products_model->update_img($product_id, $dir_insert.$image_name);

		        $this->my_upload->clean();  
		      } else {
		        $data['errors'] = $this->my_upload->error;
		        echo $data['errors'];    
		      }
		    } else  {
		      $data['errors'] = $this->my_upload->error;
		    }
	  
	        for ($i=1; $i <11 ; $i++) { 
	        	$this->my_upload->upload($_FILES['image_field_'.$i]);
			    if ( $this->my_upload->uploaded == true  ) {
			      $this->my_upload->allowed   = array('image/*');
			      $this->my_upload->process($dir);

			      if ( $this->my_upload->processed == true ) {
			        $image_name  = $this->my_upload->file_dst_name;
			        //inset image
		        	$this->products_model->insert_productimgs($product_id, $i, $dir_insert.$image_name );
		        
			        $this->my_upload->clean();  
			      } else {
			        $data['errors'] = $this->my_upload->error;
			        echo $data['errors'];
			        //inset image  
			        $this->products_model->insert_productimgs($product_id, $i,"");  
			      }
			    } else  {
			      $data['errors'] = $this->my_upload->error;
			      //inset image
			      $this->products_model->insert_productimgs($product_id, $i, "");
			    }
	        }

		}
		if($product_id!=""){
			redirect('products/edit/'.$product_id);
		}
		else {
			redirect('products');
		}	
	} 
	// update
	public function update($product_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		//save product
		$this->products_model->update_product($product_id);

		$dir ='./uploads/'.date("Ym").'/';
		$dir_insert ='uploads/'.date("Ym").'/';

		if($product_id !="")
		{
			$this->my_upload->upload($_FILES["image_field"]);
		    if ( $this->my_upload->uploaded == true  ) {
		      $this->my_upload->allowed         = array('image/*');
		      $this->my_upload->file_name_body_pre = 'thumb_';
		      $this->my_upload->image_resize          = true;
		      $this->my_upload->image_x               = 800;
		      $this->my_upload->image_ratio_y         = true;
		      $this->my_upload->process($dir);

		      if ( $this->my_upload->processed == true ) {
		        $image_name  = $this->my_upload->file_dst_name;
		        //update img
		        $this->products_model->update_img($product_id, $dir_insert.$image_name);
		        $this->my_upload->clean();  
		      } else {
		        $data['errors'] = $this->my_upload->error;
		        echo $data['errors'];    
		      }
		    } else  {
		      $data['errors'] = $this->my_upload->error;
		    }
	  
	        for ($i=1; $i <11 ; $i++) { 
	        	//update is active
	        	$this->products_model->update_productimgs_active($product_id, $i, $this->input->post('is_active_'.$i));
	        	$this->my_upload->upload($_FILES['image_field_'.$i]);
			    if ( $this->my_upload->uploaded == true  ) {
			      $this->my_upload->allowed   = array('image/*');
			      $this->my_upload->process($dir);

			      if ( $this->my_upload->processed == true ) {
			        $image_name  = $this->my_upload->file_dst_name;
			        //update image
		        	$this->products_model->update_productimgs($product_id, $i, $dir_insert.$image_name, $this->input->post('is_active_'.$i));
		        
			        $this->my_upload->clean();  
			      } else {
			        $data['errors'] = $this->my_upload->error;
			      }
			    } else  {
			      $data['errors'] = $this->my_upload->error;
			    }
	        }

		}
		if($product_id!=""){
			redirect('products/edit/'.$product_id);
		}
		else {
			redirect('products');
		}

	} 

	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true){
			redirect('login');		
		}		
	}

	public function getstock()
	{
		$value = json_decode(file_get_contents("php://input"));
		$data['stock'] =  $this->products_model->getstock($value->product_id);
		print json_encode($data['stock']);

	}


}

/* End of file prrducts.php */
/* Location: ./application/controllers/prrducts.php */
