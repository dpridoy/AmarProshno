<?php
include_once ('vendor/autoload.php');
use App\utility\Utility;
use App\question\Question;
use App\answer\Answer;

$obj = new Question();
$allData = $obj->showAllQuestion();

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Home || AmarProshno</title>

    <link rel='stylesheet' type='text/css' href='assests/bootstrap/css/bootstrap.min.css'>
    <link href="assests/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='assests/css/dynamic-forms.css'>
    <link rel='stylesheet' type='text/css' href='assests/css/layout.css'>
    <link rel='stylesheet' type='text/css' href='assests/css/mayerwebcss.css'>
    <link rel='stylesheet' type='text/css' href='assests/css/style.css'>
    <link rel="stylesheet" type="text/css" href="assests/bootstrap/font-awesome/css/font-awesome.min.css">
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

                <a class="navbar-brand" href="index.php"><p id="navbrand">Amerproshno</p></a>
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
                        <a href="view/users/login.php" >Log In</a>
                    </li>
                    <li>
                        <a href="view/users/signup.php">Sign up</a>
                    </li>
                </ul>
                <!-- /.dropdown-manu -->
                <!--<a href="" data-toggle="modal" data-target="#modal1"><span id="title"><i class="fa fa-sign-in fa-fw"></i>Login Qiuz</span></a>-->
            </div><!-- .navbar-collapse-->
        </div><!--.container-fluid-->
    </nav><!-- .navbar-inverse-->

    <div id="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="header">
                        <h1>Join The Amarproshno Commity</h1>
                        <p id="para">Amarproshno is a community who is helping you to generate a question and
                           <br> also give an answer about this question.</p>
                        <p><a href="view/users/signup.php" class="btn btn-md btn-info">Sign up</a></p>
                    </div>
                </div>
            </div>

            <div class="searchinput">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="#" role="search" method="post" accept-charset="utf-8">
                            <div class="input-group custom-search-form">
                                <input type="text" name="search" class="form-control input-lg" id="search" placeholder="Search.....">
                                <span class="input-group-btn">
                                <button class="btn btn-default btn-lg" type="submit">
                                    Search
                                </button>
                            </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-10 col-lg-10">
                    <p id="topquestion">Top Questions</p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
                    <a href="view/users/login.php" class="btn btn-sm btn-default">Ask Question</a>
                </div>
            </div>
            <hr>
            <?php foreach ($allData as $data): ?>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-2">
                                <p style="margin-left: 20px">0</p>
                                <p>Answers</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-6 col-lg-6">
                                <p style="margin-left: 20px">0</p>
                                <p>Views</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-10 col-lg-10">
                        <div class="panel panel-default" style="border-style: hidden; border-color: #ffffffff;">
                            <div class="panel-body">
                                <p style="font-size: 18px"><?php echo $data['title'];?></p>
                                <div style="font-size: 14px; margin-top: 10px "><?php echo substr($data['description'], 0, 210); ?>
                                </div>
                                    <a href="view/users/login.php" class="btn btn-md btn-info pull-right">Read more</a>

                                <div class="media" style="margin-top: 20px">
                                    <div class="media-left media-top">
                                        <?php if(isset($data['photo'])):
                                            $img = explode("../../",$data['photo']);
                                            ?>
                                           <img src="<?php echo $img[1] ?>" atl="image" width="40px" height="40px"></a>
                                        <?php else:?>
                                            <img src="assests/img/users_image.jpg" atl="image" width="40px" height="40px"></a>
                                        <?php endif;?>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading" style="font-size: 14px;"><?php echo $data['fname']?>  <?php echo $data['midname']?>  <?php echo $data['lname']?></h5>
                                        <div style="font-size: 12px; margin-top: 10px "><?php $interest = explode(",",  $data['interest']);
                                            foreach ($interest as $value):?>
                                                <span class="text-info"><?php echo $value.",";?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="footer" style="margin-top: 300px">
        <p>Copyright &copy; Dynamic Group. All Right Reserved</p>
    </div>

</div>

<script src='assests/js/jquery.min.js' ></script>
<script src='assests/bootstrap/js/bootstrap.min.js' ></script>
</body>
</html>