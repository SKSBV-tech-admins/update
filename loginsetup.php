<?php
session_start();
include('setup.php');
if (isset($_POST['login']))
  {
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

        $query 		= mysqli_query($con, "SELECT * FROM admins WHERE  password='$password' and username='$username'");
        $row		= mysqli_fetch_array($query);
        $num_row 	= mysqli_num_rows($query);

    if ($num_row > 0)
      {
      $_SESSION['user_id']=$row['id'];
      header('location:PORTAL/portal-1-dashboard.php');
      }
    else
      {
        header('location: loginerror.php');
      }
  }
?>
