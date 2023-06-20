<?php include 'header-dash.php'; ?>
<?php include 'db.php'?>
<?php 
 global $conn;
 $query = "SELECT * FROM category ";
 $select_category_query = mysqli_query($conn, $query);
 $row_count = mysqli_num_rows($select_category_query);

 $query = "SELECT * FROM subcategory ";
 $select_subcategory_query = mysqli_query($conn, $query);
 $row_count_sub = mysqli_num_rows($select_subcategory_query);

 $query = "SELECT * FROM subscribers ";
 $select_Subs = mysqli_query($conn,$query);
 $row_count_subscribers = mysqli_num_rows( $select_Subs );

 $query = "SELECT * FROM user WHERE role='subadmin'";
 $select_all_user_query = mysqli_query($conn, $query);
 $row_count_subadmins = mysqli_num_rows( $select_all_user_query);
?>

<div class="container">
    <div class="row">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Categories <?php echo $row_count?> </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Subcategories <?php echo $row_count_sub?>  </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Subscribers  <?php echo $row_count_subscribers?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">


                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Subadmins <?php echo $row_count_subadmins?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>