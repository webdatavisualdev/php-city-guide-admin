<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';	
$title_page = 'Search';
require '../views/header.view.php';
require '../views/navbar.view.php';    

 $errors = '';   

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['searching'])) {

	$searching = cleardata($_GET['searching']);

	$statement = $connect->prepare("SELECT places.*,places_categories.place_category_name AS category_name,places_types.place_type_name AS type_name FROM places,places_categories,places_types WHERE places.place_category = places_categories.place_category_id AND places.place_type = places_types.place_type_id AND places.place_name LIKE :searching");
	$statement->execute(array(':searching' => "%$searching%"));
	$results = $statement->fetchAll();

	if (empty($results)){

		/*$title = '<div class="alert alert-warning">No results found for: ' . '<strong>' . $searching . '</strong></div>';*/

	} else {

		/*$title = '<div class="alert alert-success">Searching results for: ' . '<strong>' . $searching . '</strong></div>';*/
	}

} else {

	header('Location: ' . SITE_URL . '/controller/home.php');
}

} else {
		header('Location: ' . SITE_URL . '/controller/login.php');	
		}

require '../views/search.view.php';

?>