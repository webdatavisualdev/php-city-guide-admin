<?php

 session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';	
$title_page = 'Offers Categories';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}

$offers_categories = get_all_offers_categories($connect);
 if (empty($offers_categories)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$offers_categories_total = number_offers_categories($connect);

require '../views/offers_categories.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>