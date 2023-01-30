
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container justify-content" style="width:500px; height:100px;  padding:90px 400px;">
    <?php
  

    ?>
        <form class="login-form" action="login.php" method="POST">
            <div class="imgcontainer">
                <img src="img\login.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
            <label for="email"><b>User Name</b></label>
                <input type="text" placeholder="Enter your user name" name="username" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button  name="submit" value="Login" type="submit">Login</button>

                
            </div>

            <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn"><a href="../index.php" style="text-decoration: none; color:#f1f1f1;">Cancel</a></button>

                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>
   
</body>

</html>