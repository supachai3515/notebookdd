<?
	include("sms.class.php");
	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$msisdn = $_REQUEST['msisdn'];
	$message = $_REQUEST['message'];
	$sender = $_REQUEST['sender'];
	$ScheduledDelivery = $_REQUEST['ScheduledDelivery'];
	$force = $_REQUEST['force'];
	
	$result = sms::send_sms($username,$password,$msisdn,$message,$sender,$ScheduledDelivery,$force);
	echo $result;
?>