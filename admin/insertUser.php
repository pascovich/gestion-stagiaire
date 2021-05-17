<?php include('config/connect.php'); 
    include('function.php');
    extract($_POST);

    $image = '';
    if($_FILES["image"]["name"] != '')
    {
        $image = upload_image();
    }
	$query=$db->prepare("INSERT INTO users(nom,postnom,email,username,password,image) VALUES(:nom,:postnom,:email,:username,:password,:image) ");
	$query->execute(array(
		':nom' =>$_POST['nom'],
		':postnom' => $_POST['postnom'],
		':email' => $_POST['email'],
		':username' => $_POST['username'],
		':password' => $_POST['password'],
		':image' => $image
	));
    if ($query) {
        header('Location:users.php');
    }

    // if(isset($_POST["operation"]))
    // {
    //     if($_POST["operation"] == "Add")
    //     {
    //         $image = '';
    //         if($_FILES["image"]["name"] != '')
    //         {
    //             $image = upload_image();
    //         }
    //         $statement = $connection->prepare("INSERT INTO users (nom,postnom,email,password,image) 
    //             VALUES (:nom,:postnom,:email,:password,:image)");
    //         $result = $statement->execute(
    //             array(
    //                 ':nom'	=>	$_POST["nom"],
    //                 ':postnom'	=>	$_POST["postnom"],
    //                 ':email'	=>	$_POST["email"],
    //                 ':password'	=>	$_POST["password"],
    //                 ':image'		=>	$image
    //             )
    //         );
    //         if(!empty($result))
    //         {
    //             echo 'Data Inserted';
    //         }
    //     }
        // if($_POST["operation"] == "Edit")
        // {
        //     $image = '';
        //     if($_FILES["user_image"]["name"] != '')
        //     {
        //         $image = upload_image();
        //     }
        //     else
        //     {
        //         $image = $_POST["hidden_user_image"];
        //     }
        //     $statement = $connection->prepare(
        //         "UPDATE users 
        //         SET first_name = :first_name, last_name = :last_name, image = :image  
        //         WHERE id = :id
        //         "
        //     );
        //     $result = $statement->execute(
        //         array(
        //             ':first_name'	=>	$_POST["first_name"],
        //             ':last_name'	=>	$_POST["last_name"],
        //             ':image'		=>	$image,
        //             ':id'			=>	$_POST["user_id"]
        //         )
        //     );
        //     if(!empty($result))
        //     {
        //         echo 'Data Updated';
        //     }
        // }
    // }



















?>
