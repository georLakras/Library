<?php 
	include("config.php");
	session_start();
	
	$user_id= $_GET['id'];

	$sel_query="SELECT user.id, user.username, user.password,user.email,user.first_name,user.last_name,user.phone_number,user.create_time,			
				addresses.id AS address_id, addresses.city,addresses.number,addresses.zip_code, addresses.street, 
				admins.first_name AS admin_first, admins.last_name AS admin_last
				FROM user 
				INNER JOIN addresses ON user.address = addresses.id
				INNER JOIN admins ON user.admins_id = admins.id
				WHERE user.id = '$user_id';";
	$result=mysqli_query($connect,$sel_query);
	if(mysqli_errno($connect)){
		echo mysqli_error($connect);
	}else{
		while($row=$result->fetch_assoc()){
			$user_id= $row['id'];
			$old_fn = $row['first_name'];
			$old_ln = $row['last_name'];
			$old_un = $row['username'];
			$old_ps = $row['password'];
			$old_em = $row['email'];
			$old_pn = $row['phone_number'];
			$create_time = $row['create_time'];
			
			$admin_first = $row['admin_first'];
			$admin_last = $row['admin_last'];
			
			$address_id = $row['address_id'];
			$old_st = $row['street'];
			$old_no = $row['number'];
			$old_zc = $row['zip_code'];
			$old_ct = $row['city'];
		}
	}
			
	if($_POST){
		//Get variables from post array
		$first_name = mysqli_real_escape_string($connect, $_REQUEST['first_name']);
		$last_name = mysqli_real_escape_string($connect, $_REQUEST['last_name']);
		$email = mysqli_real_escape_string($connect, $_REQUEST['email']);
		$phone = mysqli_real_escape_string($connect, $_REQUEST['phone']);
		$username = mysqli_real_escape_string($connect, $_REQUEST['username']);
		$date = mysqli_real_escape_string($connect, $_REQUEST['date']);
		$password = mysqli_real_escape_string($connect, $_REQUEST['password']);
		
		$city = mysqli_real_escape_string($connect, $_REQUEST['city']);
		$address = mysqli_real_escape_string($connect, $_REQUEST['address']);
		$zip_code = mysqli_real_escape_string($connect, $_REQUEST['zip_code']);
		$number = mysqli_real_escape_string($connect, $_REQUEST['number']);
		
		$query="UPDATE addresses
				SET street='$address',number='$number',city='$city',zip_code='$zip_code'
				WHERE addresses.id = '$address_id'";
		$result=mysqli_query($connect,$query);
		if(mysqli_errno($connect)){
			echo mysqli_error($connect);
		}
		
		$query="UPDATE user 
				SET first_name='$first_name', last_name='$last_name',email='$email',phone_number='$phone',username='$username',
				password='$password' 
				WHERE user.id='$user_id';";
		$result=mysqli_query($connect,$query);
		if (mysqli_errno($connect)){
			echo mysqli_error($connect);
		}else{
			$msg="update";
			header("Location:user_profile.php?id=".$user_id."&msg=".$msg);
		}
	}
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
	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>

	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_validation.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php"><i class="icon-books position-left"></i><b> # library_administrator</b></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>	
			</ul>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-git-compare"></i>
							<span class="visible-xs-inline-block position-right">Git updates</span>
							<span class="badge bg-warning-400">9</span>
						</a>
						
						<div class="dropdown-menu dropdown-content">
							<div class="dropdown-content-heading">
								Git updates
								<ul class="icons-list">
									<li><a href="#"><i class="icon-sync"></i></a></li>
								</ul>
							</div>

							<ul class="media-list dropdown-content-body width-350">
								<li class="media">
									<div class="media-left">
										<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
									</div>

									<div class="media-body">
										Drop the IE <a href="#">specific hacks</a> for temporal inputs
										<div class="media-annotation">4 minutes ago</div>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
									</div>
									
									<div class="media-body">
										Add full font overrides for popovers and tooltips
										<div class="media-annotation">36 minutes ago</div>
									</div>
								</li>	
							</ul>

							<div class="dropdown-content-footer">
								<a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
							</div>
						</div>
					</li>
					<li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['avatar']).'" alt="">'; ?>
							<span><?php echo $_SESSION['first_name']; ?></span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<?php echo'<li><a href="admin_profile.php?id='.$_SESSION['id'].'"><i class="icon-user-plus"></i> My profile</a></li>';?>
							<li><a href="#"><span class="badge bg-blue pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
							<li class="divider"></li>
							<li><a href="logout.php"><i class="icon-switch2"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<?php echo '<a href="#" class="media-left"><img src="data:image/jpeg;base64,'.base64_encode($_SESSION['avatar']).'" class="img-circle img-sm" alt=""></a>'; ?>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $_SESSION['first_name']," ",$_SESSION['last_name']; ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp; <?php echo $_SESSION['username'];?>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="index.php"><i class="icon-home4"></i> <span>Home</span></a></li>
								<li>
									<a href="#"><i class="icon-users"></i> <span>Users</span></a>
									<ul>
										<li><a href="users_catalog.php"><i class="icon-list"></i>Catalog</a></li>
										<li><a href="add_user.php"><i class="icon-add"></i>Add New</a></li>											
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-sphere3"></i> <span>Admins</span></a>
									<ul>
										<li><a href="admins_catalog.php"><i class="icon-list"></i>Catalog</a></li>
									</ul>
								</li>
								
								<li>
									<a href="#"><i class="icon-transmission"></i> <span>Lendings</span></a>
									<ul>
										<li><a href="lendings_catalog.php"><i class="icon-list"></i>Catalog</a></li>
										<li><a href="add_lending.php"><i class="icon-add"></i>Add New</a></li>
										<li><a href="quick_return.php"><i class="icon-reset"></i>Quick Return</a></li>
									</ul>
								</li>
								<!-- /main -->
								
								<!-- secondary -->
								<li class="navigation-header"><span>Library</span> <i class="icon-menu" title="Main pages"></i></li>
								<li>
									<a href="#"><i class="icon-books"></i> <span>Books</span></a>
									<ul>
										<li><a href="books_catalog.php"><i class="icon-list"></i>Catalog</a></li>
										<li><a href="add_book.php"><i class="icon-add"></i>Add New</a></li>										
									</ul>
								</li>
								
								<li>
									<a href="#"><i class="icon-file-pdf"></i> <span>E-Books</span></a>
									<ul>
										<li><a href="ebooks_catalog.php"><i class="icon-list"></i>Catalog</a></li>
										<li><a href="add_ebook.php"><i class="icon-add"></i>Add New</a></li>																				
									</ul>
								</li>
								<li><a href="writers_catalog.php"><i class="icon-quill4"></i> <span>Writers</span></a></li>
								<li><a href="publishers_catalog.php"><i class="icon-typewriter"></i> <span>Publishers</span></a></li>
								<li><a href="quotes_catalog.php"><i class="icon-quotes-left"></i> <span>Quotes</span></a></li>
								<li><a href="categories_catalog.php"><i class="icon-list"></i> <span>Categories</span></a></li>
								
								<!-- /secondary -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit a user of your library.</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li class="active"><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="">Users</a></li>
							<li><a href="">Edit user</a></li>
							
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Advanced legend -->
					<form class="form-horizontal form-validate-jquery" action="#" method="post">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Advanced legend</h5>
								<div class="heading-elements">
									<ul class="icons-list">
										<li><a data-action="collapse"></a></li>
										<li><a data-action="reload"></a></li>
										<li><a data-action="close"></a></li>
									</ul>
								</div>
							</div>

							<div class="panel-body">
								<fieldset>
									<legend class="text-semibold"><i class="icon-user position-left"></i> Personal Information</legend>

									<div class="form-group">
										<label class="col-lg-3 control-label">Your name: <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="row">
												<div class="col-md-6">
													<input type="text" name="first_name" value="<?php echo $old_fn; ?>" class="form-control" required="required">
												</div>

												<div class="col-md-6">
													<input type="text" name="last_name" value="<?php echo $old_ln; ?>" class="form-control" required="required">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Phone #: <span class="text-danger">*</span></label>
										<div class="col-lg-6">
											<input type="text" name="phone" value="<?php echo $old_pn; ?>" class="form-control" required="required">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">Address: <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="row">
												<div class="col-md-6">
													<input type="text" name="address" value="<?php echo $old_st;?>" class="form-control" required="required">														
												</div>

												<div class="col-md-2">
													<input type="text" name="number" value="<?php echo $old_no;?>" class="form-control mb-15" required="required">
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">Location: <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="row">
												<div class="col-md-6">
													<input type="text" name="zip_code" value="<?php echo $old_zc;?>" class="form-control" required="required">														
												</div>

												<div class="col-md-6">
													<input type="text" name="city" value="<?php echo $old_ct;?>" class="form-control mb-15" required="required">
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-3 control-label">Additional message:</label>
										<div class="col-lg-9">
											<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
									</div>
								</fieldset>
								
								<fieldset>
									<legend class="text-semibold">
										<i class="icon-file-text2 position-left"></i>
										Enter your information
										<a class="control-arrow" data-toggle="collapse" data-target="#demo1">
											<i class="icon-circle-down2"></i>
										</a>
									</legend>

									<div class="collapse in" id="demo1">
										<div class="form-group">
											<label class="col-lg-3 control-label">Enter your username:</label>
											<div class="col-lg-9">
												<input type="text" name="username" class="form-control" value="<?php echo $old_un;?>">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-lg-3 control-label">Email:</label>
											<div class="col-lg-9">
												<input type="text" name="email" value="<?php echo $old_em;?>" class="form-control">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Enter your password:</label>
											<div class="col-lg-9">
												<input type="password" name="password" class="form-control" value="<?php echo $old_ps;?>">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Your message:</label>
											<div class="col-lg-9">
												<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
											</div>
										</div>
									</div>
								</fieldset>

								

								<div class="text-right">
									<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</div>
					</form>
					<!-- /a legend -->

					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2018. <a href="#">Library Administrator - Web Application</a> by <a href="#" target="_blank">Lakras 3</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
