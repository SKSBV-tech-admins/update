<?php include('setup.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper">

  <form action="loginsetup.php" method="post">
    <h3>Admin Login</h3>
<br><font color=red>Username or password is incorrect!</font><br>
    <div class="form-item">
        <input type="text" name="user" placeholder="Username" required></input>
    </div>

    <div class="form-item">
        <input type="password" name="pass"placeholder="Password" required></input>
    </div>

    <div class="button-panel">
        <input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>

  </div>

</body>
</html>
