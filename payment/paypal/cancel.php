<?php
	
	include 'dbconfig.php';

    //Get strings
    $stringResult = $db->query("SELECT * FROM strings");
    $stringRow = $stringResult->fetch_assoc();
    $st_paymentcanceled = $stringRow['st_paymentcanceled'];
    $st_hasbeencanceled = $stringRow['st_hasbeencanceled'];
    $st_close = $stringRow['st_close'];
    $st_tansactiondetails = $stringRow['st_tansactiondetails'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,700" rel="stylesheet">
<link rel="stylesheet" href="../../css/normalize.css">
<link rel="stylesheet" href="../../css/skeleton.css">


<title><?php echo $st_paymentcanceled; ?></title>

<style type="text/css">
    body{margin: 10px;font-family: 'Roboto', sans-serif;font-weight: 300;background: #f6f6f6;}
    .content{display: block; margin-left: auto; margin-right: auto; max-width: 800px; margin-top: 15px; border-radius: 8px; border: 1px solid #ddd; padding: 15px;background: #fff;box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.06)}
    .top{border-bottom: 1px solid #ddd; margin-bottom: 15px;padding-bottom: 5px; font-size: 13px;}
    p{margin: 10px 0px;}
    .status span{color: #888; font-weight: 700; padding: 8px 15px; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; display: block;}
    .status{display: block; margin-left: auto; margin-right: auto; max-width: 350px; text-align: center;padding: 30px;}
    .status img{max-width: 100px; width: 100%;}
    .status h1{font-size: 18px; margin-top: 10px; letter-spacing: 0; margin-bottom: 0;}
    .status a{display: block; background: #d90022; max-width: 100px; text-align: center; margin-left: auto; margin-right: auto; padding: 8px 10px; border-radius: 80px; margin-top: 20px; color: #fff; text-decoration: none;}
</style>

</head>
<body>

<div class="content">
<div class="top">
    <div class="row">
        <div class="six columns" style="text-align: left;width: 48%;"><?php echo $st_tansactiondetails; ?></div>
        <div class="six columns" style="text-align: right; color: #77c440; font-weight: 300; width: 48%; font-size: 13px;"></div>
    </div>
  
</div>

<div class="status">
<img src="../../files/error.png">

<h1><?php echo $st_hasbeencanceled; ?></h1>

<a href="#"><?php echo $st_close; ?></a>

</div>



</div>

</body>
</html>