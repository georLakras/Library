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
	<script type="text/javascript" src="assets/js/core/app.js"></script>
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

					<!-- Simple panel -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Simple panel</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<h6 class="text-semibold">Start your development with no hassle!</h6>
							<p class="content-group">Common problem of templates is that all code is deeply integrated into the core. This limits your freedom in decreasing amount of code, i.e. it becomes pretty difficult to remove unnecessary code from the project. Limitless allows you to remove unnecessary and extra code easily just by removing the path to specific LESS file with component styling. All plugins and their options are also in separate files. Use only components you actually need!</p>

							<h6 class="text-semibold">What is this?</h6>
							<p class="content-group">Starter kit is a set of pages, useful for developers to start development process from scratch. Each layout includes base components only: layout, page kits, color system which is still optional, bootstrap files and bootstrap overrides. No extra CSS/JS files and markup. CSS files are compiled without any plugins or components. Starter kit was moved to a separate folder for better accessibility.</p>

							<h6 class="text-semibold">How does it work?</h6>
							<p>You open one of the starter pages, add necessary plugins, uncomment paths to files in components.less file, compile new CSS. That's it. I'd also recommend to open one of main pages with functionality you need and copy all paths/JS code from there to your new page, it's just faster and easier.</p>
						</div>
					</div>
					<!-- /simple panel -->


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
