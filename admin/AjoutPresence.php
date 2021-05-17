<?php

include 'config/connect.php';

extract($_POST);
$nom=$_POST['nom'];
$datePresence=$_POST['datePresence'];
$verify=$db->query("SELECT * FROM presence WHERE nom='$nom' AND datePresence='$datePresence'");
$result=$verify->fetchAll(PDO::FETCH_OBJ);
// $ver=$verify->rowCount();

if(count($result) >= 1){?>
    <script>
        alert("desole cette presence existe deja pour la date choisie");
    </script>
<?php }else{

$req=$db->prepare("INSERT INTO presence(nom,etat,datePresence) values(:nom,:etat,:datePresence)");
$req->execute(array(
    ':nom'=>$nom,
    ':etat'=>$_POST['etat'],
    ':datePresence'=>$datePresence
));

header('Location:presence.php');
}
?>

<!-- $donne=$_POST['dateP'];
          $donn2=$_POST['nom'];
            $reqq=$db->query("SELECT * FROM presence WHERE nom='$donn2' OR datePresence='$donne'");
        
        $res=$reqq->fetchAll(PDO::FETCH_OBJ);
        
          if(count($res)>0){ -->