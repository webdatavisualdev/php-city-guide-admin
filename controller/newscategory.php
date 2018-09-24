<?php

 session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';	
$title_page = 'News Categories';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}

$news_categories = get_all_newscategories($connect);
 if (empty($news_categories)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$news_categories_total = number_newscategories($connect);

require '../views/newscategory.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>