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
		$query= "SELECT book.title, book.subtitle, book.isbn, book.pages, book.release_year, book.language, book.path,
					writer.first_name, writer.last_name, publisher.title AS publisher
				 FROM book
				 INNER JOIN writer ON book.writer_id = writer.id
				 INNER JOIN publisher ON book.publisher_id = publisher.id
				 WHERE book.id='$id';";
		$result= mysqli_query($connect, $query);
		if (mysqli_errno($connect)){
			echo mysqli_error($connect);
		}else if ($result->num_rows >0){
			while ($row = $result->fetch_assoc()){
				echo '<blockquote class="no-margin panel panel-body border-left-lg border-left-warning">';
					echo '<img src="'.$row['path'].'" alt="">';
					echo 'Book Title: <strong>'.$row['title'].'</strong>';;
					echo '<footer><cite title="Source Title">'.$row['first_name']," ",$row['last_name'].'</cite></footer>';
				echo '</blockquote>';
				
				echo '</br>';
				
				echo '<div class="dataTables_wrapper no-footer">';
					echo '<table class="table datatable-basic table-striped table-hover">';
						echo "<tr>";
							echo "<td>Subtitle: </td>";
							echo "<td>".$row['subtitle']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>ISBN: </td>";
							echo "<td>".$row['isbn']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>Pages: </td>";
							echo "<td>".$row['pages']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>Release Year: </td>";
							echo "<td>".$row['release_year']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>Writer: </td>";
							echo "<td>".$row['first_name']," ",$row['last_name']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>Publisher: </td>";
							echo "<td>".$row['publisher']."</td>";
						echo "</tr>";
					echo "</table>";
				echo "</div>";
			}
		}			
	?>




</body>
</html>