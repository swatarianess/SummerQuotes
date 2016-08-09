<?php
/**
 * Created by IntelliJ IDEA.
 * User: Steve
 * Date: 08/08/2016
 * Time: 21:48
 */
session_start();

if(!isset($_SESSION['user_session']))
{
    header("Location: login.php");
}

include_once 'login/dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login Form using jQuery Ajax and PHP MySQL</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/styles.css" rel="stylesheet" media="screen">

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="#">Brand</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">

                        <!--           Navigation Bar             -->
                        <li>
                            <a href="Home.php">Home</a>
                        </li>

                        <li class="active">
                            <a href="controlPanel.php">Control Panel</a>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a href="#">Link</a>
                        </li>

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>

                            <ul class="dropdown-menu">

                                <li>
                                    <a href="#">Action</a>
                                </li>

                                <li>
                                    <a href="#">Another action</a>
                                </li>

                                <li>
                                    <a href="#">Something else here</a>
                                </li>

                                <li class="divider">

                                </li>

                                <li>
                                    <a href="#">Separated link</a>
                                </li>

                            </ul>

                        </li>

                    </ul>

                </div>

            </nav>

            <div class="jumbotron">

                <h2>
                    Hello, world!
                </h2>

                <p>
                    This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                </p>

                <p>
                    <a class="btn btn-primary btn-large" href="#">Learn more</a>
                </p>

            </div>

        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>