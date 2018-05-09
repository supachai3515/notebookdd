
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends CI_Model {


	public function get_branch( $start, $limit)
	{

	    $sql =" SELECT *  FROM  branch p  ORDER BY p.id DESC LIMIT " . $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();

	}

	public function get_branch_count()
	{
		$sql =" SELECT COUNT(id) as connt_id FROM  branch p"; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return  $row['connt_id'];
	
	}


	public function get_branch_id($branch_id)
	{
		$sql ="SELECT * FROM branch WHERE id = '".$branch_id."'"; 

		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
	}


    public function get_branch_search()
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_branch = array(
			'search' => $this->input->post('search')		
		);

		$sql ="SELECT * FROM branch WHERE name LIKE '%".$data_branch['search']."%' OR  description LIKE '%".$data_branch['search']."%' ";
		$re = $this->db->query($sql);
		$return_data['result_branch'] = $re->result_array();
		$return_data['data_search'] = $data_branch;
		$return_data['sql'] = $sql;
		return $return_data;
	}

	public function update_branch($branch_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_branch = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'modified_date' => date("Y-m-d H:i:s"),
			'is_active' => $this->input->post('isactive')						
		);
		$where = "id = '".$branch_id."'"; 
		$this->db->update("branch", $data_branch, $where);

	}

}

/* End of file branch_model.php */
/* Location: ./application/models/branch_model.php */