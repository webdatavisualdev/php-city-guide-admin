<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'New Offer Category';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$offer_category_name = cleardata($_POST['offer_category_name']);

	$offer_category_image = $_FILES['offer_category_image']['tmp_name'];

	$offer_category_image_upload = '../' . $items_config['images_folder'] . $_FILES['offer_category_image']['name'];

	move_uploaded_file($offer_category_image, $offer_category_image_upload);

	$statment = $connect->prepare(
		'INSERT INTO offers_categories (offer_category_id,offer_category_name,offer_category_image) VALUES (null, :offer_category_name, :offer_category_image)'
		);

	$statment->execute(array(
		':offer_category_name' => $offer_category_name,
		':offer_category_image' => $_FILES['offer_category_image']['name']
		));

	header('Location:' . SITE_URL . '/controller/offers_categories.php');

}

$recents = recently_added($connect);

require '../views/new.offer_category.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>