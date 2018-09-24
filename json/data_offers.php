<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT offers.*,offers_categories.offer_category_name AS category_name, places.place_name AS place_name FROM offers,offers_categories,places WHERE offers.offer_category = offers_categories.offer_category_id AND offers.offer_place = places.place_id ORDER BY offers.offer_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$offers = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$offer_id = $row['offer_id'];
    $offer_title = $row['offer_title'];
    $offer_oldprice = $row['offer_oldprice'];
    $offer_price = $row['offer_price'];
    $offer_description = $row['offer_description'];
    $offer_place = $row['offer_place'];
    $offer_category = $row['offer_category'];
    $offer_terms = $row['offer_terms'];
    $offer_date_start = $row['offer_date_start'];
    $offer_date_end = $row['offer_date_end'];
    $offer_featured = $row['offer_featured'];
    $offer_image = $row['offer_image'];
    $category_name = $row['category_name'];
    $place_name = $row['place_name'];

    $offers[] = array(
    	'id'=> $id++,
    	'offer_id'=> $offer_id,
    	'offer_title'=> $offer_title,
    	'offer_oldprice'=> $offer_oldprice,
    	'offer_price'=> $offer_price,
    	'offer_description'=> $offer_description,
    	'offer_place'=> $offer_place,
    	'offer_category'=> $offer_category,
        'offer_terms'=> $offer_terms,
        'offer_date_start'=> $offer_date_start,
        'offer_date_end'=> $offer_date_end,
        'offer_featured'=> $offer_featured,
        'offer_image'=> $offer_image,
        'category_name'=> $category_name,
        'place_name'=> $place_name,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"offers":' . json_encode($offers) . '}';
print ($json_string)

?>
