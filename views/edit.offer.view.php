<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">            
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Edit Offer <span class="label label-default">ID <?php echo $offer['offer_id']; ?></span></h3>
</div>

<div class="panel-body">
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group">

   <input type="hidden" value="<?php echo $offer['offer_id']; ?>" name="offer_id">
   <label class="control-label">Title</label>
   <input type="text" value="<?php echo $offer['offer_title']; ?>" placeholder="" name="offer_title" class="form-control" required="">

      <label class="control-label">Description</label>
   <textarea type="text" class="form-control" name="offer_description" id="offer_description" required><?php echo $offer['offer_description']; ?></textarea>

      <div class="row">
   <div class="col-sm-6">



   <label class="control-label">Price</label>
   <input type="text" value="<?php echo $offer['offer_price']; ?>" placeholder="" name="offer_price" class="form-control" required="">

   </div>

   <div class="col-sm-6">

   <label class="control-label">Old Price</label>
   <input type="text" value="<?php echo $offer['offer_oldprice']; ?>" placeholder="" name="offer_oldprice" class="form-control" required="">

   </div>
   </div>


      <div class="row">
   <div class="col-sm-6">



   <label class="control-label">Start Date</label>
   <input type="date" value="<?php echo $offer['offer_date_start']; ?>" placeholder="" name="offer_date_start" class="form-control" required="">

   </div>

   <div class="col-sm-6">

   <label class="control-label">End Date</label>
   <input type="date" value="<?php echo $offer['offer_date_end']; ?>" placeholder="" name="offer_date_end" class="form-control" required="">

   </div>
   </div>



      <div class="row">
   <div class="col-sm-6">



    <label class="control-label">Category</label>
   <select class="form-control" name="offer_category" required>
   <option value="<?php echo $offer['offer_category']; ?>" selected><?php echo $offer['category_name']; ?></option>
    <?php foreach($offers_categories_lists as $offers_categories_list): ?>
   <option value="<?php echo $offers_categories_list['offer_category_id']; ?>"><?php echo $offers_categories_list['offer_category_name']; ?></option>
    <?php endforeach; ?>
   </select>

   </div>

   <div class="col-sm-6">

    <label class="control-label">Place</label>
   <select class="form-control" name="offer_place" required>
   <option value="<?php echo $offer['offer_place']; ?>" selected><?php echo $offer['place_name']; ?></option>
    <?php foreach($places_lists as $places_list): ?>
   <option value="<?php echo $places_list['place_id']; ?>"><?php echo $places_list['place_name']; ?></option>
    <?php endforeach; ?>
   </select>

   </div>
   </div>

         <label class="control-label">Featured <span class="small_text">(If you want it to appear featured on home section)</span></label>
   
   <div class="row">
                        <div class="col-sm-1">

                        <?php 


$Yes = 'Yes';

if (strpos($Yes, $offer['offer_featured']) !== false) {
    echo '<div class="radio radio-success"> <input type="radio" name="offer_featured" id="radio3" value="'. $offer['offer_featured'] .'" checked=""> <label for="radio3"> '. $offer['offer_featured'] .' </label> </div>';
}else{
	echo '<div class="radio radio-success"> <input type="radio" name="offer_featured" id="radio3" value="' . $Yes .'"> <label for="radio3"> '. $Yes .' </label> </div>';
}
                         ?>
                        </div>

                        <div class="col-sm-1">

                        <?php 


$No = 'No';

if (strpos($No, $offer['offer_featured']) !== false) {
    echo '<div class="radio radio-danger"> <input type="radio" name="offer_featured" id="radio4" value="No" checked=""> <label for="radio4"> No </label> </div>';
}else{
	echo '<div class="radio radio-danger"> <input type="radio" name="offer_featured" id="radio4" value="'. $No .'"> <label for="radio4"> '. $No .' </label> </div>';
}
                         ?>
                        </div>

                    </div>


  <label class="control-label">Terms</label>
   <textarea type="text" class="form-control" name="offer_terms" required><?php echo $offer['offer_terms']; ?></textarea>

   <label class="control-label">Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $offer['offer_image']; ?>" data-lightbox="image-1"><?php echo $offer['offer_image']; ?></a></label>
   <input name="offer_image" class="input-file" type="file">
   <input type="hidden" value="<?php echo $offer['offer_image']; ?>" name="offer_image_save">
   <span class="text-danger">Recommended size: <b>850 x 450 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_offer.php?id=<?php echo $offer['offer_id']; ?>" });}
   </script>
   </div>


</div>
</form>  
</div>
</div>
</div>
<div class="col-md-2 page-sidebar"> 
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>

<script>
CKEDITOR.replace( 'offer_description' );
</script>