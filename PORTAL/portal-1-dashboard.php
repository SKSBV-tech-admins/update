<?php
include('../setup.php');
include('../session.php');

$user=mysqli_query($con, "SELECT * from admins where id='$session_id'")or die('Session logged out');
$userrow=mysqli_fetch_array($user);

 ?>
<html>
  <head>
    <title>SKSBV|UPDATE - 2k19</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>

    <?php include('navigation.php');?>
  <div class="rel">
      <div class="content">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">Overview</div>
                          <div class="panel-body" style="font-size: x-large;color: goldenrod">
                              <div class="alert alert-info" style="font-size: x-large;">
                                  TOTAL UNITS REGISTERED :
                                  <?php
                                  $query = mysqli_query($con,"SELECT * FROM unitregister");
                                  $numb = mysqli_num_rows($query);
                                  echo "$numb";
                                  ?>
                              </div>
                              <div class="alert alert-success" style="font-size: x-large;">
                                  UPDATED UNITS :
                                  <?php
                                  $query = mysqli_query($con,"SELECT * FROM unitregister WHERE status='ACTIVE'");
                                  $numb = mysqli_num_rows($query);
                                  echo "$numb";
                                  ?>
                              </div>
                              <div class="alert alert-warning" style="font-size: x-large;">
                                  PENDING UNITS :
                                  <?php
                                  $query = mysqli_query($con,"SELECT * FROM unitregister WHERE status='INACTIVE'");
                                  $numb = mysqli_num_rows($query);
                                  echo "$numb";
                                  ?>
                              </div>
                              <div class="alert alert-danger" style="font-size: x-large;">
                                  BLOCKED UNITS :
                                  <?php
                                  $query = mysqli_query($con,"SELECT * FROM unitregister WHERE status='BLOCKED'");
                                  $numb = mysqli_num_rows($query);
                                  echo "$numb";
                                  ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

      </div>
  </div>
  </body>
</html>