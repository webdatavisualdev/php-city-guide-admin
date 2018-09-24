<?php
		 
	require_once 'dbconfig.php';
	
	if (isset($_REQUEST['userid'])) {
			
		$userid = intval($_REQUEST['userid']);
		$query = "SELECT * FROM users WHERE user_id=:userid";
		$stmt = $DB_con->prepare( $query );
		$stmt->execute(array(':userid'=>$userid));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
		?>

    <style type="text/css">

    .card-box {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 5px;
}

    .card-box-img-top {
    width: 100%;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
      .card-box-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}

.card-box-title {
    margin-bottom: .75rem;
    font-size: 16px;
        text-align: left;
        margin-top: 5px;
}

.card-box-text{
  text-align: left;
}

.card-box-title span{
      border: 1px solid;
    padding: 2px 5px;
    border-radius: 4px;
    margin-bottom: 12px;
    display: inline-block;
    font-size: 10px;
    color: #933ec5;
}

.modal-header{background: #933ec5;color: #fff;    border-top-left-radius: 6px;
    border-top-right-radius: 6px;}
.modal-content{border: none;}

    </style>

<div class="card-box">
  <div class="card-box-body">    <div class="panel panel-default">
  <table class="table table-sm table-bordered">
    <tbody>
      <tr style="text-align: left;font-size: 14px;">
        <td><b>First Name</b></td>
        <td><?php echo $user_firstname; ?></td>
      </tr>

      <tr style="text-align: left;font-size: 14px;">
        <td><b>Last Name</b></td>
        <td><?php echo $user_lastname; ?></td>
      </tr>

      <tr style="text-align: left;font-size: 14px;">
        <td><b>Email</b></td>
        <td><?php echo $user_email; ?></td>
      </tr>

      <tr style="text-align: left;font-size: 14px;">
        <td><b>Phone</b></td>
        <td><?php echo $user_phone; ?></td>
      </tr>

    </tbody>
  </table>
</div>
    
  </div>
</div>

			
		<?php				
	}