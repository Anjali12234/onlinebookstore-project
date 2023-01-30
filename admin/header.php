<?php
include "connect.php";
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('location:../userlogin/login_form.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="book/style.css">
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="jquery-3.6.3.min.js"></script>

    <style type="text/css">
        .foot li {
            list-style: none;
        }
    </style>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        /* Fixed sidenav, full height */
        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        /* Style the sidenav links and the dropdown button */
        .sidenav a,
        .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }

        /* On mouse-over */
        .sidenav a:hover,
        .dropdown-btn:hover {
            color: #f1f1f1;
        }

        /* Main content */
        .main {
            margin-left: 200px;
            /* Same as the width of the sidenav */
            font-size: 20px;
            /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        /* Add an active class to the active dropdown button */
        .active {
            background-color: green;
            color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: #262626;
            padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }

        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>




</head>

<body>

    <! -----------Navbar----------!>
        <nav class="navbar navbar-expand-lg bg-dark sticky-top">
            <div class="container-fluid">
                <a style="color:aliceblue" class="navbar-brand" href="index.php">Online BookStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                       
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="sidenav">
            <a href="dashboard.php">Online Book Store</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="category/category.php">Category</a>
            <a href="author/author.php">Author</a>
            <a href="book\book.php">Books</a>
            <a href="#contact">Contact</a>
            <button class="dropdown-btn">Setting
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="../userlogin/logout.php">Logout</a>
                <a href="login/forget_pass.php">Forget Password</a>
                <a href="#">Link 3</a>
            </div>
            <a href="#contact">Search</a>
        </div>



</body>

</html>