<?php 
  include 'config/connect.php';

  if (isset($_POST['username']) && isset($_POST['password'])) {

  	  $username = htmlspecialchars($_POST['username']);
  	  $password = htmlspecialchars($_POST['password']);

  	  $requete = $db->prepare("SELECT * FROM users WHERE (username=:username OR email=:username) AND password=:password");
  	  $requete->execute(array(
      'username' => $username,
      'password' => $password
  	  ));
  	  $res = $requete->fetchAll(PDO::FETCH_OBJ);
  	   if ($res) {
  	   	$userr->con($res[0]->id);
  	   	header('location:index.php');
  	   }else{
			 $errors="username or password invalid";
		 }


  }
 ?>



<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div> -->
			<div class="login-menu">
				<ul>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div> 
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To Updev stage management</h2>
						</div>
						<form action="loginn.php" method="post">
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="admin">
										<div class="icon"><img src="vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Manager
									</label>
									<label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Stagiare
									</label>
								</div>
							</div>
							<?php 
							if (isset($errors)):?>
								<div class="alert alert-danger">
								<p><?=$errors?></p>
								</div>
							
							
							<?php endif; ?>
							<div class="input-group custom">
								<input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="password" id="password" value="" class="form-control form-control-lg" placeholder="**********">
								
								<div class="input-group-append custom">
									<span class="input-group-text"><i onclick="Afficher()" class="dw dw-eye"></i></span>
								</div>
							</div>
							<!-- <input type="checkbox" onclick="Afficher()"> Afficher le mot de passe -->
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign in" name="">
										
										<!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	
<script>
	function Afficher()
	{ 
		var input = document.getElementById("password"); 
		if (input.type === "password")
		{ 
		input.type = "text"; 
		} 
		else
		{ 
		input.type = "password"; 
		} 
	} 
</script>


</body>
</html>

<!-- <input type="password" value="1formatik" id="motdepasse">
<input type="checkbox" onclick="Afficher()"> Afficher le mot de passe -->
