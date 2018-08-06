<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_otp extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//call model inti 
		$this->load->model('initdata_model');
		$this->load->model('products_model');
		$this->load->library('pagination');
    }
    public function Call_otp_test()
    {
        $value = json_decode(file_get_contents("php://input"));
        $mobile_number = $value->mobile_number;
        $data = array(
            "mobile_number" => $mobile_number ,
            "otp_id" => "sdss"
        );
        echo json_encode($data );

    }

    public function Call_otp()
    {
        $value = json_decode(file_get_contents("php://input"));
        $mobile_number = $value->mobile_number;

        if(isset($mobile_number )){
            $otp_username =  $this->config->item('otp_username');
            $otp_password =  $this->config->item('otp_password');
            $otp_sender = $this->config->item('otp_sender');
            $mobile_number = "";

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://203.146.186.186/molink_otp_service/sms.asmx/OTPSend",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n\t\"username\":\"$otp_username\",\n\t\"password\":\"$otp_password\",\n\t\"txtSMS\":\"รหัส OTP ของคุณคือ ${code}\",\n\t\"sender\":\"otp_sender\",\n\t\"txtMobile\":\"$mobile_number\"\n}",
                CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json"
                ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
        }

    }

    public function Check_otp($otp_id)
    {

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://203.146.186.186/molink_otp_service/sms.asmx/OTPValidate",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n\t\"otp_id\":\"14bade0e-3135-4260-aa99-dd85f2a5aff4\",\n\t\"code\" : \"3665\"\n}",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 2ffdd701-7cc9-2714-0832-9cc03a974339"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
}