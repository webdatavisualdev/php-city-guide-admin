<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'New Place Type';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$place_type_name = cleardata($_POST['place_type_name']);
	$place_type_category = cleardata($_POST['place_type_category']);

	$place_type_image = $_FILES['place_type_image']['tmp_name'];

	$place_type_image_upload = '../' . $items_config['images_folder'] . $_FILES['place_type_image']['name'];

	move_uploaded_file($place_type_image, $place_type_image_upload);

	$statment = $connect->prepare(
		'INSERT INTO places_types (place_type_id,place_type_name,place_type_category,place_type_image) VALUES (null, :place_type_name, :place_type_category, :place_type_image)'
		);

	$statment->execute(array(
		':place_type_name' => $place_type_name,
		':place_type_category' => $place_type_category,
		':place_type_image' => $_FILES['place_type_image']['name']
		));

	header('Location:' . SITE_URL . '/controller/types.php');

}

$places_categories_lists = get_places_categories($connect);

require '../views/new.type.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>