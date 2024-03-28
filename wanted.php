<?php
$website=$_SERVER['SERVER_NAME'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">

    <title>Ads from businesses direct to you</title>
    <style>
#website:first-letter {
   /* text-transform: uppercase;*/
}
.slide1 {
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4));
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.slide2 {
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4));
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.users{
    display: block;
}

    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/" id="website"></a><img src="./img/logo.png" style='width:150px;'/>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="advertisers.php">Advertisers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="follow.php">Following</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target='_blank' href="map.php">Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target='_blank' href="wanted.php">Wanted</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact</a>
                    </li>
                   
                </ul>
               
                <a href="login.php"  class="btn btn-brand ms-lg-3">Login</a>
                 <a href="register.php"  class="btn btn-brand ms-lg-3">Register</a>
            </div>
        </div>
    </nav>



