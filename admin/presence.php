<?php include 'config/connect.php'; 
$selection=$db->query("SELECT * FROM stagiaires");
$select=$db->query("SELECT * FROM stagiaires");
$selectioner=$db->query("SELECT * FROM presence");


if (empty($_SESSION['user'])) {
  header('location:loginn.php');
}
 ?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'partials/_link.php';
?>

<!-- <link rel="stylesheet" type="text/css" href="date p/css/main.css"> -->
<!-- 
<link rel="stylesheet" type="text/css" href="date p/js/bootstrap-datepicker.min.js">
<link rel="stylesheet" href="date p/css/bootstrap-datepicker3.min.css">
 -->

<body>
<?php include 'partials/_nav.php'; ?>


    <!-- Sidebar -->
    <?php include 'partials/_navigation.php'; ?>
    <!-- /#sidebar-wrapper -->
    <?php include 'partials/_nav.php'; ?>

    <!-- Page Content -->

<!--  -->
<div class="mobile-menu-overlay"></div>
<div class="main-container">
<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data presence</h4>
					</div>
          <div class="row">
          <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#presenceModal">
                <i class="fa fa-plus">Add Presence</i> 
            </button>
          </div>
          <div class="col-md-10">
            
          
          <form action="presence.php" method="POST">
            <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                               
                  <select name="nom" class="select2" style="width: 100%;">
                  <option value=""></option>
                  <?php while($rech=$selection->fetch()) { ?> 
                  
                    <option value="<?=$rech['FirstName'];?>"><?=$rech['FirstName'];?></option>
                    <!-- <option>DESC</option> -->
                    <?php } ?>
                  </select>
                  
                </div>
                
                </div>
                <div class="col-md-4">
                <input type="date" id="dateP" name="dateP" class="form-control" width="100">

                </div>

                <div class="col-md-4">
                    
                    <button type="submit" class="btn btn-primary" id="filtre" name="filtre"><i class="fa fa-filter">filter</i></button>
                    <button type="submit" class="btn btn-primary" id="all" name="all"><i class="fa fa-sync-alt">refresh</i></button>

                  <a href="fpdf/tutorial/presencefiles.php?nom=<?=$_POST['nom']?>&datee=<?=$_POST['dateP'] ?>" target="_blank" class="btn btn-info btn-lg"><i class="fa fa-print"></i></a>     
                   
                </div>
            </div>
  
          </form>
          
          </div>
      </div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom</th>
									<th>Etat</th>
									<th>Date</th>
								
									
								</tr>
							</thead>
							<tbody>
              <?php 

              if (isset($_POST['filtre'])) {
                $donne=$_POST['dateP'];
                $donn2=$_POST['nom'];
                $reqq=$db->query("SELECT * FROM presence WHERE nom='$donn2' OR datePresence='$donne'");

                $res=$reqq->fetchAll(PDO::FETCH_OBJ);

                if(count($res)>0){
                  foreach($res as $row):?>
                  <tr>
                    <td><?= $row->id; ?></td>
                    <td><?= $row->nom; ?></td>
                      <td class="badge badge-<?php if($row->etat=='present'){echo("primary");}elseif($row->etat=='abscent'){echo("danger");}else{echo('warning');} ?>"><?= $row->etat ?></td>
                    <td><?= $row->datePresence; ?></td>
                    <!-- <td><a href="fpdf/tutorial/tuto5.php" class="btn btn-info btn-lg"><i class="fa fa-print"></i></a></td> -->
                  </tr>
                  <?php endforeach;?>
                 <?php }?>
                 <?php }elseif(isset($_POST['all'])){ 
                  $en=$db->query("SELECT * FROM presence");
                  $en->execute();
                  while($result=$en->fetch()){

                  ?>
                    <tr>
                      <td><?= $result['id'] ?></td>
                      <td><?= $result['nom'] ?></td>
                      <td class="badge badge-<?php if($result['etat']=='present'){echo("primary");}elseif($result['etat']=='abscent'){echo("danger");}else{echo('warning');} ?>"><?= $result['etat'] ?></td>
                      <td><?= $result['datePresence'] ?></td>
                      <!-- <td><a href="fpdf/tutorial/tuto5.php" class="btn btn-info btn-lg"><i class="fa fa-print"></i></a></td> -->
                    </tr>

                    <?php } }else{?>
                      <tr><td colspan="4">No data in this filter</td></tr>
                    <?php } ?>
							</tbody>
						</table>
					</div>
				</div>
</div>
</div>
<!--  -->



  
    
  <!-- </div> -->
  <!-- /#wrapper -->
<!-- bigining od modal -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="presenceModal" tabindex="-1" aria-labelledby="presenceModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="presenceModal">gestion de presence</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="forme">
            <div class="form-group">
                
            <!-- <div class="form-group">
                                    <label>Sort Order:</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>ASC</option>
                                        <option>DESC</option>
                                    </select>
                                </div> -->
                
                <select name="nom" class="form-control" id="nom">
                  <?php while($res=$select->fetch()){ ?>
                    <option value="<?= $res['FirstName'] ?>" ><?= $res['FirstName'] ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="form-group">
                <!-- <label for="datePresence">Date de presence</label>
                <div class="input-group date mg-check-in">
                  <div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
                  <input class="form-control" type="text" name="datePresence" id="datePresence" placeholder="date de pesence" autocomplete="off">
                </div> -->
                <input type="date" id="datePresence" name="datePresence" class="form-control">
            </div>
            <div class="form-group">
                <select name="etat" class="form-control" id="etat">
                    <option value="present" >Present</option>
                    <option value="abscent" >Abscent</option>
                    <option value="malade" >Malade</option>
                    
                </select>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="enrepresence" name="submitpresence" id="submitpresence" value="Ajouter">
               
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- ending of modal -->
  <!-- Bootstrap core JavaScript -->
  <?php include 'partials/_script.php'; ?>
<script>
    $(document).ready(function(){
        $('#enrepresence').on('click',function(){
            Swal.fire({
                type:'success',
                title:'record insert',
                text:'record has been insert'
            });
        });
    });
  </script>
<script>


$('document').ready(function(e){
    $('#forme').on('submit',function(e){
        e.preventDefault();
        var nom=$('#nom').val();
        var datePresence=$('#datePresence').val();
        var etat=$('#etat').val();
        
        if (nom !="" && datePresence !=""  && etat !="") {
            $.ajax({
                url:"AjoutPresence.php",
                method:"POST",
                data:{
                    nom:nom,
                    datePresence:datePresence,
                    etat:etat
                },
                dataType:"text",
                success:function(data){
                    
                    if (data==1){
                        alert("il existe");
                        $('#presenceModal').modal('hide');
                    }else{
                        alert("inserer avec succes");
                        $('#nom').val("");
                        $('#datePresence').val("");
                        $('#etat').val("");
                        $('#presenceModal').modal('hide');

                    }
                }
            });
        }else{
          alert("veuillez rensigner tous les champs");
         

        }
    });
});

</script>

</body>
</html>

