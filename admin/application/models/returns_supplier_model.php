
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Returns_supplier_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_returns_supplier($start, $limit)
    {
        $sql =" SELECT DISTINCT r.id , r.doc_no,r.`comment` , sp.name supplier_name ,r.modified_date,r.is_active,  r.is_export,
                r.export_date, SUM(rd.qty)  qty, SUM(rd.total) total
                FROM  returns_supplier r  
                INNER JOIN returns_supplier_detail rd ON r.id = rd.returns_supplier_id 
                LEFT JOIN supplier sp ON sp.id = r.supplier_id
                
                GROUP BY  r.id , r.doc_no,r.`comment` , sp.name,r.create_date,r.is_active , r.is_export, r.export_date
                ORDER BY r.id DESC
				LIMIT " . $start . "," . $limit;
        $re = $this->db->query($sql);
        return $re->result_array();
    }

    public function get_returns_supplier_detail($id)
    {
        $sql =" SELECT DISTINCT r . * , p.name, p.sku, p.id product_id, rd.serial_number, rd.qty, rd.total, rd.price, rr.`comment` , p.model, rr.issues_comment
        FROM returns_supplier r
        INNER JOIN returns_supplier_detail rd ON r.id = rd.returns_supplier_id
        INNER JOIN (SELECT x.* FROM  return_receive  x 
					JOIN (
					SELECT serial , MAX(modified_date) max_date FROM return_receive GROUP BY serial ) y 
						ON y.serial = x.serial 
					 AND y.max_date = x.modified_date) rr ON rr.serial = rd.serial_number
        INNER JOIN products p ON p.id = rd.product_id
        WHERE rd.returns_supplier_id = '".$id."'";

        $re = $this->db->query($sql);
        return $re->result_array();
    }


    public function get_returns_supplier_count()
    {
        $sql =" SELECT COUNT(id) as connt_id FROM  returns_supplier p";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return  $row['connt_id'];
    }



    public function get_returns_supplier_id($returns_supplier_id)
    {
        $sql ="SELECT  DISTINCT r.* ,sp.name supplier_name
                    FROM  returns_supplier r  
                    INNER JOIN returns_supplier_detail rd ON r.id = rd.returns_supplier_id 
                    LEFT JOIN supplier sp ON sp.id = r.supplier_id
			        WHERE r.id = '".$returns_supplier_id."' ";


        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row;
    }

    public function get_returns_supplier_detail_id($returns_supplier_id)
    {
        $sql ="SELECT DISTINCT rd.* , rr.`comment` , rr.issues_comment FROM returns_supplier_detail rd 
        INNER JOIN return_receive rr ON rr.id  = rd.return_receive_id 
        WHERE rr.returns_supplier_id = '".$returns_supplier_id."'";
        $re = $this->db->query($sql);
        return $re->result_array();
    }
    public function get_returns_supplier_search_count($data_search)
    {


        date_default_timezone_set("Asia/Bangkok");
        $data_returns_supplier = $data_search;
        $searchText = $data_returns_supplier['search'];

        $sql =" 
        
        SELECT COUNT(r.id) connt_id
                FROM  returns_supplier r  
                INNER JOIN returns_supplier_detail rd ON r.id = rd.returns_supplier_id 
                LEFT JOIN supplier sp ON sp.id = r.supplier_id
                
        WHERE 1=1   ";

            if (!empty($searchText)) {
                    $sql = $sql." AND (r.id  LIKE '%".$searchText."%'
                                OR r.doc_no  LIKE '%".$searchText."%'
                                OR r.supplier_id  LIKE '%".$searchText."%'
                                OR r.comment  LIKE '%".$searchText."%'
                                OR sp.name  LIKE '%".$searchText."%')";
                }

                
                if(isset($data_return_receive['select_status'])){
                    if($data_return_receive['select_status'] == '1'){
                       $sql = $sql.' AND  r.is_export  = 1 ';

                    }
                   else if($data_return_receive['select_status'] == '2'){
                    $ $sql = $sql.' AND  (r.is_export  = 0  OR r.is_export IS NULL) ';
                   }
                   else if($data_return_receive['select_status'] == '3'){
                    $sql = $sql.' AND  r.is_active  = 0';
                   }
                   else {

                   }
                }


        $sql = $sql."  GROUP BY  r.id , r.doc_no,r.`comment` , sp.name,r.create_date,r.is_active ";

        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['connt_id'];
    }

    public function get_returns_supplier_search($start, $limit, $data_search)
    {
        date_default_timezone_set("Asia/Bangkok");
        $data_returns_supplier = $data_search;
        $searchText = $data_returns_supplier['search'];

        $sql =" 
        
        SELECT r.id , r.doc_no,r.`comment` , sp.name supplier_name ,r.modified_date,r.is_active, 
        r.is_export,
        r.export_date,
        SUM(rd.qty)  qty, SUM(rd.total) total
                FROM  returns_supplier r  
                INNER JOIN returns_supplier_detail rd ON r.id = rd.returns_supplier_id 
                LEFT JOIN supplier sp ON sp.id = r.supplier_id
                
        WHERE 1=1   ";

            if (!empty($searchText)) {
                    $sql = $sql." AND (r.id  LIKE '%".$searchText."%'
                                OR r.doc_no  LIKE '%".$searchText."%'
                                OR r.supplier_id  LIKE '%".$searchText."%'
                                OR r.comment  LIKE '%".$searchText."%'
                                OR sp.name  LIKE '%".$searchText."%')";
                }


                if(isset($data_returns_supplier['select_status'])){
                    if($data_returns_supplier['select_status'] == '1'){
                       $sql = $sql.' AND  r.is_export  =1 ';

                    }
                   else if($data_returns_supplier['select_status'] == '2'){
                    $sql = $sql.' AND  (r.is_export  = 0  OR r.is_export IS NULL) ';
                   }
                   else if($data_returns_supplier['select_status'] == '3'){
                    $sql = $sql.' AND  r.is_active  = 0';
                   }
                   else {

                   }
                }

              

        $sql = $sql."  GROUP BY  r.id , r.doc_no,r.`comment` , sp.name,r.create_date,r.is_active ,r.is_export,
        r.export_date ORDER BY r.id DESC ";

        $sql = $sql." LIMIT " . $start . "," . $limit;

        $re = $this->db->query($sql);
        $return_data['result_returns_supplier'] = $re->result_array();
        $return_data['data_search'] = $data_returns_supplier;
        $return_data['sql'] = $sql;
        return $return_data;
    }

    public function update_returns_supplier($returns_supplier_id)
    {
        $this->db->trans_start(); # Starting Transaction
        //DOC_NO
        $sql =" SELECT DISTINCT doc_no  FROM returns_supplier  WHERE  id = '".$returns_supplier_id."'";
        $re = $this->db->query($sql);
        $row_doc_no =  $re->row_array();
        $returns_supplier_docno = $row_doc_no['doc_no'];
        //
        $export_date = null;
        if( $this->input->post('export_date') != null){
            if($this->input->post('export_date')!= ""){
                $export_date  = $this->input->post('export_date');
            }
        }
        //returns_supplier master
        date_default_timezone_set("Asia/Bangkok");
        $data_returns_supplier = array(
            'comment' =>$this->input->post('comment'),
            'modified_date' => date("Y-m-d H:i:s"),
            'is_export' => $this->input->post('is_export'),
            'export_date' => $export_date
        );

        $where = "id = '".$returns_supplier_id."'";
        $this->db->update("returns_supplier", $data_returns_supplier, $where);

        //delete all detail
        $this->db-> delete('returns_supplier_detail', "returns_supplier_id = '".$returns_supplier_id."'");
        $i = 0;
        $not_in ="0";

        foreach ($this->input->post('sku') as $row) {
            $total = $this->input->post('qty')[$i]  * $this->input->post('price')[$i];

            date_default_timezone_set("Asia/Bangkok");
            $data_returns_supplier_detail = array(
                'returns_supplier_id' =>$returns_supplier_id ,
                'serial_number' => $this->input->post('serial_number')[$i],
                'product_id' => $this->input->post('product_id')[$i],
                'price' => $this->input->post('price')[$i],
                'qty' => $this->input->post('qty')[$i],
                'return_receive_id' => $this->input->post('id')[$i],
                'total' => $total,
            );

            print_r( $data_returns_supplier_detail);
            print('<br>');

            $this->db->insert("returns_supplier_detail", $data_returns_supplier_detail);

            //inser serial_history
            date_default_timezone_set("Asia/Bangkok");
            $data_serial_history = array(
                'serial_number' => $this->input->post('serial_number')[$i],
                'product_id' => $this->input->post('product_id')[$i],
                'comment' => 'ทำคืน Supplier '.'#'.$returns_supplier_docno ,
                'create_date' => date("Y-m-d H:i:s"),
            );
            $this->db->insert("serial_history", $data_serial_history);

            $i++;
        }
    
        $this->db->trans_complete(); # Completing transaction
        /*Optional*/

        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            // return FALSE;
        } else {
            # Everything is Perfect.
            # Committing data to the database.
            $this->db->trans_commit();
            // return TRUE;
        }
    }

    public function save_returns_supplier()
    {
        $this->db->trans_start(); # Starting Transaction

        $total_m = 0;
        $i = 0;
        foreach ($this->input->post('sku') as $row) {
           
            $total_m = $total_m  + ($this->input->post('qty')[$i]  * $this->input->post('price')[$i]);
            $i++;
        }

        //returns_supplier master
        date_default_timezone_set("Asia/Bangkok");
        $data_returns_supplier = array(
            'supplier_id' =>$this->input->post('select_supplier'),
            'comment' =>$this->input->post('comment'),
            'doc_no' =>"RS".date("YmdHis"),
            'create_date' => date("Y-m-d H:i:s"),
            'modified_date' => date("Y-m-d H:i:s"),
            'is_active' => $this->input->post('isactive')
        );

        $this->db->insert("returns_supplier", $data_returns_supplier);
        $insert_id = $this->db->insert_id();

        //update docno
        date_default_timezone_set("Asia/Bangkok");
        $docno_gen = 'RS'.date("ymd");
        $docno_gen = $docno_gen.str_pad($insert_id, 4, "0", STR_PAD_LEFT);
        $data_returns_supplier_update = array(
            'doc_no' => $docno_gen
        );
        
        $this->db->update("returns_supplier", $data_returns_supplier_update, "id = '".$insert_id."'");
        $this->db->delete('returns_supplier_detail', "returns_supplier_id = '".$insert_id."'");

        $i = 0;
        foreach ($this->input->post('sku') as $row) {
            $vat = 0;
            $total = $this->input->post('qty')[$i]  * $this->input->post('price')[$i];

            date_default_timezone_set("Asia/Bangkok");
            $data_returns_supplier_detail = array(
                'returns_supplier_id' =>$insert_id ,
                'serial_number' => $this->input->post('serial_number')[$i],
                'product_id' => $this->input->post('product_id')[$i],
                'price' => $this->input->post('price')[$i],
                'qty' => $this->input->post('qty')[$i],
                'return_receive_id' => $this->input->post('id')[$i],
                'total' => $total,
            );

            $this->db->insert("returns_supplier_detail", $data_returns_supplier_detail);

            //inser serial_history
            date_default_timezone_set("Asia/Bangkok");
            $data_serial_history = array(
                'serial_number' => $this->input->post('serial_number')[$i],
                'product_id' => $this->input->post('product_id')[$i],
                'comment' => 'ทำคืน Supplier '.'#'.$docno_gen ,
                'create_date' => date("Y-m-d H:i:s"),
            );
            $this->db->insert("serial_history", $data_serial_history);

            $i++;
        }

        $this->db->trans_complete(); # Completing transaction
        /*Optional*/

        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            // return FALSE;
        } else {
            # Everything is Perfect.
            # Committing data to the database.
            $this->db->trans_commit();
            // return TRUE;
        }
        return  $insert_id;
    }

    public function get_product($serial_number, $supplier_id)
    {
        // $sql =" SELECT * FROM products WHERE sku = '".$product_id."' ";

        $sql = "SELECT rr.* , p.name , p.sku , p.price  ,p.id product_id
                    FROM return_receive rr LEFT JOIN (
                    SELECT serial_number FROM returns_supplier  rs 
                    INNER JOIN returns_supplier_detail rsd ON  rs.id = rsd.returns_supplier_id
                    WHERE rs.is_active = 1 
                        AND supplier_id =  '".$supplier_id."' 
                    )  m ON rr.serial = m.serial_number
                    LEFT JOIN products p ON p.id = rr.product_id
                    WHERE supplier_id =  '".$supplier_id."'   AND m.serial_number is null AND  rr.serial ='".$serial_number."' ";

        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row;
    }
}

/* End of file returns_supplier_model.php */
/* Location: ./application/models/returns_supplier_model.php */
