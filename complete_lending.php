<?php 
	include('config.php');
	session_start();

	$admin = $_SESSION['id'];
	$book= $_POST['books'];
	$user= $_POST['users'];
	
	$insert_query = "INSERT INTO borrow (`id`, `borrowed_date`, `returned_date`, `book_id`, `user_id`, `admin_id`) 
					 VALUES (NULL, CURRENT_TIMESTAMP, NULL, ".$_POST['books'].", ".$_POST['users'].", '$admin');";
	$result1 = mysqli_query($connect,$insert_query);
	if (mysqli_errno($connect)){
		echo mysqli_error($connect);
	}else{
		$last_id = mysqli_insert_id($connect);
	}
	
	$avail_query = "SELECT avail_copies FROM book WHERE book.id = '$book';";
	$result2 = mysqli_query($connect,$avail_query);
	if(mysqli_errno($connect)){
		echo mysqli_error($connect);
	}else if ($result2->num_rows>0){
		while ($row = $result2 -> fetch_assoc()){
			$avail_copies = $row['avail_copies'];
		}
		if ($avail_copies <= 1){
			$update_query = "UPDATE book
							 SET available = 0, avail_copies = avail_copies -1
							 WHERE book.id = ".$_POST['books'].";";			 
		}else{
			$update_query = "UPDATE book
							 SET avail_copies = avail_copies - 1
							 WHERE book.id = ".$_POST['books'].";";
		}
		$result3 = mysqli_query($connect,$update_query);
		if (mysqli_errno($connect)){
			echo mysqli_error($connect);
		}
		
		
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/invoice_template.js"></script>
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

					<!-- Invoice template -->
					<div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">Static invoice</h6>
							<div class="heading-elements">
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Save</button>
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
		                	</div>
						</div>

						<?php
							$query = "SELECT borrow.borrowed_date, borrow.returned_date,
										user.id AS user, user.first_name, user.last_name, user.email, user.phone_number,
										addresses.street, addresses.number, addresses.city, addresses.zip_code,
										book.id AS book, book.title, book.isbn,
										writer.first_name AS writer_fn, writer.last_name AS writer_ln, publisher.title AS publisher,
										admins.first_name AS admins_fn, admins.last_name AS admins_ln, admins.email AS admins_email
										FROM borrow
										INNER JOIN user ON borrow.user_id = user.id
										INNER JOIN addresses ON user.address = addresses.id
										INNER JOIN book ON borrow.book_id = book.id
										INNER JOIN writer ON book.writer_id = writer.id
										INNER JOIN publisher ON book.publisher_id = publisher.id
										INNER JOIN admins ON borrow.admin_id = admins.id
										WHERE borrow.id = '$last_id';";	
										
							$result = mysqli_query($connect, $query);
							if (mysqli_errno($connect)){
								echo mysqli_error($connect);
							}else if($result->num_rows > 0){
								while ($row= $result->fetch_assoc()){									
									$bd = $row['borrowed_date'];
									$rd = $row['returned_date'];
									$user_ln = $row['last_name'];
									$user_fn = $row['first_name'];
									$user_id = $row['user'];
									$user_pn = $row['phone_number'];
									$email = $row['email'];
									$bid = $row['book'];
									$title = $row['title'];
									$isbn = $row['isbn'];
									$writer_fn = $row['writer_fn'];
									$writer_ln = $row['writer_ln'];
									$publisher = $row['publisher'];	
									$street = $row['street'];
									$number = $row['number'];
									$city = $row['city'];
									$zip_code = $row['zip_code'];
									$admins_fn= $row['admins_fn'];
									$admins_ln= $row['admins_ln'];
									$admins_email= $row['admins_email'];
								}
							}
						?>
						
						<div class="panel-body no-padding-bottom">
							<div class="row">
								<div class="col-sm-6 content-group">
										<h3><i class="icon-books position-left"></i><b> # library_administrator</b></h3>
										<li>Καυκάσου, 46</li>
										<li>Ελευθέριο - Κορδελιό, Θεσσαλονίκη</li>
										<li>2310 755-355</li>
									</ul>
								</div>

								<div class="col-sm-6 content-group">
									<div class="invoice-details">
										<?php echo '<h5 class="text-uppercase text-semibold">Invoice #'.$last_id.'</h5>'; ?>
										<ul class="list-condensed list-unstyled">
											<?php echo '<li>Date/Time: <span class="text-semibold">'.$bd.'</span></li>'; ?>
										</ul>
									</div>
								</div>
							</div>
							
							</br>
							
							<div class="row">
								<div class="col-md-6 col-lg-9 content-group">
									<span class="text-muted">Invoice To:</span>
		 							<ul class="list-condensed list-unstyled">
										<?php 
											echo'<li><h5><strong>'.$user_fn," ",$user_ln.'</strong></h5></li>';
											echo'<li>'.$street,", ",$number.'</li>';
											echo'<li>'.$city,", ",$zip_code.'</li>';
											echo'<li>'.$user_pn.'</li>';
											echo'<li><a href="#">'.$email.'</a></li>';
										?>
									</ul>
								</div>
							</div>
						</div>

						<div class="table-responsive">
						    <table class="table table-lg">
						        <thead>
						            <tr>
						                <th>Βοοκ Description</th>
						                <th class="col-sm-1">Borrow Date</th>
						                <th class="col-sm-1">Proposal Date</th>
						            </tr>
						        </thead>
						        <tbody>
						            <tr>
						                <td>
						                	<div class="col-md-6 col-lg-3 content-group">
												<ul class="list-condensed list-unstyled invoice-payment-details">
													<li><h5>Title: <span class="text-right text-semibold"><?php echo $title; ?></span></h5></li>
													<li>Writer: <span class="text-semibold"><?php echo $writer_fn," ",$writer_ln; ?></span></li>
													<li>Publisher: <span><?php echo $publisher; ?></span></li>
													<li>ISBN: <span><?php echo $isbn; ?></span></li>
													<li>Book ID: <span><?php echo $book; ?></span></li>
												</ul>
											</div>
					                	</td>
						                <td><?php echo $bd; ?></td>
						                <td><?php echo $proposal_date = date('Y-m-d', strtotime($bd. " + 30 days")); ?></td>
						            </tr>
						        </tbody>
						    </table>
						</div>

						<div class="panel-body">
							<div class="row invoice-payment">
								<div class="col-sm-7">
									<div class="content-group">
										<h6>Authorized person</h6>
										<div class="mb-15 mt-15">
											<img src="assets/images/signature.png" class="display-block" style="width: 150px;" alt="">
										</div>

										<ul class="list-condensed list-unstyled text-muted">
											<li><?php echo $admins_fn," ",$admins_ln; ?></li>
											<li><?php echo $admins_email; ?></li>
											<li>Καυκάσου, 46</li>
											<li>Ελευθέριο - Κορδελιό, Θεσσαλονίκη</li>
											<li>2310 755-355</li>
										</ul>
									</div>
								</div>																
							</div>

							<h6>Other information</h6>
							<p class="text-muted">Thank you for using Limitless. This invoice can be paid via PayPal, Bank transfer, Skrill or Payoneer. Payment is due within 30 days from the date of delivery. Late payment is possible, but with with a fee of 10% per month. Company registered in England and Wales #6893003, registered office: 3 Goodman Street, London E1 8BF, United Kingdom. Phone number: 888-555-2311</p>
						</div>
					</div>
					<!-- /invoice template -->


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
