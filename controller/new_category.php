<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'New Place Category';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$place_category_name = cleardata($_POST['place_category_name']);

	$place_category_image = $_FILES['place_category_image']['tmp_name'];

	$place_category_image_upload = '../' . $items_config['images_folder'] . $_FILES['place_category_image']['name'];

	move_uploaded_file($place_category_image, $place_category_image_upload);

	$statment = $connect->prepare(
		'INSERT INTO places_categories (place_category_id,place_category_name,place_category_image) VALUES (null, :place_category_name, :place_category_image)'
		);

	$statment->execute(array(
		':place_category_name' => $place_category_name,
		':place_category_image' => $_FILES['place_category_image']['name']
		));

	header('Location:' . SITE_URL . '/controller/categories.php');

}

$recents = recently_added($connect);

require '../views/new.category.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>