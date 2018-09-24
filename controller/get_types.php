<?php
include('dbconfig.php');

if($_POST['cat_id'])
{
 $cat_id=$_POST['cat_id'];
  
 $stmt = $DB_con->prepare("SELECT * FROM places_types WHERE place_type_category=:cat_id");
 $stmt->execute(array(':cat_id' => $cat_id));
 ?><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
        <option value="<?php echo $row['place_type_id']; ?>"><?php echo $row['place_type_name']; ?></option>
        <?php
 }
}
?>