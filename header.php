<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Book Recomendation Application</title>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <style></style>
  <script type='text/javascript' src='script.js'></script>
  <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
  <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="jquery-3.6.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
  </script>
  <style>
    .dropbtn {
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }



    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      overflow: auto;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown a:hover {
      background-color: #ddd;
    }

    .show {
      display: block;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row ">
      <div class="col-md-1  ">
        <a class="navbar-brand" href="index.php">
          <img class="img" src="img\book.png" width="100" height="100" alt="">
        </a>
      </div>
      <div class="col-md-3 ">
        <br><br>
        <a class="navbar-brand text-success text-left  " href="index.php">Online BookStore</a>
      </div>


      <div class="col-md-6">

        <div class="container-fluid">

          <li type="none" style="float:right;"><i class="fas fa-phone-alt text-success mr-3"></i>Contact</li>
          <br><br>
          <input class="form-control" type="text" id="search-input" placeholder="Search Book Name">
          <div id="search-results"></div>
        </div>

      </div>
      <?php

      session_start();
      if (isset($_SESSION['loggedin'])) {
      ?>
        <div class="col-md-2 ">
          <div class="dropdown mt-3 ">

            <button onclick="myFunction()" class="dropbtn text-danger"><?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];
                                                                        } ?></button>
            <div id="myDropdown" class="dropdown-content">
              <a href="userindex.php">User Index</a>
              <a href="#about">Recommendation</a>
              <a href="userlogin/logout.php">Logout</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>


  <nav class="navbar  navbar-expand-lg  navbar-dark bg-success">
    <div class="container-fluid" style="padding-left: 20px;">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <?php
        if (isset($_SESSION['loggedin'])) {
          $user_id = $_SESSION["user_id"];
          $query = "SELECT * FROM userlogin WHERE user_id='$user_id'";
          $result = mysqli_query($con, $query);
          $user = mysqli_fetch_assoc($result);
        ?>
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <h5><a class="nav-link active" aria-current="page" href="index.php">Home</a></h5>
            </li>
            <li class="nav-item">
              <h5><a class="nav-link active" href="favourite.php">My library</a></h5>
           </li>

            <li class="nav-item">
              <h5> <a class="nav-link active">Contact</a></h5>
            </li>
          </ul>
        <?php
        } else {
          echo '<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <h5><a class="nav-link active" aria-current="page" href="index.php">Home</a></h5>
          </li>
          <!-- <li class="nav-item">
            <h5><a class="nav-link active" href="product.php">Product</a></h5>
          </li> -->

          <li class="nav-item">
            <h5> <a class="nav-link active">Contact</a></h5>
          </li>
        </ul>';
        }
        ?>
        
        <?php
        if (!isset($_SESSION['loggedin'])) {
        ?>
          <a href="userlogin/register_form.php"><button class="btn btn-light" style="float:right;">SignUp</button></a>
          <a href="userlogin/login_form.php"><button class="btn btn-light ml-2" style="float:right;">Login</button></a>

        <?php
        }
        ?>


      </div>

    </div>
  </nav>

  <script>
    $(document).ready(function() {
      $('#search-input').on('keyup', function() {
        var search = $(this).val();

        $.ajax({
          type: 'GET',
          url: 'search.php',
          data: {
            search: search
          },
          success: function(data) {
            $('#search-results').html(data);
          }
        });
      });
    });
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>