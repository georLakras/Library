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
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/wizards/stepy.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/wizard_stepy.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_inputs.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<!-- /theme JS files -->
	
	<script>
		function showWriter(str) {
			if (str == "0") {
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
				xmlhttp.open("GET","getwriter0.php?q="+str,true);
				xmlhttp.send();
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
				xmlhttp.open("GET","getwriter.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>
	
	<script>
		function showPublisher(str) {
			if (str == "0") {
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("txtHint1").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","getpublisher0.php?q="+str,true);
				xmlhttp.send();
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
						document.getElementById("txtHint1").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","getpublisher.php?q="+str,true);
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

					<!-- Wizard with validation -->
		            <div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">Validation</h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

	                	<form class="stepy-validation" action="add_ebook_action.php" method="post">
							<fieldset title="1">
								<legend class="text-semibold">Book Information</legend>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Title: <span class="text-danger">*</span></label>
											<input type="text" name="title" class="form-control required" placeholder="Enter here book's title.">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Subtitle: </label>
											<input type="text" name="subtitle" class="form-control" placeholder="Enter here book's subtitle.">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>ISBN: </label>
											<input type="text" name="isbn" class="form-control" placeholder="Enter here book's ISBN.">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Release Year: </label>
											<input type="text" name="year" class="form-control" placeholder="Enter here book's release year.">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Language:</label>
											<input type="text" name="lang" class="form-control" placeholder="Enter here book's language.">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label>Pages:</label>
											<input type="text" name="pages" class="form-control" placeholder="Enter here book's number of pages.">
										</div>
									</div>						
								</div>
							</fieldset>

							<fieldset title="2">
								<legend class="text-semibold">Writer Information</legend>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Select with search</label>
											<select class="select select-search" name="writers" onchange="showWriter(this.value)">
												<optgroup label="Mountain Time Zone">
													<option value="0" selected>Add new Writer</option>
												</optiongroup>
												
												<optgroup label="Mountain Time Zone">
													<?php
															$query = 'SELECT id, first_name, last_name 
																	  FROM writer ;';																	  
															$result = mysqli_query($connect, $query);
															if ($result->num_rows>0){
																while ($row = $result->fetch_assoc()){
																	echo '<option value="'.$row['id'].'">'.$row['first_name']," ",$row['last_name'].'</option>';
																}
															}
														
														?>
												</optgroup>
											</select>
										</div>	
									</div>	
								</div>
								
								<div id="txtHint" value="0"> 
									<div class="col-md-6">
										<div class="row">		
											<div class="col-md-6">
												<div class="form-group">
													<label>First Name: </label>
													<input type="text" name="first_name" class="form-control" placeholder="Enter writer's first name here.">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Last Name: <span class="text-danger">*</span></label>
													<input type="text" name="last_name" class="form-control" placeholder="Enter writer's first name here.">
												</div>
											</div>	
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Birth Date: </label>
													<input type="text" name="birth_date" class="form-control" placeholder="Enter writer's first name here.">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Death Date: </label>
													<input type="text" name="death_date" class="form-control" placeholder="Enter writer's first name here.">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Country: </label>
													<input type="text" name="country" class="form-control" placeholder="Enter writer's first name here.">
												</div>
											</div>
										</div>

									</div>
									
									<div class="col-md-6">
									
										<div class="row">
											<label>Description: </label>
											<textarea rows="8" cols="5" class="form-control" name="wr_info" placeholder="Enter writer's first name here."></textarea>
										</div>
										<br>

										<div class="row">
											<div class="form-group">
												<label class="control-label col-lg-2">Styled file input</label>
												<div class="col-lg-10">
													<input type="file" name="wr_avatar" class="file-styled">
												</div>
											</div>
										</div>
										
									</div>
								</div>
									
							</fieldset>

							<fieldset title="3">
								<legend class="text-semibold">Your experience</legend>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Select with search</label>
											<select class="select select-search" name="publishers" onchange="showPublisher(this.value)">
												<optgroup label="Mountain Time Zone">
													<option value="0" selected>Add new Writer</option>
												</optiongroup>
												
												<optgroup label="Mountain Time Zone">
													<?php
															$query = 'SELECT id, title
																	  FROM publisher ;';																	  
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
									</div>	
								</div>
								
								<div id="txtHint1" value="0">
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
								</div>
							</fieldset>

							<fieldset title="4">
								<legend class="text-semibold">Additional info</legend>

								
									<div class="col-md-6">
										<div class="form-group">
											<label class="display-block">Cover: </label>
		                                    <input type="file" name="cover" class="file-styled">
		                                    <span class="help-block">Accepted formats: pdf, doc. Max file size 2Mb</span>
	                                    </div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label>Summary :</label>
		                                    <textarea name="summary" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="form-control"></textarea>
	                                    </div>
									</div>
								

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="display-block">File: </label>
		                                    <input type="file" name="file" class="file-styled">
		                                    <span class="help-block">Accepted formats: pdf, doc. Max file size 2Mb</span>
	                                    </div>
									</div>

									
								</div>
							</fieldset>

							<button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button>
						</form>
		            </div>
		            <!-- /wizard with validation -->


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
