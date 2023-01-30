
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
    <h2 style="text-align: center; color:crimson;">Register </h2>
        <form action="register.php" method="post">

            <div class="container">
                <label for="user_name"><b>User Name</b></label>
                <input class="form-control" type="text" placeholder="Enter unique user name" name="username" required>

                <label for="email"><b>Email</b></label>
                <input class="form-control" type="text" placeholder="Enter Email" name="email" required>

                <label for="address"><b>Address</b></label>
                <input class="form-control" type="text" placeholder="Enter your  address" name="address" required>

                <label for="phone_number"><b>Phone Number</b></label><br>
                <input class="form-control" type="text" placeholder="Enter your mobile number" name="phone_number" required><br>

                <label for="psw"><b>Password</b></label>
                <input class="form-control" type="password" placeholder="Enter Password" name="password" required>

                <button type="submit bg-danger " value="Register" >SignUp</button>
                <br>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" class="cancelbtn"><a href="../index.php" style="text-decoration: none; color:#f1f1f1;">Cancel</a></button>
                    <span class="psw">Already have account <a href="login_form.php">Login</a></span>
                </div>



            </div>


    </div>
    </form>
    </div>
</body>

</html>