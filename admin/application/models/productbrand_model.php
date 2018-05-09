
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productbrand_model extends CI_Model {


	public function get_productbrand( $start, $limit)
	{

	    $sql =" SELECT *  FROM  product_brand p  ORDER BY p.id DESC LIMIT " . $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();

	}

	public function get_productbrand_count()
	{
		$sql =" SELECT COUNT(id) as connt_id FROM  product_brand p"; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return  $row['connt_id'];
	
	}


	public function get_productbrand_id($productbrand_id)
	{
		$sql ="SELECT * FROM product_brand WHERE id = '".$productbrand_id."'"; 

		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
	}


    public function get_productbrand_search()
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_productbrand = array(
			'search' => $this->input->post('search')		
		);

		$sql ="SELECT * FROM product_brand WHERE name LIKE '%".$data_productbrand['search']."%' OR  description LIKE '%".$data_productbrand['search']."%' ";
		$re = $this->db->query($sql);
		$return_data['result_productbrand'] = $re->result_array();
		$return_data['data_search'] = $data_productbrand;
		$return_data['sql'] = $sql;
		return $return_data;
	}

	public function update_productbrand($productbrand_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_productbrand = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'modified_date' => date("Y-m-d H:i:s"),
			'is_active' => $this->input->post('isactive')						
		);
		$where = "id = '".$productbrand_id."'"; 
		$this->db->update("product_brand", $data_productbrand, $where);

	}

}

/* End of file productbrand_model.php */
/* Location: ./application/models/productbrand_model.php */