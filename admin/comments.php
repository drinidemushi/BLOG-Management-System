<?php include 'header-dash.php' ?>
<?php include 'db.php' ?>
<?php
handleRequstesComment();

?>
<div class="container">
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Approve</th>
                    <th>Unapprove</th>
                </tr>
            </thead>
            <tbody>
                <?php findAllCom(); ?>
            </tbody>
        </table>
    </div>


    <?php include 'footer.php' ?>