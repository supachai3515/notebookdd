
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations_model extends CI_Model {


	public function get_reservations( $start, $limit)
	{

	    $sql ="  SELECT p.* , os.name order_status_name , ot.wating_date, ot.is_confirm , ot.start_date,ot.expirtdate 
			    FROM  orders p 
				INNER JOIN order_status os ON os.id =  p.order_status_id
				LEFT JOIN order_reservations ot ON  ot.order_id = p.id
				WHERE  p.is_reservations = '1' ORDER BY p.id DESC LIMIT " . $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();

	}

	public function get_reservations_count()
	{
		$sql =" SELECT COUNT(id) as connt_id FROM  orders p WHERE  p.is_reservations = '1'"; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return  $row['connt_id'];
	
	}


	public function get_reservations_id($reservations_id)
	{
		$sql =" SELECT p.* , os.name order_status_name FROM  orders p INNER JOIN order_status os ON os.id =  p.order_status_id
				 WHERE p.id = '".$reservations_id."'"; 

		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
	}

	public function get_reservations_detail_id($reservations_id)
	{
		$sql ="SELECT od.* ,  IFNULL(p.sku,'') sku, IFNULL(p.name,'') product_name FROM order_detail od 
		LEFT JOIN products p ON od.product_id = p.id WHERE od.order_id = '".$reservations_id."'"; 

		$query = $this->db->query($sql);
		$row = $query->result_array();
		return $row;
	}

	public function get_order_status()
	{
		$sql ="SELECT * FROM order_status"; 

		$query = $this->db->query($sql);
		$row = $query->result_array();
		return $row;
	}//

	public function get_order_status_history($reservations_id)
	{
		$sql =" SELECT oh.* , os.name order_status_name 
				from order_status_history  oh 
				LEFT JOIN order_status os ON oh.order_status_id = os.id
				where oh.order_id ='".$reservations_id."' ORDER BY oh.create_date DESC"; 

		$query = $this->db->query($sql);
		$row = $query->result_array();
		return $row;
	}
	

	public function update_status($reservations_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_order_status = array(
			'order_status_id' => $this->input->post('select_status'),
			'description' => $this->input->post('description'),
			'order_id' => $reservations_id,
			'create_date' => date("Y-m-d H:i:s"),						
		);
		$this->db->insert("order_status_history", $data_order_status);

		$data_order = array(
			'order_status_id' => $this->input->post('select_status')				
		);

		$where = "id = '".$reservations_id."'"; 
		$this->db->update("orders", $data_order, $where);

	}

	public function update_tracking($reservations_id)
	{
		$data_order = array(
			'trackpost' => $this->input->post('tracking')				
		);

		$where = "id = '".$reservations_id."'"; 
		$this->db->update("orders", $data_order, $where);

	}
	public function update_reservations_date($reservations_id)
	{

		$sql =" DELETE FROM  order_reservations WHERE order_id = '".$reservations_id."'"; 

		$query = $this->db->query($sql);

		$data_order = array(
			'order_id' => $reservations_id,
			'wating_date' =>  $this->input->post('wating_date'),
			'code_comfirm' =>  md5($reservations_id.$this->input->post('wating_date').date("Y-m-d H:i:s"))

		);

		$this->db->insert("order_reservations", $data_order);

	}

	public function get_reservations_order_id($reservations_id)
	{
		$sql ="  SELECT * from order_reservations WHERE order_id ='".$reservations_id."'"; 

		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
	}



	 public function get_reservations_search()
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_reservations = array(
			'search' => $this->input->post('search'),
			'order_id' => $this->input->post('order_id')	
		);

		$sql ="	SELECT p.* , os.name order_status_name , ot.wating_date, ot.is_confirm , ot.start_date, ot.expirtdate 
				FROM  orders p 
				INNER JOIN order_status os ON os.id =  p.order_status_id
				LEFT JOIN order_reservations ot ON  ot.order_id = p.id
				WHERE  1=1 AND p.is_reservations = '1' ";

				 if($data_reservations['order_id'] !="")
				 { 
				 	$sql = $sql." AND p.id ='".$data_reservations['order_id']."'";
				 }

				 if($this->input->post('select_status') !="0")
				 { 
				 	$sql = $sql." AND os.id ='".$this->input->post('select_status')."'";
				 }
				
				 $sql = $sql." AND (p.name LIKE '%".$data_reservations['search']."%' 
								 OR  p.id LIKE '%".$data_reservations['search']."%' 
								 OR  p.trackpost LIKE '%".$data_reservations['search']."%') ";
				 


		$re = $this->db->query($sql);
		$return_data['result_reservations'] = $re->result_array();
		$return_data['data_search'] = $data_reservations;
		$return_data['sql'] = $sql;
		return $return_data;
	}

}

/* End of file reservations_model.php */
/* Location: ./application/models/reservations_model.php */