<?php
include_once 'login/dbconfig.php';
if(!$user->is_loggedin())
{
    $user->redirect('login.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Summer Quotes - Home</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="https://code.jquery.com/jquery-3.1.0.min.js">
    <link href="assets/css/styles.css" rel="stylesheet" media="screen">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>

<body>
<script type="application/javascript">
    $(document).ready(function() {
        //Set the carousel options
        $('#quote-carousel').carousel({
            pause:'hover',
            interval: 6000,
        });
    });
</script>
<div class="container">
    <div class='alert alert-success'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Hello <?php print($userRow['user_name']) ?></strong>,  Welcome to the <?php echo $user->getUserType() ?> page.
    </div>

    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">


                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="#">Summer Quotes</a>

                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <!--  Navigation Bar -->
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="Home.php">Home</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">&diams;<?php echo $user->getUserType() ?><strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="controlPanel.php">Control Panel</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="login/logout.php">logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>

            <div class="jumbotron">


                <div class='row'>
                    <div class='col-md-offset-2 col-md-8'>
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#quote-carousel" data-slide-to="1"></li>
                                <li data-target="#quote-carousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner" data-pause="false">

                                <!-- Quote 1 -->
                                <div class="item active">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-9 text-center">
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                                <small>username</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>

                                <!-- Quote 2 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-3 text-center">

                                                <!--                                                <img class="img-circle" src="http://wp-desk.com/lovinflat/images/persons/person_2.png" style="width: 100px;height:100px;">-->

                                            </div>
                                            <div class="col-sm-9">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                                <small>username</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>

                                <!-- Quote 3 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-3 text-center">

                                                <!--                                                <img class="img-circle" src="http://wp-desk.com/lovinflat/images/persons/person_3.png" style="width: 100px;height:100px;">-->

                                            </div>
                                            <div class="col-sm-9">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                                <small>username</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            </div>

                            <!-- Carousel Buttons Next/Prev -->
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>



        </div>


    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>