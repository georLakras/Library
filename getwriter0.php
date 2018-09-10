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
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_inputs.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<!-- /theme JS files -->

</head>

<body>

	<div class="col-md-6">
		<div class="row">		
			<div class="col-md-6">
				<div class="form-group">
					<label>First Name: <span class="text-danger">*</span></label>
					<input type="text" name="wr_fn" class="form-control required" placeholder="Enter writer's first name here.">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Last Name: <span class="text-danger">*</span></label>
					<input type="text" name="wr_ln" class="form-control required" placeholder="Enter writer's first name here.">
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Birth Date: </label>
					<input type="text" name="wr_bd" class="form-control" placeholder="Enter writer's first name here.">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Death Date: </label>
					<input type="text" name="wr_dd" class="form-control" placeholder="Enter writer's first name here.">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Country: </label>
					<input type="text" name="wr_cn" class="form-control" placeholder="Enter writer's first name here.">
				</div>
			</div>
		</div>

	</div>
	
	<div class="col-md-6">
	
		<div class="row">
			<label>Description: </label>
			<textarea name="wr_in" rows="8" cols="5" class="form-control" placeholder="Enter writer's first name here."></textarea>
		</div>
		
		<br>
		
		<div class="row">
			<div class="form-group">
				<label class="control-label col-lg-2">Styled file input</label>
				<div class="col-lg-10">
					<input name="wr_av" type="file" class="file-styled">
				</div>
			</div>
		</div>
		
	</div>
	
</body>
</html>