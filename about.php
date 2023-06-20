<?php include "header.php" ?>
<?php include 'admin/db.php'?>
<?php include "admin/functions.php" ?>

<?php 
global $conn;
$query = "SELECT * FROM aboutus ";
$select_about = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_about) ){
       
        $about_info=  $row['about_info'];
       
    }

?>
<div class="container">
    <div class="row">
        <div class="text-lor">
            <h3>About US</h3>
            <p><?php echo "$about_info"?></p>
        </div>
    </div>
</div>



<?php include "footer.php"?>