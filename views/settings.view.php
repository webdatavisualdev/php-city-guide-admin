<div class="container-fluid" id="settings" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10" style="padding-left: 15px;">            

<h3 class="title-pages">Settings</h3>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="panel panel-default">
  <div class="panel-heading">General Options</div>
  <div class="panel-body">
    
   <label class="control-label">Site Name</label>
   <input type="text" value="<?php echo $settings['site_name']; ?>" name="site_name" class="form-control">

</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Paypal Options</div>
  <div class="panel-body">

   <label class="control-label">Email</label>
   <input type="text" value="<?php echo $settings['paypal_email']; ?>" name="paypal_email" class="form-control">

   <label class="control-label">Currency</label>
   <input type="text" value="<?php echo $settings['paypal_currency']; ?>" name="paypal_currency" class="form-control">

   <label class="control-label">Url</label>
   <input type="text" value="<?php echo $settings['paypal_url']; ?>" name="paypal_url" class="form-control">

   <label class="control-label">Success Url</label>
   <input type="text" value="<?php echo $settings['paypal_success_url']; ?>" name="paypal_success_url" class="form-control">

   <label class="control-label">Cancel Url</label>
   <input type="text" value="<?php echo $settings['paypal_cancel_url']; ?>" name="paypal_cancel_url" class="form-control">

</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Email Options</div>
  <div class="panel-body">
    
   <label class="control-label">Email</label>
   <input type="text" value="<?php echo $settings['email_address']; ?>" name="email_address" class="form-control">
   <p class="help-block">You can specify the email the email address that emails should be sent from</p>

   <label class="control-label">Password</label>
   <input type="text" value="<?php echo $settings['email_password']; ?>" name="email_password" class="form-control">
   <p class="help-block">You can specify the email the email address that emails should be sent from</p>

   <label class="control-label">Name</label>
   <input type="text" value="<?php echo $settings['email_name']; ?>" name="email_name" class="form-control">
   <p class="help-block">You can specify the name that emails should be sent from</p>

</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">SMTP Server</div>
  <div class="panel-body">

   <label class="control-label">SMTP Host</label>
   <input type="text" value="<?php echo $settings['smtp_host']; ?>" name="smtp_host" class="form-control">

   <label class="control-label">SMTP Port</label>
   <input type="number" value="<?php echo $settings['smtp_port']; ?>" name="smtp_port" class="form-control">

   <label class="control-label">Encryption</label>

                        <?php 
$no = '-';

if (strpos($no, $settings['smtp_encrypt']) !== false) {
    echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio1" value="'. $settings['smtp_encrypt'] .'" checked=""> <label for="radio1"> No Encryption </label> </div>';
}else{
  echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio1" value="' . $no .'"> <label for="radio1"> No Encryption </label> </div>';
}
                         ?>

                        <?php 
$ssl = 'ssl';

if (strpos($ssl, $settings['smtp_encrypt']) !== false) {
    echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio2" value="'. $settings['smtp_encrypt'] .'" checked=""> <label for="radio2"> Use SSL Encryption </label> </div>';
}else{
  echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio2" value="' . $ssl .'"> <label for="radio2"> Use SSL Encryption </label> </div>';
}
                         ?>


                        <?php 
$tls = 'tls';

if (strpos($tls, $settings['smtp_encrypt']) !== false) {
    echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio3" value="'. $settings['smtp_encrypt'] .'" checked=""> <label for="radio3"> Use TLS Encryption </label> </div>';
}else{
  echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio3" value="' . $tls .'"> <label for="radio3"> Use TLS Encryption </label> </div>';
}
                         ?>


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
