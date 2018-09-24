<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM news_categories";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$news_categories = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$news_category_id = $row['news_category_id'];
    $news_category_name = $row['news_category_name'];
    $news_category_image = $row['news_category_image'];

    $news_categories[] = array(
    	'id'=> $id++,
    	'news_category_id'=> $news_category_id,
    	'news_category_name'=> $news_category_name,
    	'news_category_image'=> $news_category_image,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"news_categories":' . json_encode($news_categories) . '}';
print ($json_string)

?>
