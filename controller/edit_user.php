<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'Edit User';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$user_firstname = cleardata($_POST['user_firstname']);
	$user_lastname = cleardata($_POST['user_lastname']);
	$user_email = cleardata($_POST['user_email']);
	$user_phone = cleardata($_POST['user_phone']);
	$user_password = $_POST['user_password'];
	$user_id = cleardata($_POST['user_id']);


$statment = $connect->prepare(
	'UPDATE users SET user_firstname = :user_firstname, user_lastname = :user_lastname, user_email = :user_email, user_phone = :user_phone, user_password = :user_password WHERE user_id = :user_id'
	);

$statment->execute(array(

		':user_firstname' => $user_firstname,
		':user_lastname' => $user_lastname,
		':user_email' => $user_email,
		':user_phone' => $user_phone,
		':user_password' => $user_password,
		':user_id' => $user_id

		));

header('Location:' . SITE_URL . '/controller/users.php');

} else{

$id_user = id_user($_GET['id']);
    
if(empty($id_user)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$user = get_user_per_id($connect, $id_user);
    
    if (!$user){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$user = $user['0'];

}


require '../views/edit.user.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>