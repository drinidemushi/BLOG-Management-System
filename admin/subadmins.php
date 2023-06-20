<?php include 'header-dash.php' ?>
<?php include 'db.php' ?>
<?php insert_subadmins(); ?>
<?php

if (isset($_GET['delete'])) {

  if($_SESSION['role']=='admin'){
    $id = $_GET['delete'];
    $query = "DELETE FROM user WHERE id = '$id'";
    $delete_query = mysqli_query($conn, $query);
  }
  else{
    echo "Only admin can delete a user ";
  }
}

?>

<div class="container">

  <div class="row">
    <div class="col-md-6">

      <form action="" method="post">
        <div class="mb-3">
          <label for="text" class="form-label">Username</label>
          <input type="text" class="form-control" name="username">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
          <label for="text" class="form-label">Role</label>
          <input type="text" class="form-control" name="role">
        </div>
        <input type="submit" class="btn btn-primary" name="adduser" value="Add User">
      </form>

      <form action="" method="post">
        <div class="mb-3">
          <?php

          if (isset($_GET['edit'])) {
            if($_SESSION['role']=='admin'){
            $id = $_GET['edit'];
            $query = "SELECT * FROM user WHERE id = '$id'";
            $select_all_user_query_id = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($select_all_user_query_id)) {
              $username = $row['username'];
              $email = $row['email'];
              $password = $row['password'];
              $role = $row['role'];

          ?>
              <label for="text" class="form-label">Username</label>
              <input value="<?php if (isset($username)) {
                              echo $username;
                            } ?>" type="text" class="form-control" name="username">
              <label for="email" class="form-label">Email</label>
              <input value="<?php if (isset($email)) {
                              echo $email;
                            } ?>" type="email" class="form-control" name="email">
              <label for="password" class="form-label">Password</label>
              <input value="<?php if (isset($password)) {
                              echo $password;
                            } ?>" type="password" class="form-control" name="password">
                             <label for="text" class="form-label">Role</label>
              <input value="<?php if (isset($role)) {
                              echo $role;
                            } ?>" type="text" class="form-control" name="role">
              <div style="padding-top:10px;"> <input type="submit" class="btn btn-primary" name="update" value="Update User"></div>
          <?php  }
          }} ?>

          <?php if (isset($_POST['update'])) {
            $the_username = $_POST['username'];
            $the_email = $_POST['email'];
            $the_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $the_role = $_POST['role'];


            $query = "UPDATE user SET username = '$the_username', email = '$the_email', 
                              password = '$the_password' , role = '$the_role' WHERE id = '$id'";
            $update_query = mysqli_query($conn, $query);
          } ?>
        </div>
      </form>

    </div>
  </div>
  <div class="row">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <!-- <th>Password</th> -->
          <th>Role</th>
          <th>Delete</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php findAllSubadmins(); ?>

      </tbody>
    </table>
  </div>
</div>

</div>
<?php include 'footer.php' ?>