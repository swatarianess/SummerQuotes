<?php
require_once 'handlers/dbconfig.php';

if($user->is_loggedin()!="")
{
	$user->redirect('Home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = $_POST['user_email'];
	$umail = $_POST['user_email'];
	$upass = $_POST['password'];

	if($user->login($uname,$umail,$upass))
	{
		$user->redirect('Home.php');
	}
	else
	{
		$error = 'Username or password is incorrect';
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

<section class="container login-form">
	<section>

		<form method="post" role="login" id="login-form" novalidate>
			<h1> Login </h1>

			<div id="error">
				<?php
				if(isset($error))
				{
					?>
					<div class="alert alert-danger">
						<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
					</div>
					<?php
				}
				?>
			</div>

			<div class="form-group">
				<input type="email" name="user_email" id="user_email" required class="form-control" placeholder="Enter email or nickname" />
				<span class="glyphicon glyphicon-user"></span>
			</div>

			<div class="form-group">
				<input type="password" name="password" id="password" required class="form-control" placeholder="Enter password" />
				<span class="glyphicon glyphicon-lock"></span>
			</div>

			<button type="submit" name="btn-login" id="btn-login" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Login Now</button>

			<a href="#">Reset password</a> or <a href="Register.php">create account</a>
		</form>
	</section>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>