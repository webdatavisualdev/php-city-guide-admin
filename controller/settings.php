<?php

 session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';	
$title_page = 'Settings';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';
$success = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$site_name = $_POST['site_name'];
	$email_address = $_POST['email_address'];
	$email_password = $_POST['email_password'];
	$email_name = $_POST['email_name'];
	$smtp_host = $_POST['smtp_host'];
	$smtp_port = $_POST['smtp_port'];
	$smtp_encrypt = $_POST['smtp_encrypt'];
	$paypal_email = $_POST['paypal_email'];
	$paypal_currency = $_POST['paypal_currency'];
	$paypal_url = $_POST['paypal_url'];
	$paypal_success_url = $_POST['paypal_success_url'];
	$paypal_cancel_url = $_POST['paypal_cancel_url'];

$statment = $connect->prepare(
	'UPDATE settings SET
	site_name = :site_name,
	email_address = :email_address,
	email_password = :email_password,
	email_name = :email_name,
	smtp_host = :smtp_host,
	smtp_port = :smtp_port,
	smtp_encrypt = :smtp_encrypt,
	paypal_email = :paypal_email,
	paypal_currency = :paypal_currency,
	paypal_url = :paypal_url,
	paypal_success_url = :paypal_success_url,
	paypal_cancel_url = :paypal_cancel_url
	');

	$statment->execute(array(
		':site_name' => $site_name,
		':email_address' => $email_address,
		':email_password' => $email_password,
		':email_name' => $email_name,
		':smtp_host' => $smtp_host,
		':smtp_port' => $smtp_port,
		':smtp_encrypt' => $smtp_encrypt,
		':paypal_email' => $paypal_email,
		':paypal_currency' => $paypal_currency,
		':paypal_url' => $paypal_url,
		':paypal_success_url' => $paypal_success_url,
		':paypal_cancel_url' => $paypal_cancel_url,
		));

	header('Location: ' . $_SERVER['HTTP_REFERER']);
	

} else{

$settings = get_all_settings($connect);

$settings = $settings['0'];

}

require '../views/settings.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>