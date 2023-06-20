<?php include 'header-dash.php' ?>
<?php include 'db.php' ?>



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <?php
                if (isset($_GET['edit'])) {
                    $about_id = $_GET['edit'];
                    $query = "SELECT * FROM  aboutus WHERE about_id = $about_id";
                    $select_about = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($select_about)) {
                        $about_id =  $row['about_id'];
                        $about_info = $row['about_info'];

                ?>
                        <textarea class="form-control" name="about_info" id="" cols="20" rows="9"><?php if (isset($about_info)) {
                                                                                                        echo $about_info;
                                                                                                    } ?></textarea>
                        <div style="padding-top:10px"><input type="submit" class="btn btn-primary" name="update" value="Update AboutUS"></div>
                <?php }
                } ?>
                <?php

                if (isset($_POST['update'])) {
                    $the_about_info = $_POST['about_info'];
                    $query = "UPDATE aboutus SET about_info = '{$the_about_info}' WHERE about_id={$about_id}";
                    $update_query = mysqli_query($conn, $query);
                }


                ?>
            </form>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>About-Info</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php displayAbout(); ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include 'footer.php' ?>