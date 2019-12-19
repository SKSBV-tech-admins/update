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
        <h3>UNIT UPDATION PORTAL</h3><br><br>
        <form action="unitupdateconfirm.php" method="post">
            <label for="id">SKSBV REGISTER NUMBER</label>
            <input type="number" class=form-control name="id" required
                   placeholder="SKSBV REGISTER NUMBER" style="max-width:300;">
            <br>
            <input type="submit" name="proceed" class=formbutton value="PROCEED">
    </div>
</div>
</body>
</html>

