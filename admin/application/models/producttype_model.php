
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producttype_model extends CI_Model {


	public function get_producttype( $start, $limit)
	{

	    $sql =" SELECT *  FROM  product_type p  ORDER BY p.id DESC LIMIT " . $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();

	}

	public function get_producttype_count()
	{
		$sql =" SELECT COUNT(id) as connt_id FROM  product_type p"; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return  $row['connt_id'];
	
	}


	public function get_producttype_id($producttype_id)
	{
		$sql ="SELECT * FROM product_type WHERE id = '".$producttype_id."'"; 

		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
	}


    public function get_producttype_search()
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_producttype = array(
			'search' => $this->input->post('search')		
		);

		$sql ="SELECT * FROM product_type WHERE name LIKE '%".$data_producttype['search']."%' OR  description LIKE '%".$data_producttype['search']."%' ";
		$re = $this->db->query($sql);
		$return_data['result_producttype'] = $re->result_array();
		$return_data['data_search'] = $data_producttype;
		$return_data['sql'] = $sql;
		return $return_data;
	}

	public function update_producttype($producttype_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_producttype = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'modified_date' => date("Y-m-d H:i:s"),
			'is_active' => $this->input->post('isactive')						
		);
		$where = "id = '".$producttype_id."'"; 
		$this->db->update("product_type", $data_producttype, $where);

	}

}

/* End of file producttype_model.php */
/* Location: ./application/models/producttype_model.php */