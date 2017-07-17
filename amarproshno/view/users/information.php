<?php
include_once ('../../vendor/autoload.php');
use App\utility\Utility;

session_start();
if(!isset($_SESSION['userid'])){
    $_SESSION['message'] = "Oops ! Enter Your Username and Password";
    header('location: signup.php');
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Sign up || AmarProshno</title>

    <link rel='stylesheet' type='text/css' href='../../assests/bootstrap/css/bootstrap.min.css'>
    <link href="../../assests/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../assests/css/dynamic-forms.css'>
    <link rel='stylesheet' type='text/css' href='../../assests/css/layout.css'>
    <link rel='stylesheet' type='text/css' href='../../assests/css/mayerwebcss.css'>
    <link rel='stylesheet' type='text/css' href='../../assests/css/style.css'>
    <link rel="stylesheet" type="text/css" href="../../assests/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../assests/datepicker/css/datepicker.css">
    <link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Parisienne" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Open+Sans+Condensed:300|Oswald|Poiret+One" rel="stylesheet">

</head>


</head>
<body>
<div id="wrapper">
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

    <div id="page-wrapper">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class='profile_heading'>
                        <h3>Add Your Information.</h3>
                    </div>
                    <?php
                    if(isset($_SESSION['message'])):?>
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?>
                        </div>
                    <?php endif; ?>
                    <form action="profilestore.php" id="questionform" method="post" enctype="multipart/form-data" style="width: 80%; margin-left: 100px">
                        <div class="form-group">
                            <div class="row">
                                <label for="lname" class="control-label col-sm-2">First Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" name="fname" id="lname" class="form-control">

                                    <?php if(isset($_SESSION['fname'])):?>
                                        <p class="text-danger" style="margin-top: 15px">
                                            <?php echo $_SESSION['fname'];
                                                unset($_SESSION['fname']);
                                            ?>
                                        </p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="lname" class="control-label col-sm-2">Middle Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="midname" id="lname" class="form-control">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="lname" class="control-label col-sm-2">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lname" id="lname" class="form-control">
                                    <?php if(isset($_SESSION['lname'])):?>
                                        <p class="text-danger" style="margin-top: 15px">
                                            <?php echo $_SESSION['lname'];
                                                unset($_SESSION['lname']);
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="dob" class="control-label col-sm-2">Date of Birth</label>
                                <div class="col-sm-10">
                                    <div class="input-group date">
                                        <input type="text" name="dob" id="dob" class="form-control" placeholder="YYYY-MM-DD">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                    <?php if(isset($_SESSION['dob'])):?>
                                        <p class="text-danger" style="margin-top: 15px">
                                            <?php echo $_SESSION['dob'];
                                                unset($_SESSION['dob']);
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="photo" class="control-label col-sm-2">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="photo" id="photo" class="form-control">

                                    <?php if(isset($_SESSION['photo'])):?>
                                        <p class="text-danger" style="margin-top: 15px">
                                            <?php echo $_SESSION['photo'];
                                                unset($_SESSION['photo']);
                                            ?>
                                        </p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="gender" class="control-label col-sm-2">Gender</label>
                                <div class="col-sm-10">
                                    <label class="radio-inline"><input type="radio" name="gender" id="gender" value="Male">Male</label>
                                    <label class="radio-inline"><input type="radio" name="gender" id="gender" value="Female">Female</label>
                                    <label class="radio-inline"><input type="radio" name="gender" id="gender" value="Others">Others</label>

                                    <?php if(isset($_SESSION['gender'])):?>
                                        <p class="text-danger" style="margin-top: 15px">
                                            <?php echo $_SESSION['gender'];
                                                unset($_SESSION['gender']);
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="hobby" class="control-label col-sm-2">Hobby</label>
                                <div class="col-sm-10">
                                    <input type="text" name="hobby" id="hobby" class="form-control">

                                    <?php if(isset($_SESSION['hobby'])):?>
                                        <p class="text-danger" style="margin-top: 15px">
                                            <?php echo $_SESSION['hobby'];
                                                unset($_SESSION['hobby']);
                                            ?>
                                        </p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="question" class="control-label col-sm-2">Interest</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline"><input type="checkbox" name="interest[]" value="PHP">PHP</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="interest[]" value="Javascript">Javascript</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="interest[]" value="Java">Java</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="interest[]" value="Python">Python</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="interest[]" value="C#">C#</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="interest[]" value="C">C</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="interest[]" value="C++">C++</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="interest[]" value="ASP.Net">ASP.Net</label>

                                    <?php if(isset($_SESSION['interest'])):?>
                                        <p class="text-danger" style="margin-top: 15px">
                                            <?php echo $_SESSION['interest'];
                                                unset($_SESSION['interest']);
                                            ?>
                                        </p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-info pull-right" value="Sign up">
                    </form>

                </div>
            </div>
        </div>

        <div class="footer" style="margin-top: 300px">
            <p>Copyright &copy; Dynamic Group. All Right Reserved</p>
        </div>
    </div>
</div>

<script src='../../assests/js/jquery.min.js' ></script>
<script src='../../assests/bootstrap/js/bootstrap.min.js' ></script>
<script src="../../assests/datepicker/js/bootstrap-datepicker.js"></script>

<script>
    $('#dob').datepicker({
        format: 'yyyy-mm-dd',



    });

</script>
</body>
</html>
