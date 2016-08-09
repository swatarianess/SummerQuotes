<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
    <title>Summer Quotes</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section class="container Register-form">
    <section>
        <form method="POST" action="" role="register">
<!--            <img src="assets/images/logo.png" alt="" class="img-responsive" />-->
            <h1>Register</h1>
            <div class="form-group">
                <input type="email" name="email" required class="form-control" placeholder="Enter email or nickname" />
                <span class="glyphicon glyphicon-user"></span>
            </div>

            <div class="form-group">
                <input type="password" name="password" required class="form-control" placeholder="Enter password" />
                <span class="glyphicon glyphicon-repeat"></span>
            </div>

            <div class="form-group">
                <input type="password" name="password" required class="form-control" placeholder="Re-enter password" />
                <span class="glyphicon glyphicon-repeat"></span>
            </div>

            <button type="submit" class="btn btn-primary btn-block" name="btn-register" id="btn-register">Register</button>

            <a href="login.php">I already have an account</a>


        </form>
    </section>
</section>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>