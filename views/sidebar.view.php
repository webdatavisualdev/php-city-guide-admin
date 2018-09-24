<!--<form name="searching" id="search-page" action="<?php echo SITE_URL; ?>/controller/search.php" method="GET" role="search">
<div class="form-group">
<div class="input-group">
<input class="form-control" name="searching" type="search" placeholder="Search...">
<span class="input-group-btn"><button type="submit" class="btn"><span class="fui-search"></span></button>
</span></div></div></form>-->
<div id="sidebar">

<h6>Go to...</h6>

<select class="form-control" onchange="location = this.value;">
   <option selected="">Select...</option>
   <option value="../controller/places.php">Places</option>
   <option value="../controller/categories.php">Place Categories</option>
   <option value="../controller/types.php">Place Types</option>
   <option value="../controller/news.php">News</option>
   <option value="../controller/newscategory.php">News Categories</option>
   <option value="../controller/offers.php">Offers</option>
   <option value="../controller/offers_categories.php">Offers Categories</option>
   <option value="../controller/users.php">Users</option>
</select>

<h6>Add new...</h6>

<a href="<?php echo SITE_URL; ?>/controller/new_place.php" type="button" class="btn btn-default btn-block btn-sm" aria-haspopup="true" aria-expanded="false"><i class="fa fa-map-marker"></i> Place </a>

<a href="<?php echo SITE_URL; ?>/controller/new_category.php" type="button" class="btn btn-default btn-block btn-sm" aria-haspopup="true" aria-expanded="false"><i class="fa fa-map-signs"></i> Place Category </a>

<a href="<?php echo SITE_URL; ?>/controller/new_type.php" type="button" class="btn btn-default btn-block btn-sm" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag-o"></i> Place Type </a>

<a href="<?php echo SITE_URL; ?>/controller/new_news.php" type="button" class="btn btn-default btn-block btn-sm" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o"></i> News </a>

<a href="<?php echo SITE_URL; ?>/controller/new_newscategory.php" type="button" class="btn btn-default btn-block btn-sm" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bookmark-o"></i> News Category </a>

<a href="<?php echo SITE_URL; ?>/controller/new_offer.php" type="button" class="btn btn-default btn-block btn-sm" aria-haspopup="true" aria-expanded="false"><i class="fa fa-heart-o"></i> Offer </a>

<a href="<?php echo SITE_URL; ?>/controller/new_offer_category.php" type="button" class="btn btn-default btn-block btn-sm" aria-haspopup="true" aria-expanded="false"><i class="fa fa-clone"></i> Offer Category </a>

<a href="<?php echo SITE_URL; ?>/controller/settings.php" type="button" class="btn btn-default btn-block btn-sm" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sliders"></i> Settings </a>

<a href="<?php echo SITE_URL; ?>/controller/strings.php" type="button" class="btn btn-default btn-block btn-sm" aria-haspopup="true" aria-expanded="false"><i class="fa fa-font"></i> Strings </a>

</div>
