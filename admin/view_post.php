<?php include 'header-dash.php' ?>
<?php include 'db.php' ?>
<?php

if (isset($_GET['delete'])) {
   $the_post_id = $_GET['delete'];
   $query = "DELETE FROM post WHERE post_id = {$the_post_id}";
   $delete_query = mysqli_query($conn, $query);
}


if (isset($_POST['update']) && isset($_GET['edit'])) {

   $post_id = $_GET['edit'];
   $the_post_title = $_POST['post_title'];
   $the_post_details = $_POST['post_details'];
   $cat_id = $_POST['cat_id'];
   $sub_id = $_POST['sub_id'];
   $post_image = $_FILES['post_image']['name'];
   $post_image_temp = $_FILES['post_image']['tmp_name'];
   if(!empty($post_image)){
      move_uploaded_file($post_image_temp, "../images1/$post_image");
      $query = "UPDATE post SET post_title= '$the_post_title', post_details = '$the_post_details', cat_id = '  $cat_id', sub_id = ' $sub_id',
                                 post_image = '$post_image' WHERE post_id = '{$post_id}' ";
   }
  else{
   $query = "UPDATE post SET post_title= '$the_post_title', post_details = '$the_post_details', cat_id = '  $cat_id', sub_id = ' $sub_id'
   WHERE post_id = '{$post_id}' ";
  }
  
 
   $update_query = mysqli_query($conn, $query);
} ?>

<div class="container">
   <div class="row">
      <table class="table table-bordered">
         <thead>
            <tr>
               <th>Id</th>
               <th>Title</th>
               <th>Date</th>
               <th>Category</th>
               <th>Subcategory</th>
               <th>Details</th>
               <th>Image</th>
               <th>User</th>
               <th>Delete</th>
               <th>Edit</th>
            </tr>
         </thead>
         <tbody>
            <?php findAllPost(); ?>

         </tbody>
      </table>
   </div>
   <div class="row">
      <div class="mb-3">
         <form action="" method="post" enctype="multipart/form-data">
            <?php

            if (isset($_GET['edit'])) {
               $post_id = $_GET['edit'];
               $query = "SELECT * FROM post WHERE post_id = $post_id";
               $select_all_post_query_id = mysqli_query($conn, $query);
               while ($row = mysqli_fetch_assoc($select_all_post_query_id)) {
                  $currentPost = $row;
                  $post_title = $row['post_title'];
                  $post_details = $row['post_details'];
                  $post_image = $row['post_image'];
            ?>
                  <label for="text" class="form-label">Post Title</label>
                  <input value="<?php if (isset($post_title)) {
                                    echo $post_title;
                                 } ?>" type="text" class="form-control" name="post_title">

                  <label for="text" class="form-label">Cateogry</label>
                  <select class="form-select" name="cat_id" id="">
                     <?php
                     $query = "SELECT * FROM  category ";
                     $select_all_category_query = mysqli_query($conn, $query);
                     while ($row = mysqli_fetch_assoc($select_all_category_query)) {
                        $cat_id =  $row['cat_id'];
                        $cat_name = $row['cat_name'];

                        $selected = '';
                        if (isset($currentPost['cat_id']) && $currentPost['cat_id'] == $cat_id) {
                           $selected = "selected";
                        }
                        echo "<option value='{$cat_id}' {$selected}> $cat_name</option>";
                     }
                     ?>
                  </select>
                  <label for="text" class="form-label">SubCateogry</label>
                  <select class="form-select" name="sub_id" id="">
                     <?php
                     $query = "SELECT * FROM  subcategory ";
                     $select_all_category_query = mysqli_query($conn, $query);
                     while ($row = mysqli_fetch_assoc($select_all_category_query)) {
                        $sub_id =  $row['sub_id'];
                        $sub_name = $row['sub_name'];


                        $selected = '';
                        if (isset($currentPost['sub_id']) && $currentPost['sub_id'] == $cat_id) {
                           $selected = "selected";
                        }
                        echo "<option value='{$sub_id}' {$selected}> $sub_name</option>";
                     }
                     ?>
                  </select>
                  <label for="text" class="form-label">Post Details</label>
                  <textarea class="form-control" name="post_details" id="" cols="30" rows="10"><?php if (isset($post_details)) {
                                                                                                   echo $post_details;
                                                                                                } ?></textarea>

                  <label for="text" class="form-label">Image</label>
                  <img src="../images1/<?php if (isset($post_image)){echo $post_image;} ?>" class="form-control" style="width: 70px;">
                  <input type="file" class="form-control" name="post_image">
                  <div style="padding-top:10px;"> <input type="submit" class="btn btn-primary" name="update" value="Update Post"></div>
            <?php  }
            } ?>


      </div>
      </form>
   </div>
</div>
</div>
<?php include 'footer.php' ?>