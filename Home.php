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
    <title>Summer Quotes</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="https://code.jquery.com/jquery-3.1.0.min.js">
    <link href="assets/css/styles.css" rel="stylesheet" media="screen">

</head>

<body>

<div class="container">
    <div class='alert alert-success'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Hello <?php print($userRow['user_name']) ?></strong>,  Welcome to the members page.
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
                        <li>
                            <a href="controlPanel.php">Control Panel</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Option 1</a>
                                </li>
                                <li>
                                    <a href="#">Option 2</a>
                                </li>
                                <li>
                                    <a href="#">Option 3</a>
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
                <h2>
                    Hello, world!
                </h2>
                <p>
                    This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                </p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#extraInformation" aria-expanded="true" aria-controls="extraInformation">
                    Learn more
                </button>
                <br>
                <div class="collapse" id="extraInformation">
                    <div class="card card-block">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
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