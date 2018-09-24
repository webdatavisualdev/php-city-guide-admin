<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10" style="margin-top: 17px;">            

<h3 class="title-pages">New News</h3>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group" style="padding: 0px 10px 0px 0px;">

   <label class="control-label">Title</label>
   <input type="text" value="" placeholder="Title" name="news_title" class="form-control" required="">

   <label class="control-label">Description</label>
   <textarea type="text" class="form-control" name="news_description" id="news_description" required></textarea>

         <label class="control-label">Category</label>
   <select class="form-control" name="news_category" required>
    <?php foreach($news_categories_lists as $news_categories_list): ?>
   <option value="<?php echo $news_categories_list['news_category_id']; ?>"><?php echo $news_categories_list['news_category_name']; ?></option>
    <?php endforeach; ?>
   </select>

  <label class="control-label">Status</label>
   
   <div class="row">
                        <div class="col-sm-1">
                             <div class="radio radio-success">
                                <input type="radio" name="news_status" id="radio3" value="Published" checked="">
                                <label for="radio3">
                                    Published
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="radio radio-danger">
                                <input type="radio" name="news_status" id="radio4" value="Draft">
                                <label for="radio4">
                                    Draft
                                </label>
                            </div>
                        </div>
                    </div>

   <label class="control-label">Image</label>
   <input name="news_image" class="input-file" type="file" required="">
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
CKEDITOR.replace( 'news_description' );
</script>
