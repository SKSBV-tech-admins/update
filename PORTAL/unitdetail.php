<?php
include('../setup.php');
include('../session.php');

$user=mysqli_query($con, "SELECT * from admins where id='$session_id'")or die('Session logged out');
$userrow=mysqli_fetch_array($user);

if (isset($_POST['unitskimvb'])) {
  $sksbvregno=$_POST['mid'];
  $numrow=mysqli_query($con, "SELECT count(*) FROM unitregister where madno='$sksbvregno'");
  $numrowarray=mysqli_fetch_array($numrow);
  $num=$numrowarray['count(*)'];
  if ($num==0) {
    echo "<script>
    alert('Madrassa with registration number $sksbvregno not found! Please enter a valid SKIMVB register number.');
    window.location.href='unitregistrationdashboard.php';
    </script>";
  }else {
    $data=mysqli_query($con, "SELECT * FROM unitregister where madno='$sksbvregno'");
    $unitdata=mysqli_fetch_array($data);
    $madreg=$unitdata['madno'];
    $madname=$unitdata['madname'];
    $sksbvreg=$unitdata['sksbvregno'];
    $place=$unitdata['place'];
    $range=$unitdata['range'];
    $rangeno=$unitdata['rangeno'];
    $district=$unitdata['district'];
    $phone=$unitdata['phone'];
  }

}


?>
<html>
  <head>
    <title>SKSBV|UPDATE - 2k19</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
      <style>
          .row{
              padding: 1%;
          }
      </style>
  </head>
  <body>
    <?php include('navigation.php');?>
    <div class="rel">
    <div class="content">
      <h3>UNIT DETAILS</h3><br><br>
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
                <font color="white" size=4><b>SKSBV REGISTER NUMBER</b></font>
            </div>
              <div class="col-sm-3"><font color="white" size=4><b>: <?php echo $sksbvreg;?></font></b>
              </div>
          </div>

          <div class="row">
            <div class="col-sm-3">
                <font color="white">SKIMVB REGISTER NUMBER  </font></div>
              <div class="col-sm-3">
                  : <?php echo $madreg;?>
              </div>
          </div>
            <div class="row">
                <div class="col-sm-3">
                    <font color="white">NAME OF MADRASSA</font>
                </div>
                <div class="col-sm-3">
                   : <?php echo $unitdata['madname'];?>
                </div>
              <br>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <font color="white">PLACE</font>
                </div>
                <div class="col-sm-3">
                    : <?php echo $unitdata['place'];?>
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <font color="white">RANGE REG. NUMBER</font>
                </div>
                <div class="col-sm-3">
                    : <?php echo $unitdata['rangeno'];?>
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <font color="white">RANGE</font>
                </div>
                <div class="col-sm-3">
                    : <?php echo $unitdata['range'];?>
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <font color="white">PHONE NUMBER</font>
                </div>
                <div class="col-sm-3">
                    : <?php echo $unitdata['phone'];?>
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <font color="white">DISTRICT</font>
                </div>
                <div class="col-sm-3">
                    : <?php echo $unitdata['district'];?>
                </div>
                <br>
            </div>
        </div>
    </div>
    </div>
  </body>
</html>
