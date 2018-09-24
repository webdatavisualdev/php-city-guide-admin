<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'Edit Place Type';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$place_type_name = cleardata($_POST['place_type_name']);
	$place_type_category = cleardata($_POST['place_type_category']);
	$place_type_id = cleardata($_POST['place_type_id']);
	$place_type_image_save = $_POST['place_type_image_save'];
	$place_type_image = $_FILES['place_type_image'];

	if (empty($place_type_image['name'])) {
		$place_type_image = $place_type_image_save;
	} else{
		$place_type_image_upload = '../' . $items_config['images_folder'] . $_FILES['place_type_image']['name'];
		move_uploaded_file($_FILES['place_type_image']['tmp_name'], $place_type_image_upload);
		$place_type_image = $_FILES['place_type_image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE places_types SET place_type_name = :place_type_name, place_type_category = :place_type_category, place_type_image = :place_type_image WHERE place_type_id = :place_type_id'
	);

$statment->execute(array(

		':place_type_name' => $place_type_name,
		':place_type_category' => $place_type_category,
		':place_type_image' => $place_type_image,
		':place_type_id' => $place_type_id

		));

header('Location:' . SITE_URL . '/controller/types.php');

} else{

$id_type = id_type($_GET['id']);
    
if(empty($id_type)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$type = get_type_per_id($connect, $id_type);
    
    if (!$type){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$type = $type['0'];

}

$recents = recently_added($connect);
$places_categories_lists = get_places_categories($connect);

require '../views/edit.type.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>