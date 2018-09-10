<?php 	include('config.php');
		session_start();
		
		$id = $_GET['id'];
		$query=	"SELECT book.title, book.subtitle, book.isbn, book.pages, book.language,book.release_year, book.path, book.description, book.copies, book.avail_copies, book.available,
					writer.first_name, writer.last_name, writer.image_path, publisher.title AS publisher, publisher.logo_path
				 FROM book 
				 INNER JOIN writer ON book.writer_id = writer.id
				 INNER JOIN publisher ON book.publisher_id = publisher.id
				 WHERE book.id = '$id';";
		$result= mysqli_query($connect, $query);
		if (mysqli_errno($connect)){
			echo mysqli_error($connect);
		}else if ($result->num_rows > 0){
			while ($row=$result->fetch_assoc()){
				$title = $row['title'];
				$subtitle = $row['subtitle'];
				$isbn = $row['isbn'];
				$pages = $row['pages'];
				$language = $row['language'];
				$release_year = $row['release_year'];
				$path = $row['path'];
				$copies = $row['copies'];
				$description = $row['description'];
				$avail_copies = $row['avail_copies'];
				$available = $row['available'];
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$publisher = $row['publisher'];
				$image = $row['image_path'];
				$logo = $row['logo_path'];
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
	<link href="assets/css/extras/animate.min.css" rel="stylesheet" type="text/css">
	
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/visualization/echarts/echarts.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/user_profile_tabbed.js"></script>
	<!-- /theme JS files -->

</head>

<body class="sidebar-xs has-detached-left">

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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Profile</span> - Tabbed</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="#">Users</a></li>
							<?php echo '<li class="active"><a href="user_profile.php?id='.$id.'">User Profile</a></li>'; ?>
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Contact</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Detached sidebar -->
					<div class="sidebar-detached">
						<div class="sidebar sidebar-default sidebar-separate">
							<div class="sidebar-content">
								
								<!-- User details -->
								<div class="content-group">
									<div class="thumbnail">
										<div class="thumb thumb-slide">
											<?php echo'<img src="'.$path.'" alt="">'; ?>
											<div class="caption">
												<span>
													<?php echo'<img="'.$path.'" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>'; ?>
													<a href="user_pages_profile.html" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
												</span>
											</div>
										</div>
									
										<div class="caption text-center">
											<h6 class="text-semibold no-margin"><?php echo $title; ?><small class="display-block"><?php echo $subtitle; ?></small></h6>
											<ul class="icons-list mt-15">
												<li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Google Drive"><i class="icon-google-drive"></i></a></li>
												<li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a></li>
												<li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Github"><i class="icon-github"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /user details -->


								<!-- Latest updates -->
								<div class="sidebar-category">
									<div class="category-title">
										<span>Latest updates</span>
										<ul class="icons-list">
											<li><a href="#" data-action="collapse"></a></li>
										</ul>
									</div>

									<div class="category-content">
										<ul class="media-list">
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

											<li class="media">
												<div class="media-left">
													<a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
												</div>
												
												<div class="media-body">
													<a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
													<div class="media-annotation">2 hours ago</div>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
												</div>
												
												<div class="media-body">
													<a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
													<div class="media-annotation">Dec 18, 18:36</div>
												</div>
											</li>

											<li class="media">
												<div class="media-left">
													<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
												</div>
												
												<div class="media-body">
													Have Carousel ignore keyboard events
													<div class="media-annotation">Dec 12, 05:46</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<!-- /latest updates -->

							</div>
						</div>
					</div>
		            <!-- /detached sidebar -->


					<!-- Detached content -->
					<div class="container-detached">
						<div class="content-detached">

							<!-- Tab content -->
							<div class="tab-content">
								<div class="tab-pane fade in active" id="profile">
									
									<!-- Profile info -->
									<div class="panel panel-flat">
										<div class="panel-heading">
											<h6 class="panel-title">Book information</h6>
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="collapse"></a></li>
							                		<li><a data-action="reload"></a></li>
							                		<li><a data-action="close"></a></li>
							                	</ul>
						                	</div>
										</div>
										
										

										<div class="panel-body">
											<div class="tabbable">
												<ul class="nav nav-tabs bg-teal-400 nav-justified">
													<li class="active"><a href="#colored-justified-tab1" data-toggle="tab">General Info</a></li>
													<li><a href="#colored-justified-tab2" data-toggle="tab">Summary</a></li>
													<li><a href="#colored-justified-tab2" data-toggle="tab">Statistics</a></li>
												</ul>

												<div class="tab-content">
													<div class="tab-pane active" id="colored-justified-tab1">
														<form action="#">
															<div class="form-group">
																<div class="row">
																	<div class="col-md-4">
																		<label>Title</label>
																		<div class="input-group">
																			<span class="input-group-addon bg-slate-700"><i class="icon-user"></i></span>
																			<input class="form-control bg-slate" value="<?php echo $title; ?>" type="text">																
																		</div>
																	</div>
																	<div class="col-md-4">
																		<label>Subtitle</label>
																		<div class="input-group">
																			<span class="input-group-addon bg-slate-700"><i class="icon-users"></i></span>
																			<input class="form-control bg-slate" value="<?php echo $subtitle; ?>" type="text">																
																		</div>
																	</div>
																</div>
															</div>

															<div class="form-group">
																<div class="row">
																	<div class="col-md-4">
																		<label>ISBN:</label>
																		<div class="input-group">
																			<span class="input-group-addon bg-slate-700"><i class="icon-address-book2"></i></span>
																			<input class="form-control bg-slate" value="<?php echo $isbn; ?>" type="text">																
																		</div>
																	</div>
																	<div class="col-md-4">
																		<label>Pages:</label>
																		<div class="input-group">
																			<span class="input-group-addon bg-slate-700"><i class="icon-address-book2"></i></span>
																			<input class="form-control bg-slate" value="<?php echo $pages; ?>" type="text">																
																		</div>
																	</div>
																</div>
															</div>
												
															<div class="form-group">
																<div class="row">
																	<div class="col-md-4">
																		<label>Language:</label>
																		<div class="input-group">
																			<span class="input-group-addon bg-slate-700"><i class=" icon-phone2"></i></span>
																			<input class="form-control bg-slate" value="<?php echo $language; ?>" type="text">																
																		</div>																		
																	</div>
																	<div class="col-md-4">
																		<label>Language:</label>
																		<div class="input-group">
																			<span class="input-group-addon bg-slate-700"><i class=" icon-phone2"></i></span>
																			
																			<?php 
																				if ($available == 1){
																					echo '<button type="button" class="btn btn-success btn-sm" data-popup="popover" title="" data-trigger="hover" 
																							data-content="Copies: '.$copies.' || Available Copies:'.$avail_copies.'" data-original-title="availability">
																								Available <i class="icon-play3 position-right"></i></button>';														
																				}else{
																					echo '<button type="button" class="btn btn-danger btn-sm" data-popup="popover" title="" data-trigger="hover" 
																							data-content="Copies: '.$copies.' || Available Copies:'.$avail_copies.'" data-original-title="availability">
																								No Available <i class="icon-play3 position-right"></i></button>';	
																				}
																			?>
																		
																		</div>
																	</div>
																</div>
															</div>
												
															
														</form>
													</div>

													<div class="tab-pane" id="colored-justified-tab2">
														
															<p><?php echo $description; ?></p>
														
													</div>

													<div class="tab-pane" id="colored-justified-tab3">
														DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
													</div>

													<div class="tab-pane" id="colored-justified-tab4">
														Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
													</div>
												</div>
											</div>
											
										</div>
									</div>
									<!-- /profile info -->
								</div>

								<div class="tab-pane fade" id="schedule">
									<!-- Calendar -->
									<div class="panel panel-flat">
										<div class="panel-heading">
											<h6 class="panel-title">My schedule</h6>
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="collapse"></a></li>
							                		<li><a data-action="reload"></a></li>
							                		<li><a data-action="close"></a></li>
							                	</ul>
						                	</div>
										</div>

										<div class="panel-body">
											<div class="schedule"></div>
										</div>
									</div>
									<!-- /calendar -->

								</div>

								<div class="tab-pane fade" id="messages">

									<!-- My inbox -->
									<div class="panel panel-white">
										<div class="panel-heading">
											<h6 class="panel-title">My Inbox</h6>

											<div class="heading-elements not-collapsible">
												<span class="label bg-blue heading-text">25 new today</span>
						                	</div>
										</div>

										<div class="panel-toolbar panel-toolbar-inbox">
											<div class="navbar navbar-default">
												<ul class="nav navbar-nav visible-xs-block no-border">
													<li>
														<a class="text-center collapsed" data-toggle="collapse" data-target="#inbox-toolbar-toggle-multiple">
															<i class="icon-circle-down2"></i>
														</a>
													</li>
												</ul>

												<div class="navbar-collapse collapse" id="inbox-toolbar-toggle-multiple">
													<div class="btn-group navbar-btn">
														<button type="button" class="btn btn-default btn-icon btn-checkbox-all">
															<input type="checkbox" class="styled">
														</button>

														<button type="button" class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown">
															<span class="caret"></span>
														</button>

														<ul class="dropdown-menu">
															<li><a href="#">Select all</a></li>
															<li><a href="#">Select read</a></li>
															<li><a href="#">Select unread</a></li>
															<li class="divider"></li>
															<li><a href="#">Clear selection</a></li>
														</ul>
													</div>

													<div class="btn-group navbar-btn">
														<button type="button" class="btn btn-default"><i class="icon-pencil7"></i> <span class="hidden-xs position-right">Compose</span></button>
														<button type="button" class="btn btn-default"><i class="icon-bin"></i> <span class="hidden-xs position-right">Delete</span></button>
								                    	<button type="button" class="btn btn-default"><i class="icon-spam"></i> <span class="hidden-xs position-right">Spam</span></button>
													</div>

													<div class="navbar-right">
														<p class="navbar-text"><span class="text-semibold">1-50</span> of <span class="text-semibold">528</span></p>

														<div class="btn-group navbar-left navbar-btn">
															<button type="button" class="btn btn-default btn-icon disabled"><i class="icon-arrow-left12"></i></button>
									                    	<button type="button" class="btn btn-default btn-icon"><i class="icon-arrow-right13"></i></button>
														</div>

														<div class="btn-group navbar-btn">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
																<i class="icon-cog3"></i>
																<span class="caret"></span>
															</button>

															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#">Action</a></li>
																<li><a href="#">Another action</a></li>
																<li><a href="#">Something else here</a></li>
																<li><a href="#">One more line</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="table-responsive">
											<table class="table table-inbox table-lg">
												<tbody data-link="row" class="rowlink">
													<tr class="unread">
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/brands/spotify.png" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Spotify</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">On Tower-hill, as you go down</div>
															<span class="table-inbox-preview">To the London docks, you may have seen a crippled beggar (or KEDGER, as the sailors say) holding a painted board before him, representing the tragic scene in which he lost his leg</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															11:09 pm
														</td>
													</tr>

													<tr class="unread">
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<span class="btn bg-warning-400 btn-rounded btn-icon btn-xs">
																<span class="letter-icon"></span>
															</span>
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">James Alexander</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject"><span class="label bg-success position-left">Promo</span> There are three whales and three boats</div>
															<span class="table-inbox-preview">And one of the boats (presumed to contain the missing leg in all its original integrity) is being crunched by the jaws of the foremost whale</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															10:21 pm
														</td>
													</tr>

													<tr class="unread">
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-full2 text-warning-300"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Nathan Jacobson</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Any time these ten years, they tell me, has that man held up</div>
															<span class="table-inbox-preview">That picture, and exhibited that stump to an incredulous world. But the time of his justification has now come. His three whales are as good whales as were ever published in Wapping, at any rate; and his stump</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															8:37 pm
														</td>
													</tr>

													<tr class="unread">
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-full2 text-warning-300"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<span class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
																<span class="letter-icon"></span>
															</span>
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Margo Baker</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Throughout the Pacific, and also in Nantucket, and New Bedford</div>
															<span class="table-inbox-preview">and Sag Harbor, you will come across lively sketches of whales and whaling-scenes, graven by the fishermen themselves on Sperm Whale-teeth, or ladies' busks wrought out of the Right Whale-bone</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															4:28 am
														</td>
													</tr>

													<tr class="unread">
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/brands/dribbble.png" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Dribbble</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">The whalemen call the numerous little ingenious contrivances</div>
															<span class="table-inbox-preview">They elaborately carve out of the rough material, in their hours of ocean leisure. Some of them have little boxes of dentistical-looking implements</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Dec 5
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<span class="btn bg-brown-400 btn-rounded btn-icon btn-xs">
																<span class="letter-icon"></span>
															</span>
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Hanna Dorman</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Some of them have little boxes of dentistical-looking implements</div>
															<span class="table-inbox-preview">Specially intended for the skrimshandering business. But, in general, they toil with their jack-knives alone; and, with that almost omnipotent tool of the sailor</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Dec 5
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/brands/twitter.png" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Twitter</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject"><span class="label bg-indigo-400 position-left">Order</span> Long exile from Christendom</div>
															<span class="table-inbox-preview">And civilization inevitably restores a man to that condition in which God placed him, i.e. what is called savagery</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Dec 4
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-full2 text-warning-300"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<span class="btn bg-pink-400 btn-rounded btn-icon btn-xs">
																<span class="letter-icon"></span>
															</span>
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Vanessa Aurelius</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Your true whale-hunter is as much a savage as an Iroquois</div>
															<span class="table-inbox-preview">I myself am a savage, owning no allegiance but to the King of the Cannibals; and ready at any moment to rebel against him. Now, one of the peculiar characteristics of the savage in his domestic hours</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Dec 4
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">William Brenson</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">An ancient Hawaiian war-club or spear-paddle</div>
															<span class="table-inbox-preview">In its full multiplicity and elaboration of carving, is as great a trophy of human perseverance as a Latin lexicon. For, with but a bit of broken sea-shell or a shark's tooth</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Dec 4
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/brands/facebook.png" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Facebook</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">As with the Hawaiian savage, so with the white sailor-savage</div>
															<span class="table-inbox-preview">With the same marvellous patience, and with the same single shark's tooth, of his one poor jack-knife, he will carve you a bit of bone sculpture, not quite as workmanlike</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Dec 3
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-full2 text-warning-300"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Vicky Barna</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject"><span class="label bg-pink-400 position-left">Track</span> Achilles's shield</div>
															<span class="table-inbox-preview">Wooden whales, or whales cut in profile out of the small dark slabs of the noble South Sea war-wood, are frequently met with in the forecastles of American whalers. Some of them are done with much accuracy</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Dec 2
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/brands/youtube.png" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Youtube</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">At some old gable-roofed country houses</div>
															<span class="table-inbox-preview">You will see brass whales hung by the tail for knockers to the road-side door. When the porter is sleepy, the anvil-headed whale would be best. But these knocking whales are seldom remarkable as faithful essays</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Nov 30
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Tony Gurrano</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">On the spires of some old-fashioned churches</div>
															<span class="table-inbox-preview">You will see sheet-iron whales placed there for weather-cocks; but they are so elevated, and besides that are to all intents and purposes so labelled with "HANDS OFF!" you cannot examine them</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Nov 28
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<span class="btn bg-danger-400 btn-rounded btn-icon btn-xs">
																<span class="letter-icon"></span>
															</span>
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Barbara Walden</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">In bony, ribby regions of the earth</div>
															<span class="table-inbox-preview">Where at the base of high broken cliffs masses of rock lie strewn in fantastic groupings upon the plain, you will often discover images as of the petrified forms</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Nov 28
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-full2 text-warning-300"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/brands/amazon.png" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Amazon</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Here and there from some lucky point of view</div>
															<span class="table-inbox-preview">You will catch passing glimpses of the profiles of whales defined along the undulating ridges. But you must be a thorough whaleman, to see these sights; and not only that, but if you wish to return to such a sight again</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Nov 27
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<span class="btn bg-pink-400 btn-rounded btn-icon btn-xs">
																<span class="letter-icon"></span>
															</span>
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Jon Peterson</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Questions explained agreeable preferred strangers</div>
															<span class="table-inbox-preview">Set put shyness offices his females him distant. Improve has message besides shy himself cheered however how son. Quick judge other leave ask first chief her. Indeed or remark always silent seemed narrow be</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Nov 26
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Christian Owen</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Depart do be so he enough talent sociable</div>
															<span class="table-inbox-preview">Up do view time they shot. He concluded disposing provision by questions as situation. Its estimating are motionless day sentiments end. Calling an imagine at forbade. At name no an what like spot. Pressed my</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Nov 25
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-full2 text-warning-300"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Hanna Manila</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">You fully seems stand nay own point walls</div>
															<span class="table-inbox-preview">Increasing travelling own simplicity you astonished expression boisterous. Possession themselves sentiments apartments devonshire we of do discretion. Enjoyment discourse ye continued pronounce we necessary abilities</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Nov 24
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<span class="btn bg-slate-600 btn-rounded btn-icon btn-xs">
																<span class="letter-icon"></span>
															</span>
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Bruce James</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Own partiality motionless was old excellence</div>
															<span class="table-inbox-preview">Announcing of invitation principles in. Cold in late or deal. Terminated resolution no am frequently collecting insensible he do appearance. Projection invitation affronting admiration if no on or. It as instrument</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Nov 23
														</td>
													</tr>
												
													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Johnny Brace</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Melancholy particular devonshire alteration</div>
															<span class="table-inbox-preview">She suspicion dejection saw instantly. Well deny may real one told yet saw hard dear. Bed chief house rapid right the. Set noisy one state tears which. No girl oh part must fact high my he. Simplicity in excellence</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Nov 22
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-full2 text-warning-300"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/brands/bing.png" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Bing</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">As it so contrasted oh estimating instrument</div>
															<span class="table-inbox-preview">Size like body some one had. Are conduct viewing boy minutes warrant expense. Tolerably behaviour may admitting daughters offending her ask own. Praise effect wishes change way and any wanted. Lively use looked latter</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Nov 21
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-full2 text-warning-300"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<span class="btn bg-success-400 btn-rounded btn-icon btn-xs">
																<span class="letter-icon"></span>
															</span>
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Daniel Stern</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Stronger unpacked felicity to of mistaken</div>
															<span class="table-inbox-preview">Fanny at wrong table ye in. Be on easily cannot innate in lasted months on. Differed and and felicity steepest mrs age outweigh. Opinions learning likewise daughter now age outweigh. Raptures stanhill my greatest</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Nov 20
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<span class="btn bg-purple-400 btn-rounded btn-icon btn-xs">
																<span class="letter-icon"></span>
															</span>
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Luke Almens</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Denote simple fat denied add worthy</div>
															<span class="table-inbox-preview">As some he so high down am week. Conduct esteems by cottage to pasture we winding. On assistance he cultivated considered frequently. Person how having tended direct own day man. Saw sufficient indulgence one own you</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Nov 19
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-empty3 text-muted"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Lucy Williams</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Frequently partiality possession resolution at</div>
															<span class="table-inbox-preview">Engaged its was evident pleased husband. Ye goodness felicity do disposal dwelling no. First am plate jokes to began of cause an scale. Subjects he prospect elegance followed no overcame possible it on</span>
														</td>
														<td class="table-inbox-attachment"></td>
														<td class="table-inbox-time">
															Nov 18
														</td>
													</tr>

													<tr>
														<td class="table-inbox-checkbox rowlink-skip">
															<input type="checkbox" class="styled">
														</td>
														<td class="table-inbox-star rowlink-skip">
															<a href="mail_read.html">
																<i class="icon-star-full2 text-warning-300"></i>
															</a>
														</td>
														<td class="table-inbox-image">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</td>
														<td class="table-inbox-name">
															<a href="#">
																<div class="letter-icon-title text-default">Josh Garrett</div>
															</a>
														</td>
														<td class="table-inbox-message">
															<div class="table-inbox-subject">Post no so what deal evil rent by real in</div>
															<span class="table-inbox-preview">But her ready least set lived spite solid. September how men saw tolerably two behaviour arranging. She offices for highest and replied one venture pasture. Applauded no discovery in newspaper allowance am northward</span>
														</td>
														<td class="table-inbox-attachment">
															<i class="icon-attachment text-muted"></i>
														</td>
														<td class="table-inbox-time">
															Nov 17
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /my inbox -->

								</div>
							</div>
							<!-- /tab content -->

						</div>
					</div>
					<!-- /detached content -->


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
