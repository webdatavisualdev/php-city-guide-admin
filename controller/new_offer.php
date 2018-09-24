<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'New Offer';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$offer_title = cleardata($_POST['offer_title']);
	$offer_description = $_POST['offer_description'];
	$offer_price = $_POST['offer_price'];
	$offer_oldprice = $_POST['offer_oldprice'];
	$offer_date_start = $_POST['offer_date_start'];
	$offer_date_end = $_POST['offer_date_end'];
	$offer_category = $_POST['offer_category'];
	$offer_place = $_POST['offer_place'];
	$offer_featured = $_POST['offer_featured'];
	$offer_terms = $_POST['offer_terms'];

	$offer_image = $_FILES['offer_image']['tmp_name'];

	$offer_image_upload = '../' . $items_config['images_folder'] . $_FILES['offer_image']['name'];

	move_uploaded_file($offer_image, $offer_image_upload);

	$statment = $connect->prepare(
		'INSERT INTO offers (offer_id,offer_title,offer_description,offer_price,offer_oldprice,offer_date_start,offer_date_end,offer_category,offer_place, offer_featured,offer_terms,offer_image) VALUES (null, :offer_title, :offer_description, :offer_price, :offer_oldprice, :offer_date_start, :offer_date_end, :offer_category, :offer_place, :offer_featured, :offer_terms, :offer_image)'
		);

	$statment->execute(array(

		':offer_title' => $offer_title,
		':offer_description' => $offer_description,
		':offer_price' => $offer_price,
		':offer_oldprice' => $offer_oldprice,
		':offer_date_start' => $offer_date_start,
		':offer_date_end' => $offer_date_end,
		':offer_category' => $offer_category,
		':offer_place' => $offer_place,
		':offer_featured' => $offer_featured,
		':offer_terms' => $offer_terms,
		':offer_image' => $_FILES['offer_image']['name']
		));

	header('Location:' . SITE_URL . '/controller/offers.php');

}

$recents = recently_added($connect);
$offers_categories_lists = get_offers_categories($connect);
$places_lists = get_all_places($connect);

require '../views/new.offer.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>