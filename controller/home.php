<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';	
$title_page = 'Encanto Backend';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}
	
$places_categories_total = number_places_categories($connect);
$places_types_total = number_places_types($connect);
$news_categories_total = number_newscategories($connect);
$offers_categories_total = number_offers_categories($connect);
$offers_total = number_offers($connect);
$news_total = number_news($connect);
$places_total = number_places($connect);
$users_total = number_users($connect);
$orders_total = number_orders($connect);

/*$places = get_places($items_config['items_per_page'], $connect);
 if (empty($places)){
     $errors .='<div class="alert alert-warning">No data found</div>';
}
*/

$places = get_places($connect);
$offers = get_offers($connect);
$news = get_news($connect);

require '../views/home.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>