<?php
include_once ('../../vendor/autoload.php');
use App\utility\Utility;
use App\users\Users;

$obj = new Users();
$allData = $obj->getProfileData();
$image = end($allData);

if(!isset($_SESSION['userid'])){
    $_SESSION['message'] = "Oops ! Enter Your Username and Password";
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Create Question || AmarProshno</title>

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

                <a class="navbar-brand" href="../users/index.php"><p id="navbrand">Amerproshno</p></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="question/createQuestion.php">Create Question</a></li>
                    <li><a href="question/allQuestion.php">All Question</a></li>
                    <li class="divider"></li>
                </ul><!--.navbar-nav-->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php if(isset($image['photo']) && !empty($image['photo'])):?>
                            <a href="../users/viewprofile.php" ><img src="<?php echo $image['photo']; ?>" atl="image" width="40px" height="40px"></a>
                        <?php else:?>
                            <a href="../users/viewprofile.php" ><img src="../../assests/img/users_image.jpg" atl="image" width="40px" height="40px"></a>
                        <?php endif;
                        ?>

                    </li>
                    <li>
                        <a href="../users/logout.php" >Log Out</a>
                    </li>
                </ul>
                <!-- /.dropdown-manu -->
                <!--<a href="" data-toggle="modal" data-target="#modal1"><span id="title"><i class="fa fa-sign-in fa-fw"></i>Login Qiuz</span></a>-->
            </div><!-- .navbar-collapse-->
        </div><!--.container-fluid-->
    </nav><!-- .navbar-inverse-->

    <div id="page-wrapper">
        <div class="container">
            <div class="search" style="margin: 100px 0 50px 0;">
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
                        <li class="active"><a href="viewprofile.php" >View Profile</a></li>
                        <li><a href="question/ownquestion.php" style="color: #000;">Own Question</a></li>
                        <li><a href="answer/ownanswer.php" style="color: #000;">Own Answer</a></li>
                        <li class="pull-right"><p style="font-size: 24px; font-family: 'Old Standard TT', serif;">Profile</p></li>
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
                    <?php if (isset($allData)):
                            foreach($allData as $data):
                    ?>

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
                            <?php if(isset($data['photo'])):?>
                                <img src="<?php echo $data['photo'];?>" class="img-thumbnail" alt="Profile Image" width="160" height="136">
                            <?php else: ?>
                                <img src="../../assests/img/users_image.jpg" class="img-thumbnail" alt="Profile Image" width="160" height="136">
                            <?php endif;?>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                            <h2 style="font-size: 24px"><?php echo $data['fname'] ."";?> <?php echo $data['midname'] ."";?> <?php echo $data['lname'];?></h2><br>
                            <p>Date of Birth : <?php echo $data['dob'];?></p><br>
                            <p>Gender : <?php echo $data['gender'];?></p><br>
                            <p>Email : <?php echo $data['email'];?></p><br>
                            <p>Hobby : <?php echo $data['hobby'];?></p><br>
                            <p>Interest :
                                <?php $interest = explode(",",  $data['interest']);
                                        foreach ($interest as $value):
                                ?>
                                <button type="button" class="btn btn-sm btn-info disabled"><?php echo $value;?></button>
                            <?php endforeach;?>
                            </p>
                        </div>
                    </div>
                                <div class="row" style="margin-top: 30px">
                                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
                                        <a href="" class="btn btn-md btn-success">Click Here To Edit</a>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                    endif;
                    ?>


                </div>
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
</body>
</html>
