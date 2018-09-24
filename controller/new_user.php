<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require '../admin/config.php';
include "class.phpmailer.php";
include "class.smtp.php";
   
$jsonusers = file_get_contents('php://input');

$objectusers = json_decode($jsonusers);

$email_usuario = $objectusers->user_email;

$connect = new PDO('mysql:host=localhost;dbname='. $database['db'], $database['user'], $database['pass'])
	or die ('Error Database Conection');

    //Get settings
    $settingResult = $connect->prepare("SELECT * FROM settings");
    $settingResult->execute(); 
    $settingRow = $settingResult->fetch();
    $site_name = $settingRow['site_name'];
    $email_address = $settingRow['email_address'];
    $email_password = $settingRow['email_password'];
    $email_name = $settingRow['email_name'];
    $smtp_host = $settingRow['smtp_host'];
    $smtp_port = $settingRow['smtp_port'];
    $smtp_encrypt = $settingRow['smtp_encrypt'];

    //Get strings
    $stringResult = $connect->prepare("SELECT * FROM strings");
    $stringResult->execute(); 
    $stringRow = $stringResult->fetch();
    $st_textnewaccount = $stringRow['st_textnewaccount'];
    $st_subjectnewaccount = $stringRow['st_subjectnewaccount'];
    $st_welcomenewaccount = $stringRow['st_welcomenewaccount'];
    $st_hellonewaccount = $stringRow['st_hellonewaccount'];


$check = "SELECT user_email FROM users WHERE user_email = :email_usuario";
$stmt = $connect->prepare($check);
$stmt->bindParam(':email_usuario', $email_usuario);
$stmt->execute();

    if($stmt->rowCount() > 0){

        echo "Already exists!";

    } else {
        
        $sql = "INSERT INTO users (user_id,user_firstname,user_lastname,user_email,user_phone,user_password,user_date) VALUES (NULL, :user_firstname, :user_lastname, :user_email, :user_phone, :user_password, CURRENT_TIMESTAMP)";
$q = $connect->prepare($sql);

$q->execute(array(
	':user_firstname'=>$objectusers->user_firstname,
	':user_lastname'=>$objectusers->user_lastname,
	':user_email'=>$objectusers->user_email,
	':user_phone'=>$objectusers->user_phone,
	':user_password'=>$objectusers->user_password
	));

try {

$name = $objectusers->user_firstname;

$email_user = $email_address;
$email_pass = $email_password;
$host = $smtp_host;
$port = $smtp_port;
$encrypt = $smtp_encrypt;
$the_subject = $st_subjectnewaccount;
$address_to = $objectusers->user_email;
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
$phpmailer->Body .="<h2 style='color: #333; text-align:center; border-bottom: 1px solid #f3e9f9; padding-bottom: 8px;'>".$st_welcomenewaccount." ".$site_name."</h2>"; 
$phpmailer->Body .="<p style='color: #333;'>".$st_hellonewaccount." ".$name."</p>";
$phpmailer->Body .="<p style='color: #333;'>".$st_textnewaccount."</p>";
$phpmailer->Body .="<h3 style='color:#333;'>".$site_name."</h3>";
$phpmailer->IsHTML(true);
$phpmailer->CharSet = 'UTF-8';
$phpmailer->Send();

  //echo "Message Sent OK\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

}


$connect =  NULL;

?>