<?php include "header.php" ?>
<?php include "admin/db.php" ?>
<?php include "admin/functions.php" ?>

<?php

global $conn;
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Retrieve the post details based on the provided post ID
    $query = "SELECT * FROM post WHERE post_id = $post_id";
    $select_post_query = mysqli_query($conn, $query);


// Check if any posts are found
if (mysqli_num_rows($select_post_query) > 0) {
    while ($row = mysqli_fetch_assoc($select_post_query)) {
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


        $comment_query = "SELECT comment_message FROM comments WHERE comment_status='APPROVED' AND  post_id = '{$post_id}'";
        $comment_result = mysqli_query($conn, $comment_query);
        
        
  

?>

        <div class="container">
            <div class="row">
                <div class="info">
                    <h2><?php echo $post_title; ?></h2>
                    <p><?php echo  $post_date; ?></p>
                    <p><?php echo $category_name; ?></p>
                    <p><?php echo  $subcategory_name ?></p>
                    <img src='images1/<?php echo $post_image; ?>' alt='' style='width: 200px;'>
                    <p><?php echo $post_details; ?></p>
                    <hr> 
                    <?php
                        
                        while ($com_row = mysqli_fetch_assoc($comment_result)) {
                            $comment_message = $com_row['comment_message'];
                            echo "<p>Comment: $comment_message</p>";
                        }
                        ?>

        </div>
<?php }}}?>

<?php include "footer.php" ?>