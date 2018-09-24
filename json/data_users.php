<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM users";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$users = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_phone = $row['user_phone'];

    $users[] = array(
    	'id'=> $id++,
    	'user_id'=> $user_id,
        'user_firstname'=> $user_firstname,
        'user_lastname'=> $user_lastname,
        'user_email'=> $user_email,
        'user_phone'=> $user_phone,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"users":' . json_encode($users) . '}';
print ($json_string)

?>
