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
    <style>
    .heading{
      width:100%;
      height:50;
      font-size: 17;
      font-weight: bold;
      z-index: 1;
      border-radius: 8px;
      opacity: 1;
      font-family: serif;
    }
    </style>
  </head>
  <body>
    <?php include('navigation.php');?>
    <div class="rel">
    <div class="content">
      <div class="heading"><center><h3>DISTRICT WISE UNIT LIST</h3></center></div>


        <table class="table table-hover" style="background-color: f0f8ff">
          <thead>
            <tr>
              <th>Sl. No.</th>
              <th>SKSBV REG.NO.</th>
              <th>Madrassa</th>
              <th>Reg. No.</th>
                <th>Place</th>
              <th>Range</th>
              <td>Range No.</td>
              <td>Phone</td>

            </tr>
          </thead>
          <tbody>
            <?php
                if (isset($_POST['genratedistlist'])) {
                  $distr=$_POST['district'];
                  $noentry=mysqli_query($con,"SELECT count(*) FROM unitregister WHERE district='$distr'");
                  $numb=mysqli_fetch_array($noentry);
                  $num_unit=$numb['count(*)'];
                  $i=0;
                  if ($num_unit>0) {
                    $list=mysqli_query($con,"SELECT * FROM unitregister WHERE district='$distr' ORDER BY sksbvregno ASC");
                    while ($array = mysqli_fetch_array($list)){
                       $i=$i+1;
                     echo "<tr>
                              <td>$i</td>
                                <td>$array[sksbvregno]</td>
                                <td>$array[madname]</td>
                                <td>$array[madno]</td>
                                <td>$array[place]</td>
                                <td>$array[range]</td>
                                <td>$array[rangeno]</td>
                                <td>$array[phone]</td>
                            </tr>";
                  }
                }
                else {
                  echo "<tr><td colspan=8><center>No units found!</center></td></tr>";
                }
              }
                 ?>

        </tbody>
      </table>

    </div>
    </div>
  </body>
</html>
