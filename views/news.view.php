<div class="container-fluid" style="margin-top: 15px;">
<div class="row">
<div class="col-md-10">

<h3 class="title-pages">News</h3>

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
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($news as $news): ?>
            <tr>
              <td><?php echo $news['news_id']; ?></td>
                <td width="50px"><img src="../images/<?php echo $news['news_image']; ?>" style="width: 100%; height: 40px; padding: 2px; border: 1px solid #eee;"></td>
                <td><?php echo $news['news_title']; ?></td>
                <td><?php echo $news['category_name']; ?></td>
                <td><?php echo $news['news_status']; ?></td>
                <td><?php echo fecha($news['news_date']); ?></td>
                <td>
                <a href="../controller/edit_news.php?id=<?php echo $news['news_id']; ?>" style="font-size: 14px;color: #34495e;"><i class="fa fa-cog"></i></a>
          <a onclick="alertdelete_<?php echo $news['news_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #34495e;"><i class="fa fa-trash-o"></i></a>
              <script type="text/javascript">
  function alertdelete_<?php echo $news['news_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_news.php?id=<?php echo $news['news_id']; ?>" });}
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