<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
$title_page = 'Edit News Category';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$news_category_name = cleardata($_POST['news_category_name']);
	$news_category_id = cleardata($_POST['news_category_id']);
	$news_category_image_save = $_POST['news_category_image_save'];
	$news_category_image = $_FILES['news_category_image'];

	if (empty($news_category_image['name'])) {
		$news_category_image = $news_category_image_save;
	} else{
		$news_category_image_upload = '../' . $items_config['images_folder'] . $_FILES['news_category_image']['name'];
		move_uploaded_file($_FILES['news_category_image']['tmp_name'], $news_category_image_upload);
		$news_category_image = $_FILES['news_category_image']['name'];
	}


$statment = $connect->prepare(
	'UPDATE news_categories SET news_category_name = :news_category_name, news_category_image = :news_category_image WHERE news_category_id = :news_category_id'
	);

$statment->execute(array(

		':news_category_name' => $news_category_name,
		':news_category_image' => $news_category_image,
		':news_category_id' => $news_category_id

		));

header('Location:' . SITE_URL . '/controller/newscategory.php');

} else{

$id_newscategory = id_newscategory($_GET['id']);
    
if(empty($id_newscategory)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$newscategory = get_newscategory_per_id($connect, $id_newscategory);
    
    if (!$newscategory){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$newscategory = $newscategory['0'];

}

$recents = recently_added($connect);

require '../views/edit.newscategory.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>