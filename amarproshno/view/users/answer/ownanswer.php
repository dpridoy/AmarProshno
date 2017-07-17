<?php
include_once ('../../../vendor/autoload.php');
use App\utility\Utility;
use App\users\Users;
use App\answer\Answer;

$obj = new Answer();
$answer = $obj->showUserAnswer();

$obj1 = new Users();
$data = $obj1->getProfileData();
$singleData = end($data);


if(!isset($_SESSION['userid'])){
    $_SESSION['message'] = "Oops ! Please Enter Your Username and Password";
    header('location: ../login.php');
}

/*if(!isset($_GET['id'])){
    $_SESSION['message'] = "Oops ! Try to Access with Invalid User Id";
    header('location: answer.php');
}*/



?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>All Question || AmarProshno</title>

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
                        <?php if(isset($singleData['photo']) && !empty($singleData['photo'])):?>
                            <a href="../../users/viewprofile.php" ><img src="../<?php echo $singleData['photo']; ?>" atl="image" width="40px" height="40px"></a>
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
                        <ul class="nav nav-tabs" style="margin-bottom: 40px">
                            <li><a href="../viewprofile.php" style="color: #000;">View Profile</a></li>
                            <li><a href="../question/ownquestion.php" style="color: #000;">Own Question</a></li>
                            <li class="active"><a href="../answer/ownanswer.php" >Own Answer</a></li>
                            <li class="pull-right"><p style="font-size: 24px; font-family: 'Old Standard TT', serif;">Answer</p></li>
                        </ul>
                        <?php
                        if(isset($_SESSION['message'])):?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $_SESSION['message'];
                                unset($_SESSION['message']);
                                ?>
                            </div>
                        <?php endif; ?>

                    <?php if(isset($answer)):
                        foreach($answer as $item):?>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h1 style="font-size: 26px; margin-left: 50px; margin-bottom: 20px"><?php echo $item['title'];?></h1>
                                <hr>
                            </div>
                        </div>


                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
                            <i class="fa fa-chevron-up fa-2x" aria-hidden="true"></i>
                            <p style="margin-left: 14px">0</p>
                            <p>Views</p>
                            <i class="fa fa-chevron-down fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
                            <p style="font-size: 14px; margin-top: 10px "><?php echo "<br>".$item['description'];?></p>

                            <div class="media" style="margin-top: 20px;">
                                <div class="media-left media-top">
                                    <?php if(isset($item['photo']) && !empty($item['photo'])):?>
                                       <img src="../<?php echo $item['photo']; ?>" atl="image" width="40px" height="40px"></a>
                                    <?php else:?>
                                       <img src="../../../assests/img/users_image.jpg" atl="image" width="40px" height="40px"></a>
                                    <?php endif;?>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading" style="font-size: 14px;"><?php echo $item['fname']?>  <?php echo $item['midname']?>  <?php echo $item['lname']?></h5>
                                    <div style="font-size: 12px; margin-top: 10px "><?php $interest = explode(",",  $item['interest']);
                                        foreach ($interest as $value):?>
                                            <span class="text-info"><?php echo $value.",";?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p id="topquestion">Your Answer</p>
                        </div>
                    </div>
                    <hr>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11 col-md-offset-1 col-lg-offset-1 ">
                                    <p style="font-size: 14px; margin-top: 10px;"><?php echo $item['answers'];?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xs-offset-6 col-sm-offset-8 col-md-offset-9 col-lg-offset-9">
                                    <!-- Right-aligned media object -->
                                    <div class="media">
                                        <div class="media-left media-top">
                                            <?php if(isset($singleData['photo']) && !empty($singleData['photo'])):?>
                                                <img src="../<?php echo $singleData['photo']; ?>" atl="image" width="40px" height="40px"></a>
                                            <?php else:?>
                                                <img src="../../../assests/img/users_image.jpg" atl="image" width="40px" height="40px"></a>
                                            <?php endif;?>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading" style="font-size: 14px;"><?php echo $singleData['fname']?>  <?php echo $singleData['midname']?>  <?php echo $singleData['lname']?></h5>
                                            <div style="font-size: 12px; margin-top: 10px "><?php $interest = explode(",",  $singleData['interest']);
                                                foreach ($interest as $value):?>
                                                    <span class="text-info"><?php echo $value.",";?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php
                             endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer" style="margin-top: 300px">
            <p>Copyright &copy; Dynamic Group. All Right Reserved</p>
        </div>
</div>

<script src='../../../assests/js/jquery.min.js' ></script>
<script src='../../../assests/bootstrap/js/bootstrap.min.js' ></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('answer');
</script>
</body>
</html>

