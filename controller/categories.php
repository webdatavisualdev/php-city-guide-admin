<?php

 session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';	
$title_page = 'Place Categories';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}

$places_categories = get_all_places_categories($connect);
 if (empty($places_categories)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$places_categories_total = number_places_categories($connect);

require '../views/categories.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>