<?php
include('config/connect.php');
if (isset($_GET['nom'])) {
    $id=$_GET['nom'];
    // $req=$db->query("SELECT * FROM stagiaires WHERE id='$id'");
    
    //  $req->execute();
    // $res=$req->fetchAll();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
include 'partials/_link.php';
?>
</head>
<body>
<?php include 'partials/_nav.php'; ?>


    <!-- Sidebar -->
    <?php include 'partials/_navigation.php'; ?>
    <!-- /#sidebar-wrapper -->
    <?php include 'partials/_nav.php'; ?>

    <div class="mobile-menu-overlay"></div>
<div class="main-container">
<div class="row">

 
    <div class="col-md-2">
        <a href="presence.php" class="btn btn-primary">return</a>
    </div>
    
    <div class="col-md-8"><br>

    <h4>Bienvenu dans l'espace de <strong>Historique</strong></h4>
    <form action="show.php" method="POST">
    <div class="row">
        
        <div class="col-md-4">
            <input type="date" name="dateStage1" class="form-control" placeholder="from...">
        </div>
        <div class="col-md-4">
             <input type="date" name="dateStage2" class="form-control" placeholder="to...">
        </div>
        <div class="col-md-4">
            <select name="nom" id="nom" class="form-control">
                <option value="present">present</option>
                <option value="abscent">abscent</option>
                <option value="malade">malade</option>
            </select>
            
         </div>
                 
    </div>
    </form>   
    <table class="table hover multiple-select-row data-table-export nowrap">
	<thead>
        <tr>
            <th>Date de presence</th>
            <th>Status de presence</th>
        </tr>
    </thead>
    <tbody>
        <?php 

    // $en=$db->query("SELECT * FROM presence WHERE id='$_GET[id]'");
    $en=$db->query("SELECT * FROM presence WHERE nom='$_GET[nom]'");
    $en->execute();
    while($result=$en->fetch()){

    ?>
        <tr>
            <td><?=$result['datePresence']?></td>
            <td ><?=$result['etat']?></td> 
        </tr>
<?php } ?>

    </tbody>		
</table>


    </div>
    <div class="col-md-2">
    
    </div>
    
</div>
</div>

</body>
</html>