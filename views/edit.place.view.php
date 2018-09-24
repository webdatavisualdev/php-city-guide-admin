<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10" style="padding-left: 15px;">                
<h3 class="title-pages">Edit Place <span class="label label-default" style="font-size: 11px; float: right; right: 10px;">ID <?php echo $place['place_id']; ?></span></h3>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group" style="padding: 0px 10px 0px 0px;">

   <input type="hidden" value="<?php echo $place['place_id']; ?>" name="place_id">
   <label class="control-label">Name</label>
   <input type="text" value="<?php echo $place['place_name']; ?>" placeholder="" name="place_name" class="form-control" required="">

      <label class="control-label">Description</label>
   <textarea type="text" class="form-control" name="place_description" required><?php echo $place['place_description']; ?></textarea>

      <div class="row">

   <div class="col-sm-6">

   <label class="control-label">Address</label>
   <input type="text" value="<?php echo $place['place_address']; ?>" name="place_address" class="form-control" id="address" required="">
</div>

   <div class="col-sm-3">

   <label class="control-label">Latitude</label>
      <div class="input-group">
      <input type="text" value="<?php echo $place['place_latitude']; ?>" class="form-control" id="latitude" name="place_latitude" required="">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="btn">Get</button>
      </span>
    </div>

   </div>

   <div class="col-sm-3">



   <label class="control-label">Longitude</label>

   <div class="input-group">
      <input type="text" value="<?php echo $place['place_longitude']; ?>" class="form-control" id="longitude" name="place_longitude" required="">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="btn">Get</button>
      </span>
    </div>

   </div>
   </div>

      <div class="row">
   <div class="col-sm-6">

     <label class="control-label">Hours</label>
   <input type="text" value="<?php echo $place['place_hours']; ?>" placeholder="" name="place_hours" class="form-control" required="">

   </div>

   <div class="col-sm-6">

     <label class="control-label">Phone</label>
   <input type="text" value="<?php echo $place['place_phone']; ?>" placeholder="" name="place_phone" class="form-control" required="">

   </div>
   </div>


      <div class="row">
   <div class="col-sm-6">

     <label class="control-label">Website</label>
   <input type="text" value="<?php echo $place['place_website']; ?>" placeholder="" name="place_website" class="form-control" required="">

   </div>

   <div class="col-sm-6">

     <label class="control-label">Audience</label>
   <input type="text" value="<?php echo $place['place_audience']; ?>" placeholder="" name="place_audience" class="form-control" required="">

   </div>
   </div>



      <div class="row">
   <div class="col-sm-6">

   <script type="text/javascript">
$(document).ready(function()
{
 $(".place_category").change(function()
 {
  var cat_id=$(this).val();
  var dataString = 'cat_id='+ cat_id;
 
  $.ajax
  ({
   type: "POST",
   url: "get_types.php",
   data: dataString,
   cache: false,
   success: function(html)
   {
      $(".place_type").html(html);
   } 
   });
  });
 
});
</script>
      <label class="control-label">Category</label>
   <select class="form-control place_category" name="place_category" required="">
   <option value="<?php echo $place['place_category']; ?>" selected="selected"><?php echo $place['category_name']; ?></option>
    <?php foreach($places_categories_lists as $places_categories_list): ?>
   <option value="<?php echo $places_categories_list['place_category_id']; ?>"><?php echo $places_categories_list['place_category_name']; ?></option>
    <?php endforeach; ?>
   </select>

   </div>

   <div class="col-sm-6">

         <label class="control-label">Type</label>
   <select class="form-control place_type" name="place_type" required="">
  <option value="<?php echo $place['place_type']; ?>" selected="selected"><?php echo $place['type_name']; ?></option>
   </select>

   </div>
   </div>

   <label class="control-label">Featured <span class="small_text">(If you want it to appear featured on the slide)</span></label>
   
   <div class="row">
                        <div class="col-sm-1">

                        <?php 


$yes = 'Yes';

if (strpos($yes, $place['place_featured']) !== false) {
    echo '<div class="radio radio-success"> <input type="radio" name="place_featured" id="radio3" value="'. $place['place_featured'] .'" checked=""> <label for="radio3"> '. $place['place_featured'] .' </label> </div>';
}else{
	echo '<div class="radio radio-success"> <input type="radio" name="place_featured" id="radio3" value="' . $yes .'"> <label for="radio3"> '. $yes .' </label> </div>';
}
                         ?>
                        </div>

                        <div class="col-sm-1">

                        <?php 


$no = 'No';

if (strpos($no, $place['place_featured']) !== false) {
    echo '<div class="radio radio-danger"> <input type="radio" name="place_featured" id="radio4" value="No" checked=""> <label for="radio4"> No </label> </div>';
}else{
	echo '<div class="radio radio-danger"> <input type="radio" name="place_featured" id="radio4" value="'. $no .'"> <label for="radio4"> '. $no .' </label> </div>';
}
                         ?>
                        </div>

                    </div>


   <label class="control-label">Featured Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $place['place_image']; ?>" data-lightbox="image-1"><?php echo $place['place_image']; ?></a></label>
   <input name="place_image" class="input-file" type="file">
   <input type="hidden" value="<?php echo $place['place_image']; ?>" name="place_image_save">
   <span class="text-danger">Recommended size: <b>850 x 450 Pixels</b> </span><br/><br/>

  
  <label class="control-label">Gallery (Max. 8)</label>

   <div class="gallery">
   <?php foreach($gallery as $gallery_image): ?>
    <div class="image">
     <div class="badge-container" style="background:url(<?php echo SITE_URL ?>/images/<?php echo $gallery_image['image_name']; ?>);">
    <a onclick="alertdelete<?php echo $gallery_image['image_id']; ?>();">
    <div class="badge_gallery badge-red"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
    </div></a>
     </div>

         <script type="text/javascript">
   function alertdelete<?php echo $gallery_image['image_id']; ?>() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this image!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_gallery_image.php?id=<?php echo $gallery_image['image_id']; ?>" });}
   </script>
  <?php endforeach; ?>
   </div>

  <input name="files" class="input-file" type="file">

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_place.php?id=<?php echo $place['place_id']; ?>" });}
   </script>
   </div>


</div>
</form>  
</div>
<div class="col-md-2 page-sidebar"> 
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>


 <script type="text/javascript">
	function initialize() {

var input = document.getElementById('address');
var autocomplete = new google.maps.places.Autocomplete(input);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

   <script type="text/javascript">
   	function showResult(result) {
    document.getElementById('latitude').value = result.geometry.location.lat();
    document.getElementById('longitude').value = result.geometry.location.lng();
}

function getLatitudeLongitude(callback, address) {
    
    address = address /*|| 'Valencia, Spain'*/;
    
    geocoder = new google.maps.Geocoder();
    if (geocoder) {
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                callback(results[0]);
            }
        });
    }
}

var button = document.getElementById('btn');

button.addEventListener("click", function () {
    var address = document.getElementById('address').value;
    getLatitudeLongitude(showResult, address)
});
   </script>

<script>
CKEDITOR.replace( 'place_description' );
</script>