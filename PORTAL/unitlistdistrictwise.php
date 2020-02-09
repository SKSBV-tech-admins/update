<?php
include('../setup.php');
include('../session.php');

$user = mysqli_query($con, "SELECT * from admins where id='$session_id'") or die('Session logged out');
$userrow = mysqli_fetch_array($user);

?>
<html>
<head>
    <title>SKSBV|UPDATE - 2k19</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#list td#stat').each(function(){
                if ($(this).text() == 'BLOCKED') {
                    $(this).css('background-color','#f00');
                }
                if ($(this).text() == 'INACTIVE') {
                    $(this).css('background-color','orange');
                }
            });
        });

    </script>
    <style>
        .heading {
            width: 100%;
            height: 50;
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
<?php include('navigation.php'); ?>
<div class="rel">
    <div class="content">
        <div class="heading">
            <center><h3>DISTRICT WISE UNIT LIST</h3></center>
        </div>

        <table class="table table-hover" style="background-color: f0f8ff">

            <?php
            if (isset($_POST['genratedistlist'])) {
                $distr = $_POST['district'];
                $noentry = mysqli_query($con, "SELECT count(*) FROM unitregister WHERE district='$distr'");
                $numb = mysqli_fetch_array($noentry);
                $num_unit = $numb['count(*)'];
                echo "<div class='alert alert-info' style='font-size: large;color: blue;'>
                            District : $distr<br>
                            Number of units registered : $num_unit
                        </div>
                            <thead>
            <tr>
              <th>Sl. No.</th>
              <th>SKSBV REG.NO.</th>
              <th>Madrassa</th>
              <th>Reg. No.</th>
                <th>Place</th>
              <th>Range</th>
              <td>Range No.</td>
              <td>Status</td>

            </tr>
          </thead>
          <tbody>";
                $i = 0;
                if ($num_unit > 0) {
                    $list = mysqli_query($con, "SELECT * FROM unitregister WHERE district='$distr' ORDER BY sksbvregno ASC");
                    while ($array = mysqli_fetch_array($list)) {
                        $i = $i + 1;
                        echo "<tr id='back' onloadeddata='colourChanger()'>
                              <td>$i</td>
                                <td>$array[sksbvregno]</td>
                                <td>$array[madname]</td>
                                <td>$array[madno]</td>
                                <td>$array[place]</td>
                                <td>$array[range]</td>
                                <td>$array[rangeno]</td>
                                <td><span id='stat'>$array[status]</span></td>
                            </tr>
                            ";
                    }
                } else {
                    echo "<tr><td colspan=8><center>No units found!</center></td></tr>";
                }
                echo "</tbody>";
            }
            ?>
        </table>
        <script>
            function colourChanger(){
                myElement = document.getElementById('stat')
                myBack = document.getElementById('back')
                if(myElement.innerText=='ACTIVE')
                    myBack.style.backgroundColor='green'
                if(myElement.innerText=='INACTIVE')
                    myBack.style.backgroundColor='orange'
                if(myElement.innerText=='BLOCKED')
                    myBack.style.backgroundColor='red'
            }
        </script>


    </div>
</div>
</body>
</html>
