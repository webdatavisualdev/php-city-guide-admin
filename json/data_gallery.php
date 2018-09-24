<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM gallery";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$gallery = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$image_id = $row['image_id'];
    $image_date = $row['image_date'];
    $image_name = $row['image_name'];
    $place_id = $row['place_id'];

    $gallery[] = array(
    	'image_id'=> $image_id,
    	'image_date'=> $image_date,
    	'image_name'=> $image_name,
    	'place_gallery_id'=> $place_id,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"gallery":' . json_encode($gallery) . '}';
print ($json_string)

?>
