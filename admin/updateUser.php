<?php include('config/connect.php'); 
    // include('function.php');
    extract($_POST);
    
    $id=$_POST['id'];
	$query=$db->prepare("UPDATE users SET nom=:nom,postnom=:postnom,email=:email,username=:username,password=:password,image=:image WHERE id=:id ");
	$query->execute(array(
		':nom' =>$_POST['nom'],
		':postnom' => $_POST['postnom'],
		':email' => $_POST['email'],
		':username' => $_POST['username'],
		':password' => $_POST['password'],
		':image' => $image,
        ':id'=> $id		
	));
    if ($query) {
        header('Location:users.php');
    }
?>