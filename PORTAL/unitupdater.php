<?php
include "../session.php";
if(isset($_POST['update'])){

    require_once "../setup.php";

    $sbvid = $_POST['sbvreg'];
    $madreg = $_POST['madreg'];
    $madname = $_POST['madrname'];
    $rangeno = $_POST['mrangeno'];
    $place = $_POST['mplace'];
    $range = mysqli_fetch_array(mysqli_query($con, "SELECT *  FROM rangenames WHERE rno='$rangeno'"))['rname'];
    $status = $_POST['mstatus'];
    $remark = $_POST['mremark'];
    $district = $_POST['mdistrict'];

    $sql = "UPDATE unitregister SET sksbvregno=?, madno=?, madname=?, place=?, `range`=?, rangeno=?, district=?, status=?, remark=? WHERE sksbvregno=?";
    if($state = $con->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $state->bind_param("iisssssssi", $param_sbvid, $param_madid, $param_madname, $param_place, $param_range, $param_rangeno, $param_dist, $param_stat, $param_remark, $sbvid);
        // Set parameters
        $param_sbvid = $sbvid;
        $param_madid = $madreg;
        $param_madname = $madname;
        $param_place = $place;
        $param_range = $range;
        $param_rangeno = $rangeno;
        $param_dist = $district;
        $param_stat = $status;
        $param_remark = $remark;

        // Attempt to execute the prepared statement
        if($state->execute()){
            // Records updated successfully. Redirect to landing page
            header("location: unitdetails.php?sbvid=".$sbvid);
            exit();
        } else{
            header("location: unitupdate.php?id=".$sbvid);
            echo "Something went wrong. Please try again later.";
        }
    }
    else{
        die('prepare() failed: ' . htmlspecialchars($con->error));
    }
    // Close statement

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body background="../IMG/bg.jpg">

</body>
</html>
