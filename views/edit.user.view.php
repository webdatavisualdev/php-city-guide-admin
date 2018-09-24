<div class="container-fluid" style="margin-top: 15px;">
<div class="row">

<div class="col-md-10" style="margin-top: 17px;">            
<h3 class="title-pages">Edit User<span class="label label-default" style="font-size: 11px; float: right; right: 10px;">ID <?php echo $user['user_id']; ?></span></h3>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-group" style="padding: 0px 10px 0px 0px;">

   <input type="hidden" value="<?php echo $user['user_id']; ?>" name="user_id">
   <label class="control-label">First Name</label>
   <input type="text" value="<?php echo $user['user_firstname']; ?>" placeholder="" name="user_firstname" class="form-control" required="">

   <label class="control-label">Last Name</label>
   <input type="text" value="<?php echo $user['user_lastname']; ?>" placeholder="" name="user_lastname" class="form-control" required="">

   <label class="control-label">Email</label>
   <input type="text" value="<?php echo $user['user_email']; ?>" placeholder="" name="user_email" class="form-control" required="">

   <label class="control-label">Phone</label>
   <input type="text" value="<?php echo $user['user_phone']; ?>" placeholder="" name="user_phone" class="form-control" required="">

   <label class="control-label">Password</label>
   <input type="text" value="<?php echo $user['user_password']; ?>" placeholder="" name="user_password" class="form-control" required="">


   <div class="action-button">
   <input type="submit" name="update" value="Update" class="btn btn-embossed btn-primary">
   <a onclick="alertdelete();">
   <input name="trash" value="Delete" class="btn btn-embossed btn-danger" style="width: 80px;"></a>
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_user.php?id=<?php echo $user['user_id']; ?>" });}
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
