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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
      <style>
          .panel-heading > custom_class{
              background: burlywood;
          }
      </style>
  </head>
  <body>
    <?php include('navigation.php');?>
    <div class="rel">
    <div class="content">
      <h3>UNIT REGISTRATION DASHBOARD</h3><br><br>
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">Overview</div>
                      <div class="panel-body" style="font-size: x-large;color: goldenrod">
                                      TOTAL UNITS REGISTERED :
                                      <?php
                                      $query = mysqli_query($con,"SELECT * FROM unitregister");
                                      $numb = mysqli_num_rows($query);
                                      echo "$numb";
                                      ?>
                      </div>
                  </div>
              </div>
          </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="panel panel-danger" style="height: 48%;">
              <div class="panel-heading custom_class">DISTRICT WISE LIST</div>
              <div class="panel-body">
                <form action="unitlistdistrictwise.php" method="post" id="districtlist">
                  <label for="district">DISTRICT</label>
                  <select class=form-control name=district required
                   style="max-width:300;" form="districtlist">
                   <option value="KASARKODE">KASARKODE</option>
                   <option value="KANNUR">KANNUR</option>
                   <option value="KOZHIKODE">KOZHIKODE</option>
                   <option value="WAYANAD">WAYANAD</option>
                   <option value="MALAPPURAM WEST">MALAPPURAM WEST</option>
                   <option value="MALAPPURAM EAST">MALAPPURAM EAST</option>
                   <option value="PALAKKAD">PALAKKAD</option>
                   <option value="THRISSUR">THRISSUR</option>
                   <option value="IDUKKI">IDUKKI</option>
                   <option value="ERNAKULAM">ERNAKULAM</option>
                   <option value="KOTTAYAM">KOTTAYAM</option>
                   <option value="ALAPPUZHA">ALAPPUZHA</option>
                   <option value="THIRUVANANTHAPURAM">THIRUVANANTHAPURAM</option>
                   <option value="DAKSHINA KANNADA">DAKSHINA KANNADA</option>
                   <option value="CHICKMANGALORE">CHICKMANGALORE</option>
                   <option value="NILGIRI">NILGIRI</option>
                   <option value="KODAGU">KODAGU</option>
                   <option value="LAKSHADEEP">LAKSHADEEP</option>
                   <option value="KANYAKUMARI">KANYAKUMARI</option>
                 </select>
                  <br>
                  <input type="submit" name="genratedistlist" class=formbutton value="GET THE LIST">
                </FORM>
              </div>
            </DIV>
          </DIV>


          <div class="col-sm-4">
            <div class="panel panel-danger" style="height: 48%;">
              <div class="panel-heading custom_class">RANGE WISE LIST</div>
              <div class="panel-body">
                <form action="rangewiseunitlist.php" method="post">
                  <label for="rid">SKIMVB RANGE REGISTER NUMBER</label>
                  <input type="number" class=form-control name=rid required
                  placeholder="SKIMVB RANGE REGISTER NUMBER" style="max-width:300;">
                  <br>
                  <input type="submit" name="genraterangelist" class=formbutton value="GET THE LIST">
                </FORM>
              </div>
            </DIV>
          </DIV>



          <div class="col-sm-4">
            <div class="panel panel-danger" style="height: 48%;">
              <div class="panel-heading custom_class">INDIVIDUAL UNIT DETAILS</div>
              <div class="panel-body">

                <form action="unitdetail.php" method="post" name=unitdetailskimvb>
                  <label for="mid">SKIMVB REGISTER NUMBER</label>
                  <input type="number" class=form-control name=mid required
                  placeholder="SKIMVB REGISTER NUMBER" style="max-width:300;">
                  <br>
                  <input type="submit" name="unitskimvb" class=formbutton value="GO">
                </FORM>


                <form action="unitdetails.php" method="get" name=unitdetailsksbv>
                  <label for="sbvid">SKSBV REGISTER NUMBER</label>
                  <input type="number" class=form-control name=sbvid required
                  placeholder="SKSBV REGISTER NUMBER" style="max-width:300;">
                  <br>
                  <input type="submit" name="unitsksbv" class=formbutton value="GO">
                </FORM>

              </div>
            </DIV>
          </DIV>
        </div>

          <div class="row">
              <div class="col-sm-4">
                  <div class = "panel panel-success">
                      <div class = "panel-heading custom_class">UPDATED UNITS</div>
                      <div class="panel-body">
                          <a href="error.php">GET LIST</a>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class = "panel panel-warning">
                      <div class = "panel-heading custom_class">INACTIVE UNITS</div>
                      <div class="panel-body">
                          <a href="error.php">GET LIST</a>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class = "panel panel-danger">
                      <div class = "panel-heading custom_class">BLOCKED UNITS</div>
                      <div class="panel-body">
                          <a href="error.php">GET LIST</a>
                      </div>
                  </div>
              </div>
          </div>

          <div class=" row">
              <div class = "col-sm-12">
                  <div class = "panel panel-danger">
                      <div class = "panel-heading custom_class">STATE UNIT LIST</div>
                      <div class="panel-body">
                          <h3 style = "text-align: center;text-decoration: none;"><a href="stateunitlist.php">LOAD LIST</a></h3>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    </div>
  </body>
</html>
