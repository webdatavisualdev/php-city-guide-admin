<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT news.*, news_categories.news_category_name AS 'category_name' FROM news,news_categories WHERE news.news_category = news_categories.news_category_id AND news.news_status = 'Published' ORDER BY news.news_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$news = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$news_id = $row['news_id'];
    $news_title = $row['news_title'];
    $news_description = $row['news_description'];
    $news_image = $row['news_image'];
    $news_category = $row['news_category'];
    $news_status = $row['news_status'];
    $news_date = $row['news_date'];
    $category_name = $row['category_name'];

    $news[] = array(
    	'id'=> $id++,
    	'news_id'=> $news_id,
    	'news_title'=> $news_title,
    	'news_description'=> $news_description,
    	'news_image'=> $news_image,
    	'news_category'=> $news_category,
    	'news_status'=> $news_status,
    	'news_date'=> $news_date,
        'category_name'=> $category_name,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"news":' . json_encode($news) . '}';
print ($json_string)

?>
