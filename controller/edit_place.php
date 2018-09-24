<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
include('./fileuploader.php');
$title_page = 'Edit Place';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$place_name = cleardata($_POST['place_name']);
	$place_description = $_POST['place_description'];
	$place_address = $_POST['place_address'];
	$place_latitude = $_POST['place_latitude'];
	$place_longitude = $_POST['place_longitude'];
	$place_hours = $_POST['place_hours'];
	$place_phone = $_POST['place_phone'];
	$place_website = $_POST['place_website'];
	$place_audience = $_POST['place_audience'];
	$place_category = $_POST['place_category'];
	$place_type = $_POST['place_type'];
	$place_featured = $_POST['place_featured'];
	$place_image_save = $_POST['place_image_save'];
	$place_id = cleardata($_POST['place_id']);
	$place_image = $_FILES['place_image'];

	if (empty($place_image['name'])) {
		$place_image = $place_image_save;
	} else{
		$place_image_upload = '../' . $items_config['images_folder'] . $_FILES['place_image']['name'];
		move_uploaded_file($_FILES['place_image']['tmp_name'], $place_image_upload);
		$place_image = $_FILES['place_image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE places SET place_name = :place_name, place_description = :place_description, place_address = :place_address, place_latitude = :place_latitude, place_longitude = :place_longitude, place_hours = :place_hours, place_phone = :place_phone, place_website = :place_website, place_audience = :place_audience, place_category = :place_category, place_type = :place_type, place_featured = :place_featured, place_image = :place_image WHERE place_id = :place_id'
	);

$statment->execute(array(

		':place_name' => $place_name,
		':place_description' => $place_description,
		':place_address' => $place_address,
		':place_latitude' => $place_latitude,
		':place_longitude' => $place_longitude,
		':place_hours' => $place_hours,
		':place_phone' => $place_phone,
		':place_website' => $place_website,
		':place_audience' => $place_audience,
		':place_category' => $place_category,
		':place_type' => $place_type,
		':place_featured' => $place_featured,
		':place_id' => $place_id,
		':place_image' => $place_image

		));

header('Location:' . SITE_URL . '/controller/places.php');

} else{

$id_place = id_place($_GET['id']);
    
if(empty($id_place)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$place = get_place_per_id($connect, $id_place);
    
    if (!$place){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$place = $place['0'];

}

$FileUploader = new FileUploader('files', array(
        'uploadDir' => '../images/',
        'title' => 'auto',
        'limit' => 8,
        'maxSize' => 4,
        'fileMaxSize' => 4,
        'extensions' => ['jpg', 'jpeg', 'png'],
        'replace' => true,
        ));
    
    // call to upload the files
    $data = $FileUploader->upload();
    
    // if uploaded and success
    if($data['isSuccess'] && count($data['files']) > 0) {
        // get uploaded files
        $uploadedFiles = $data['files'];


$statment = $connect->prepare(
    'INSERT INTO gallery (place_id,image_name,image_date) VALUES (:place_id,:image_name,CURRENT_TIMESTAMP)'
);

foreach ($uploadedFiles as $key => $value)
{
    $statment->execute(array(
         ':place_id' => $place_id,
         ':image_name' => $value['name']
    ));
}

    }

$gallery = get_gallery($connect);
$places_types_lists = get_places_types($connect);
$places_categories_lists = get_places_categories($connect);

require '../views/edit.place.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>