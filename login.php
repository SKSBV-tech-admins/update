<?php include('setup.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
input[type='password']{
  background: transparent url("img/pass.jpg") no-repeat;
  background-position: 10px 50%;
}
input[type='text']{
  background: transparent url("img/user.jpg") no-repeat;
  background-position: 10px 50%;

}
</style>
</head>
<body>
    <div class="form-wrapper">

      <form action="loginsetup.php" method="post">
        <h3>Admin Login</h3>

        <div class="form-item">
		        <input type="text" name="user" placeholder="Username" required></input>
        </div>

        <div class="form-item">
		        <input type="password" name="pass"placeholder="Password" required></input>
        </div>

        <div class="button-panel">
		        <input type="submit" class="button" title="Log In" name="login" value="Login"></input>
        </div>
        <div style="text-align: center;">
            <a href = "http://www.sksbvstate.com" style = "text-decoration: none;color:goldenrod;font-size: 1.2em">BACK TO HOME</a>
        </div>

      </form>

      </div>

</body>
</html>
