<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM offers_categories";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$offers_categories = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$offer_category_id = $row['offer_category_id'];
    $offer_category_name = $row['offer_category_name'];
    $offer_category_image = $row['offer_category_image'];

    $offers_categories[] = array(
    	'id'=> $id++,
    	'offer_category_id'=> $offer_category_id,
    	'offer_category_name'=> $offer_category_name,
    	'offer_category_image'=> $offer_category_image,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"offers_categories":' . json_encode($offers_categories) . '}';
print ($json_string)

?>
