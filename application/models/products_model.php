<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

	public function get_products_count()
	{

		$sql =" SELECT COUNT(p.id) as connt_id FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id 
				WHERE p.is_active= '1'AND t.is_active = 1 "; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return  $row['connt_id'];
	
	}


	public function get_products( $start, $limit)
	{

	    $sql =" SELECT p.* ,t.name type_name, b.name brand_name , IFNULL(stock_all,0) stock_all 
				FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id  
				LEFT JOIN (SELECT product_id, SUM(number) stock_all FROM stock GROUP BY product_id) s ON s.product_id = p.id
				WHERE p.is_active= '1' AND t.is_active = 1  ORDER BY p.id DESC LIMIT " . $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();

	}

	public function get_products_search_count($sql)
	{
		$query = $this->db->query($sql);
		return  $rowcount = $query->num_rows();
	}


	public function get_products_search( $sql, $start, $limit)
	{
	    $sql = $sql." LIMIT ". $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();
	}


	public function whereSqlConcat($keyArray)
	{
		$countKey = count($keyArray);
		$sqlString=" SELECT pc.search , p.* ,t.name type_name, b.name brand_name , s.stock_all
					FROM products p 
					INNER JOIN (
					SELECT CONCAT(IFNULL(name,''), IFNULL(model,''), IFNULL(sku,'')) search ,id FROM products
					)
					pc ON p.id = pc.id 
					LEFT JOIN product_brand b ON p.product_brand_id = b.id 
					LEFT JOIN (SELECT product_id, SUM(number) stock_all FROM stock GROUP BY product_id) s ON s.product_id = p.id
					LEFT JOIN product_type t ON p.product_type_id = t.id  WHERE  p.is_active= '1' AND  t.is_active = '1' AND";
		if($countKey >1){
			$checkLine = 0;
			$sqlString = $sqlString." ( ";
		
			foreach ($keyArray as $key) {
				$checkLine++;
				if($checkLine != $countKey)
				{
					$sqlString  = $sqlString." pc.search like UPPER('%" . $key . "%') AND ";
				}
				
				else {
					$sqlString  = $sqlString." pc.search like UPPER('%" . $key . "%')";
				}
			}
			$sqlString = $sqlString." ) ";
		}
		
		return $sqlString;
	}

	public function get_brand_oftype()
	{
		$sql ="SELECT pt.id product_type_id , pt.name product_type_name ,  pb.id product_brand_id , 
				pb.name product_brand_name , COUNT(p.id)
				FROM  products p 
				LEFT JOIN  product_type pt ON p.product_type_id = pt.id
				LEFT JOIN  product_brand pb ON p.product_brand_id = pb.id
				WHERE  p.is_active= '1' AND  pt.is_active = '1'
				GROUP BY  pt.id  , pt.name  ,  pb.id  , pb.name  
				HAVING COUNT(p.id) > 0 ";
		$re = $this->db->query($sql);
		return $re->result_array();
	}


	public function get_products_category_brand_count($category,$brand)
	{

		$sql =" SELECT COUNT(p.id) as connt_id FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id 
				WHERE   p.is_active= '1' AND  t.is_active = '1' AND t.name ='".$category."' AND b.id ='".$brand."'"; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return  $row['connt_id'];
	
	}


	public function get_products_category_brand( $category, $brand, $start, $limit)
	{

	    $sql =" SELECT p.* ,t.name type_name, b.name brand_name , IFNULL(stock_all,0) stock_all
				FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id 
				LEFT JOIN (SELECT product_id, SUM(number) stock_all FROM stock GROUP BY product_id) s ON s.product_id = p.id
				WHERE  p.is_active= '1' AND  t.is_active = '1' AND t.name ='".$category."' AND b.name ='".$brand."'
				ORDER BY p.id DESC LIMIT " . $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();

	}

	public function get_products_category_count($category)
	{

		$sql =" SELECT COUNT(p.id) as connt_id FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id 
				WHERE   p.is_active= '1'  AND  t.is_active = '1' AND t.name ='".$category."' "; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return  $row['connt_id'];
	
	}


	public function get_products_category( $category, $start, $limit)
	{

	    $sql =" SELECT p.* ,t.name type_name, b.name brand_name , IFNULL(stock_all,0) stock_all
				FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id 
				LEFT JOIN (SELECT product_id, SUM(number) stock_all FROM stock GROUP BY product_id) s ON s.product_id = p.id
				WHERE  p.is_active= '1' AND  t.is_active = '1' AND t.name ='".$category."' ORDER BY p.id DESC LIMIT " . $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();

	}



	public function get_products_brand_count($brand)
	{

		$sql =" SELECT COUNT(p.id) as connt_id FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id 
				WHERE p.is_active= '1' AND  t.is_active = '1' AND   b.name ='".$brand."'"; 
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return  $row['connt_id'];
	
	}


	public function get_products__brand($brand, $start, $limit)
	{

	    $sql =" SELECT p.* ,t.name type_name, b.name brand_name , IFNULL(stock_all,0) stock_all
				FROM  products p 
				LEFT JOIN product_brand b ON p.product_brand_id = b.id
				LEFT JOIN product_type t ON p.product_type_id = t.id 
				LEFT JOIN (SELECT product_id, SUM(number) stock_all FROM stock GROUP BY product_id) s ON s.product_id = p.id
				WHERE p.is_active= '1' AND  t.is_active = '1' AND  b.name ='".$brand."'
				ORDER BY p.id DESC LIMIT " . $start . "," . $limit;
		$re = $this->db->query($sql);
		return $re->result_array();

	}



}

/* End of file products_model.php */
/* Location: ./application/models/products_model.php */