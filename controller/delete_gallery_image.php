<?php 


session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'Delete Image';

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

$id_image = cleardata($_GET['id']);

if(!$id_image){
	header('Location: ' . SITE_URL . '/controller/home.php');
}

$statement = $connect->prepare('DELETE FROM gallery WHERE image_id = :image_id;');
$statement->execute(array('image_id' => $id_image));

header('Location: ' . $_SERVER['HTTP_REFERER']);

require '../views/header.view.php';
require '../views/navbar.view.php'; 

}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>