<?php include "header.php"?>
<?php include "admin/db.php"?>
<?php
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $userpass = $_POST['password'];
  
  $query = "SELECT password , role from user WHERE username = '$username'";
   $passquery = mysqli_query($conn,$query);
   $row = mysqli_fetch_assoc($passquery);
   if(password_verify( $userpass, $row['password'])){
         
      $_SESSION['username'] =  $username;
      $_SESSION['role'] = $row['role'];
      if(   $_SESSION['role'] == 'subadmin' ||  $_SESSION['role'] == 'admin' ){
        header('Location: admin/dashboard.php');
      }
      else{
        header('Location: blog.php');
      }
   }
}

?>
<form action="" method="post">
  <div class="center">
  <div class="mb-3">
    <label for="text" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>

</form>



