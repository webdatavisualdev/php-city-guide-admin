<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'Edit Offer Category';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$offer_category_name = cleardata($_POST['offer_category_name']);
	$offer_category_id = cleardata($_POST['offer_category_id']);
	$offer_category_image_save = $_POST['offer_category_image_save'];
	$offer_category_image = $_FILES['offer_category_image'];

	if (empty($offer_category_image['name'])) {
		$offer_category_image = $offer_category_image_save;
	} else{
		$offer_category_image_upload = '../' . $items_config['images_folder'] . $_FILES['offer_category_image']['name'];
		move_uploaded_file($_FILES['offer_category_image']['tmp_name'], $offer_category_image_upload);
		$offer_category_image = $_FILES['offer_category_image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE offers_categories SET offer_category_name = :offer_category_name, offer_category_image = :offer_category_image WHERE offer_category_id = :offer_category_id'
	);

$statment->execute(array(

		':offer_category_name' => $offer_category_name,
		':offer_category_image' => $offer_category_image,
		':offer_category_id' => $offer_category_id

		));

header('Location:' . SITE_URL . '/controller/offers_categories.php');

} else{

$id_offer_category = id_offers_categories($_GET['id']);
    
if(empty($id_offer_category)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$offer_category = get_offer_category_per_id($connect, $id_offer_category);
    
    if (!$offer_category){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$offer_category = $offer_category['0'];

}

$recents = recently_added($connect);

require '../views/edit.offer_category.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>