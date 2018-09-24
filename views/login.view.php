<div class="container-fluid" style="margin-top:25px">
<style type="text/css">
	body{background-color: #933EC5;text-align: center;}
	.input-group-addon{background-color: #933EC5; border: 1px solid #933EC5;}
	.input-group.focus .input-group-addon { background-color: #933EC5; border-color: #933EC5; }
	.form-control, .select2-search input[type="text"]{border: 1px solid #ffffff;}
	img{display: block; width: 100%; max-width: 210px; margin-left: auto; margin-right: auto; margin-bottom: 10px;}
	.copyrights{font-size: 12px; color: #ffffff; margin-top: 10px;}
	.copyrights a{color: #ffffff;text-decoration: underline;}
		.title{color: #ffffff;font-size: 22px; font-weight: bold;}
	.title:after{content: '';display: block;height: 2px;width: 50px;margin-left: auto;margin-right: auto;background: #ffffff;margin-top: 6px;}
</style>
	<div class="row">
	
	
		<div class="col-md-4">
		</div>
		
		
<div class="col-md-4 animated fadeIn"> <!-- BLOCK INPUT  -->

<h4 class="title">Welcome!</h4>

<div style="background: rgba(0, 0, 0, 0.12); padding: 25px; border-radius: 8px;max-width: 350px; margin-left: auto; margin-right: auto;">		



<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login">    
<div class="input-group">
   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
   <input type="text" class="form-control" name="username" placeholder="Username">
</div>
<br/>
<div class="input-group">   
   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
   <input type="password" class="form-control" name="password" placeholder="Password">  
</div>
<br/>

<button type="submit" class="btn btn-default" onclick="login.submit()" style="width: 100%;background-color: #933EC5;">Log In</button>

<?php if( !empty($errors)): ?>

<div class="alert alert-danger animated fadeIn" role="alert" style="margin-top: 20px; margin-bottom: 0;">
    
    <?php echo $errors; ?>
    
</div>
<?php endif; ?>

</form>  

</div>
<div class="copyrights">
</div>
</div><!-- FINISH BLOCK INPUT  -->
		
		
		<div class="col-md-4">
		</div>
		
		
	</div>
</div>