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
<!-- <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg">Launch demo modal</a> -->

					</div>
          <div class="row">
          <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#presenceModal">
                <i class="fa fa-plus">Add Presence</i> 
            </button>
          </div>
        
        </div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom</th>
                  <th>Voir</th>
									<!-- <th>Etat</th> -->
								
								
									
								</tr>
							</thead>
							<tbody>
              <?php 
              
                  $en=$db->query("SELECT * FROM presence");
                  $en->execute();
                  while($result=$en->fetch()){

                  ?>



                    <tr>
                      <td><?= $result['id'] ?></td>
                      <td><?= $result['nom'] ?></td>
                      <!-- <td><button class="btn btn-success view" id="<?= $result['id'] ?>"><i class="fa fa-eye"></i> </button></td> -->
                      <!-- <td><button class="btn btn-success view" data-toggle="modal" data-target="#viewmodal" id="<?= $result['id'] ?>"><i class="fa fa-eye"></i> </button></td> -->
                      <td><a href="show.php?nom=<?= $result['nom'] ?>" class="btn btn-primary">
                      <i class="fa fa-eye"></i></a>
                </td>
                      <!-- <td><a href="fpdf/tutorial/tuto5.php" class="btn btn-info btn-lg"><i class="fa fa-print"></i></a></td> -->
                    </tr>

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
                <label for="datePresence">Date de presence</label>
                <div class="input-group date mg-check-in">
                  <div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
                  <input class="form-control" type="text" name="datePresence" id="datePresence" placeholder="date de pesence" autocomplete="off">
                </div>
                <!-- <input type="date" id="datePresence" name="datePresence" class="form-control"> -->
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


<!-- // modal of information -->
<!-- 
<div class="col-md-4 col-sm-12 mb-30">
              <div class="pd-20 card-box height-100-p">
                <h5 class="h4">Information de </h5> -->
               
                <div class="modal fade bs-example-modal-lg " id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <form action="" method="post" >
                      <div class="modal-body">
                      
                      <input type="text" id="user_id" class="form-control">
                      <!-- debut de form wizard -->
                    
                      <div class="wizard-content">
                          <form class="tab-wizard wizard-circle wizard" method="" action="">
                            <h5>Rapport de Pascovich</h5>
                            <input type="text" id="id" name="id">
                            <input type="text" id="nom" name="nom">
                            <div class="row">
                                  <div class="col-md-4">
                                      <input type="date" name="dateStage" class="form-control" placeholder="09/09/9090">
                                  </div>
                                  <div class="col-md-4">
                                  <input type="date" name="dateStage" class="form-control" placeholder="to 09/09/2019">
                                
                                  </div>
                                  <div class="col-md-4">
                                  <input type="text" class="form-control" name="nom" id="nom">

                                  </div>
                    
                            </div>
                  
                          </form><br>
                          <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                  <th>#</th>
                                  <th>Date</th>
                                  <th>Status presence</th>
                            </tr>
                        </thead>
                        <tbody class="table">
                            <tr>
                                <td>1</td>
                                <td>12/12/2017</td>
                                <td>premier</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>12/12/2017</td>
                                <td>deuxieme</td>
                            </tr>
                        </tbody>
                    </table>
           
					</div>
                      <!-- end de form wizard -->
                        
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              <!-- </div>
					</div> -->



<!-- // end modal of information -->

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
        
    
    $(document).on('click', '.view', function(){
      // $('#viewmodal').modal('show');

		var id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{id:id},
			dataType:"json",
			success:function(data)
			{
				// $('#viewmodal').modal('show');
				$('#id').val(id);
				$('#nom').val(data.nom);
				// $('.modal-title').text("Edit User");
				// $('#user_id').val(user_id);
				// $('#user_uploaded_image').html(data.user_image);
				// $('#action').val("Edit");
				// $('#operation').val("Edit");
			}
		});
	});
});
  </script>
<script>


$(document).ready(function(e){
        // $('.view').on('click',function(){
        //   var stage=$('this').attr('id');

        // });

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

