<?php include 'header-dash.php' ?>
<?php include 'db.php' ?>



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <?php
                if (isset($_GET['edit'])) {
                    $cont_id = $_GET['edit'];
                    $query = "SELECT * FROM  contact WHERE cont_id = $cont_id";
                    $select_cont = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($select_cont)) {
                        $cont_id =  $row['cont_id'];
                        $cont_add= $row['cont_add'];
                        $cont_nr= $row['cont_nr'];
                        $cont_email= $row['cont_email'];

                ?>
                         <label for="text" class="form-label">Address</label>
              <input value="<?php if (isset($cont_add)) {
                              echo $cont_add;
                            } ?>" type="text" class="form-control" name="cont_add">
                              <label for="number" class="form-label">Phone Number</label>
              <input value="<?php if (isset($cont_nr)) {
                              echo $cont_nr;
                            } ?>" type="text" class="form-control" name="cont_nr">
              <label for="email" class="form-label">Email</label>
              <input value="<?php if (isset($cont_email)) {
                              echo $cont_email;
                            } ?>" type="email" class="form-control" name="cont_email">
            
                        <div style="padding-top:10px"><input type="submit" class="btn btn-primary" name="update" value="Update ContactUS"></div>
                <?php }
                } ?>
                <?php

                if (isset($_POST['update'])) {
                    $cont_add=  $_POST['cont_add'];
                    $cont_nr=  $_POST['cont_nr'];
                    $cont_email=  $_POST['cont_email'];
                    $query = "UPDATE contact SET cont_add = '$cont_add', cont_nr = '$cont_nr', cont_email = '$cont_email' WHERE cont_id ={$cont_id}";
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
                        <th>Address</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php displayCon(); ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include 'footer.php' ?>