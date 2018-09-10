<?php 
	include('config.php');
	session_start();
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
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>

	<!-- /theme JS files -->
	
	<script>
		function showBook(str) {
			if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","getbook.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>
		
	<script>
		function showUser(str) {
			if (str == "") {
				document.getElementById("txtHint2").innerHTML = "";
				return;
			} else {
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("txtHint2").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","getuser.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>

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
							<?php echo '<img src="'.$_SESSION['avatar_path'].'" alt="">'; ?>
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
								<?php echo '<a href="#" class="media-left"><img src="'.$_SESSION['avatar_path'].'" class="img-circle img-sm" alt=""></a>'; ?>
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Welcome to <b># library_administrator</b>, this your main dashboard.</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li class="active"><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href=""></a></li>
							
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Content area -->
				<div class="content">

					<!-- Option trees -->
					<h6 class="content-group text-semibold">
						Option trees
						<small class="display-block">Dependent option trees</small>
					</h6>

					<form action="complete_lending.php" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h6 class="panel-title">Option tree field</h6>
										<div class="heading-elements">
											<ul class="icons-list">
												<li><a data-action="collapse"></a></li>
												<li><a data-action="reload"></a></li>
												<li><a data-action="close"></a></li>
											</ul>
										</div>
									</div>
								
									<div class="panel-body">
										<p class="content-group">This example asks a user what number they would like on the sports jersey. They're always able to just type in a value. Here, we provide a sequence of dropdowns to let them select a sport, team and athlete. The jersey number is then automatically filled in.</p>
																							
										
										<div class="form-group">
											<label>Select with search</label>
											<select class="select-search" name="books" onchange="showBook(this.value)">
												<optgroup label="Mountain Time Zone">
													<option value="0" selected>Select Book</option>
													<?php
															$query = 'SELECT id, title 
																	  FROM book 
																	  WHERE book.available = "1";';
															$result = mysqli_query($connect, $query);
															if ($result->num_rows>0){
																while ($row = $result->fetch_assoc()){
																	echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
																}
															}
														
														?>
												</optgroup>
											</select>
										</div>
										
										<br>
										<div id="txtHint"><b>Person info will be listed here...</b></div>
										
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h6 class="panel-title">Option tree field</h6>
										<div class="heading-elements">
											<ul class="icons-list">
												<li><a data-action="collapse"></a></li>
												<li><a data-action="reload"></a></li>
												<li><a data-action="close"></a></li>
											</ul>
										</div>
									</div>
								
									<div class="panel-body">
										<p class="content-group">This example asks a user what number they would like on the sports jersey. They're always able to just type in a value. Here, we provide a sequence of dropdowns to let them select a sport, team and athlete. The jersey number is then automatically filled in.</p>
																							
										
										<div class="form-group">
											<label>Select with search</label>
											<select class="select-search" name="users" onchange="showUser(this.value)">
												<optgroup label="Mountain Time Zone">
													<option value="0" selected>Select User</option>
													<?php
															$query = 'SELECT id, first_name, last_name 
																	  FROM user 
																	  ORDER BY user.id;';
															$result = mysqli_query($connect, $query);
															if ($result->num_rows>0){
																while ($row = $result->fetch_assoc()){
																	echo '<option value="'.$row['id'].'">'.$row['first_name']," ", $row['last_name'].'</option>';
																}
															}
														
														?>
												</optgroup>
											</select>
										</div>
										
										<br>
										<div id="txtHint2"><b>Person info will be listed here...</b></div>
									
									</div>
								</div>
							</div>
						</div>
						
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
						</div>
						
					</form>
					<!-- /opton trees -->
					
					

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
