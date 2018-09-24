<div class="container-fluid" id="settings" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10" style="padding-left: 15px;">            

<h3 class="title-pages">Strings</h3>

<style type="text/css">
  #settings input{
    margin-bottom: 5px; margin-top: 5px;
  }
</style>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="panel panel-default">
  <div class="panel-heading">Strings</div>
  <div class="panel-body">
    
   <input type="text" value="<?php echo $strings['st_currency']; ?>" name="st_currency" class="form-control">


   <input type="text" value="<?php echo $strings['st_securecheckout']; ?>" name="st_securecheckout" class="form-control">


   <input type="text" value="<?php echo $strings['st_orderdetails']; ?>" name="st_orderdetails" class="form-control">


   <input type="text" value="<?php echo $strings['st_regularprice']; ?>" name="st_regularprice" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_yousave']; ?>" name="st_yousave" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_total']; ?>" name="st_total" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_id']; ?>" name="st_id" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_paymentauthorized']; ?>" name="st_paymentauthorized" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_completed']; ?>" name="st_completed" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_thanksorder']; ?>" name="st_thanksorder" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_yourstansactionid']; ?>" name="st_yourstansactionid" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_sendconfirmation']; ?>" name="st_sendconfirmation" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_done']; ?>" name="st_done" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_tansactiondetails']; ?>" name="st_tansactiondetails" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_paymentcanceled']; ?>" name="st_paymentcanceled" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_hasbeencanceled']; ?>" name="st_hasbeencanceled" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_close']; ?>" name="st_close" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_subjectpayment']; ?>" name="st_subjectpayment" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_subjectpassword']; ?>" name="st_subjectpassword" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_subjectnewuser']; ?>" name="st_subjectnewuser" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_thankyoufororder']; ?>" name="st_thankyoufororder" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_thisemailcontains']; ?>" name="st_thisemailcontains" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_customer']; ?>" name="st_customer" class="form-control">

   
   <input type="text" value="<?php echo $strings['st_referenceid']; ?>" name="st_referenceid" class="form-control">

   <input type="text" value="<?php echo $strings['st_ordertotal']; ?>" name="st_ordertotal" class="form-control">

   <input type="text" value="<?php echo $strings['st_wehopetosee']; ?>" name="st_wehopetosee" class="form-control">

   <input type="text" value="<?php echo $strings['st_dear']; ?>" name="st_dear" class="form-control">

   <input type="text" value="<?php echo $strings['st_textnewaccount']; ?>" name="st_textnewaccount" class="form-control">

   <input type="text" value="<?php echo $strings['st_subjectnewaccount']; ?>" name="st_subjectnewaccount" class="form-control">

   <input type="text" value="<?php echo $strings['st_welcomenewaccount']; ?>" name="st_welcomenewaccount" class="form-control">

   <input type="text" value="<?php echo $strings['st_hellonewaccount']; ?>" name="st_hellonewaccount" class="form-control">

   <input type="text" value="<?php echo $strings['st_yourpasswordforget']; ?>" name="st_yourpasswordforget" class="form-control">

   <input type="text" value="<?php echo $strings['st_subjectforget']; ?>" name="st_subjectforget" class="form-control">

   <label class="control-label">Privacy Policy</label>
   <textarea type="text" class="form-control" name="st_privacypolicy" id="textarea1"><?php echo $strings['st_privacypolicy']; ?></textarea>

   <label class="control-label">Terms of Service</label>
   <textarea type="text" class="form-control" name="st_termsofservice" id="textarea2"><?php echo $strings['st_termsofservice']; ?></textarea>

      <label class="control-label">About Us</label>
   <textarea type="text" class="form-control" name="st_aboutus" id="textarea3"><?php echo $strings['st_aboutus']; ?></textarea>

</div>
</div>

<div class="action-button">
   <input type="submit" name="save" value="Save Changes" class="btn btn-embossed btn-primary">
   </div>

</form>  
</div>
<div class="col-md-2 page-sidebar"> 
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>

<script> CKEDITOR.replace( 'textarea1' ); </script>
<script> CKEDITOR.replace( 'textarea2' ); </script>
<script> CKEDITOR.replace( 'textarea3' ); </script>
