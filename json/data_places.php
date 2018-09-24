<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT places.*,places_categories.place_category_name AS category_name,places_types.place_type_name AS type_name FROM places,places_categories,places_types WHERE places.place_category = places_categories.place_category_id AND places.place_type = places_types.place_type_id";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$places = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$place_id = $row['place_id'];
    $place_name = $row['place_name'];
    $place_featured = $row['place_featured'];
    $place_address = $row['place_address'];
    $place_description = $row['place_description'];
    $place_hours = $row['place_hours'];
    $place_phone = $row['place_phone'];
    $place_website = $row['place_website'];
    $place_audience = $row['place_audience'];
    $place_image = $row['place_image'];
    $place_date = $row['place_date'];
    $place_latitude = $row['place_latitude'];
    $place_longitude = $row['place_longitude'];
    $place_category = $row['place_category'];
    $category_name = $row['category_name'];
    $place_type = $row['place_type'];
    $type_name = $row['type_name'];

    $places[] = array(
    	'id'=> $id++,
    	'place_id'=> $place_id,
    	'place_name'=> $place_name,
    	'place_featured'=> $place_featured,
    	'place_address'=> $place_address,
    	'place_description'=> $place_description,
    	'place_hours'=> $place_hours,
    	'place_phone'=> $place_phone,
    	'place_website'=> $place_website,
    	'place_audience'=> $place_audience,
    	'place_image'=> $place_image,
    	'place_date'=> $place_date,
    	'place_latitude'=> $place_latitude,
    	'place_longitude'=> $place_longitude,
    	'place_category'=> $place_category,
        'category_name'=> $category_name,
        'place_type'=> $place_type,
        'type_name'=> $type_name,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"places":' . json_encode($places) . '}';
print ($json_string)

?>
