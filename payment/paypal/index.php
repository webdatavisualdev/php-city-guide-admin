<?php

if ( !empty($_GET["id_user"]) && !empty($_GET["id_offer"]) ) {

    include 'dbconfig.php';

    //Get info of offer
    $id_offer = intval($_GET['id_offer']);
    $offerResult = $db->query("SELECT * FROM offers WHERE offer_id = '".$_GET["id_offer"]."'");
    $offerRow = $offerResult->fetch_assoc();
    $offer_id = $offerRow['offer_id'];
    $offer_oldprice = $offerRow['offer_oldprice'];
    $offer_price = $offerRow['offer_price'];
    $offer_title = $offerRow['offer_title'];
    $offer_image = $offerRow['offer_image'];

    //Get settings
    $settingResult = $db->query("SELECT * FROM settings");
    $settingRow = $settingResult->fetch_assoc();
    $idPaypal = $settingRow['paypal_email'];
    $currencyPaypal = $settingRow['paypal_currency'];
    $urlPaypal = $settingRow['paypal_url'];
    $cancelPaypal = $settingRow['paypal_cancel_url'];
    $successPaypal = $settingRow['paypal_success_url'];

    //Get strings
    $stringResult = $db->query("SELECT * FROM strings");
    $stringRow = $stringResult->fetch_assoc();
    $currency = $stringRow['st_currency'];
    $st_securecheckout = $stringRow['st_securecheckout'];
    $st_orderdetails = $stringRow['st_orderdetails'];
    $st_regularprice = $stringRow['st_regularprice'];
    $st_yousave = $stringRow['st_yousave'];
    $st_total = $stringRow['st_total'];
    $st_id = $stringRow['st_id'];



$disount = $offer_oldprice - $offer_price;


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,700" rel="stylesheet">
<link rel="stylesheet" href="../../css/normalize.css">
<link rel="stylesheet" href="../../css/skeleton.css">


<title><?php echo $offer_title; ?></title>

<style type="text/css">
    body{margin: 10px;font-family: 'Roboto', sans-serif;font-weight: 300;background: #f6f6f6;}
    .content{display: block; margin-left: auto; margin-right: auto; max-width: 800px; margin-top: 15px; border-radius: 8px; border: 1px solid #ddd; padding: 15px;background: #fff;box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.06)}
    .header{background-repeat: no-repeat; height: 120px; background-position: center; background-size: cover; max-width: 800px;border-radius: 5px}
    .top{border-bottom: 1px solid #ddd; margin-bottom: 15px;padding-bottom: 5px; font-size: 13px;}
    .title{margin-top: 15px;}
    .title h1{font-size: 16px; line-height: 1.4; letter-spacing: 0; font-weight: 300; margin: 0; padding: 10px 0;}
    p{margin: 10px 0px;}
    .info{border: 1px solid #ddd; padding: 5px 20px; margin-bottom: 15px; margin-top: 10px; border-radius: 5px;}
    .save{border: 1px solid #53a318; color: #53a318; padding: 5px 10px; font-size: 16px; border-radius: 5px;}
    .paypal_button{max-width: 250px; display: block; margin-left: auto; margin-right: auto;    margin-bottom: 0;}
    .cards{display: block; margin-left: auto; margin-right: auto; max-width: 200px; margin-top: 15px;}
</style>

</head>
<body>

<div class="content">

<div class="top">
    <div class="row">
        <div class="six columns" style="text-align: left;width: 48%;"><?php echo $st_orderdetails; ?></div>
        <div class="six columns" style="text-align: right; color: #77c440; font-weight: 300; width: 48%; font-size: 13px;"><?php echo $st_securecheckout; ?> <img style="max-width: 15px; position: relative; bottom: -2px;" src="../../files/secure.svg"></div>
    </div>
  
</div>
<div class="header" style="background-image: url(../../images/<?php echo $offer_image; ?>);">
</div>
<div class="title"><h1><?php echo $st_id; ?> <?php echo $offer_id; ?> - <?php echo $offer_title; ?></h1></div>
<div class="info">

<table class="u-full-width" style="margin-bottom: 0">
  <tbody>

    <tr>
      <td><?php echo $st_regularprice; ?></td>
      <td><?php echo $offer_oldprice; ?> <?php echo $currency; ?></td>
    </tr>

    <tr>
      <td><?php echo $st_yousave; ?></td>
      <td><?php echo $disount; ?> <?php echo $currency; ?></td>
    </tr>

    <tr style="font-weight: 700;font-size: 18px;">
      <td style="border-bottom: 0;"><?php echo $st_total; ?></td>
      <td style="border-bottom: 0;"><?php echo $offer_price; ?> <?php echo $currency; ?></td>
    </tr>

  </tbody>
</table>

</div>

    <form action="<?php echo $urlPaypal; ?>" method="post" style="margin-bottom: -15px;">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $idPaypal; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="custom" value="<?php echo $_GET['id_user']; ?>">
        <input type="hidden" name="item_name" value="<?php echo $offer_title; ?>">
        <input type="hidden" name="item_number" value="<?php echo $offer_id; ?>">
        <input type="hidden" name="amount" value="<?php echo $offer_price; ?>">
        <input type="hidden" name="currency_code" value="<?php echo $currencyPaypal; ?>">
        <input type='hidden' name='no_shipping' value='1'>
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?php echo $cancelPaypal; ?>'>
        <input type='hidden' name='return' value='<?php echo $successPaypal; ?>'>
        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0" src="../../files/paypal_button.png" class="paypal_button" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    </form>


</div>

<img class="cards" src="../../files/cards.png"/>

</body>
</html>

<?php

}

?>