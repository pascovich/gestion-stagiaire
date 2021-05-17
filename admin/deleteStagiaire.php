<?php
include 'config/connect.php';
if(isset($_GET['del'])){
    $id=$_GET['del'];
    $delete=$db->prepare("DELETE FROM stagiaires where id=:id");
    $delete->execute(array(
        'id'=>$id
    ));
    header('Location:stagiaire.php.?m=1');
}


?>

