<?php
/**
 * Created by IntelliJ IDEA.
 * User: Steve
 * Date: 08/08/2016
 * Time: 21:48
 */
include_once 'handlers/dbconfig.php';

if(!$user->is_loggedin())
{
    $user->redirect('login.php');
}

$user_id = $_SESSION['user_session'];
$stmt = $db_con->prepare("SELECT * FROM tbl_users JOIN tbl_quote ON quotePoster = tbl_users.user_name WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--suppress CheckValidXmlInScriptTagBody -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Summer Quotes - Control Panel</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/styles.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="Home.php">Summer Quotes</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <!--  Navigation Bar -->
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">Control Panel</a>
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
                <div class="modal-title">
                    <p> <?php print $userRow['user_name'] ?>'s Quotes </p>
                </div>
                <div class="quote-box">
                    <div class="quote-text">
                        <i class="fa fa-quote-left"> </i>

                        <span id="text">
 			</span>
                        <i class="fa fa-quote-right"> </i>

                    </div>

                    <!--        Quote Author       -->
                    <div class="quote-author">
                        <span id="author"></span>
                    </div>

                    <!--          Buttons          -->
                    <div class="buttons">
                        <button class="button" id="new-quote">New quote</button>
                        <button class="button" id="delete-quote">Delete quote</button>
                    </div>
                    <a id="prev_quote" class="left carousel-control" href="#" role="button" ><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a id="next_quote" class="right carousel-control" href="#" role="button" ><span class="glyphicon glyphicon-chevron-right"></span></a>

                </div>

                <script type="application/javascript">
                    var slideCount = 0;
                    var ar;
                    var user;
                    $(document).ready(function() {
                        ar = <?php echo(json_encode($user->getUserQuotes($userRow['user_name']))) ?>; // Json of Quotes by user
                        user = '<?php echo $userRow['user_name'] ?>';
                        $('.quote-text').find('#text').text(ar[slideCount].quoteString); //Edit quote text
                        $('.quote-author').find('#author').text('~' + ar[slideCount].quoteAuthor);


                        $("#new-quote").click(function () {
                            alert("Handler for .click() called.");
                        });

                        $("#delete-quote").click(function () {
                           var rem = $.post("handlers/quoteRemove.php", { name: user, quoteID: slideCount } );
                            rem.always(function () {
                                alert('Aknowledged.')
                            });

                        });


                        $("#next_quote").click(function () {
                            slideCount++;
                            slideCount = slideCount % Object.keys(ar).length;
                            $('.quote-text').find('#text').text(ar[slideCount].quoteString); //Edit quote text
                            $('.quote-author').find('#author').text('~' + ar[slideCount].quoteAuthor);
                        });

                        $("#prev_quote").click(function () {
                            slideCount--;
                            if(slideCount < 0){
                                slideCount = Object.keys(ar).length-1;
                            }
                            $('.quote-text').find('#text').text(ar[slideCount].quoteString); //Edit quote text
                            $('.quote-author').find('#author').text('~' + ar[slideCount].quoteAuthor);
                        });


                    });

                </script>

            </div>

        </div>

    </div>

</div>

<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>