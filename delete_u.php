<?php 
	include("config.php");
	session_start();
	
	$id = $_GET['id'];
	$del_query = 'DELETE FROM user
				  WHERE user.id='.$_GET['id'].' ;';
	$result = mysqli_query($connect, $del_query);
	
	if (mysqli_connect_errno()){
			$msg= "Failed to connect to MySQL: " . mysqli_connect_error();
			
		}else{		
			$msg= "User deleted succesfully.";
		}	
			header('Location: users_catalog.php?message='.$msg);	
?>
