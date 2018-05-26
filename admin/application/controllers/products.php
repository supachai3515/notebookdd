<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "/libraries/BaseController.php";
class Products extends BaseController
{
	public function __construct(){
		parent::__construct();
		session_cache_limiter('private, must-revalidate');
		session_cache_expire(60);
		session_start();

		$this->load->model('initdata_model');
		$this->load->model('products_model');
		$this->load->library('my_upload');
		$this->load->library('pagination');

		$this->isLoggedIn();
	}

	//page view
	public function index($page=0)
	{

		$data = $this->get_data_check("is_view");
		if (!is_null($data)) {

					$count = $this->products_model->get_products_count();
					$data['links_pagination'] = $this->pagination_compress("products/index", $count, $this->config->item('pre_page'));
					$data['products_list'] = $this->products_model->get_products($page, $this->config->item('pre_page'));
					$data['brands_list'] = $this->products_model->get_brands();
					$data['type_list'] = $this->products_model->get_type();
								
					$data['branch_list'] = $this->products_model->get_branch();

					//defalut search
					$data_search['all_promotion'] = "1";
					$data_search['is_active'] = "1";
					$data['data_search'] = $data_search;

					$data['script_file']= "js/product_add_js";
					$data["content"] = "products";
					$data["header"] = $this->get_header("Products");
					$this->load->view("template/layout_main", $data);


				}

			}


			//page edit
			public function edit($product_id)
			{
				$data = $this->get_data_check("is_edit");
				if (!is_null($data)) {
						$data['brands_list'] = $this->products_model->get_brands();
						$data['type_list'] = $this->products_model->get_type();
						$data['product_data'] = $this->products_model->get_product($product_id);
						$data['images_list'] = $this->products_model->get_images($product_id);
						//call script
						$data['script_file']= "js/product_js";
						$data['content'] = 'product_edit';
						$data["header"] = $this->get_header("Products");
						$this->load->view('template/layout_main', $data);	
				}
	}
	//page search
	public function search()
	{

		$data = $this->get_data_check("is_view");
		if (!is_null($data)) {

					$return_data = $this->products_model->get_products_search();
					$data['products_list'] = $return_data['result_products'];
					$data['data_search'] = $return_data['data_search'];
					$data['sql'] = $return_data['sql'];

					$data['brands_list'] = $this->products_model->get_brands();
					$data['type_list'] = $this->products_model->get_type();
					$data['branch_list'] = $this->products_model->get_branch();

					//defalut search
					$data_search['all_promotion'] = "1";
					$data_search['is_active'] = "1";
					$data['data_search'] = $data_search;

					$data['script_file']= "js/product_add_js";
					$data["content"] = "products";
					$data["header"] = $this->get_header("Products");
					$this->load->view("template/layout_main", $data);


				}

	}

	// insert
	public function add()
	{
		$data = $this->get_data_check("is_add");
		if (!is_null($data)) {

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

	} 
	// update
	public function update($product_id)
	{

		$data = $this->get_data_check("is_add");
		if (!is_null($data)) {

				
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
