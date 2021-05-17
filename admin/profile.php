<?php 
  include 'config/connect.php';
 
  
  if (empty($_SESSION['user'])) {
    header('location:loginn.php');
  }
  $req=$db->prepare("SELECT * FROM users WHERE id=:idc");
?>

<?php 

if (isset($_POST['submitInfo'])) {
	$username=htmlspecialchars($_POST['username']);
	$nom=htmlspecialchars($_POST['nom']);
	$postnom=htmlspecialchars($_POST['postnom']);
	$email=htmlspecialchars($_POST['email']);
	if (!empty($nom) && !empty($postnom) && !empty($email)) {
		$modif=$db->prepare("UPDATE users SET nom=:nom,username=:username,postnom=:postnom,email=:email WHERE id=:idc");
		$modif->execute(array(
			':nom' => $nom,
			':postnom' => $postnom,
			':username' =>$username,
			':email' => $email,
			':idc' => $_SESSION['user']['id']
		));
		header('location:profile.php');
      
	}
}
if (isset($_POST['submitpwd'])) {
	$pass=$_POST['password'];
	$confirm=$_POST['confirm'];
	if (!empty($pass) && !empty($confirm)) {
		if ( $pass==$confirm) {
			$mod=$db->prepare("UPDATE users SET password=:password WHERE id=:idc");
			$mod->execute(array(
			':password' => $pass,
			':idc' => $_SESSION['user']['id']
		));
		header('location:profile.php');
		}else{
			echo '2 passwords not merge';
		}
	}else{
		echo 'remplit tous les champs';
	}
	

}






?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Profile</title>
	

	<?php include('partials/_link.php') ?>
</head>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	<?php include('partials/_nav.php'); ?>

	<?php include('partials/_navigation.php') ?>
	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">

						<div class="pd-20 card-box height-100-p">
							<div class="profile-photo">
							<?php
                            $req->execute(array(
                            'idc' => $_SESSION['user']['id']
                            ));  
                            $don=$req->fetchAll(PDO::FETCH_OBJ);
                            foreach($don as $s):  
                        ?>
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div class="img-container">
													<img id="image" src="vendors/images/photo2.jpg" alt="Picture">
												</div>
											</div>
											<div class="modal-footer">
												<input type="submit" value="Update" class="btn btn-primary">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
							<h5 class="text-center h5 mb-0">
							<?php 
                                    if ($_SESSION['user']['username'] !== array()) {
                                       $users = $_SESSION['user']['username'];
                                    echo "$users";
                                    }
                                ?>
							</h5>
							<p class="text-center text-muted font-14">I'am a super admin of this compony</p>
							<?php     
                                $req->execute(array(
                                'idc' => $_SESSION['user']['id']
                                ));  
                                $don=$req->fetchAll(PDO::FETCH_OBJ);
                                foreach($don as $s):  
                                ?>
                            <p><?=$s->username;?></p>

                            
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?=$s->email;?>
									</li>
									<li>
										<span>Nom:</span>
										<?=$s->nom;?>
									</li>
									<li>
										<span>PostNom:</span>
										<?=$s->postnom;?>
									</li>
									
								</ul>
							</div>
							<div class="profile-social">
								<h5 class="mb-20 h5 text-blue">Social Links</h5>
								<ul class="clearfix">
									<li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
									<!-- <li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li> -->
								</ul>
							</div>
							<!-- <div class="profile-skills">
								<h5 class="mb-20 h5 text-blue">Key Skills</h5>
								<h6 class="mb-5 font-14">HTML</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5 font-14">Css</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5 font-14">jQuery</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5 font-14">Bootstrap</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div> -->
							<?php endforeach ?>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										
										<li class="nav-item">
											<a class="nav-link " data-toggle="tab" href="#tasks" role="tab">Password</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Autres</a>
										</li>
									</ul>
									<div class="tab-content">
										
										<!-- Tasks Tab start -->
										<div class="tab-pane fade" id="tasks" role="tabpanel">
											<div class="pd-20 profile-task-wrap">
												<div class="container pd-0">
												<h5 class="mb-20 h5 text-blue">Secrets Informations</h5>
												<?php     
                                $req->execute(array(
                                'idc' => $_SESSION['user']['id']
                                ));  
                                $secret=$req->fetchAll(PDO::FETCH_OBJ);
                                foreach($secret as $secrets):  
                                ?>
													<div class="profile-task-list pb-30">
														<form action="profile.php" method="POST">
															<div class="form-group">
																<label for="password">Enter your secret number</label>
																<input class="form-control form-control-lg" type="text" name="password" value="<?=$secrets->password;?>">
															</div>
															<div class="form-group">
																<label for="confirm">confirm your secret number</label>
																<input class="form-control form-control-lg" type="text" name="confirm" value="">
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" name="submitpwd" value="Update Password">
															</div>
														</form>
													</div>
													<!-- Open Task End -->
													<?php endforeach; ?>
												</div>
											</div>
										</div>
										<!-- Tasks Tab End -->
										<!-- Setting Tab start -->
										<div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form action="profile.php" method="POST">
												<?php     
                                $req->execute(array(
                                'idc' => $_SESSION['user']['id']
                                ));  
                                $info=$req->fetchAll(PDO::FETCH_OBJ);
                                foreach($info as $infos):  
                                ?>
                            

													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
															<h4 class="text-blue h5 mb-20">Edit Your Personal Information</h4>
														<form action="profile.php" method="post">
															<div class="form-group">
																<label>UserName</label>
																<input class="form-control form-control-lg" name="username" id="username" value="<?=$infos->username;?>" type="text">
															</div>
															<div class="form-group">
																<label> Name</label>
																<input class="form-control form-control-lg" name="nom" id="nom" value="<?=$infos->nom;?>" type="text">
															</div>
															<div class="form-group">
																<label>Post-Nom</label>
																<input class="form-control form-control-lg" name="postnom" id="postnom" value="<?=$infos->postnom;?>" type="text">
															</div>
															<div class="form-group">
																<label>Email</label>
																<input class="form-control form-control-lg" name="email" id="email" type="email" value="<?=$infos->email;?>">
															</div>
															
															
															
															<div class="form-group">
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="customCheck1-1">
																	<label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification emails</label>
																</div>
															</div>
															<div class="form-group mb-0">
																<input type="submit"  name="submitInfo" class="btn btn-primary" value="Update Information">
															</div>
														</form>
														</li>
														<li class="weight-500 col-md-6">
															<h4 class="text-blue h5 mb-20">Edit Social Media links</h4>
															<div class="form-group">
																<label>Facebook URL:</label>
																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
															</div>
															<div class="form-group">
																<label>Twitter URL:</label>
																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
															</div>
															<div class="form-group">
																<label>Linkedin URL:</label>
																<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
															</div>
															<div class="form-group">
																<label>Instagram URL:</label>
																<input class="form-control form-control-lg" type="text" placeholder="Paste your instagram here">
															</div>
															<div class="form-group">
																<label>Google URL:</label>
																<input class="form-control form-control-lg" type="text" placeholder="Paste your google here">
															</div>

															<div class="form-group mb-0">
																<input type="submit" name="submitsetting" class="btn btn-primary" value="Save & Update">
															</div>
														</li>
													</ul>
													<?php endforeach;?>
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskManage By Pascovich kaluzi <a href="https://www.uptodatedevelopers.com" target="_blank">updev community </a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>
</html>