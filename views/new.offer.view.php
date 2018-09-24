<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10" style="margin-top: 17px;">            

<h3 class="title-pages">New Offer</h3>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group" style="padding: 0px 10px 0px 0px;">

   <label class="control-label">Title</label>
   <input type="text" value="" placeholder="Title" name="offer_title" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea type="text" class="form-control" name="offer_description" id="offer_description" required></textarea>

   <div class="row">
   <div class="col-sm-6">


   <label class="control-label">Price</label>
   <input type="number" value="" placeholder="Ex. 30" name="offer_price" class="form-control" required="">

   </div>

   <div class="col-sm-6">

   <label class="control-label">Old Price</label>
   <input type="number" value="" placeholder="Ex. 50" name="offer_oldprice" class="form-control" required="">

   </div>
   </div>


   <div class="row">
   <div class="col-sm-6">


   <label class="control-label">Start Date</label>
   <input type="date" value="" placeholder="Start Date" name="offer_date_start" class="form-control" required="">

   </div>

   <div class="col-sm-6">

   <label class="control-label">End Date</label>
   <input type="date" value="" placeholder="End Date" name="offer_date_end" class="form-control" required="">

   </div>
   </div>



   <div class="row">
   <div class="col-sm-6">



   <label class="control-label">Category</label>
   <select class="form-control" name="offer_category" required>
    <?php foreach($offers_categories_lists as $offers_categories_list): ?>
   <option value="<?php echo $offers_categories_list['offer_category_id']; ?>"><?php echo $offers_categories_list['offer_category_name']; ?></option>
    <?php endforeach; ?>
   </select>

   </div>

   <div class="col-sm-6">

    <label class="control-label">Place</label>
   <select class="form-control" name="offer_place" required>
    <?php foreach($places_lists as $places_list): ?>
   <option value="<?php echo $places_list['place_id']; ?>"><?php echo $places_list['place_name']; ?></option>
    <?php endforeach; ?>
   </select>

   </div>
   </div>

      <label class="control-label">Featured <span class="small_text">(If you want it to appear featured on home section)</span></label>
   
   <div class="row">
                        <div class="col-sm-1">
                             <div class="radio radio-success">
                                <input type="radio" name="offer_featured" id="radio3" value="Yes" checked="">
                                <label for="radio3">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="radio radio-danger">
                                <input type="radio" name="offer_featured" id="radio4" value="No">
                                <label for="radio4">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>


   <label class="control-label">Terms</label>
   <textarea type="text" class="form-control" name="offer_terms" required></textarea>


   <label class="control-label">Image</label>
   <input name="offer_image" class="input-file" type="file" required="">
   <span class="text-danger">Recommended size: <b>850 x 450 Pixels</b> </span>

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

<script>
CKEDITOR.replace( 'offer_description' );
</script>
