<?php include('config/connect.php'); ?>
<?php
$query = $db->query("SELECT * FROM stagiaires");
if (empty($_SESSION['user'])) {
    header('location:loginn.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagiaire</title>
	<?php include('partials/_link.php'); ?>

</head>
<body>
    

    <?php include('partials/_nav.php'); ?>

    <?php include('partials/_navigation.php'); ?>

    <div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4" style="display: inline-block;">Data of stagiaires...</h4>
                        <div align="right" >
                        <button id="addUser" data-toggle="modal" data-target="#stagiaireModal"  style="display: inline-block;" class="btn btn-primary f-right"><i class="fa fa-plus"></i></button>

                        </div>
					</div>
					<?php if(isset($_GET['m'])): ?>
						<div class="flash-data" data-flashdata="<?= $_GET['m']; ?>">
						
						</div>
					<?php else:

					?>
					<?php endif ?>
					<div class="pb-20">
						<table id="user_data" class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
                                    <th width="10%">#</th>
                                    
									<!-- <th class="table-plus datatable-nosort">Name</th> -->
									<th width="10%">Nom</th>
									<th width="10%">PostNom</th>
									<th width="10%">Sexe</th>
									<th width="10%">Institution</th>
									<th width="10%">DateDebut</th>
									<th width="10%">DateFin</th>
									<th width="10%">Nbre Jour</th>

									<th width="10%">Ville</th>
									<!-- <th width="10%">E-mail</th> -->
									<th >Actions</th>
									
								</tr>
							</thead>
							<tbody>
                            <?php while($etul= $query->fetch()){ ?>
								<tr>
									<!-- seen modal
									<div class="modal fade" id="showModal<?=$etul['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myLargeModalLabel">Show stagiaire</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												</div>
											<form action="" method="POST" id="showStagiaire" enctype="multipart/form-data">

											<div class="modal-body">
												<input type="hidden" name="id" id="id" value="<?=$etul['id'];?>">
												<label for="nom">name : </label>
												<input type="text" id="nom" name="nom" value="<?=$etul['FirstName'];?>"  class="form-control">
												<label for="postnom">PostNom : </label>
												<input type="text" id="postnom" name="postnom" value="<?=$etul['LastName'];?>" class="form-control">
												<label for="sexe">Sexe</label>
												<input type="text" id="sexe" name="sexe" value="<?=$etul['sexe'];?>" class="form-control"><br>
												
												<label for="institution">Institution : </label>
												<input type="text" id="institution" name="institution" value="<?=$etul['Institution'];?>" class="form-control"><br>
												
												<label for="datedebut">Date debut : </label>
													<input type="date" id="datedebut" name="datedebut" value="<?=$etul['DateDebut'];?>" class="form-control">
													<label for="datefin">Date Fin : </label>
													<input type="date" id="datefin" name="datefin" value="<?=$etul['DateFin'];?>" class="form-control disabled">
												<label for="nbrjour">Nbre jour : </label>
													<input type="text" id="nbrjour" name="nbrjour" value="<?=$etul['nbrJour'];?>"  class="form-control">
												<label for="nbrjour">ville : </label>
												<input type="text" id="ville" name="ville" value="<?=$etul['ville'];?>" class="form-control">
												
											
											</div>
											<div class="modal-footer">
												
												< <input type="submit" class="btn btn-success" value="Update"> -->
												<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
												<!-- <button type="button" class="btn btn-primary">Save</button> -->
											<!-- </div> -->
											<!-- </form> -->
										<!-- </div> -->
			
	        						<!-- </div> -->
								<!-- modal edit -->
									<div class="modal fade" id="editModal<?=$etul['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myLargeModalLabel">Edit user</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												</div>
											<form action="updateStagiaire.php" method="POST" id="editStagiaire" enctype="multipart/form-data">

											<div class="modal-body">
												<input type="hidden" name="id" id="id" value="<?=$etul['id'];?>">
												<label for="nom">name : </label>
												<input type="text" id="nom" name="nom" value="<?=$etul['FirstName'];?>"  class="form-control">
												<label for="postnom">PostNom : </label>
												<input type="text" id="postnom" name="postnom" value="<?=$etul['LastName'];?>" class="form-control">
												<label for="sexe">Sexe</label>
												<input type="text" id="sexe" name="sexe" value="<?=$etul['sexe'];?>" class="form-control"><br>
												
												<label for="institution">Institution : </label>
												<input type="text" id="institution" name="institution" value="<?=$etul['Institution'];?>" class="form-control"><br>
												
												<label for="datedebut">Date debut : </label>
													<input type="date" id="datedebut" name="datedebut" value="<?=$etul['DateDebut'];?>" class="form-control">
													<label for="datefin">Date Fin : </label>
													<input type="date" id="datefin" name="datefin" value="<?=$etul['DateFin'];?>" class="form-control disabled">
												<label for="nbrjour">Nbre jour : </label>
													<input type="text" id="nbrjour" name="nbrjour" value="<?=$etul['nbrJour'];?>"  class="form-control">
												<label for="nbrjour">ville : </label>
												<input type="text" id="ville" name="ville" value="<?=$etul['ville'];?>" class="form-control">
												
											
											</div>
											<div class="modal-footer">
												
												<input type="submit" class="btn btn-success" value="Update">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<!-- <button type="button" class="btn btn-primary">Save</button> -->
											</div>
											</form>
										</div>
			
	        						</div>
									

									<!-- <td class="table-plus">Gloria F. Mead</td> -->
									<td><?=$etul['id']?></td>
                                    <td><?=$etul['FirstName']?></td>
                                    <td><?=$etul['LastName']?></td>
                                    <td><?=$etul['sexe']?></td>
                                    <td><?=$etul['Institution']?></td>
                                    <td><?=$etul['DateDebut']?></td>
                                    <td ><?=$etul['DateFin']?></td>
                                    <td><?=$etul['nbrJour']?></td>
                                    <td><?=$etul['ville']?></td>
                                    <!-- <td><?=$etul['email']?></td> -->
                                    <td>
                        
                                        <!-- <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a> -->
										
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?=$etul['id'];?>">
                                        <i class="fa fa-edit"></i>
										</button>
										<a href="deleteStagiaire.php?del=<?=$etul['id']; ?>" id="deletestagiaire" class="btn btn-danger deletestagiaire"><i class="fa fa-trash"></i></a>

                                        
                                        <!-- <a href="" onclick="return(confirm('Voulez-vous supprimer?'))" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->

                                        <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#showModal<?=$etul['id'];?>">
                                        <i class="fa fa-eye"></i>
                                        </button> -->
										
                                    </td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
    </div>
    <div class="col-md-4 col-sm-12 mb-30">
		<div class="pd-20 card-box height-100-p">
			<h5 class="h4">Add stagiaire</h5>
	
			<div class="modal fade" id="stagiaireModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Add stagiaire</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
                    <form action="" method="post" id="stagiaireForm" enctype="multipart/form-data">

					<div class="modal-body">
          
                        <label for="nom">nom : </label>
                        <input type="text" id="nom" name="nom" value=""  class="form-control"><br>
                        <label for="postnom">PostNom : </label>
                        <input type="text" id="postnom" name="postnom" value="" class="form-control"><br>
                        <Label for="sexe">Sexe:</Label>
                        <select name="sexe" id="sexe">
                            <option value="m">masculin</option>
                            <option value="f">feminin</option>
                        </select><br>
                        <label for="institution">Instituion : </label>
                        <input type="text" id="institution" name="institution" value="" class="form-control"><br>
                        <label for="datedebut">Date debut : </label>
                        <input type="date" id="datedebut" name="datedebut" value="" class="form-control"><br>
                        <label for="datefin">Date Fin : </label>
                        <input type="date" id="datefin" name="datefin" value="" class="form-control"><br>
                        
                        <label for="email">E-mail : </label>
                            <input type="email" id="email" name="email" value="" class="form-control">
                        <label for="ville">Ville : </label>
                            <input type="text" id="ville" name="ville" value=""  class="form-control">
					</div>
					<div class="modal-footer">
                        
                        <input type="submit" class="btn btn-success" value="Save">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<!-- <button type="button" class="btn btn-primary">Save</button> -->
					</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
    <?php include('partials/_script.php'); ?>

<script>
    $(document).ready(function(){
    

        $('#stagiaireForm').on('submit',function(event){
            event.preventDefault();
        var nom = $('#nom').val();
		var postnom = $('#postnom').val();
		var sexe = $('#sexe').val();
        var institution = $('#institution').val();
        var email = $('#email').val();
        var datedebut = $('#datedebut').val();
        var datefin = $('#datefin').val();
		var ville = $('#ville').val();	
		if(nom != '' && postnom != '' && sexe != '' && email != '' && institution != '' && datedebut != '' && datedebut != '' && ville != '')
		{
			$.ajax({
				url:"insertStagiaire.php",
				method:'POST',
				data:{
						nom:nom,
						postnom:postnom,
                        sexe:sexe,
                        institution:institution,
                        email:email,
                        datedebut:datedebut,
                        datefin:datefin,
                        ville:ville
					},
					dataType:'text',
					success:function(data){
						if (data==1) {
							alert('il existe deja');
						}else{
							alert('insert avec success');
							$('#nom').val('');
							$('#postnom').val('');
							$('#sexe').val('');
							$('#institution').val('');
							$('#email').val('');
							$('#datedebut').val('');
							$('#datefin').val('');
							$('#ville').val('');
                            $('#stagiaireModal').modal('hide');
						}
					}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});

	// $('#editStagiaire').on('submit',function(event){
    //         event.preventDefault();
    //     var nom = $('#nom').val();
	// 	var postnom = $('#postnom').val();
	// 	var sexe = $('#sexe').val();
    //     var institution = $('#institution').val();
    //     // var email = $('#email').val();
    //     var datedebut = $('#datedebut').val();
    //     var datefin = $('#datefin').val();
	// 	var ville = $('#ville').val();	
	// 	if(nom != '' && postnom != '' && sexe != '' && institution != '' && datedebut != '' && datedebut != '' && ville != '')
	// 	{
	// 		$.ajax({
	// 			url:"updateStagiaire.php",
	// 			method:'POST',
	// 			data:{
	// 					nom:nom,
	// 					postnom:postnom,
    //                     sexe:sexe,
    //                     institution:institution,
    //                     // email:email,
    //                     datedebut:datedebut,
    //                     datefin:datefin,
    //                     ville:ville
	// 				},
	// 				dataType:'text',
	// 				success:function(data){
	// 					if (data==1) {
	// 						alert('il existe deja');
	// 					}else{
	// 						alert('insert avec success');
	// 						$('#nom').val('');
	// 						$('#postnom').val('');
	// 						$('#sexe').val('');
	// 						$('#institution').val('');
	// 						// $('#email').val('');
	// 						$('#datedebut').val('');
	// 						$('#datefin').val('');
	// 						$('#ville').val('');
    //                         $('#stagiaireModal').modal('hide');
	// 					}
	// 				}
	// 		});
	// 	}
	// 	else
	// 	{
	// 		alert("Both Fields are Required");
	// 	}
	// });

}) ;
 
</script>
<script>
    $(document).ready(function(){
        $('.deletestagiaire').on('click',function(e){
            e.preventDefault();
            const href=$(this).attr('href');

            swal.fire({
              title:'Vous etes sur de vouloir supprimer?',
              text:'Ca va etre effacer pour toujours',
              type:'warning',
              showCancelButton:true,
              confirmButtonColor:'#3085d6',
              cancelButtonColor:'#FF0000',
              confirmButtonText:'Yes,delete it',
            //   showLoaderOnConfirm:true,
            }).then((result) => {
                if(result.value){
                    document.location.href=href;
                }
            })
        });
        const flashdata=$('.flash-data').data('flashdata');
        if(flashdata){
            Swal.fire({
                type:'success',
                title:'record deleted',
                text:'record has been deleted'
            });
        }
    });
    
  </script>
</body>
</html>