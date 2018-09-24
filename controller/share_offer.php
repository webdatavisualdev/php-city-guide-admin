
<?php
     
require_once 'dbconfig.php';

$urlimage = '../images/';
  
  if (isset($_REQUEST['id'])) {
      
    $id = intval($_REQUEST['id']);
    $query = "SELECT offers.*,offers_categories.offer_category_name AS category_name, places.place_name AS place_name FROM offers,offers_categories,places WHERE offers.offer_category = offers_categories.offer_category_id AND offers.offer_place = places.place_id AND offers.offer_id=:id";
    $stmt = $DB_con->prepare( $query );
    $stmt->execute(array(':id'=>$id));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);
      
    ?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $offer_title; ?></title>
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?php echo $offer_title; ?>" />
  <meta property="og:description"   content="<?php echo $offer_description; ?>" />
  <meta property="og:image:width"   content="850" />
  <meta property="og:image:height"  content="450" />

</head>
<body>

  <img src="<?php echo $urlimage . $offer_image; ?>" style="width: 50px;">

</body>
</html>

			
		<?php				
	}