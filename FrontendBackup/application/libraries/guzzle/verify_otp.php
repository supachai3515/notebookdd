<?php
require 'vendor/autoload.php';
$client = new \GuzzleHttp\Client();
try {
 $response = $client->request('POST',
'https://otp.thaibulksms.com/v1/otp/verify', [
 'form_params' => [
 'key' => '1620076292004879',
 'secret' => '3a79fb9a89f9196de15cef9554775abf',
 'token' => 'kzbyMNYK8dDlqB8F5HNrQL30OJR26gex',
 'pin' => '7245'
 ]
 ]);
 if($response->getStatusCode()){
 echo $response->getBody();
 }else{
 echo "Error Code: ".$response->getStatusCode();
 }
} catch (Exception $e) {
 echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>