<?php
require_once 'login/dbconfig.php';

if($user->is_loggedin()!="")
{
    $user->redirect('Home.php');
}

if(isset($_POST['btn-register']))
{
    $uname = trim($_POST['username']);
    $umail = trim($_POST['email']);
    $upass = trim($_POST['password']);
    $upass2 = trim($_POST['cpassword']);

    if($uname=="") {
        $error[] = "provide username !";
    }
    else if($umail=="") {
        $error[] = "provide email id !";
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address !';
    }
    else if($upass=="") {
        $error[] = "provide password !";
    }
    else if(strlen($upass) < 6){
        $error[] = "Password must be atleast 6 characters";
    }
    else if($upass != $upass2){
        $error[] = "Password's do not match";
    }
    else
    {
        try
        {
            $stmt = $db_con->prepare("SELECT user_name,user_email FROM tbl_users WHERE user_name=:uname OR user_email=:umail");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['user_name']==$uname) {
                $error[] = "sorry username already taken !";
            }
            else if($row['user_email']==$umail) {
                $error[] = "sorry email id already taken !";
            }
            else
            {
                if($user->register($uname,$umail,$upass))
                {
                    $user->redirect('Register.php?joined');
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
?>
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
        <form method="post" role="register">
<!--            <img src="assets/images/logo.png" alt="" class="img-responsive" />-->
            <h1>Register</h1>

            <div id="error">
                <?php
                if(isset($error))
                {
                    foreach($error as $error)
                    {
                        ?>
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                        </div>
                        <?php
                    }
                }
                else if(isset($_GET['joined']))
                {
                    ?>
                    <div class="alert alert-info">
                        <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a> here
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="form-group">
                <input type="text" name="username" required class="form-control" placeholder="Enter username" value="<?php if(isset($error)){echo $uname;}?>" />
                <span class="glyphicon glyphicon-user"></span>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" required class="form-control" placeholder="Enter email address" value="<?php if(isset($error)){echo $umail;}?>" />
                <span class="glyphicon glyphicon-user"></span>
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" required class="form-control" placeholder="Enter password" />
                <span class="glyphicon glyphicon-repeat"></span>
            </div>

            <div class="form-group">
                <input type="password" id="cpassword" name="cpassword" required class="form-control" placeholder="confirm password" />
                <span class="glyphicon glyphicon-repeat"></span>
            </div>

            <button type="submit" class="btn btn-primary btn-block" name="btn-register" id="btn-register">Register</button>

            <a href="login.php">I already have an account</a>


        </form>
    </section>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>