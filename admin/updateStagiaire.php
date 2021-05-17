<?php include('config/connect.php'); 
    // include('function.php');
    extract($_POST);
    $datedebut=$_POST['datedebut'];
    $datefin=$_POST['datefin'];

    $date1=strtotime($datedebut);
    $date2=strtotime($datefin);
    $jour=$date2-$date1;
    $daynbre=$jour/86400;
    $id=$_POST['id'];
	$query=$db->prepare("UPDATE stagiaires SET FirstName=:FirstName,LastName=:LastName,sexe=:sexe,Institution=:Institution,ville=:ville,DateDebut=:DateDebut,DateFin=:DateFin,nbrJour=:nbrJour WHERE id=:id ");
	$query->execute(array(
		':FirstName' =>$_POST['nom'],
		':LastName' => $_POST['postnom'],
		':sexe' => $_POST['sexe'],
		':Institution' => $_POST['institution'],
		// ':email' => $_POST['email'],
		':ville' => $_POST['ville'],
		':DateDebut' => $_POST['datedebut'],
		':DateFin' => $_POST['datefin'],
		':nbrJour' => $daynbre,
        ':id'=> $id		
	));
    if ($query) {
        header('Location:stagiaire.php');
    }
?>