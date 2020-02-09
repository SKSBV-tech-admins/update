<?php
session_start();
include('setup.php');
if (isset($_POST['login']))
  {
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

        $query 		= mysqli_query($con, "SELECT * FROM admins WHERE username='$username'");
        $row		= mysqli_fetch_array($query);
        $num_row 	= mysqli_num_rows($query);

    if ($num_row > 0)
      {
        if (password_verify($password,$row['password'])){
          $_SESSION['user_id']=$row['id'];
          $_SESSION['user_msg']='';
          header('location:PORTAL/portal-1-dashboard.php');
        }
        else
        {
          header('location: loginerror.php');
        }
      }
    else{
      echo "<script>alert('User not found');</script>";
      header('location: login.php');
    }


  }
?>
