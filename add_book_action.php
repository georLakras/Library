<?php 	
	include('config.php');
	session_start();

	
	if ($_POST){
		
		if ($_POST['writers'] >0){
			$writer_id = $_POST['writers'];
			
		}else if ($_POST['writers'] == 0){
			$wr_fn = mysqli_real_escape_string($connect,$_REQUEST['first_name']);
			$wr_ln = mysqli_real_escape_string($connect,$_REQUEST['last_name']);
			$wr_bd = mysqli_real_escape_string($connect,$_REQUEST['birth_date']);
			$wr_dd = mysqli_real_escape_string($connect,$_REQUEST['death_date']);
			$wr_co = mysqli_real_escape_string($connect,$_REQUEST['country']);
			$wr_in = mysqli_real_escape_string($connect,$_REQUEST['wr_info']);
			$wr_av = mysqli_real_escape_string($connect,$_REQUEST['wr_avatar']);
			
			$file_name_wr = $_FILES['wr_avatar']['name'];
			$path = 'assets/images/writers/'.$file_name_wr;
			
			$writer_query = "INSERT INTO writer (first_name, last_name, birth_date, death_date, country, info, image_path)
							 VALUES ('$wr_fn','$wr_ln','$wr_bd','$wr_dd','$wr_co','$wr_in','$path');";
			$result = mysqli_query($connect,$writer_query);
			
			if (mysqli_errno($connect)){
				echo mysqli_error($connect);
			}else{
				$writer_id = $connect -> insert_id;
			}
			
		}		
			
		if ($_POST['publishers']>0){
			$publisher_id = $_POST['publishers'];
			
		}else if ($_POST['publishers'] == 0){
			$pb_title = mysqli_real_escape_string($connect, $_REQUEST['publisher_title']);
			$pb_fy = mysqli_real_escape_string($connect, $_REQUEST['publisher_foundation_year']);
			$pb_in = mysqli_real_escape_string($connect, $_REQUEST['publisher_info']);
			$pb_av = mysqli_real_escape_string($connect, $_REQUEST['publisher_avatar']);
			
			$file_name_pub = $_FILES['publisher_avatar']['name'];
			$path2 = 'assets/images/publishers/'.$file_name_pub;
			
			$publisher_query = "INSERT INTO publisher (title, foundation_year, info, logo_path)
								VALUES ('$pb_title', '$pb_fy', '$pb_in', '$path2');";
			$result2 = mysqli_query($connect, $publisher_query);
			
			if (mysqli_errno($connect)){
				echo mysqli_error($connect);
			}else{
				$publisher_id = $connect -> insert_id;
			}
		}
		

		$book_title = mysqli_real_escape_string($connect,$_REQUEST['book_title']);
		$subtitle = mysqli_real_escape_string($connect,$_REQUEST['subtitle']);
		$isbn = mysqli_real_escape_string($connect,$_REQUEST['isbn']);
		$year = mysqli_real_escape_string($connect,$_REQUEST['year']);
		$lang = mysqli_real_escape_string($connect,$_REQUEST['lang']);
		$pages = mysqli_real_escape_string($connect,$_REQUEST['pages']);
		$copies = mysqli_real_escape_string($connect,$_REQUEST['copies']);
		$sum = mysqli_real_escape_string($connect,$_REQUEST['summary']);
		
		$file_name_book = $_FILES['cover']['name'];
		$path = 'assets/images/book_covers/'.$file_name_book;
		
		$book_query = "INSERT INTO book (title, subtitle, isbn, release_year, language, pages, description, copies, avail_copies, available, path, publisher_id, writer_id)
						VALUES ('$book_title','$subtitle','$isbn','$year','$lang', '$pages', '$sum', '$copies','$copies','1','$path','$publisher_id', '$writer_id');";
		$result3 = mysqli_query($connect, $book_query);
		
		if (mysqli_errno($connect)){
			echo mysqli_error($connect);
		}else{
			$book_id = $connect -> insert_id;
			header('Location:book.php?id='.$book_id);
		}
		
	}
?>	