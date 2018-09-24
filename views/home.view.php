<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10" id="home">            
<div class="container-fluid">
<div class="row-top row">

<a href="<?php echo SITE_URL; ?>/controller/places.php"><div class="col-md-16 col-sm-4 col-xs-12">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/1.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Places</span>
<span class="info-box-number"><?php echo $places_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/categories.php"><div class="col-md-16 col-sm-4 col-xs-12">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/2.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Place Categories</span>
<span class="info-box-number"><?php echo $places_categories_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/types.php"><div class="col-md-16 col-sm-4 col-xs-12">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/3.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Place Types</span>
<span class="info-box-number"><?php echo $places_types_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/news.php"><div class="col-md-16 col-sm-4 col-xs-12">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/4.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">News</span>
<span class="info-box-number"><?php echo $news_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/newscategory.php"><div class="col-md-16 col-sm-4 col-xs-12">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/5.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">News Categories</span>
<span class="info-box-number"><?php echo $news_categories_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/offers.php"><div class="col-md-16 col-sm-4 col-xs-12">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/6.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Offers</span>
<span class="info-box-number"><?php echo $offers_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/offers_categories.php"><div class="col-md-16 col-sm-4 col-xs-12">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/7.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Offers Categories</span>
<span class="info-box-number"><?php echo $offers_categories_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/users.php"><div class="col-md-16 col-sm-4 col-xs-12">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/8.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Users</span>
<span class="info-box-number"><?php echo $users_total; ?></span></div>
</div></div></a>

<a href="<?php echo SITE_URL; ?>/controller/orders.php"><div class="col-md-16 col-sm-4 col-xs-12">
<div class="info-box bg-green">
<span class="info-box-icon bg-icon-green"><i class="glyphicon"><img src="<?php echo SITE_URL ?>/files/8.svg"></i></span>
<div class="info-box-content">
<span class="info-box-text">Orders</span>
<span class="info-box-number"><?php echo $orders_total; ?></span></div>
</div></div></a>

</div>

   <div class="row">
   <div class="col-sm-6" style="padding-left: 5px; padding-right: 5px;margin-bottom: 6px;">

   	<div class="panel panel-default" style="border-color: #f3e9f9;">
  	<div class="panel-heading panel-heading-custom">
  	<i class="fa fa-bars"></i> Places
  	<a href="<?php echo SITE_URL; ?>/controller/places.php" style="float: right; margin: 7px auto;font-size: 11px;">
  	View All <img class="panel-icon-right" src="../files/right.svg"/>
  	</a>
  	</div>
  	<div class="panel-body">   

  	<div class="list-items">
  	
  	<?php foreach($places as $place): ?>
  	<div class="list-item">
    <img src="<?php echo SITE_URL ?>/images/<?php echo $place['place_image']; ?>">
    <h6><?php echo $place['place_name']; ?></h6>

    <div class="list-item-actions">

    	<a href="<?php echo SITE_URL ?>/controller/edit_place.php?id=<?php echo $place['place_id']; ?>"><i class="fa fa-cog"></i></a>
    	<a onclick="alertdelete_<?php echo $place['place_id']; ?>();"><i class="fa fa-trash-o"></i></a>

    </div>
    </div>

        <script type="text/javascript">
  function alertdelete_<?php echo $place['place_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_place.php?id=<?php echo $place['place_id']; ?>" });}
  </script>
  
    <?php endforeach; ?>
    
    </div>

  	</div>
	</div>

   </div>

   <div class="col-sm-6" style="padding-left: 5px; padding-right: 5px;margin-bottom: 6px;">

   	<div class="panel panel-default" style="border-color: #f3e9f9;">
  	<div class="panel-heading panel-heading-custom">
  	<i class="fa fa-bars"></i> Offers
  	<a href="<?php echo SITE_URL; ?>/controller/offers.php" style="float: right; margin: 7px auto;font-size: 11px;">
  	View All <img class="panel-icon-right" src="../files/right.svg"/>
  	</a>
  	</div>
  	<div class="panel-body">   

  	<div class="list-items">
  	
  	<?php foreach($offers as $offer): ?>
  	<div class="list-item">
    <img src="<?php echo SITE_URL ?>/images/<?php echo $offer['offer_image']; ?>">
    <h6><?php echo $offer['offer_title']; ?></h6>

    <div class="list-item-actions">

    	<a href="<?php echo SITE_URL ?>/controller/edit_offer.php?id=<?php echo $offer['offer_id']; ?>"><i class="fa fa-cog"></i></a>
    	<a onclick="alertdelete_<?php echo $offer['offer_id']; ?>();"><i class="fa fa-trash-o"></i></a>

    </div>
    </div>

        <script type="text/javascript">
  function alertdelete_<?php echo $offer['offer_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_offer.php?id=<?php echo $offer['offer_id']; ?>" });}
  </script>
  
    <?php endforeach; ?>
    
    </div>

  	</div>
	</div>

   </div>

      <div class="col-sm-6" style="padding-left: 5px; padding-right: 5px; margin-bottom: 6px;">

    <div class="panel panel-default" style="border-color: #f3e9f9;">
    <div class="panel-heading panel-heading-custom">
    <i class="fa fa-bars"></i> News
    <a href="<?php echo SITE_URL; ?>/controller/news.php" style="float: right; margin: 7px auto;font-size: 11px;">
    View All <img class="panel-icon-right" src="../files/right.svg"/>
    </a>
    </div>
    <div class="panel-body">   

    <div class="list-items">
    
    <?php foreach($news as $new): ?>
    <div class="list-item">
    <img src="<?php echo SITE_URL ?>/images/<?php echo $new['news_image']; ?>">
    <h6><?php echo $new['news_title']; ?></h6>

    <div class="list-item-actions">

      <a href="<?php echo SITE_URL ?>/controller/edit_news.php?id=<?php echo $new['news_id']; ?>"><i class="fa fa-cog"></i></a>
      <a onclick="alertdelete_<?php echo $new['news_id']; ?>();"><i class="fa fa-trash-o"></i></a>

    </div>
    </div>

        <script type="text/javascript">
  function alertdelete_<?php echo $new['news_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_news.php?id=<?php echo $new['news_id']; ?>" });}
  </script>
  
    <?php endforeach; ?>
    
    </div>

    </div>
  </div>

   </div>


   </div>

<!--<?php if( !empty($errors)): ?>
<?php echo $errors; ?>    
<?php endif; ?>-->

</div>

<!--<?php require '../controller/pagination.php'; ?>    --> 
      
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>

