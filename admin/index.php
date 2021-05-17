<?php 
  include 'config/connect.php';
  
  $select=$db->query("SELECT COUNT(*) AS id FROM stagiaires");
  $usr=$db->query("SELECT COUNT(*) AS id FROM users");
  $masc=$db->query("SELECT COUNT(*) AS id FROM stagiaires WHERE sexe='m'");
  $fem=$db->query("SELECT COUNT(*) AS id FROM stagiaires WHERE sexe='f'");
  
  if (empty($_SESSION['user'])) {
    header('location:loginn.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Updev - Stagiaires</title>

	<?php include('partials/_link.php'); ?>
</head>
<body>
	<?php include('partials/_preload.php'); ?>

	<?php include('partials/_nav.php'); ?>

	<?php include('partials/_navigation.php'); ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">
								<?php if($_SESSION['user']['username']){
									$users=$_SESSION['user']['username'];
									echo($users);
								} ?>
							</div>
						</h4>
						<p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<?php while($stg=$select->fetch()){ ?>
							<div class="widget-data">
								<div class="h4 mb-0"><?=$stg['id'];?></div>
								<div class="weight-600 font-14">Stagiaires</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<?php while($util=$masc->fetch()){ ?>
							<div class="widget-data">
								<div class="h4 mb-0"><?=$util['id'];?></div>
								<div class="weight-600 font-14">Stagiaires masculin</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<?php while($util=$fem->fetch()){ ?>
							<div class="widget-data">
								<div class="h4 mb-0"><?=$util['id'];?></div>
								<div class="weight-600 font-14">Stagiaires feminin</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<?php while($util=$usr->fetch()){ ?>
							<div class="widget-data">
								<div class="h4 mb-0"><?=$util['id'];?></div>
								<div class="weight-600 font-14">Users</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div>
			
			
			<div class="footer-wrap pd-20 mb-20 card-box">
				StageApp - Updev community By <a href="https://www.uptodatedevelopers.com" target="_blank">Pascovich</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<?php include('partials/_script.php'); ?>
</body>
</html>