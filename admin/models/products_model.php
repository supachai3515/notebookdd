<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {


	public function get_products( $start, $limit)
	{

	    $sql =" SELECT p.* ,t.name type_name, b.name brand_name ,st.stock stock_number
				FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN (SELECT  product_id , SUM(number) stock FROM stock  GROUP BY product_id ) st ON  st.product_id = p.id
				LEFT JOIN product_type t ON p.product_type_id = t.id  ORDER BY p.id DESC LIMIT " . $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();

	}

	public function get_products_count()
	{

		$sql =" SELECT COUNT(p.id) as connt_id FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id "; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return  $row['connt_id'];
	
	}

	public function get_brands()
	{
		$sql ="SELECT * FROM product_brand WHERE is_active = 1 ORDER BY name"; 
		$result = $this->db->query($sql);
		return  $result->result_array();
	}

	public function get_type()
	{
		$sql ="SELECT * FROM product_type WHERE is_active = 1 ORDER BY name"; 
		$result = $this->db->query($sql);
		return  $result->result_array();
	}

	public function save_product()
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_product = array(
			'sku' => $this->input->post('sku'),
			'name' => $this->input->post('name'),
			'product_type_id' => $this->input->post('select_type'),
			'product_brand_id' => $this->input->post('select_brand'),
			'model' => $this->input->post('model'),
			'serial' => '',
			'price' => $this->input->post('price'),
			'dis_price' => $this->input->post('dis_price'),
			'member_discount' => $this->input->post('member_discount'),
			'image' => '',
			'detail' => $this->input->post('detail'),
			'stock' => $this->input->post('stock'),
			'is_hot' => $this->input->post('is_hot'),
			'is_promotion' => $this->input->post('is_promotion'),
			'is_sale' => $this->input->post('is_sale'),
			'create_by' => '',
			'create_date' => date("Y-m-d H:i:s"),
			'modified_date' => date("Y-m-d H:i:s"),
			'is_reservations' =>  $this->input->post('is_reservations'),
			'is_active' => $this->input->post('isactive')						
		);
		
		$this->db->insert("products", $data_product);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;

	}

	public function update_img($product_id, $image_name)
	{

		$sql ="SELECT image FROM products WHERE  id ='".$product_id."' "; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		if(isset($row["image"])){
			 unlink($row["image"]);
		}


		$data_product = array(
			'image' => $img_path.$image_name						
		);
		$where = "id = '".$product_id."'"; 
		$this->db->update('products', $data_product, $where);
		
	}

	public function insert_productimgs($product_id, $line, $image_name)
	{
		//$sql="INSERT product_images (product_id,line_number,path ,create_date,modified_date)
		//		VALUES('".$product_id."','".$line."','".$image_name."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."')";
		//$this->db->query($sql);
		date_default_timezone_set("Asia/Bangkok");
		$data_product = array(
			'product_id' => $product_id,
			'line_number' => $line,
			'path' => $image_name,
			'create_date' => date("Y-m-d H:i:s"),
			'modified_date' => date("Y-m-d H:i:s")
		);
		$this->db->insert('product_images', $data_product);
		
	}

	public function get_product($product_id)
	{
		$sql ="SELECT * FROM products WHERE id = '".$product_id."'"; 

		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
	}

	public function get_images($product_id)
	{
		$sql ="SELECT * FROM product_images WHERE product_id = '".$product_id."'"; 
		$query = $this->db->query($sql);
		$row = $query->result_array();
		return $row;
	}

	public function update_product($product_id)
	{

		date_default_timezone_set("Asia/Bangkok");
		$data_product = array(
			'sku' => $this->input->post('sku'),
			'name' => $this->input->post('name'),
			'product_brand_id' => $this->input->post('select_brand'),
			'product_type_id' => $this->input->post('select_type'),
			'model' => $this->input->post('model'),
			'serial' => '',
			'price' => $this->input->post('price'),
			'dis_price' => $this->input->post('dis_price'),
			'member_discount' => $this->input->post('member_discount'),
			'detail' => $this->input->post('detail'),
			'stock' => $this->input->post('stock'),
			'is_hot' => $this->input->post('is_hot'),
			'is_promotion' => $this->input->post('is_promotion'),
			'is_sale' => $this->input->post('is_sale'),
			'create_by' => '',
			'modified_date' => date("Y-m-d H:i:s"),
			'is_reservations' =>  $this->input->post('is_reservations'),
			'is_active' => $this->input->post('isactive')						
		);
		$where = "id = '".$product_id."'"; 
		$this->db->update("products", $data_product, $where);

	}

	public function update_productimgs($product_id, $line, $image_name, $is_active)
	{
		$sql ="SELECT path FROM product_images WHERE  product_id='".$product_id."' AND line_number='".$line."' "; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		if(isset($row["path"])){
			 unlink($row["path"]);
		}
		
		date_default_timezone_set("Asia/Bangkok");
		$data_product = array(
			'product_id' => $product_id,
			'line_number' => $line,
			'path' => $image_name,
			'modified_date' => date("Y-m-d H:i:s"),
			'is_active' => $is_active
		);
		$where = "product_id = '".$product_id."' AND line_number  = '".$line."' "; 
		$this->db->update('product_images', $data_product, $where);
		
	}
	public function update_productimgs_active($product_id, $line, $is_active)
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_product = array(
			'modified_date' => date("Y-m-d H:i:s"),
			'is_active' => $is_active
		);
		$where = "product_id = '".$product_id."' AND line_number  = '".$line."' "; 
		$this->db->update('product_images', $data_product, $where);
		
	}

	function get_department_list($limit, $start)
    {
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT ". $start . " ," . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_products_search()
	{
		date_default_timezone_set("Asia/Bangkok");
		$data_product = array(
			'search' => $this->input->post('search'),
			'product_type_id' => $this->input->post('select_type'),
			'product_brand_id' => $this->input->post('select_brand'),
			'from_stock' => $this->input->post('from_stock'),
			'to_stock' =>  $this->input->post('to_stock'),
			'all_promotion' => $this->input->post('all_promotion'),
			'is_hot' => $this->input->post('is_hot'),
			'is_promotion' => $this->input->post('is_promotion'),
			'is_sale' => $this->input->post('is_sale'),
			'is_active' => $this->input->post('isactive')						
		);
		
		 $sql ="SELECT pc.search , p.* ,t.name type_name, b.name brand_name ,st.stock stock_number
				FROM products p 
				INNER JOIN (
				SELECT CONCAT(IFNULL(name,''),IFNULL(model,''),IFNULL(sku,'')) search ,id FROM
				products 
				)
				pc ON p.id = pc.id 
				LEFT JOIN (SELECT  product_id , SUM(number) stock FROM stock  GROUP BY product_id ) st ON  st.product_id = p.id
				LEFT JOIN product_brand b ON p.product_brand_id = b.id 
				LEFT JOIN product_type t ON p.product_type_id = t.id ";
		 //where 
		$sql = $sql." WHERE 1=1 ";
		if($data_product['search'] != "") {
			$sql = $sql."AND pc.search LIKE '%".trim($data_product['search'])."%'";
		}
		if($data_product['product_type_id'] != "") {
			$sql = $sql."AND (p.product_type_id = '".$data_product['product_type_id']."')";
		}

		if($data_product['product_brand_id'] != "") {
			$sql = $sql."AND (p.product_brand_id = '".$data_product['product_brand_id']."')";
		}

		$sql = $sql."AND (IFNULL(st.stock,0) BETWEEN '".$data_product['from_stock']."' AND '".$data_product['to_stock']."' )";
		if($data_product['all_promotion'] == "") {
			if($data_product['is_hot'] =='' ){$data_product['is_hot']= "0";}
			if($data_product['is_promotion'] =='' ){$data_product['is_promotion']= "0";}
			if($data_product['is_sale'] =='' ){$data_product['is_sale']= "0";}

			if($data_product['is_hot']=="1")
			{
				$sql = $sql."AND (p.is_hot = '".$data_product['is_hot']."')";
			}
			if ($data_product['is_promotion'] =='1') {
				$sql = $sql."AND (p.is_promotion = '".$data_product['is_promotion']."')";
			}
			if ($data_product['is_sale'] =='1') {
				$sql = $sql."AND (p.is_sale = '".$data_product['is_sale']."')";
			}
		}
		if($data_product['is_active'] =='' ){$data_product['is_active']= "0";}
		$sql = $sql."AND (p.is_active = '".$data_product['is_active']."')";

		$re = $this->db->query($sql);
		$return_data['result_products'] = $re->result_array();
		$return_data['data_search'] = $data_product;
		$return_data['sql'] = $sql;
		return $return_data;
	}

	public function getstock($product_id)
	{
	    $sql =" SELECT p.sku, p.name product_name, b.name branch_name ,s.number, s.serial, s.modified_date
				FROM stock s 
				INNER JOIN products p ON p.id = s.product_id
				INNER JOIN branch b ON s.branch_id = b.id
				WHERE  product_id ='".$product_id."' ";
		$re = $this->db->query($sql);
		return $re->result_array();
	}

}

/* End of file products_model.php */
/* Location: ./application/models/products_model.php */