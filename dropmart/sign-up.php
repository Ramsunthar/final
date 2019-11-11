<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include "imports.php"; ?>
<script type="text/javascript">

function validateUserName()
{
  var uName = document.getElementById("txtuname").value;
  if(uName== "" || uName==null)
  {
    alert("please enter  the correct user name");
    return false;
  }
  return true;
}

function validateEmail()
{
  var email = document.getElementById("txtemail").value;
  var at=email.indexOf("@");
  var dt=email.lastIndexOf(".");
  var len=email.length();

  if((at < 2) || (dt - at < 2) || (len - dt < 2))
  {
    alert("Please enter a valid email address");
    return false;
  }
  return true;
}

function validatePassword()
{
  var pwd = document.getElementById("txtpwd").value;
  var cpwd = document.getElementById("txtcpwd").value;
  if((pwd.length < 5) || (pwd != cpwd))
  {
    alert("Please enter a correct password and enter to confirm password");
    return false;
  }
  return true;
}

function validatePhoneNO()
{
  var cno = document.getElementById("txtpnumber").value;
  if((isNaN(cno))||(cno.length!=10))
  {
    alert("please enter the valid contact number")
    return false;
  }
  return true;
}

function validate()
{
  if(validateUserName() &&  validateEmail() && validatePassword() && validatePhoneNO())
  {
    alert("account has been created")
  }
  else
  {
    event.preventDefault();
  }
}

</script>
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Sign Up</title>
  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  </style>
  <link href="login.css" rel="stylesheet">
</head>
<body>

  <form class="form-signin" method="post" action="sign-up.php">
    <div class="text-center mb-4">
      <img class="mb-4" src="https://via.placeholder.com/100x100.png?text=Logo" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
    </div>
    <div class="text-center mb-4">
      <div class="form-label-group">
        <label for="usrname">Username</label>
        <input type="text" class="form-control" id="txtuname" name="txtuname" placeholder="Email address" required autofocus>
      </div>

      <div class="form-label-group">
        <label for="txtemail">Email</label>
        <input type="email" class="form-control" id="txtemail" name="txtemail">
      </div>

      <div class="form-label-group">
        <label for="pwd">Password</label>
        <input type="password" class="form-control" id="txtpwd" name="txtpwd">
      </div>

      <div class="form-label-group">
        <label for="cpwd">Confirm Password</label>
        <input type="password" class="form-control" id="txtcpwd" name="txtcpwd">
      </div>

      <div class="form-label-group">
        <label for="location">Address</label>
        <input type="text" class="form-control" id="txtlocation" name="txtlocation">
      </div>


      <div class="form-group text-center">
        <input type="submit" class="btn btn-lg btn-warning btn-block mt-3" value="Register" name="submit" id="submit" onClick="validate()">
      </div>

      <div class="checkbox mt-3">
        <label>
          <a href="login.php">Already A User</a>
        </label>
      </div>
      <p class="mt-5 mb-3 text-muted text-center"><a href="index.php" class="text-muted">&larr; Go To Home</a></p>
    </div>


  </form>
  <?php

  if(isset($_POST["submit"]))
  {
    $email = $_POST["txtemail"];
    $fullName = $_POST["txtuname"];
    $password = $_POST["txtpwd"];
    $addr=$_POST["txtlocation"];

    include "dbconfig.php";



    $sql = "INSERT INTO `customer` (`id`, `email`, `name`, `address`, `password`) VALUES (NULL,'".$email."','".$fullName."','".$addr."','".$password."');";
    mysqli_query($con,$sql);

  }

  ?>
</body>
</html>
