<?php
include("../session.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/01c15ec4f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>SKSBV tech-admins | Unit Update</title>
</head>
<body>
<?php include('navigation.php'); ?>


<div class="slip" style="width:60%;left:30%;top:250px;">
    <div id='status' style='background: blueviolet;'><i class="fas fa-pencil-alt fa-3x"></i><br>
        <h2>UPDATE</h2>
    </div>
    <div class="number">
        <b style="font-size: 20px">UNIT REGISTER NUMBER</b><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id="identifier">
            <input type="number" class=form-control name="id" required
                   placeholder="SKSBV REGISTER NUMBER"><br>
            <input type="submit" value="LOAD DATA">

        </form>
    </div>
    <?php
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        require_once "../setup.php";
        $sql = "SELECT * FROM unitregister WHERE sksbvregno=?";
        if ($stmt = $con->prepare($sql)){
            $stmt->bind_param("i", $param_id);
            $param_id = trim($_GET["id"]);
            if ($stmt->execute()){
                $result = $stmt->get_result();
                if ($result->num_rows == 1){
                    $row = $result->fetch_array(MYSQLI_ASSOC);
    ?>
    <div id="details" class="number">
        <form action="unitupdater.php" method="post" id="unitreg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="alert alert-danger">
                            PLEASE CHECK THE DETAILS AND CORRECT IF NEEDED.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <label for="madreg">SKIMVB REGISTER NUMBER</label>
                        <input type="number" class=form-control name=madreg
                               value="<?php echo $row['madno']; ?>" style="max-width:300;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="sbvreg">SKSBV REGISTER NUMBER</label>
                        <input type="number" class="form-control" readonly name=sbvreg
                               value="<?php echo $row['sksbvregno']; ?>" style="max-width:300;" required>
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <label for="madrname">NAME OF MADRASSA</label>
                        <input type="text" class=form-control name=madrname
                               value="<?php echo $row['madname']; ?>" style="max-width:300;">
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <label for="mplace">PLACE</label>
                        <input type="text" class=form-control name=mplace
                               value="<?php echo $row['place']; ?>" style="max-width:300;">
                        <br>
                    </div>
                </div>
                <div class=row>
                    <div class="col-sm-3">
                        <label for="mrangeno">RANGE REGISTER NUMBER</label>
                        <input type="text" class=form-control name=mrangeno
                               value="<?php echo $row['rangeno']; ?>" style="max-width:300;">
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <label for="mrange">RANGE</label>
                        <input type="text" class=form-control name=mrange
                               value="<?php
                               $rang = mysqli_fetch_array(mysqli_query($con, "SELECT *  FROM rangenames WHERE rno='$row[rangeno]'"));
                               echo $rang['rname'];
                               ?>"
                               style="max-width:300;" readonly>
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <label for="mstatus">STATUS</label>
                        <select class=form-control name="mstatus" required style="max-width:300;" form="unitreg">
                            <option value="INACTIVE" <?php if ($row['status'] == 'INACTIVE') echo "selected" ?>>
                                INACTIVE
                            </option>
                            <option value="ACTIVE" <?php if ($row['status'] == 'ACTIVE') echo "selected" ?>>ACTIVE
                            </option>
                            <option value="BLOCKED" <?php if ($row['status'] == 'BLOCKED') echo "selected" ?>>BLOCKED
                            </option>
                        </select>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="mdistrict">DISTRICT</label>
                        <select class=form-control name=mdistrict required
                                style="max-width:300;" form="unitreg">
                            <option value="KASARKODE"<?php if ($row['district'] == 'KASARKODE') echo "selected" ?>>
                                KASARKODE
                            </option>
                            <option value="KANNUR"<?php if ($row['district'] == 'KANNUR') echo "selected" ?>>KANNUR
                            </option>
                            <option value="KOZHIKODE"<?php if ($row['district'] == 'KOZHIKODE') echo "selected" ?>>
                                KOZHIKODE
                            </option>
                            <option value="WAYANAD" <?php if ($row['district'] == 'WAYANAD') echo "selected" ?>>
                                WAYANAD
                            </option>
                            <option value="MALAPPURAM WEST" <?php if ($row['district'] == 'MALAPPURAM WEST') echo "selected" ?>>
                                MALAPPURAM WEST
                            </option>
                            <option value="MALAPPURAM EAST" <?php if ($row['district'] == 'MALAPPURAM EAST') echo "selected" ?>>
                                MALAPPURAM EAST
                            </option>
                            <option value="PALAKKAD" <?php if ($row['district'] == 'PALAKKAD') echo "selected" ?>>
                                PALAKKAD
                            </option>
                            <option value="THRISSUR" <?php if ($row['district'] == 'THRISSUR') echo "selected" ?>>
                                THRISSUR
                            </option>
                            <option value="IDUKKI" <?php if ($row['district'] == 'IDUKKI') echo "selected" ?>>IDUKKI
                            </option>
                            <option value="ERNAKULAM"<?php if ($row['district'] == 'ERNAKULAM') echo "selected" ?>>
                                ERNAKULAM
                            </option>
                            <option value="KOTTAYAM" <?php if ($row['district'] == 'KOTTAYAM') echo "selected" ?>>
                                KOTTAYAM
                            </option>
                            <option value="ALAPPUZHA"<?php if ($row['district'] == 'ALAPPUZHA') echo "selected" ?>>
                                ALAPPUZHA
                            </option>
                            <option value="THIRUVANANTHAPURAM" <?php if ($row['district'] == 'THIRUVANANTHAPURAM') echo "selected" ?>>
                                THIRUVANANTHAPURAM
                            </option>
                            <option value="DAKSHINA KANNADA" <?php if ($row['district'] == 'DAKSHINA KANNADA') echo "selected" ?>>
                                DAKSHINA KANNADA
                            </option>
                            <option value="CHICKMANGALORE" <?php if ($row['district'] == 'CHICKMANGALORE') echo "selected" ?>>
                                CHICKMANGALORE
                            </option>
                            <option value="NILGIRI" <?php if ($row['district'] == 'NILGIRI') echo "selected" ?>>
                                NILGIRI
                            </option>
                            <option value="KODAGU" <?php if ($row['district'] == 'KODAGU') echo "selected" ?>>KODAGU
                            </option>
                            <option value="LAKSHADEEP" <?php if ($row['district'] == 'LAKSHADEEP') echo "selected" ?>>
                                LAKSHADEEP
                            </option>
                            <option value="KANYAKUMARI" <?php if ($row['district'] == 'KANYAKUMARI') echo "selected" ?>>
                                KANYAKUMARI
                            </option>
                        </select>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        <label for="mremark">REMARK</label>
                        <textarea class="form-control" name="mremark" placeholder="Write your remark : eg: Form incomplete!"><?php echo $row['remark'];?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <input type="submit" name="update" class=formbutton value="UPDATE">
        </form>
    </div>

<?php

//close of if num_rows==1
                } else {
                    header("location: unitupdate.php");
                    exit();
}

} else {
    echo "Oops! Something went wrong. Please try again later.";
}
}
}
?>


</div>
</body>
</html>