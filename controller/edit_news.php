<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'Edit News';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$news_title = cleardata($_POST['news_title']);
	$news_description = $_POST['news_description'];
	$news_category = $_POST['news_category'];
	$news_status = $_POST['news_status'];
	$news_id = cleardata($_POST['news_id']);
	$news_image_save = $_POST['news_image_save'];
	$news_image = $_FILES['news_image'];

	if (empty($news_image['name'])) {
		$news_image = $news_image_save;
	} else{
		$news_image_upload = '../' . $items_config['images_folder'] . $_FILES['news_image']['name'];
		move_uploaded_file($_FILES['news_image']['tmp_name'], $news_image_upload);
		$news_image = $_FILES['news_image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE news SET news_title = :news_title, news_description = :news_description, news_category = :news_category, news_status = :news_status, news_image = :news_image WHERE news_id = :news_id'
	);

$statment->execute(array(

		':news_title' => $news_title,
		':news_description' => $news_description,
		':news_category' => $news_category,
		':news_status' => $news_status,
		':news_image' => $news_image,
		':news_id' => $news_id

		));

header('Location:' . SITE_URL . '/controller/news.php');

} else{

$id_news = id_news($_GET['id']);
    
if(empty($id_news)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$news = get_news_per_id($connect, $id_news);
    
    if (!$news){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$news = $news['0'];

}

$news_categories_lists = get_news_categories($connect);

require '../views/edit.news.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>