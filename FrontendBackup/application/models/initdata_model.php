
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Initdata_model extends CI_Model {
	
	public function __construct() {        
	    parent::__construct();
	}

	public function get_menu()
	{
		$sqlmenu ="SELECT * FROM menu WHERE is_active ='1' ORDER BY order_by "; 
		$reMenus = $this->db->query($sqlmenu);
		return  $reMenus->result_array();
	}

	public function get_brands()
	{
		$sql =" SELECT pb.id, pb.name, COUNT(p.id) count_product FROM product_brand pb 
				INNER JOIN products p ON p.product_brand_id = pb.id 
				INNER JOIN product_type  pt  ON p.product_type_id = pt.id 
				WHERE pb.is_active = 1 AND p.is_active= '1' AND  pt.is_active = 1 GROUP BY  pb.id, pb.name 
				HAVING COUNT(p.id) > 0
				ORDER BY pb.name "; 
		$result = $this->db->query($sql);
		return  $result->result_array();
	}

	public function get_type()
	{
		$sql ="SELECT pt.id, pt.name, COUNT(p.id) count_product FROM product_type  pt 
		INNER JOIN products p ON p.product_type_id = pt.id 
		WHERE pt.is_active = 1 AND p.is_active= '1'  GROUP BY  pt.id, pt.name 
		HAVING COUNT(p.id) > 0
		ORDER BY pt.name"; 
		$result = $this->db->query($sql);
		return  $result->result_array();
	}
}

/* End of file initdata */
/* Location: ./application/models/initdata */