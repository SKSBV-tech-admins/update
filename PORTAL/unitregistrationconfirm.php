<?php
include('../setup.php');
include('../session.php');

$user=mysqli_query($con, "SELECT * from admins where id='$session_id'")or die('Session logged out');
$userrow=mysqli_fetch_array($user);

if (isset($_POST['proceed'])) {
  $madno=$_POST['mid'];
  $numrow=mysqli_query($con, "SELECT count(*) FROM madregister where madno='$madno'");
  $numrowarray=mysqli_fetch_array($numrow);
  $num=$numrowarray['count(*)'];
  if ($num==0) {
    echo "<script>
    alert('Madrassa with registration number $madno not found! Please enter a valid SKIMVB register number.');
    window.location.href='unitregistration.php';
    </script>";
  }else {
    $verify=mysqli_query($con, "SELECT * FROM madregister where madno='$madno'");
    $verifydata=mysqli_fetch_array($verify);
  }

}


?>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SKSBV|UPDATE - 2k19</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <?php include('navigation.php');?>
    <div class="rel">
    <div class="content">
      <h3>UNIT REGISTRATION PORTAL</h3><br><br>
      <form action="#" method="post" id="unitreg">
        <div class="container">
          <div class="row">
            <div class="col-sm-9">
              <div class="alert alert-danger">
                PLEASE CHECK THE DETAILS AND CORRECT IF NEEDED.
                  <input type="number" class=form-control name=madreg
                         value="<?php echo $verifydata['madno'];?>" style="max-width:300;visibility: hidden;">
                  SKIMVB REGISTER NUMBER : <?php echo $verifydata['madno'];?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label for="sbvreg">SKSBV REGISTER NUMBER</label>
              <input type="number" class=form-control name=sbvreg
              placeholder="SKSBV REGISTER NUMBER" style="max-width:300;" required>
              <br>
            </div>
            <div class="col-sm-3">
              <label for="madrname">NAME OF MADRASSA</label>
              <input type="text" class=form-control name=madrname
              value="<?php echo $verifydata['madname'];?>" style="max-width:300;">
              <br>
            </div>
            <div class="col-sm-3">
              <label for="mplace">PLACE</label>
              <input type="text" class=form-control name=mplace
              value="<?php echo $verifydata['place'];?>" style="max-width:300;">
              <br>
            </div>
          </div>
          <div class=row>
            <div class="col-sm-3">
              <label for="mrangeno">RANGE REGISTER NUMBER</label>
              <input type="text" class=form-control name=mrangeno
              value="<?php echo $verifydata['rangeno'];?>" style="max-width:300;">
              <br>
            </div>
            <div class="col-sm-3">
              <label for="mrange">RANGE</label>
              <input type="text" class=form-control name=mrange
              value="<?php
              $rang = mysqli_fetch_array(mysqli_query($con,"SELECT *  FROM rangenames WHERE rno='$verifydata[rangeno]'" ));
              echo $rang['rname'];
              ?>"
                     style="max-width:300;">
              <br>
            </div>
            <div class="col-sm-3">
              <label for="mstatus">STATUS</label>
              <select class=form-control name="mstatus" required style="max-width:300;" form="unitreg">
                  <option selected value="INACTIVE">INACTIVE</option>
                  <option value="ACTIVE">ACTIVE</option>
                  <option value="BLOCKED">BLOCKED</option>
              </select>
              <br>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label for="mdistrict">DISTRICT</label>
                <input type="text" class=form-control name=mdistrict
                       value="<?php
                       $rang = mysqli_fetch_array(mysqli_query($con,"SELECT *  FROM rangenames WHERE rno='$verifydata[rangeno]'" ));
                       echo $rang['district'];
                       ?>"
                       style="max-width:300;">


              <br>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <input type="submit" name="submit" class=formbutton value="SUBMIT">
            </form>
            </div>
          </div>

  </body>
</html>
<?php

if (isset($_POST['submit'])) {
    $madreg=$_POST['madreg'];
    $sbvreg = $_POST['sbvreg'];
    $madname=$_POST['madrname'];
    $place=$_POST['mplace'];
    $range=$_POST['mrange'];
    $rangeno=$_POST['mrangeno'];
    $district=$_POST['mdistrict'];
    $status = $_POST['mstatus'];
    $mverify=mysqli_query($con, "SELECT count(*) FROM unitregister where madno='$madreg'");
    $mverifydata=mysqli_fetch_array($mverify);
    $number=$mverifydata['count(*)'];
    if ($number==0) {
        $submit="INSERT INTO unitregister (unitregister.sksbvregno,unitregister.madno,unitregister.madname,unitregister.place,
unitregister.range,unitregister.rangeno,unitregister.district,unitregister.status) VALUES
        ('$sbvreg','$madreg','$madname','$place','$range','$rangeno','$district','$status')";
        $que = mysqli_query($con, $submit);
        echo mysqli_error($con);
        if ($que ===TRUE) {
            $reg=mysqli_query($con, "SELECT sksbvregno FROM unitregister where madno='$madreg'");
            $regn=mysqli_fetch_array($reg);
            $regno=$regn['sksbvregno'];
            echo "<script>
             alert('$madname Registered Successfully ! SKSBV Register Number : $regno');
             window.location.href='unitregistration.php';
             </script>";
        }else {
            echo "<script>
             alert('$madname registration failed! Error : $con->error');
             window.location.href='portal-1-dashboard.php';
             </script>";
        }
    }else {
        echo "<script>
      alert('Madrassa with register number $madreg is already registered!');
      window.location.href='unitregistration.php';
      </script>";
    }

}
?>
