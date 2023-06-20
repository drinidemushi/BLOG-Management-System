<?php include 'header-dash.php'?>
<?php include 'db.php'?>

<?php

if(isset($_GET['delete'])){
    $the_subcat_id = $_GET['delete'];
    $query = "DELETE FROM subcategory WHERE sub_id = {$the_subcat_id}";
    $delete_query = mysqli_query($conn, $query);
}


?>

        <div class="container">
        <div class="row">
        <div class="col-md-6">
        
        <?php insert_Sub();?>
    
    <form action="" method="post">
         <div class="mb-3">
         <label for="text" class="form-label">Add SubCategory</label>
         <input type="text" class="form-control" name="sub_name" >
          </div>
         <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
    </form>

    <form action="" method="post">
         <div class="mb-3">
<?php
  
 if(isset($_GET['edit'])){ 
 $sub_id = $_GET['edit'];
 $query = "SELECT * FROM subcategory WHERE sub_id = $sub_id";
 $select_all_subcategory_query_id = mysqli_query($conn,$query);
 while($row = mysqli_fetch_assoc($select_all_subcategory_query_id)){
 $sub_id =  $row['sub_id'];
 $sub_name = $row['sub_name'];

      ?>

<div style="padding-top:10px"><input value="<?php if(isset($sub_name)){echo $sub_name;}?>" type="text" class="form-control" name="sub_name" ></div>
<div style="padding-top:10px"><input type="submit" class="btn btn-primary" name="update" value="Update Category"></div>
   <?php  }}?>
  
<?php

if(isset($_POST['update'])){
    $the_sub_name= $_POST['sub_name'];
    $query = "UPDATE subcategory SET sub_name = '{$the_sub_name}' WHERE sub_id={$sub_id}";
    $update_query = mysqli_query($conn,$query);
}


?>





          </div>
    </form>
    </div>

        <div class="col-md-6">
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>Id</th>
            <th>Sub-Category-name</th>
            <th>Delete</th>
            <th>Edit</th>
            </tr>
            </thead>
            <tbody>
<?php findeAllSub();?>


      </tbody>
      </table>
     </div>
     </div>
     </div>
     <?php include 'footer.php'?>     
             