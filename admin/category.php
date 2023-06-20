<?php include 'header-dash.php' ?>
<?php include 'db.php' ?>
<?php

if (isset($_GET['delete'])) {
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM category WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($conn, $query);
}


?>


<div class="container">
    <div class="row">
        <div class="col-md-6">

            <?php insert_category(); ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="text" class="form-label">Add Category</label>
                    <input type="text" class="form-control" name="cat_name">
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
            </form>

            <form action="" method="post">
                <div class="mb-3">

                    <?php

                    if (isset($_GET['edit'])) {
                        $cat_id = $_GET['edit'];
                        $query = "SELECT * FROM category WHERE cat_id = $cat_id";
                        $select_all_category_query_id = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($select_all_category_query_id)) {
                            $cat_id =  $row['cat_id'];
                            $cat_name = $row['cat_name'];

                    ?>

                            <div style="padding-top:10px"><input value="<?php if (isset($cat_name)) {
                                                                            echo $cat_name;
                                                                        } ?>" type="text" class="form-control" name="cat_name"></div>
                            <div style="padding-top:10px"><input type="submit" class="btn btn-primary" name="update" value="Update Category"></div>
                    <?php  }
                    } ?>

                    <?php

                    if (isset($_POST['update'])) {
                        $the_cat_name = $_POST['cat_name'];
                        $query = "UPDATE category SET cat_name = '{$the_cat_name}' WHERE cat_id={$cat_id}";
                        $update_query = mysqli_query($conn, $query);
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
                        <th>Category-name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>


                    <?php findeAllCat(); ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

<?php require 'footer.php' ?>