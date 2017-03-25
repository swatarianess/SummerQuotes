<?php
include_once 'handlers/dbconfig.php';
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
    <script src="/assets/jquery/jquery-3.1.0.min.js" type="application/javascript"></script>

</head>

<body>

<div class="container">

    <div class='alert alert-success in'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Hello <?php print($userRow['user_name']) ?></strong>, Welcome to
        the <?php echo $user->getUserType() ?> page.
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">&diams;<?php echo $user->getUserType() ?>s<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="controlPanel.php">Control Panel</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="handlers/logout.php">logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="jumbotron">
                <div class="quote-box">
                    <div class="quote-text">
                        <i class="fa fa-quote-left"> </i>


                        <span id="text">
 			I need your help in running this project in XAMPP &nbsp</span>
                        <i class="fa fa-quote-right"> </i>

                    </div>

                    <!--        Quote Author       -->
                    <div class="quote-author">
                        <span id="author">-A.P.J Abdul Kalam</span>
                    </div>

                    <!--          Buttons          -->
                    <div class="buttons">
                        <a class="button" id="tweet-quote" title="Tweet this quote!" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="button" id="facebook-quote" title="Post this quote on tumblr!" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <button class="button" id="new-quote">New quote</button>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>

                </div>

                <script type="application/javascript">
                    $(document).ready(function() {
                        var ar = $.parseJSON(<?php echo json_encode($user->getUserQuotes($userRow['user_name'])) ?>); // Json of Quotes by user

                        $('.quote-text').find('#text').text(ar.quoteString); //Edit quote text
                        $('.quote-author').find('#author').text('~' + ar.quoteAuthor);

                        $("#new-quote").click(function () {
                            alert("Handler for .click() called.");
                        });

                        $("#facebook-quote").click(function () {
                            alert("Share with facebook feature");
                        });

                        $("#tweet-quote").click(function () {
                            alert("Share with twitter feature");
                        });

                        $()

                        $('#Load').on('click',function(){
                            console.log(ar);
                            alert("Loaded Quotes..");
                        });

                    });

                </script>

                <button class="button" id="Load">Load Quote</button>

            </div>




        </div>
    </div>
</div>
<script type="application/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
