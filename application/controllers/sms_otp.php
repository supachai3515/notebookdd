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

    public function Check_credit()
    {
        $this->load->library('guzzle');
        $client  = new GuzzleHttp\Client();
        
        try {
            
            $response = $client->request('POST', 'http://www.thaibulksms.com/sms_api.php', 
            ['username' =>  '0917750586', 
             'password' => 'Aem9203915:)', 
             'tag' => 'standard']);


            if($response->getStatusCode()){
                
                $datajson =  json_decode($response->getBody());
                $data = array(
                    "IsCompleted" => true ,
                    "Error" => "",
                    "Mesage" => $response->getBody(),
                    "Data" =>  $datajson 
                );
                //echo $response->getBody();
                echo  json_encode($data);
            }else{
                //echo "Error Code: ".$response->getStatusCode();
                 
                $data = array(
                    "IsCompleted" => false ,
                    "Error" => "Error Code: ".$response->getStatusCode(),
                    "Data" =>  ""
                );
                //echo $response->getBody();
                echo  json_encode($data);
            }
           } catch (Exception $e) {
               // echo 'Caught exception: ', $e->getMessage(), "\n";
                
                $data = array(
                    "IsCompleted" => false ,
                    "Error" =>  $e->getMessage(),
                    "Data" =>  ""
                );
                echo  json_encode($data);
            }
    }
    
    public function Call_otp_test()
    {
        $value = json_decode(file_get_contents("php://input"));
        $mobile_number = $value->mobile_number;
        $data = array(
            "mobile_number" => $mobile_number ,
            "otp_id" => "sdsssfasffasdgver"
        );
        echo json_encode($data );

    }

    public function Call_otp()
    { 
        try {
            $mobile_number = null;
            $error= "";

            if($_POST['mobile_number'] == "")
            {
                $error = "You can't send empty text";
            }
            else
            {
                $mobile_number = $_POST['mobile_number'];
            }
        // $value = json_decode(file_get_contents("php://input"));
        // $mobile_number = $value->mobile_number;
        if($mobile_number != null){
           
            $this->load->library('guzzle');
            $client  = new GuzzleHttp\Client();
            


            try {
                
                $response = $client->request('POST', 'https://otp.thaibulksms.com/v1/otp/request', 
                ['form_params' => ['key' => '1620076292004879', 
                'secret' => '3a79fb9a89f9196de15cef9554775abf', 
                'msisdn' => $mobile_number]]);


                if($response->getStatusCode()){
                    
                    $datajson =  json_decode($response->getBody());
                    $data = array(
                        "IsCompleted" => true ,
                        "Error" => "",
                        "Data" =>  $datajson 
                    );
                    //echo $response->getBody();
                    echo  json_encode($data);
                }else{
                    //echo "Error Code: ".$response->getStatusCode();
                     
                    $data = array(
                        "IsCompleted" => false ,
                        "Error" => "Error Code: ".$response->getStatusCode(),
                        "Data" =>  ""
                    );
                    //echo $response->getBody();
                    echo  json_encode($data);
                }
               } catch (Exception $e) {
                   // echo 'Caught exception: ', $e->getMessage(), "\n";
                    
                    $data = array(
                        "IsCompleted" => false ,
                        "Error" =>  $e->getMessage(),
                        "Data" =>  ""
                    );
                    echo  json_encode($data);
                }           
        }
        else{
            $data = array(
                "IsCompleted" => 0 ,
                "Error" => $error
            );
            echo  json_encode($data);
        }
    } catch(Exception $e) {
        $data = array(
            "IsCompleted" => false ,
            "Error" =>  $e->getMessage() 
        );
                
    }

    }

    public function Check_otp($otp_id,$otp_id_gen)
    {
        try {
            $this->load->library('guzzle');
            $client  = new GuzzleHttp\Client();

            if($otp_id != null && $otp_id_gen!=null){
            
                try {
                    $response = $client->request('POST',
                        'https://otp.thaibulksms.com/v1/otp/verify', [
                        'form_params' => [
                        'key' => '1620076292004879',
                        'secret' => '3a79fb9a89f9196de15cef9554775abf',
                        'token' => $otp_id_gen,
                        'pin' => $otp_id
                        ]
                    ]);
                    if($response->getStatusCode()){
                        
                        $datajson =  json_decode($response->getBody());
                        $data = array(
                            "IsCompleted" => true ,
                            "Error" => "",
                            "Data" =>  $datajson 
                        );
                        //echo $response->getBody();
                        echo  json_encode($data);
                    }else{
                        //echo "Error Code: ".$response->getStatusCode();
                         
                        $data = array(
                            "IsCompleted" => false ,
                            "Error" => "Error Code: ".$response->getStatusCode(),
                            "Data" =>  ""
                        );
                        //echo $response->getBody();
                        echo  json_encode($data);
                    }
                   } catch (Exception $e) {
                       // echo 'Caught exception: ', $e->getMessage(), "\n";
                        
                        $data = array(
                            "IsCompleted" => false ,
                            "Error" =>  $e->getMessage(),
                            "Data" =>  ""
                        );
                        echo  json_encode($data);
                   }

            }

        } catch (Exception $e) {
            $data = array(
                "IsCompleted" => false ,
                "Error" =>  $e->getMessage() 
            );
        }
        //end
    }
}