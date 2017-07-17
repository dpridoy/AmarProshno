<?php
include_once ('../../vendor/autoload.php');
use App\utility\Utility;
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Loh In || AmarProshno.com</title>

    <link rel='stylesheet' type='text/css' href='../../assests/bootstrap/css/bootstrap.min.css'>
    <link href="../../assests/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../assests/css/dynamic-forms.css'>
    <link rel='stylesheet' type='text/css' href='../../assests/css/layout.css'>
    <link rel='stylesheet' type='text/css' href='../../assests/css/mayerwebcss.css'>
    <link rel='stylesheet' type='text/css' href='../../assests/css/style.css'>
    <link rel="stylesheet" type="text/css" href="../../assests/bootstrap/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Parisienne" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Open+Sans+Condensed:300|Oswald|Poiret+One" rel="stylesheet">


</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0;" id="navbar-home">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="../../index.php"><p id="navbrand">Amerproshno</p></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="">Question</a></li>
                    <li><a href="">How It Works</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li class="divider"></li>
                </ul><!--.navbar-nav-->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="login.php" >Log In</a>
                    </li>
                    <li>
                        <a href="signup.php">Sign up</a>
                    </li>
                </ul>
                <!-- /.dropdown-manu -->
                <!--<a href="" data-toggle="modal" data-target="#modal1"><span id="title"><i class="fa fa-sign-in fa-fw"></i>Login Qiuz</span></a>-->
            </div><!-- .navbar-collapse-->
        </div><!--.container-fluid-->
    </nav><!-- .navbar-inverse-->

    <div class="page-wrapper">
        <div class='container-fluid' style="margin-top: 150px;">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-md-offset-2">

                    <?php
                    if(isset($_SESSION['message']))
                    {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                    <h1 id="message">Congratulation ! Successfully Registered</h1>
                    <p>You may now log in and create your own question.</p>
                    <p style="margin:5% 0 0 0;"><a class="btn btn-info btn-md" href="login.php">Log In</a></p>

                </div>
            </div>
        </div>
    </div>
    <div class="footer" style="margin-top: 300px">
        <p>Copyright &copy; Dynamic Group. All Right Reserved</p>
    </div>
</div>


</body>
</html>
