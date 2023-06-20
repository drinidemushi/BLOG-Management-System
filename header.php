<?php session_start()?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h6 class="blog1">BLOG MANAGEMENT SYSTEM</h6>
                </div>
                <div class="col-md-8">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog1.php">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About US</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="contact.php">Contact Us</a>
                                </li>
                                <?php
                                 if(!isset($_SESSION['username'])){
                                    
                                
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link " href="login.php">Log in</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="register.php">Register</a>
                                </li>
                                 <?php } 
                                 
                                 else{?>
                                 <li class="nav-item">
                                    <a class="nav-link " href="logout.php">Log out</a>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </nav>
               </div>
            </div>
        </div>
    </section>