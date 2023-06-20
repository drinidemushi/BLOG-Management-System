<?php include 'header-dash.php'?>
<?php include 'db.php'?>

<div class="container">
<div class="row">
<?php insertPost();?>
<form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
<label for="text" class="form-label">Post Title</label>
<input type="text" class="form-control" name="post_title" >
<label for="text" class="form-label">Cateogry</label>
<select  class="form-select" name="cat_id" id="">
<?php 
 $query = "SELECT * FROM  category ";
 $select_all_category_query = mysqli_query($conn,$query);
 while($row = mysqli_fetch_assoc($select_all_category_query)){
$cat_id =  $row['cat_id'];
$cat_name = $row['cat_name'];
 echo "<option value='{$cat_id}'> $cat_name</option>";
 }
?>
</select>
<label for="text" class="form-label">SubCateogry</label>
<select  class="form-select" name="sub_id" id="">
<?php 
$query = "SELECT * FROM  subcategory ";
$select_all_category_query = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($select_all_category_query)){
$sub_id =  $row['sub_id'];
$sub_name = $row['sub_name'];
echo "<option value='{$sub_id}'> $sub_name</option>";
}
?>
</select>
<label for="text" class="form-label">Post Details</label>
<textarea  class="form-control" name="post_details" id="" cols="30" rows="10" ></textarea>
<label for="text" class="form-label">Post Image</label>
<input type="file" class="form-control" name="post_image" >
 </div>
<input type="submit" class="btn btn-primary" name="submit" value="Add Post">
</form>
</div>
</div>
</div>
 <?php include 'footer.php'?>