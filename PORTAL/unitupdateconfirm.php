<?php
include('../setup.php');
include('../session.php');

$user=mysqli_query($con, "SELECT * from admins where id='$session_id'")or die('Session logged out');
$userrow=mysqli_fetch_array($user);

if (isset($_POST['proceed'])) {
    $sksbvregno=$_POST['id'];
    $numrow=mysqli_query($con, "SELECT count(*) FROM unitregister where sksbvregno='$sksbvregno'");
    $numrowarray=mysqli_fetch_array($numrow);
    $num=$numrowarray['count(*)'];
    if ($num==0) {
        echo "<script>
    alert('Madrassa with registration number $sksbvregno not found! Please enter a valid SKSBV register number.');
    window.location.href='unitupdate.php';
    </script>";
    }else {
        $verify=mysqli_query($con, "SELECT * FROM unitregister where sksbvregno='$sksbvregno'");
        $verifydata=mysqli_fetch_array($verify);
    }

}


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
        <h3>UNIT UPDATION PORTAL</h3><br><br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="alert alert-danger">
                            PLEASE CHECK THE DETAILS AND CORRECT IF NEEDED.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="madreg">SKSBV REGISTER NUMBER</label>
                        <input type="number" class=form-control name=sksbv
                               value="<?php echo $verifydata['sksbvregno'];?>" style="max-width:300;" readonly="readonly">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="madreg">SKIMVB REGISTER NUMBER</label>
                        <input type="number" class=form-control name=madreg
                               value="<?php echo $verifydata['madno'];?>" style="max-width:300;">
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
                               value="<?php echo $verifydata['range'];?>" style="max-width:300;">
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <label for="mphone">PHONE NUMBER</label>
                        <input type="text" class=form-control name=mphone
                               value="<?php echo $verifydata['phone'];?>" style="max-width:300;">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <label for="mdistrict">DISTRICT</label>
                        <input type="text" class=form-control name=mdistrict
                               value="<?php echo $verifydata['district'];?>" style="max-width:300;">
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
include '../setup.php';

if (isset($_POST['submit'])) {
    $sksbvreg = $_POST['sksbv'];
    $madreg=$_POST['madreg'];
    $madname=$_POST['madrname'];
    $place=$_POST['mplace'];
    $range=$_POST['mrange'];
    $rangeno=$_POST['mrangeno'];
    $district=$_POST['mdistrict'];
    $phone=$_POST['mphone'];
    $mverify=mysqli_query($con, "SELECT count(*) FROM unitregister where sksbvregno='$sksbvreg'");
    $mverifydata=mysqli_fetch_array($mverify);
    $number=$mverifydata['count(*)'];
    echo 'checkpoint1';
    if ($number==1) {
        $sql = "UPDATE unitregister SET 
                    unitregister.madno = '$madreg', 
                    unitregister.madname = '$madname', 
                    unitregister.place = '$place', 
                    unitregister.range = '$range', 
                    unitregister.rangeno = '$rangeno', 
                    unitregister.district = '$district', 
                    unitregister.phone = '$phone' 
                    WHERE unitregister.sksbvregno = '$sksbvreg'";
        if ($con->query($sql)===TRUE){
            echo "<script>
             alert('$madname Updated Successfully ! SKSBV Register Number : $sksbvreg');
             window.location.href='unitupdate.php';
             </script>";
            echo "checkpoint3";
        }else{
            echo "<script>
             alert('$madname Updation failed! Error : $con->error');
             window.location.href='portal-1-dashboard.php';
             </script>";
            echo "checkpoint4";
        }
    }else {
        echo "<script>
      alert('Unit with register number $sksbvreg is not registered! number = $number');
      window.location.href='unitupdate.php';
      </script>";
    }

}
?>