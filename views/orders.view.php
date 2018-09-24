<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">

<h3 class="title-pages">Orders</h3>


<script type="text/javascript">
	$(document).ready( function () {
    $('#table_id').dataTable( {
  "pageLength": 50
} );

} );
</script>
<style type="text/css">
	label{font-size: 13px;}
	th{border-bottom-width: 1px !important;}
	.view-button{border: 1px solid; border-radius: 4px; padding: 1px 7px; cursor: pointer; width: 100%; display: inline; text-align: center; border-color: #34495e; color: #34495e; font-size: 11px;}
	.view-button:hover{color: #933EC5; border-color: #933EC5;}

</style>

<div class="panel-body" style="padding: 1px 10px 1px 1px;font-size: 13px;">
<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
    <thead>
            <tr>
            	<th>Id</th>
                
                <th>Reference</th>
                <th>Price</th>
                <th>Customer</th>
                <th>Offer</th>
                <th>Date</th>
                <th>Status</th>
                <th>Platform</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            	<th>Id</th>
                
                <th>Reference</th>
                <th>Price</th>
                <th>Customer</th>
                <th>Offer</th>
                <th>Date</th>
                <th>Status</th>
                <th>Platform</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($orders as $order): ?>
            <tr>
            	<td><?php echo $order['order_id']; ?></td>
                <td><?php echo $order['order_txn']; ?></td>
                <td><?php echo $order['order_gross']; ?> <?php echo $order['order_cc']; ?></td>
                <td>#<?php echo $order['user_id']; ?>

                	<a class="view-button" data-toggle="modal" data-target="#1-view-modal" data-userid="<?php echo $order['user_id']; ?>" id="getUser">View</a>

                </td>
                <td>#<?php echo $order['offer_id']; ?>

                	<a class="view-button" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $order['offer_id']; ?>" id="getOffer">View</a>

                </td>
                <td><?php echo $order['order_date']; ?></td>
                <td style="color: green;"><?php echo $order['order_status']; ?></td>
                <td><?php echo $order['order_platform']; ?></td>
                <td>
    			<a onclick="alertdelete_<?php echo $order['order_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #34495e;"><i class="fa fa-trash-o"></i></a>
    			    <script type="text/javascript">
  function alertdelete_<?php echo $order['order_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_order.php?id=<?php echo $order['order_id']; ?>" });}
  </script>
    			</td>
            </tr>
        <?php endforeach; ?>

        </tbody>
</table>

</div>      
</div>
<div class="col-md-2">   
<?php require'sidebar.view.php'; ?>  
</div>
</div>
</div>

<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 

                 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size: 14px;">Offer Details</h4>
      </div>
      <div class="modal-body">
        <div id="modal-loader" style="display: none; text-align: center;">
                            <img src="loadericon.svg">
                           </div>
                                                   
                           <div id="dynamic-content"></div>
      </div>
    </div>

              </div>
       </div>  
    
    </div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    
    $(document).on('click', '#getOffer', function(e){
        
        e.preventDefault();
        
        var uid = $(this).data('id');
        
        $('#dynamic-content').html('');
        $('#modal-loader').show();
        
        $.ajax({
            url: 'get_offer.php',
            type: 'POST',
            data: 'id='+uid,
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);  
            $('#dynamic-content').html('');    
            $('#dynamic-content').html(data);
            $('#modal-loader').hide(); 
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });
        
    });
    
});

</script>



<div id="1-view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 

                 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size: 14px;">User Details</h4>
      </div>
      <div class="modal-body">
        <div id="1-modal-loader" style="display: none; text-align: center;">
                            <img src="loadericon.svg">
                           </div>
                                                   
                           <div id="1-dynamic-content"></div>
      </div>
    </div>

              </div>
       </div>  
    
    </div>


<script>
$(document).ready(function(){
    
    $(document).on('click', '#getUser', function(e){
        
        e.preventDefault();
        
        var useridid = $(this).data('userid');
        
        $('#1-dynamic-content').html('');
        $('#1-modal-loader').show();
        
        $.ajax({
            url: 'get_user.php',
            type: 'POST',
            data: 'userid='+useridid,
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);  
            $('#1-dynamic-content').html('');    
            $('#1-dynamic-content').html(data);
            $('#1-modal-loader').hide(); 
        })
        .fail(function(){
            $('#1-dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#1-modal-loader').hide();
        });
        
    });
    
});

</script>