<?php


$mobileNumber = "7904397127"; 
$message = "Testing Message ddddddddddd";

//$postData = array(
 
//	'dest' => $mobileNumber,
//	'msg' => $message

//);

//curl -iL https://hp.dial4sms.com

//API URL
//$url="https://hp.dial4sms.com/SendSMS/sendmsg.php?uname=afourh&pass=afourh&send=AFOURH";
//$url="https://hp.dial4sms.com/SendSMS/sendmsg.php?uname=afourh&pass=afourh&send=AFOURH";


$mobileNumber = '91'. $mobileNumber;

echo $mobileNumber;

$url="http://sms.dial4sms.com:6005/api/v2/SendSMS?SenderId=AFOURH&Is_Unicode=false&Is_Flash=false&ApiKey=sbPmtzQfqZXXqXfxZ/VK04xhUjI2uBQpNIxSC8EDEzU=&ClientId=457495e7-b9dc-489c-9375-3e91f2635b7d";

echo  'aaaaaaaaaaaa';
$postData = array(
	'MobileNumbers' => $mobileNumber,
	'Message' => $message
);
echo  '11111111111';
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => $postData
	//,CURLOPT_FOLLOWLOCATION => true
));
echo  '2222222222222';
curl_setopt($ch, CURLOPT_HEADER, 0);
echo  '33333333333';
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
echo  '44444444444';
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
echo  '555555555555';
//curl_easy_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

//get response
$output = curl_exec($ch);
echo  '666666666';
//Print error if any
if(curl_errno($ch))
{
	echo  '7777777777';
	echo 'error: ww  1' . curl_error($ch) . '  - Error No .:  ' . curl_errno($ch);
}

echo  '8888888888';
curl_close($ch);
echo  '999999999999';
echo $output;

echo  'vvvvvvvvv';
?>