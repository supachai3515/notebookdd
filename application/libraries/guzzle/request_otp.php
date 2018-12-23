<?php
require 'vendor/autoload.php';
$client = new \GuzzleHttp\Client();
$response = $client->request('POST', 'https://otp.thaibulksms.com/v1/otp/request',
[
 'form_params' => [
 'key' => '1620076292004879',
 'secret' =>'3a79fb9a89f9196de15cef9554775abf',
 'msisdn' => '0917750586'
 ]
]);
try {
 if($response->getStatusCode()){
 echo $response->getBody();
 }else{
 echo "Error Code: ".$response->getStatusCode();
 }
} catch (Exception $e) {
 echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>