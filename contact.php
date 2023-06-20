<?php include "header.php" ?>
<?php include 'admin/db.php'?>
<?php

global $conn;
$query = "SELECT * FROM contact ";
$select_contact = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($select_contact) ){
    $cont_add=  $row['cont_add'];
    $cont_nr=  $row['cont_nr'];
    $cont_email=  $row['cont_email'];
}
?>
<div class="container-fluid">
    <div class="row R3">
        <div class="col-md-6">
            <div class="text-c">
            <h4>Contact Us</h4>
            <p>we love conversations , lets us talk!</p>
            <p>Address : <?php echo $cont_add?></p>
            <p>Phone Number : <?php echo $cont_nr?></p>
            <p>Email-id : <?php echo  $cont_email ?></p>
            </div>
        </div>
        <div class="col-md-6">
             <img src="images/OIP2.jpg"  class="oip" alt="">
        </div>
    </div>
</div>




<?php include "footer.php"?>