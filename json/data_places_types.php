<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM places_types";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$types = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$place_type_id = $row['place_type_id'];
    $place_type_name = $row['place_type_name'];
    $place_type_category = $row['place_type_category'];
    $place_type_image = $row['place_type_image'];

    $types[] = array(
    	'id'=> $id++,
    	'place_type_id'=> $place_type_id,
    	'place_type_name'=> $place_type_name,
    	'place_type_category'=> $place_type_category,
    	'place_type_image'=> $place_type_image,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"types":' . json_encode($types) . '}';
print ($json_string)

?>
