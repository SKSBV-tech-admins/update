<html>
<head>
    <title>NAVIGATION BAR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Update - 2019</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="portal-1-dashboard.php">HOME</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">DASHBOARD<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="unitregistrationdashboard.php">UNIT</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">REGISTER<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="unitregistration.php">UNIT</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">EDIT DETAILS<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="unitupdate.php">UNIT</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" onclick="window.print()"><span class="glyphicon glyphicon-print"></span>  PRINT</a></li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>  LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
