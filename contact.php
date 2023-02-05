<?php
include("header.php"); 
?>

<h3 class="text-center">Contact With Us</h3>

<div class="container">
  <form action="/action_page.php" id="myform">
    <label for="fname"> Name</label>
    <input type="text" name="username" id="username" required>

    <label for="lname">Email</label><br>
    <input type="email" name="email" id="email" required>
<br>
  

    <label for="subject">Message</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
<script>
   $(document).ready(function() {
  $("#myform").submit(function(e) {
    e.preventDefault();
    var username = $("#username").val();
    var email = $("#email").val();

    // Validate username
    if (!username) {
      alert("Please enter your username");
      return false;
    } else if (!/^[a-zA-Z]+$/.test(username)) {
      alert("Username must contain only alphabetic characters");
      return false;
    }

    // Validate email
    if (!email) {
      alert("Please enter your email");
      return false;
    } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
      alert("Email must be a valid email address (e.g. something@gmail.com)");
      return false;
    }

    // If the form is valid, submit it to the server
    // ...
  });
});

</script>

</body>
</html>
