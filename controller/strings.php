<?php

 session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';	
$title_page = 'Strings';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';
$success = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$st_currency = $_POST['st_currency'];
	$st_securecheckout = $_POST['st_securecheckout'];
	$st_orderdetails = $_POST['st_orderdetails'];
	$st_regularprice = $_POST['st_regularprice'];
	$st_yousave = $_POST['st_yousave'];
	$st_total = $_POST['st_total'];
	$st_id = $_POST['st_id'];
	$st_paymentauthorized = $_POST['st_paymentauthorized'];
	$st_completed = $_POST['st_completed'];
	$st_thanksorder = $_POST['st_thanksorder'];
	$st_yourstansactionid = $_POST['st_yourstansactionid'];
	$st_sendconfirmation = $_POST['st_sendconfirmation'];
	$st_done = $_POST['st_done'];
	$st_tansactiondetails = $_POST['st_tansactiondetails'];
	$st_paymentcanceled = $_POST['st_paymentcanceled'];
	$st_hasbeencanceled = $_POST['st_hasbeencanceled'];
	$st_close = $_POST['st_close'];
	$st_subjectpayment = $_POST['st_subjectpayment'];
	$st_subjectpassword = $_POST['st_subjectpassword'];
	$st_subjectnewuser = $_POST['st_subjectnewuser'];
	$st_thankyoufororder = $_POST['st_thankyoufororder'];
	$st_thisemailcontains = $_POST['st_thisemailcontains'];
	$st_customer = $_POST['st_customer'];
	$st_referenceid = $_POST['st_referenceid'];
	$st_ordertotal = $_POST['st_ordertotal'];
	$st_wehopetosee = $_POST['st_wehopetosee'];
	$st_dear = $_POST['st_dear'];
	$st_textnewaccount = $_POST['st_textnewaccount'];
	$st_subjectnewaccount = $_POST['st_subjectnewaccount'];
	$st_welcomenewaccount = $_POST['st_welcomenewaccount'];
	$st_hellonewaccount = $_POST['st_hellonewaccount'];
	$st_yourpasswordforget = $_POST['st_yourpasswordforget'];
	$st_subjectforget = $_POST['st_subjectforget'];
	$st_privacypolicy = $_POST['st_privacypolicy'];
	$st_termsofservice = $_POST['st_termsofservice'];
	$st_aboutus = $_POST['st_aboutus'];

$statment = $connect->prepare(
	'UPDATE strings SET
	st_currency = :st_currency,
	st_securecheckout = :st_securecheckout,
	st_orderdetails = :st_orderdetails,
	st_regularprice = :st_regularprice,
	st_yousave = :st_yousave,
	st_total = :st_total,
	st_id = :st_id,
	st_paymentauthorized = :st_paymentauthorized,
	st_completed = :st_completed,
	st_thanksorder = :st_thanksorder,
	st_yourstansactionid = :st_yourstansactionid,
	st_sendconfirmation = :st_sendconfirmation,
	st_done = :st_done,
	st_tansactiondetails = :st_tansactiondetails,
	st_paymentcanceled = :st_paymentcanceled,
	st_hasbeencanceled = :st_hasbeencanceled,
	st_close = :st_close,
	st_subjectpayment = :st_subjectpayment,
	st_subjectpassword = :st_subjectpassword,
	st_subjectnewuser = :st_subjectnewuser,
	st_thankyoufororder = :st_thankyoufororder,
	st_thisemailcontains = :st_thisemailcontains,
	st_customer = :st_customer,
	st_referenceid = :st_referenceid,
	st_ordertotal = :st_ordertotal,
	st_wehopetosee = :st_wehopetosee,
	st_dear = :st_dear,
	st_textnewaccount = :st_textnewaccount,
	st_subjectnewaccount = :st_subjectnewaccount,
	st_welcomenewaccount = :st_welcomenewaccount,
	st_hellonewaccount = :st_hellonewaccount,
	st_yourpasswordforget = :st_yourpasswordforget,
	st_subjectforget = :st_subjectforget,
	st_privacypolicy = :st_privacypolicy,
	st_termsofservice = :st_termsofservice,
	st_aboutus = :st_aboutus
	');

	$statment->execute(array(
		':st_currency' => $st_currency,
		':st_securecheckout' => $st_securecheckout,
		':st_orderdetails' => $st_orderdetails,
		':st_regularprice' => $st_regularprice,
		':st_yousave' => $st_yousave,
		':st_total' => $st_total,
		':st_id' => $st_id,
		':st_paymentauthorized' => $st_paymentauthorized,
		':st_completed' => $st_completed,
		':st_thanksorder' => $st_thanksorder,
		':st_yourstansactionid' => $st_yourstansactionid,
		':st_sendconfirmation' => $st_sendconfirmation,
		':st_done' => $st_done,
		':st_tansactiondetails' => $st_tansactiondetails,
		':st_paymentcanceled' => $st_paymentcanceled,
		':st_hasbeencanceled' => $st_hasbeencanceled,
		':st_close' => $st_close,
		':st_subjectpayment' => $st_subjectpayment,
		':st_subjectpassword' => $st_subjectpassword,
		':st_subjectnewuser' => $st_subjectnewuser,
		':st_thankyoufororder' => $st_thankyoufororder,
		':st_thisemailcontains' => $st_thisemailcontains,
		':st_customer' => $st_customer,
		':st_referenceid' => $st_referenceid,
		':st_ordertotal' => $st_ordertotal,
		':st_wehopetosee' => $st_wehopetosee,
		':st_dear' => $st_dear,
		':st_textnewaccount' => $st_textnewaccount,
		':st_subjectnewaccount' => $st_subjectnewaccount,
		':st_welcomenewaccount' => $st_welcomenewaccount,
		':st_hellonewaccount' => $st_hellonewaccount,
		':st_yourpasswordforget' => $st_yourpasswordforget,
		':st_subjectforget' => $st_subjectforget,
		':st_privacypolicy' => $st_privacypolicy,
		':st_termsofservice' => $st_termsofservice,
		':st_aboutus' => $st_aboutus
		));

	header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$strings = get_all_strings($connect);

$strings = $strings['0'];

}

require '../views/strings.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>