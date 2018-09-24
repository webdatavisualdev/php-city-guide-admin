<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'New News';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$news_title = cleardata($_POST['news_title']);
	$news_description = $_POST['news_description'];
	$news_category = $_POST['news_category'];
	$news_status = $_POST['news_status'];
	$news_image = $_FILES['news_image']['tmp_name'];

	$news_image_upload = '../' . $items_config['images_folder'] . $_FILES['news_image']['name'];

	move_uploaded_file($news_image, $news_image_upload);

	$statment = $connect->prepare(
		'INSERT INTO news (news_id,news_title,news_description,news_category,news_status,news_image) VALUES (null, :news_title, :news_description, :news_category, :news_status, :news_image)'
		);

	$statment->execute(array(
		':news_title' => $news_title,
		':news_description' => $news_description,
		':news_category' => $news_category,
		':news_status' => $news_status,
		':news_image' => $_FILES['news_image']['name']
		));

	header('Location:' . SITE_URL . '/controller/news.php');

}

$recents = recently_added($connect);
$news_categories_lists = get_news_categories($connect);

require '../views/new.news.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>