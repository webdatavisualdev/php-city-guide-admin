<?php
		 
	require_once 'dbconfig.php';
	
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$query = "SELECT offers.*,offers_categories.offer_category_name AS category_name, places.place_name AS place_name FROM offers,offers_categories,places WHERE offers.offer_category = offers_categories.offer_category_id AND offers.offer_place = places.place_id AND offers.offer_id=:id";
		$stmt = $DB_con->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
		?>

    <style type="text/css">

    .card-box {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 5px;
}

    .card-box-img-top {
    width: 100%;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
      .card-box-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}

.card-box-title {
    margin-bottom: .75rem;
    font-size: 16px;
        text-align: left;
        margin-top: 5px;
}

.card-box-text{
  text-align: left;
}

.card-box-title span{
      border: 1px solid;
    padding: 2px 5px;
    border-radius: 4px;
    margin-bottom: 12px;
    display: inline-block;
    font-size: 10px;
    color: #933ec5;
}

.modal-header{background: #933ec5;color: #fff;    border-top-left-radius: 6px;
    border-top-right-radius: 6px;}
.modal-content{border: none;}

    </style>

<div class="card-box">
  <img class="card-box-img-top" src="../images/<?php echo $offer_image; ?>" alt="Card image cap">
  <div class="card-box-body">
    <h4 class="card-box-title"><span>ID <?php echo $offer_id; ?></span><br/> <?php echo $offer_title; ?></h4>
    <p class="card-box-text">
      Discount Price: <?php echo $offer_price; ?> · Original Price: <?php echo $offer_oldprice; ?>
    </p>
    <div class="panel panel-default">
  <table class="table table-sm table-bordered">
    <tbody>
      <tr style="text-align: left;font-size: 14px;">
        <td><b>Category</b></td>
        <td><?php echo $category_name; ?></td>
      </tr>

      <tr style="text-align: left;font-size: 14px;">
        <td><b>Place</b></td>
        <td><?php echo $place_name; ?></td>
      </tr>

      <tr style="text-align: left;font-size: 14px;">
        <td><b>Added</b></td>
        <td><?php echo $offer_date_start; ?></td>
      </tr>

      <tr style="text-align: left;font-size: 14px;">
        <td><b>Expire</b></td>
        <td><?php echo $offer_date_end; ?></td>
      </tr>

    </tbody>
  </table>
</div>
    
  </div>
</div>

			
		<?php				
	}