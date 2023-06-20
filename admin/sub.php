<?php include 'header-dash.php' ?>
<?php include 'db.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php findAllSubs();?>

            </tbody>
        </table>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>