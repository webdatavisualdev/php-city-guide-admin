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
	$news_category_name = cleardata($_POST['news_category_name']);

	$news_category_image = $_FILES['news_category_image']['tmp_name'];

	$news_category_image_upload = '../' . $items_config['images_folder'] . $_FILES['news_category_image']['name'];

	move_uploaded_file($news_category_image, $news_category_image_upload);

	$statment = $connect->prepare(
		'INSERT INTO news_categories (news_category_id,news_category_name,news_category_image) VALUES (null, :news_category_name, :news_category_image)'
		);

	$statment->execute(array(
		':news_category_name' => $news_category_name,
		':news_category_image' => $_FILES['news_category_image']['name']
		));

	header('Location:' . SITE_URL . '/controller/newscategory.php');

}

$recents = recently_added($connect);

require '../views/new.newscategory.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>