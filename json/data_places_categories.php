<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM places_categories";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$categories = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$place_category_id = $row['place_category_id'];
    $place_category_name = $row['place_category_name'];
    $place_category_image = $row['place_category_image'];

    $categories[] = array(
    	'id'=> $id++,
    	'place_category_id'=> $place_category_id,
    	'place_category_name'=> $place_category_name,
    	'place_category_image'=> $place_category_image,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"categories":' . json_encode($categories) . '}';
print ($json_string)

?>
