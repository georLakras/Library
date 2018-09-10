<?php 
	include('config.php');
	session_start();
	
	$value1= $_GET['q'];
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
			$query= "SELECT	first_name, last_name, birth_date, death_date, country, info, image
					 FROM writer
					 WHERE writer.id='$value1';";
			$result= mysqli_query($connect, $query);
			if (mysqli_errno($connect)){
				echo mysqli_error($connect);
			}else if ($result->num_rows >0){
				while ($row = $result->fetch_assoc()){
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$birth_date = $row['birth_date'];
					$death_date = $row['death_date'];
					$country = $row['country'];
					$info = $row['info'];
					$image = $row['image'];
				}
			}			
	?>
	<div class="col-md-6">
		<div class="row">		
			<div class="col-md-6">
				<div class="form-group">
					<label>First Name: <span class="text-danger">*</span></label>
					<input type="text" name="wr_fn" class="form-control required" value="<?php echo $first_name; ?>">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Last Name: <span class="text-danger">*</span></label>
					<input type="text" name="wr_ln" class="form-control required" value="<?php echo $last_name; ?>">
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Birth Date: </label>
					<input type="text" name="wr_bd" class="form-control" value="<?php echo $birth_date; ?>">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Death Date: </label>
					<input type="text" name="wr_dd" class="form-control" value="<?php echo $death_date; ?>">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Country: </label>
					<input type="text" name="wr_cn" class="form-control" value="<?php echo $country; ?>">
				</div>
			</div>
		</div>

	</div>
	
	<div class="col-md-6">
	
		<div class="row">
			<label>Description: </label>
			<textarea rows="8" cols="5" class="form-control" placeholder="<?php echo $info; ?>"></textarea>
		</div>
		
		<div class="row">
			<label>Image: </label>
			<div class="uploader">
				<?php echo'<img src="data:image/jpeg;base64,'.base64_encode($image).'" alt="" height="242" width="242">'; ?>
			</div>
		</div>
		
	</div>
	
</body>
</html>