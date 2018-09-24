<div class="container-fluid" style="margin-top: 15px;">
<div class="row">

<div class="col-md-10" style="margin-top: 17px;">            
<h3 class="title-pages">Edit News <span class="label label-default" style="font-size: 11px; float: right; right: 10px;">ID <?php echo $news['news_id']; ?></span></h3>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group" style="padding: 0px 10px 0px 0px;">

   <input type="hidden" value="<?php echo $news['news_id']; ?>" name="news_id">
   <label class="control-label">Title</label>
   <input type="text" value="<?php echo $news['news_title']; ?>" placeholder="" name="news_title" class="form-control" required="">

      <label class="control-label">Description</label>
   <textarea type="text" class="form-control" name="news_description" id="news_description" required><?php echo $news['news_description']; ?></textarea>

      <label class="control-label">Category</label>
   <select class="form-control" name="news_category" required>
   <option value="<?php echo $news['news_category']; ?>" selected><?php echo $news['category_name']; ?></option>
    <?php foreach($news_categories_lists as $news_categories_list): ?>
   <option value="<?php echo $news_categories_list['news_category_id']; ?>"><?php echo $news_categories_list['news_category_name']; ?></option>
    <?php endforeach; ?>
   </select>

   <label class="control-label">Status</label>
   
   <div class="row">
                        <div class="col-sm-1">

                        <?php 


$published = 'Published';

if (strpos($published, $news['news_status']) !== false) {
    echo '<div class="radio radio-success"> <input type="radio" name="news_status" id="radio3" value="'. $news['news_status'] .'" checked=""> <label for="radio3"> '. $news['news_status'] .' </label> </div>';
}else{
  echo '<div class="radio radio-success"> <input type="radio" name="news_status" id="radio3" value="' . $published .'"> <label for="radio3"> '. $published .' </label> </div>';
}
                         ?>
                        </div>

                        <div class="col-sm-1">

                        <?php 


$draft = 'Draft';

if (strpos($draft, $news['news_status']) !== false) {
    echo '<div class="radio radio-danger"> <input type="radio" name="news_status" id="radio4" value="Draft" checked=""> <label for="radio4"> Draft </label> </div>';
}else{
  echo '<div class="radio radio-danger"> <input type="radio" name="news_status" id="radio4" value="'. $draft .'"> <label for="radio4"> '. $draft .' </label> </div>';
}
                         ?>
                        </div>

                    </div>

   <label class="control-label">Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $news['news_image']; ?>" data-lightbox="image-1"><?php echo $news['news_image']; ?></a></label>
   <input name="news_image" class="input-file" type="file">
   <input type="hidden" value="<?php echo $news['news_image']; ?>" name="news_image_save">
   <span class="text-danger">Recommended size: <b>850 x 450 Pixels</b> </span>

   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_news.php?id=<?php echo $news['news_id']; ?>" });}
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

<script>
CKEDITOR.replace( 'news_description' );
</script>
