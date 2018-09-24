<?php
include 'dbconfig.php';
include "../../controller/class.phpmailer.php";
include "../../controller/class.smtp.php";

    //Get settings
    $settingResult = $db->query("SELECT * FROM settings");
    $settingRow = $settingResult->fetch_assoc();
    $site_name = $settingRow['site_name'];
    $email_address = $settingRow['email_address'];
    $email_password = $settingRow['email_password'];
    $email_name = $settingRow['email_name'];
    $smtp_host = $settingRow['smtp_host'];
    $smtp_port = $settingRow['smtp_port'];
    $smtp_encrypt = $settingRow['smtp_encrypt'];

    //Get strings
    $stringResult = $db->query("SELECT * FROM strings");
    $stringRow = $stringResult->fetch_assoc();
    $st_paymentauthorized = $stringRow['st_paymentauthorized'];
    $st_securecheckout = $stringRow['st_securecheckout'];
    $st_tansactiondetails = $stringRow['st_tansactiondetails'];
    $st_completed = $stringRow['st_completed'];
    $st_thanksorder = $stringRow['st_thanksorder'];
    $st_yourstansactionid = $stringRow['st_yourstansactionid'];
    $st_sendconfirmation = $stringRow['st_sendconfirmation'];
    $st_done = $stringRow['st_done'];
    $st_subjectpayment = $stringRow['st_subjectpayment'];
    $st_thankyoufororder = $stringRow['st_thankyoufororder'];
    $st_thisemailcontains = $stringRow['st_thisemailcontains'];
    $st_customer = $stringRow['st_customer'];
    $st_referenceid = $stringRow['st_referenceid'];
    $st_ordertotal = $stringRow['st_ordertotal'];
    $st_wehopetosee = $stringRow['st_wehopetosee'];
    $st_dear = $stringRow['st_dear'];
    $currency = $stringRow['st_currency'];

$platform = 'PayPal';

//Get payment information from PayPal
$offer_id = $_GET['item_number']; 
$user_id = $_GET['cm'];
$order_txn = $_GET['tx'];
$order_gross = $_GET['amt'];
$order_cc = $_GET['cc'];
$order_status = $_GET['st'];

//Get User info
$userResult = $db->query("SELECT * FROM users WHERE user_id = ".$user_id);
$userRow = $userResult->fetch_assoc();
$userFirstname = $userRow['user_firstname'];
$userLastname = $userRow['user_lastname'];
$userEmail = $userRow['user_email'];

//Get product price from database
$productResult = $db->query("SELECT * FROM offers WHERE offer_id = ".$offer_id);
$productRow = $productResult->fetch_assoc();
$productPrice = $productRow['offer_price'];
$productTitle = $productRow['offer_title'];

if(!empty($order_txn) && $order_gross == $productPrice){
	//Check if payment data exists with the same TXN ID.
    $prevPaymentResult = $db->query("SELECT order_id FROM orders WHERE order_txn = '".$order_txn."'");

    if($prevPaymentResult->num_rows > 0){
        $paymentRow = $prevPaymentResult->fetch_assoc();
        $last_insert_id = $paymentRow['order_id'];
    }else{
        //Insert tansaction data into the database
        $insert = $db->query("INSERT INTO orders(order_date,offer_id,user_id,order_txn,order_gross,order_cc,order_status,order_platform) VALUES(CURRENT_TIMESTAMP,'".$offer_id."','".$user_id."','".$order_txn."','".$order_gross."','".$order_cc."','".$order_status."','".$platform."')");
        $last_insert_id = $db->insert_id;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,700" rel="stylesheet">
<link rel="stylesheet" href="../../css/normalize.css">
<link rel="stylesheet" href="../../css/skeleton.css">


<title><?php echo $st_paymentauthorized; ?></title>

<style type="text/css">
    body{margin: 10px;font-family: 'Roboto', sans-serif;font-weight: 300;background: #f6f6f6;}
    .content{display: block; margin-left: auto; margin-right: auto; max-width: 800px; margin-top: 15px; border-radius: 8px; border: 1px solid #ddd; padding: 15px;background: #fff;box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.06)}
    .top{border-bottom: 1px solid #ddd; margin-bottom: 15px;padding-bottom: 5px; font-size: 13px;}
    .status p{margin: 10px 0px;}
    .status span{color: #888; font-weight: 700; padding: 8px 15px; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; display: block;}
    .status{display: block; margin-left: auto; margin-right: auto; max-width: 350px; text-align: center;padding: 30px;}
    .status img{max-width: 100px; width: 100%;}
    .status h1{font-size: 18px; margin-top: 10px; letter-spacing: 0;margin-bottom: 0;color: #77c440; font-weight: bold;}
    .status a{display: block; background: #77c440; max-width: 100px; text-align: center; margin-left: auto; margin-right: auto; padding: 8px 10px; border-radius: 80px; margin-top: 20px; color: #fff; text-decoration: none;}
</style>

</head>
<body>

<div class="content">
<div class="top">
    <div class="row">
        <div class="six columns" style="text-align: left;width: 48%;"><?php echo $st_tansactiondetails; ?></div>
        <div class="six columns" style="text-align: right; color: #77c440; font-weight: 300; width: 48%; font-size: 13px;"><?php echo $st_securecheckout; ?> <img style="max-width: 15px; position: relative; bottom: -2px;" src="../../files/secure.svg"></div>
    </div>
  
</div>

<div class="status">
<img src="../../files/success.png">

<h1><?php echo $st_completed; ?></h1>
<p><?php echo $st_thanksorder; ?></p>

<?php echo $st_yourstansactionid; ?>
<span><?php echo $order_txn; ?></span>
<?php echo $st_sendconfirmation; ?>

<a href="/done"><?php echo $st_done; ?></a>

</div>



</div>

</body>
</html>


<?php

try {


$email_user = $email_address;
$email_pass = $email_password;
$host = $smtp_host;
$port = $smtp_port;
$encrypt = $smtp_encrypt;
$the_subject = $st_subjectpayment;
$address_to = $userEmail;
$from_name = $email_name;
$phpmailer = new PHPMailer();

$phpmailer->Username = $email_user;
$phpmailer->Password = $email_pass; 

$phpmailer->SMTPSecure = $encrypt;
$phpmailer->Host = $host;
$phpmailer->Port = $port;
$phpmailer->IsSMTP();
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to);

$phpmailer->Subject = $the_subject;		
$phpmailer->Body .="<h2 style='color: #933EC5; border-bottom: 1px solid #f3e9f9; padding-bottom: 8px;'>".$st_thankyoufororder."</h2>"; 
$phpmailer->Body .= "<p style='color:#333333;'>".$st_dear. " ".$userFirstname."</p>";
$phpmailer->Body .= "<p style='color:#333333;'>".$st_thisemailcontains."</p>";
$phpmailer->Body .="<div style='border: 1px solid #f3e9f9; background: #fbf7fd; padding: 5px 20px; border-radius: 5px; display: inline-block;'>";
$phpmailer->Body .= "<p style='color:#333333;'><b>".$st_customer." </b>".$userFirstname. " " .$userLastname."</p>";
$phpmailer->Body .= "<p style='color:#333333;'><b>".$st_referenceid." </b>".$order_txn."</p>";
$phpmailer->Body .= "<p style='color:#333333;'><b>".$st_ordertotal." </b>".$order_gross." ".$currency."</p>";
$phpmailer->Body .="</div>";
$phpmailer->Body .="<p>".$st_wehopetosee."</p>";
$phpmailer->Body .="<h3 style='color:#933ec5;'>".$site_name."</h3>";
$phpmailer->IsHTML(true);
$phpmailer->CharSet = 'UTF-8';
$phpmailer->Send();

  //echo "Message Sent OK\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

}else{ ?>

	<h1>Your payment has failed.</h1>

<?php } ?>