<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10" style="padding-left: 15px;">              

<h3 class="title-pages">New Place</h3>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group" style="padding: 0px 10px 0px 0px;">

   <label class="control-label">Name</label>
   <input type="text" value="" placeholder="Title" name="place_name" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea type="text" class="form-control" name="place_description" id="place_description" required></textarea>

   <div class="row">

   <div class="col-sm-6">

   <label class="control-label">Address</label>
   <input type="text" value="" placeholder="Address" name="place_address" class="form-control" id="address" required="">

</div>

   <div class="col-sm-3">

   <label class="control-label">Latitude</label>
      <div class="input-group">
      <input type="text" value="" class="form-control" placeholder="Latitude" id="latitude" name="place_latitude" required="">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="btn">Get</button>
      </span>
    </div>

   </div>

   <div class="col-sm-3">



   <label class="control-label">Longitude</label>

   <div class="input-group">
      <input type="text" value="" class="form-control" placeholder="Longitude" id="longitude" name="place_longitude" required="">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="btn">Get</button>
      </span>
    </div>

   </div>
   </div>

   <div class="row">
   <div class="col-sm-6">

   <label class="control-label">Hours</label>
   <input type="text" value="" placeholder="Hours" name="place_hours" class="form-control" required="">

   </div>

   <div class="col-sm-6">

   <label class="control-label">Phone</label>
   <input type="text" value="" placeholder="Phone" name="place_phone" class="form-control" required="">

   </div>
   </div>


   <div class="row">
   <div class="col-sm-6">

   <label class="control-label">Website</label>
   <input type="text" value="" placeholder="Website" name="place_website" class="form-control" required="">

   </div>

   <div class="col-sm-6">

   <label class="control-label">Audience</label>
   <input type="text" value="" placeholder="Audience" name="place_audience" class="form-control" required="">

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
   <option selected="selected">Select Category</option>
    <?php foreach($places_categories_lists as $places_categories_list): ?>
   <option value="<?php echo $places_categories_list['place_category_id']; ?>"><?php echo $places_categories_list['place_category_name']; ?></option>
    <?php endforeach; ?>
   </select>

   </div>

   <div class="col-sm-6">

   <label class="control-label">Type</label>
   <select class="form-control place_type" name="place_type" required="">
  <option selected="selected">Select Type</option>
   </select>

   </div>
   </div>

   <label class="control-label">Featured <span class="small_text">(If you want it to appear featured on the slide)</span></label>
   
   <div class="row">
                        <div class="col-sm-1">
                             <div class="radio radio-success">
                                <input type="radio" name="place_featured" id="radio3" value="Yes" checked="">
                                <label for="radio3">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="radio radio-danger">
                                <input type="radio" name="place_featured" id="radio4" value="No">
                                <label for="radio4">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>

   <label class="control-label">Featured Image</label>
   <input name="place_image" class="input-file" type="file" required="">
   <span class="text-danger">Recommended size: <b>850 x 450 Pixels</b> </span><br/><br/>

   <label class="control-label">Gallery (Max. 8)</label>
   <input name="files" class="input-file" type="file" required="">

   <div class="action-button">
   <input type="submit" name="save" value="Upload" class="btn btn-embossed btn-primary">
   <input type="reset" name="reset" value="Reset" class="btn btn-embossed btn-danger">
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
