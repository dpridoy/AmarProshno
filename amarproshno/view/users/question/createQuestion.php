<?php
include_once ('../../../vendor/autoload.php');
use App\users\Users;
use App\utility\Utility;

$obj = new Users();
$img = $obj->getProfileData();
$image = end($img);

if(!isset($_SESSION['userid'])){
    $_SESSION['message'] = "Oops ! Enter Your Username and Password";
    header('location: ../login.php');
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Create Question || AmarProshno</title>

    <link rel='stylesheet' type='text/css' href='../../../assests/bootstrap/css/bootstrap.min.css'>
    <link href="../../../assests/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../../assests/css/dynamic-forms.css'>
    <link rel='stylesheet' type='text/css' href='../../../assests/css/layout.css'>
    <link rel='stylesheet' type='text/css' href='../../../assests/css/mayerwebcss.css'>
    <link rel='stylesheet' type='text/css' href='../../../assests/css/style.css'>
    <link rel="stylesheet" type="text/css" href="../../../assests/bootstrap/font-awesome/css/font-awesome.min.css">
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

                <a class="navbar-brand" href="../../users/index.php"><p id="navbrand">Amerproshno</p></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="../question/createQuestion.php">Create Question</a></li>
                    <li><a href="../question/allQuestion.php">All Question</a></li>
                    <li class="divider"></li>
                </ul><!--.navbar-nav-->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php if(isset($image['photo']) && !empty($image['photo'])):?>
                            <a href="../../users/viewprofile.php" ><img src="../<?php echo $image['photo']; ?>" atl="image" width="40px" height="40px"></a>
                        <?php else:?>
                            <a href="../../users/viewprofile.php" ><img src="../../../assests/img/users_image.jpg" atl="image" width="40px" height="40px"></a>
                        <?php endif;
                        ?>

                    </li>
                    <li>
                        <a href="../../users/logout.php" >Log Out</a>
                    </li>
                </ul>
                <!-- /.dropdown-manu -->
                <!--<a href="" data-toggle="modal" data-target="#modal1"><span id="title"><i class="fa fa-sign-in fa-fw"></i>Login Qiuz</span></a>-->
            </div><!-- .navbar-collapse-->
        </div><!--.container-fluid-->
    </nav><!-- .navbar-inverse-->

    <div id="page-wrapper">
        <div class="container">
            <div class="search" style="margin: 100px 0 70px 0;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="#" role="search" method="post" accept-charset="utf-8">
                            <div class="input-group custom-search-form">
                                <input type="text" name="search" class="form-control input-md" id="search" placeholder="Search.....">
                                <span class="input-group-btn">
                                <button class="btn btn-default btn-md" type="submit">
                                    Search
                                </button>
                            </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 class="page-header" style="font-size: 24px; font-family: 'Old Standard TT', serif;">
                        Create Your Own Question
                    </h1>
                    <form action="store.php" id="questionform" method="post" style="width: 80%; margin-left: 100px">
                        <div class="form-group">
                            <div class="row">
                                <label for="title" class="control-label col-sm-2">Question Title: </label>
                                <div class="col-sm-10">
                                    <input type="text" name="qtitle" id="title" class="form-control">
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="question" class="control-label col-sm-2">Question</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" cols="50" name="question" id="question"  class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-info pull-right btn-block">Create Question</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="footer" style="margin-top: 300px">
            <p>Copyright &copy; Dynamic Group. All Right Reserved</p>
        </div>
    </div>
</div>

<script src='../../../assests/js/jquery.min.js' ></script>
<script src='../../../assests/bootstrap/js/bootstrap.min.js' ></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('question');
</script>
</body>
</html>
