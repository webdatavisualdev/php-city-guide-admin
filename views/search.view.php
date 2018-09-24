<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">

<h3 class="title-pages">Results</h3>

<script type="text/javascript">
	$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<style type="text/css">
	label{font-size: 13px;}
	th{border-bottom-width: 1px !important;}
</style>

<div class="panel-body" style="padding: 1px 10px 1px 1px;font-size: 13px;">

<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
    <thead>
            <tr>
            	<th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Type</th>
                <th>Featured</th>
                <th>Audience</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            	<th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Type</th>
                <th>Featured</th>
                <th>Audience</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($results as $result): ?>
            <tr>
            	<td><?php echo $result['place_id']; ?></td>
                <td width="50px"><img src="../images/<?php echo $result['place_image']; ?>" style="width: 100%; height: 40px; padding: 2px; border: 1px solid #eee;"></td>
                <td><?php echo $result['place_name']; ?></td>
                <td><?php echo $result['category_name']; ?></td>
                <td><?php echo $result['type_name']; ?></td>
                <td><?php echo $result['place_featured']; ?></td>
                <td><?php echo $result['place_audience']; ?></td>
                <td>
                <a href="../controller/edit_place.php?id=<?php echo $result['place_id']; ?>" style="font-size: 14px;color: #34495e;"><i class="fa fa-cog"></i></a>
    			<a onclick="alertdelete_<?php echo $result['place_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #34495e;"><i class="fa fa-trash-o"></i></a>
    			    <script type="text/javascript">
  function alertdelete_<?php echo $result['place_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_result.php?id=<?php echo $result['place_id']; ?>" });}
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