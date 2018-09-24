<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if(isset($_GET["user_id"]) && isset($_GET["user_email"]) && isset($_GET["user_name"]) && isset($_GET["user_massage"]) ){
if( !empty($_GET["user_id"])  && !empty($_GET["user_email"]) && !empty($_GET["user_name"]) && !empty($_GET["user_massage"])  ){

		include 'data_config.php';
		include "class.phpmailer.php";
		include "class.smtp.php";

		//Get settings
    $settingResult = $conn->query("SELECT * FROM settings");
    $settingRow = $settingResult->fetch_assoc();
    $site_name = $settingRow['site_name'];
    $email_address = $settingRow['email_address'];
    $email_password = $settingRow['email_password'];
    $email_name = $settingRow['email_name'];
    $smtp_host = $settingRow['smtp_host'];
    $smtp_port = $settingRow['smtp_port'];
    $smtp_encrypt = $settingRow['smtp_encrypt'];

	$user_id = $_GET["user_id"];
	$user_name = $_GET["user_name"];
  $user_email = $_GET["user_email"];
	$user_massage = $_GET["user_massage"];


try {


$email_user = $email_address;
$email_pass = $email_password;
$host = $smtp_host;
$port = $smtp_port;
$encrypt = $smtp_encrypt;
$the_subject = 'Nuevo Contacto';
$address_to = $email_user;
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
$phpmailer->Body .="<p><b>User ID: </b>".$user_id."</p>";
$phpmailer->Body .="<p><b>Name: </b>".$user_name."</p>";
$phpmailer->Body .="<p><b>Email: </b>".$user_email."</p>";
$phpmailer->Body .="<p><b>Message: </b>".$user_massage."</p>";
$phpmailer->IsHTML(true);
$phpmailer->CharSet = 'UTF-8';
$phpmailer->Send();

  //echo "Message Sent OK\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

$conn->close();

}

}



?>
