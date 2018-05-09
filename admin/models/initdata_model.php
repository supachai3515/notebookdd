
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
}

/* End of file initdata */
/* Location: ./application/models/initdata */