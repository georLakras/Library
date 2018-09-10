<?php 
	include('config.php');
	session_start();
	
	$id= $_GET['q'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Library - Administrator</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
	<!-- /theme JS files -->

</head>

<body>
	
	<?php 
		$query= "SELECT user.first_name, user.last_name, user.username, user.email, user.phone_number, user.avatar_path,
				 addresses.street, addresses.number, addresses.city, addresses.zip_code
				 FROM user
				 INNER JOIN addresses ON user.address = addresses.id
				 WHERE user.id='$id'";
			
		$result= mysqli_query($connect, $query);
		if (mysqli_errno($connect)){
			echo mysqli_error($connect);
		}else if ($result->num_rows >0){
			while ($row = $result->fetch_assoc()){
				echo '<div class="dataTables_wrapper no-footer">';
					echo '<table class="table datatable-basic table-striped table-hover">';
						echo "<tr>";
							echo '<td><img src="'.$row['avatar_path'].'" height="128" width="128" alt=""></td>';
							echo "<td><h>".$row['first_name']," ",$row['last_name']."</h></td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>Username: </td>";
							echo "<td>".$row['username']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>Email: </td>";
							echo "<td>".$row['email']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>Phone number: </td>";
							echo "<td>".$row['phone_number']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>Address: </td>";
							echo "<td>".$row['street'],", ",$row['number']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>City: </td>";
							echo "<td>".$row['city'],", ",$row['zip_code']."</td>";
						echo "</tr>";
					echo "</table>";
				echo "</div>";
			}
		}			
	?>




</body>
</html>