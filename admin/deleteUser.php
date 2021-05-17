<?php
include 'config/connect.php';
if(isset($_GET['del'])){
    $id=$_GET['del'];
    $delete=$db->prepare("DELETE FROM users where id=:id");
    $delete->execute(array(
        'id'=>$id
    ));
    // header('Location:user.php');
    header('Location:users.php?m=1');
}

// header('Content-type:application/json; charset=UTF-8');

// $response=array();

// if($_POST['delete']){
//     require_once 'config/connect.php';
//     $idp=intval($_POST['delete']);
//     $deletee=$db->prepare("DELETE FROM users where id=:id");
//     $deletee->execute(array(
//         'id'=>$idp
//     ));
//     if($deletee){
//         $response['status'] = 'success';
//         $response['message'] = 'user deleted avec success...';
//     }else{
//         $response['status'] = 'error';
//         $response['message'] = 'incapable de supprimer user...';
//     }
//     echo(json_encode($response));
// }

?>