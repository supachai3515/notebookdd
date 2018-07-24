<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Members extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('members_model');
        $this->isLoggedIn();
    }


    //page view
    public function index($page=0)
    {
		$data = $this->get_data_check("is_view");
        if (!is_null($data)) {
            $count = $this->members_model->get_members_count();
            $data['links_pagination'] = $this->pagination_compress("members/index", $count, $this->config->item('pre_page'));
            $data['members_list'] = $this->members_model->get_members($page, $this->config->item('pre_page'));

            $data['content'] = 'members';
            //if script file
            $data['script_file']= "js/product_add_js";
            $data['header'] = array('title' => 'members | '.$this->config->item('sitename'),
                                    'description' =>  'members | '.$this->config->item('tagline'),
                                    'author' => $this->config->item('author'),
                                    'keyword' => 'members');
            $this->load->view('template/layout_main', $data);
        }
    }

    //page search
    public function search()
    {
        $data = $this->get_data_check("is_view");
        if (!is_null($data)) {
            $return_data = $this->members_model->get_members_search();
            $data['members_list'] = $return_data['result_members'];
            $data['data_search'] = $return_data['data_search'];
            $data['content'] = 'members';
            //if script file
            $data['script_file']= "js/product_add_js";
            $data['header'] = array('title' => 'members | '.$this->config->item('sitename'),
                                    'description' =>  'members | '.$this->config->item('tagline'),
                                    'author' => $this->config->item('author'),
                                    'keyword' => 'members');
            $this->load->view('template/layout_main', $data);
        }
    }

    //page edit
    public function edit($member_id)
    {
        $data = $this->get_data_check("is_edit");
        if (!is_null($data)) {
            $data['member_data'] = $this->members_model->get_member($member_id);
            $data['content'] = 'members_edit';
            //if script file
            $data['script_file']= "js/product_add_js";
            $data['header'] = array('title' => 'members | '.$this->config->item('sitename'),
                                                                    'description' =>  'members | '.$this->config->item('tagline'),
                                                                    'author' => $this->config->item('author'),
                                                                    'keyword' => 'members');
            $this->load->view('template/layout_main', $data);
        }
    }

    // update
    public function update($member_id)
    {
        $data = $this->get_data_check("is_edit");
        if (!is_null($data)) {
            date_default_timezone_set("Asia/Bangkok");
            //save member
            $this->members_model->update_member($member_id);

            if ($member_id!="") {
                redirect('members/edit/'.$member_id);
            } else {
                redirect('members');
            }
        }
    }

	// update
	public function confirm($member_id)
	{
		
		if($member_id!=""){

			date_default_timezone_set("Asia/Bangkok");
			$data_member = array(
				'verify' => '1'					
			);
			$where = "id = '".$member_id."'"; 
			$this->db->update("members", $data_member, $where);
			

			$sql =" SELECT * FROM  members WHERE id= '".$member_id."' ";
			$re = $this->db->query($sql);
			$result_dealer =  $re->row_array();

			//sendmail
		    $email_config = Array(
	            'protocol'  => 'smtp',
	            'smtp_host' => 'ssl://smtp.googlemail.com',
	            'smtp_port' => '465',
	            'smtp_user' => 'notebookdd.notreply@gmail.com',
	            'smtp_pass' => 'noteb00kdd',
	            'mailtype'  => 'html',
	            'starttls'  => true,
	            'newline'   => "\r\n"
	        );

	        $this->load->library('email', $email_config);

	        $this->email->from('notebookdd.notreply@gmail.com', 'notebookdd ได้ยืนยันการสมัคร Dealer เรียบร้อยแล้ว');
	        $this->email->to($result_dealer["email"]);
	        $this->email->subject('ได้ยืนยันการสมัคร Dealer เรียบร้อยแล้ว จาก notebookdd.com');
	        $this->email->message("ได้ยืนยันการสมัคร Dealer เรียบร้อยแล้ว จาก notebookdd.com ");
	        if($this->email->send())
		    {
		    	redirect('members/edit/'.$member_id);
		    }

		    else
		    {
		       show_error($this->email->print_debugger());
		    }

			
		}
		else {
			redirect('reservations');
		}
	
	} 
}
