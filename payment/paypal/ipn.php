<?php
//Include DB configuration file
include 'dbconfig.php';

/*
 * Read POST data
 * reading posted data directly from $_POST causes serialization
 * issues with array data in POST.
 * Reading raw POST data from input stream instead.
 */		
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
	$keyval = explode ('=', $keyval);
	if (count($keyval) == 2)
		$myPost[$keyval[0]] = urldecode($keyval[1]);
}

// Read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
	$get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
	if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
		$value = urlencode(stripslashes($value));
	} else {
		$value = urlencode($value);
	}
	$req .= "&$key=$value";
}

/*
 * Post IPN data back to PayPal to validate the IPN data is genuine
 * Without this step anyone can fake IPN data
 */
$paypalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
$ch = curl_init($paypalURL);
if ($ch == FALSE) {
	return FALSE;
}
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSLVERSION, 6);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

// Set TCP timeout to 30 seconds
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
$res = curl_exec($ch);

/*
 * Inspect IPN validation result and act accordingly
 * Split response headers and payload, a better way for strcmp
 */ 
$tokens = explode("\r\n\r\n", trim($res));
$res = trim(end($tokens));
if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) {
	
	//Payment data
	$offer_id = $_POST['item_number'];
	$user_id = $_POST['cm'];
	$order_txn = $_POST['txn_id'];
	$order_gross = $_POST['mc_gross'];
	$order_cc = $_POST['mc_currency'];
	$order_status = $_POST['payment_status'];
	
	//Check if payment data exists with the same TXN ID.
	$prevPayment = $db->query("SELECT order_id FROM orders WHERE order_txn = '".$order_txn."'");
	if($prevPayment->num_rows > 0){
		exit();
	}else{
		//Insert tansaction data into the database
		$insert = $db->query("INSERT INTO orders(order_date,offer_id,user_id,order_txn,order_gross,order_cc,order_status) VALUES(   CURRENT_TIMESTAMP,'".$offer_id."','".$user_id."','".$order_txn."','".$order_gross."','".$order_cc."','".$order_status."')");
	}

}