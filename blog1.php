<?php include "header.php" ?>
<?php include "admin/db.php" ?>
<?php include "admin/functions.php" ?>
<?php
if (isset($_POST['submit'])) {
    $subscribers_email = $_POST['subscribers_email'];
    
    $query = "INSERT INTO subscribers  (subscribers_email) VALUE ('$subscribers_email')";
    $seubs_query = mysqli_query($conn, $query);
}

?>
<?php
global $conn;
$query = "SELECT * FROM post ";
$select_all_post_query = mysqli_query($conn, $query);

// Check if any posts are found
if (mysqli_num_rows($select_all_post_query) > 0) {
    while ($row = mysqli_fetch_assoc($select_all_post_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_details = $row['post_details'];
        $post_image = $row['post_image'];
        $cat_id = $row['cat_id'];
        $sub_id = $row['sub_id'];

        // Retrieve category name
        $category_query = "SELECT cat_name FROM category WHERE cat_id = $cat_id";
        $category_result = mysqli_query($conn, $category_query);
        $category_row = mysqli_fetch_assoc($category_result);
        $category_name = $category_row['cat_name'];

        // Retrieve subcategory name
        $subcategory_query = "SELECT sub_name FROM subcategory WHERE sub_id = $sub_id";
        $subcategory_result = mysqli_query($conn, $subcategory_query);
        $subcategory_row = mysqli_fetch_assoc($subcategory_result);
        $subcategory_name = $subcategory_row['sub_name'];



?>

        <div class="container">
            <div class="row">
                <div class="info">
                    <h2><a href="singlepost.php?post_id=<?php echo $post_id;?>"><?php echo $post_title; ?></a></h2>
                    <p><?php echo  $post_date; ?></p>
                    <p><?php echo $category_name; ?></p>
                    <p><?php echo  $subcategory_name ?></p>
                    <img src='images1/<?php echo $post_image; ?>' alt='' style='width: 200px;'>
                    <p><?php echo $post_details; ?></p>
                    <hr>

                    <form action="" method="POST">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="text" class="form-label">Email</label>
                                <input type="email" class="form-control" name="subscribers_email">
                            </div>
                            </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Subscribe" style="margin-top: 10px;">
                    </form>
                </div>
            </div>
        </div>
<?php   }
} ?>


<?php include "footer.php" ?>