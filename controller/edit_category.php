<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'Edit Place Category';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$place_category_name = cleardata($_POST['place_category_name']);
	$place_category_id = cleardata($_POST['place_category_id']);
	$place_category_image_save = $_POST['place_category_image_save'];
	$place_category_image = $_FILES['place_category_image'];

	if (empty($place_category_image['name'])) {
		$place_category_image = $place_category_image_save;
	} else{
		$place_category_image_upload = '../' . $items_config['images_folder'] . $_FILES['place_category_image']['name'];
		move_uploaded_file($_FILES['place_category_image']['tmp_name'], $place_category_image_upload);
		$place_category_image = $_FILES['place_category_image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE places_categories SET place_category_name = :place_category_name, place_category_image = :place_category_image WHERE place_category_id = :place_category_id'
	);

$statment->execute(array(

		':place_category_name' => $place_category_name,
		':place_category_image' => $place_category_image,
		':place_category_id' => $place_category_id

		));

header('Location:' . SITE_URL . '/controller/categories.php');

} else{

$id_category = id_category($_GET['id']);
    
if(empty($id_category)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$category = get_category_per_id($connect, $id_category);
    
    if (!$category){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$category = $category['0'];

}

$recents = recently_added($connect);

require '../views/edit.category.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>