<?php include('config/connect.php'); ?>
<?php
$query = $db->query("SELECT * FROM users");

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
    <title>Users</title>
	<?php include('partials/_link.php'); ?>

</head>
<body>
    

    <?php include('partials/_nav.php'); ?>

    <?php include('partials/_navigation.php'); ?>

    <div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4" style="display: inline-block;">Data of users...</h4>
                        <div align="right" >
                        <button id="addUser" data-toggle="modal" data-target="#userModal"  style="display: inline-block;" class="btn btn-primary f-right"><i class="fa fa-plus"></i></button>

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
                                    <th>#</th>
                                    <th>Image</th>
									<!-- <th class="table-plus datatable-nosort">Name</th> -->
									<th>Nom</th>
									<th>PostNom</th>
									<th>Username</th>
									<th>E-mail</th>
									<th>Actions</th>
									
								</tr>
							</thead>
							<tbody>
                            <?php while($etul= $query->fetch()){ ?>
								<tr>
        
	
			<div class="modal fade" id="editModal<?=$etul['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Edit user</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
                    <form action="updateUser.php" method="POST" id="editForm" enctype="multipart/form-data">

					<div class="modal-body">
						<input type="hidden" name="id" id="id" value="<?=$etul['id'];?>">
                        <label for="nom">name : </label>
                        <input type="text" id="nom" name="nom" value="<?=$etul['nom'];?>"  class="form-control">
                        <label for="postnom">PostNom : </label>
                        <input type="text" id="postnom" name="postnom" value="<?=$etul['postnom'];?>" class="form-control">
                        <label for="username">UserName : </label>
                        <input type="text" id="username" name="username" value="<?=$etul['username'];?>" class="form-control"><br>
                        <label>Select User Image</label>
                        <input type="file" name="image" value="<?=$etul['image'];?>" id="image" />
                        <span id="user_uploaded_image"></span>
                        <label for="email">E-mail : </label>
                            <input type="email" id="email" name="email" value="<?=$etul['email'];?>" class="form-control">
                        <label for="password">Password : </label>
                            <input type="password" id="password" name="password" value="<?=$etul['password'];?>"  class="form-control">
                        <label for="confirm">Confirm : </label>
                        <input type="text" id="confirm" name="confirm" value="" class="form-control">
                        
                    
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
                                    <td><?=$etul['image']?></td>
                                    <td><?=$etul['nom']?></td>
                                    <td><?=$etul['postnom']?></td>
                                    <td><?=$etul['username']?></td>
                                    <td><?=$etul['email']?></td>
                                    <td>
                                        
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?=$etul['id'];?>">
                                        <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="deleteUser.php?del=<?=$etul['id']; ?>" id="deleteuser" class="btn btn-danger deleteuser"><i class="fa fa-trash"></i></a>
                                        
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
			<h5 class="h4">Add user</h5>
	
			<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Add user</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
                    <form action="" method="POST" id="userForm" enctype="multipart/form-data">

					<div class="modal-body">
          
                        <label for="nom">name : </label>
                        <input type="text" id="nom" name="nom" value=""  class="form-control">
                        <label for="institution">PostNom : </label>
                        <input type="text" id="postnom" name="postnom" value="" class="form-control">
                        <label for="username">UserName : </label>
                        <input type="text" id="username" name="username" value="" class="form-control"><br>
                        <label>Select User Image</label>
                        <input type="file" name="image" id="image" />
                        <span id="user_uploaded_image"></span>
                        <label for="email">E-mail : </label>
                            <input type="email" id="email" name="email" value="" class="form-control">
                        <label for="ville">Password : </label>
                            <input type="password" id="password" name="password" value=""  class="form-control">
                        <label for="nbrJour">Confirm : </label>
                        <input type="text" id="confirm" name="confirm" value="" class="form-control">
                        
                    
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
    
        $('#userForm').on('submit',function(event){
            event.preventDefault();
        var nom = $('#nom').val();
		var postnom = $('#postnom').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirm = $('#confirm').val();
		var extension = $('#image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#image').val('');
				return false;
			}
		}	
		if(nom != '' && postnom != '' && username != '' && email != '' && password != '' )
		{
			$.ajax({
				url:"insertUser.php",
				method:'POST',
				data:{
						nom:nom,
						postnom:postnom,
                        username:username,
                        email:email,
                        password:password,
                        image:image
					},
					dataType:'text',
					success:function(data){
						if (data==1) {
							alert('il existe deja');
						}else{
							alert('insert avec success');
							$('#nom').val('');
							$('#postnom').val('');
							$('#username').val('');
							$('#email').val('');
							$('#password').val('');
                            $('#userModal').modal('hide');
						}
					}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});

    $('#userEdit').on('submit',function(event){
            event.preventDefault();
        var nom = $('#nom').val();
		var postnom = $('#postnom').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirm = $('#confirm').val();
		var extension = $('#image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#image').val('');
				return false;
			}
		}	
		if(nom != '' && postnom != '' && username != '' && email != '' && password != '')
		{
			$.ajax({
				url:"user.php",
				method:'POST',
				data:{
						nom:nom,
						postnom:postnom,
                        username:username,
                        email:email,
                        password:password,
                        image:image
					},
					dataType:'text',
					success:function(data){
						if (data==1) {
							alert('il existe deja');
						}else{
							alert('insert avec success');
							$('#nom').val('');
							$('#postnom').val('');
							$('#username').val('');
							$('#email').val('');
							$('#password').val('');
                            $('#userModal').modal('hide');
						}
					}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
}) ;
 
</script>
<!-- <script>
    $(document).ready(function(){
        $('#enreuser').on('click',function(){
            Swal.fire({
                type:'success',
                title:'record insert',
                text:'record has been insert'
            });
        });
    });
  </script> -->
  <script>
    $(document).ready(function(){
        $('.deleteuser').on('click',function(e){
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