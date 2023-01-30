
<?php include "../connect.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $select_user = "SELECT * FROM user WHERE email = '$email' AND status = 1";
    $result = mysqli_query($con,$select_user);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        $otp = rand(1,99999); //for random number
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
        $update_otp = "UPDATE user SET otp = '$otp' WHERE id=$user_id";
        $query = mysqli_query($con,$update_otp);
        if($query){
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user_id;
        header('location:verify.php'); 

    }
    else{
        $e_msg = "Otp not updated";
    }
}
else{
        $msg = "Your enter email doesnot exist!";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container justify-content" style="width:500px; height:100px; padding:90px 400px;">
        <form action="" method="post">
        

            <div class="imgcontainer">
                <img src="img/anjali.jpg" alt="Avatar" class="avatar">
            </div>
            <span class="text-danger"><?= @$msg ?> </span>
            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <!-- <label for="pass"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pass" required> -->

                <button  name="submit" type="submit">Enter</button>
                
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="forget_pass.php">password?</a></span> -->
            </div>
        </form>
    </div>
</body>

</html>

<!-- <html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.foot li{
			list-style: none;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-primary sticky-top">
		<div class="container-fluid">
			<a  class="navbar-brand text-white" href="">Anjali Sharma</a>
			<button type="	button"	 class="	navbar-toggler"	data-bs-toggle="collapse" data-bs-target="#ab">
			<span class="	navbar-toggler-icon">	</span>	</button>
			
		</div>
	</nav>
    <br><br>
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <span class="text-danger"><?=@$msg;?></span>
            <div class="col-md-4">
                <label for="">Email </label>
                <input class="form-control" type="email" name="email" placeholder="enter your valid email">
            </div>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" name="submit">     
        </form>
    </div>
</body>
</html> -->