<?php session_start();
if(isset($_SESSION['userid'])){
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Loh In || AmarProshno</title>

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
            <div class='container-fluid' style="margin-top: 100px">
                <div class='login-form form facile-color-blue' >
                    <div class='header'>
                        <h3>Please Login</h3>
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

                    <form action="loginstore.php" method="post">
                        <div class='form-group' >
                            <div class='facile-icon-input' >
                                <input type='text' name="email" placeholder='you@example.com' class='facile-text' >
                                <?php if(isset($_SESSION['email'])):?>
                                    <p class="text-danger"><?php
                                        echo $_SESSION['email'];
                                        unset($_SESSION['email']);
                                        ?></p>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class='form-group' >
                            <div class='facile-icon-input facile-button-input' >
                                <input type='password' name="password" placeholder='*********' class='facile-text' >
                                <?php if(isset($_SESSION['password'])):?>
                                    <p class="text-danger"><?php
                                        echo $_SESSION['password'];
                                        unset($_SESSION['password']);
                                        ?></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class='form-group' >
                            <button type='submit' class='facile-btn btn-block' >Log In</button>
                        </div>
                    </form>
                    <p>Don't have an account? <a href="signup.php" class="text-success">Sign up</a></p><br>
                    <p class="pull-right"><a href="" class="text-danger">Forgot Password?</a></p>
                </div>
            </div>
        </div>

        <div class="footer" style="margin-top: 300px">
            <p>Copyright &copy; Dynamic Group. All Right Reserved</p>
        </div>

    </div>
<script src='../../assests/js/jquery.min.js' ></script>
<script src='../../assests/bootstrap/js/bootstrap.min.js' ></script>
</body>
</html>