<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function get_products_new()
	{
		$sql =" SELECT  p.*, b.name brand_name, t.name type_name  , stock_all FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id 
				LEFT JOIN (SELECT product_id, SUM(number) stock_all FROM stock  GROUP BY product_id) s ON s.product_id = p.id 
				WHERE p.is_active= '1' AND t.is_active='1'
				ORDER BY p.id DESC LIMIT 0,30"; 
		$result = $this->db->query($sql);
		return  $result->result_array();
	}
	
	public function get_products_sale()
	{
		$sql =" SELECT  p.*, b.name brand_name, t.name type_name , stock_all FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id 
				LEFT JOIN (SELECT product_id, SUM(number) stock_all FROM stock  GROUP BY product_id) s ON s.product_id = p.id 
				WHERE p.is_active= '1' AND t.is_active='1'
				ORDER BY p.id LIMIT 0,30"; 
		$result = $this->db->query($sql);
		return  $result->result_array();
	}


}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */