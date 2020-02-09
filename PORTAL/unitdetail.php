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
    $stat=$unitdata['status'];
    $remark = $unitdata['remark'];
  }

}


?>
<html>
  <head>
    <title>SKSBV|UPDATE - 2k19</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
      <script src="https://kit.fontawesome.com/01c15ec4f8.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include('navigation.php');?>

        <div class="slip">
            <p><?php
            if($stat=="INACTIVE"){
                echo "<div id='status' style='background: orange;'><i class=\"fas fa-exclamation fa-3x\"></i><br>$stat</div>";
            }elseif ($stat == "ACTIVE"){
                echo "<div id='status' style='background: green;'><i class=\"far fa-check-circle fa-3x\"></i><br>$stat</div>";
            }elseif ($stat == "BLOCKED"){
                echo "<div id='status' style='background: red;'><i class=\"fas fa-skull-crossbones fa-3x\"></i><br>$stat</div>";
            }?></p>
            <h1><?php echo $sksbvreg; ?></h1>
            <h4><?php echo $madname; ?></h4>
            <h5><?php echo $place; ?></h5>
            <p>SKIMVB Register Number: <?php echo $madreg; ?></p>
            <p>RANGE : <?php echo $range." - ".$rangeno; ?></p>
            <p>DISTRICT : <?php echo $district;?></p>
            <p>REMARK : <?php echo $remark;?></p><br>
            <p><a href="unitupdate.php?id=<?php echo $sksbvreg;?>"><button class="button">UPDATE</button></a></p>

        </div>
  </body>
</html>
