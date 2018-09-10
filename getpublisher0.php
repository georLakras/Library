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

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Title: <span class="text-danger">*</span></label>
				<input type="text" name="publisher_title" placeholder="Company name" class="form-control required">
			</div>

			<div class="form-group">
				<label>Foundation Year:</label>
				<input type="text" name="publisher_foundation_year" placeholder="Company name" class="form-control">
			</div>

		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Brief description:</label>
				<textarea name="publisher_info" rows="4" cols="4" placeholder="Tasks and responsibilities" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<label class="display-block">Recommendations:</label>
				<input name="publisher_avatar" type="file" class="file-styled">
				<span class="help-block">Accepted formats: pdf, doc. Max file size 2Mb</span>
			</div>
		</div>
	</div>
	
</body>
</html>