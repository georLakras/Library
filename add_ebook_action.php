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
			
			$writer_query = "INSERT INTO writer (first_name, last_name, birth_date, death_date, country, info, image)
							 VALUES ('$wr_fn','$wr_ln','$wr_bd','$wr_dd','$wr_co','$wr_in','$wr_av');";
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
			
			$publisher_query = "INSERT INTO publisher (title, foundation_year, info, logo)
								VALUES ('$pb_title', '$pb_fy', '$pb_in', '$pb_av');";
			$result2 = mysqli_query($connect, $publisher_query);
			
			if (mysqli_errno($connect)){
				echo mysqli_error($connect);
			}else{
				$publisher_id = $connect -> insert_id;

			}
		}
		

		$title = mysqli_real_escape_string($connect,$_REQUEST['title']);
		$subtitle = mysqli_real_escape_string($connect,$_REQUEST['subtitle']);
		$isbn = mysqli_real_escape_string($connect,$_REQUEST['isbn']);
		$year = mysqli_real_escape_string($connect,$_REQUEST['year']);
		$lang = mysqli_real_escape_string($connect,$_REQUEST['lang']);
		$pages = mysqli_real_escape_string($connect,$_REQUEST['pages']);
		$cover = mysqli_real_escape_string($connect,$_REQUEST['cover']);
		$copies = mysqli_real_escape_string($connect,$_REQUEST['copies']);
		$sum = mysqli_real_escape_string($connect,$_REQUEST['summary']);
		$file = mysqli_real_escape_string($connect,$_REQUEST['file']);
		
		$ebook_query = "INSERT INTO ebook (title, subtitle, release_year, language, pages, description, cover)
						VALUES ('$title','$subtitle','$year','$lang', '$pages', '$sum','$cover');";
		$result3 = mysqli_query($connect, $ebook_query);
		
		if (mysqli_errno($connect)){
			echo mysqli_error($connect);
		}else{
			$book_id = $connect -> insert_id;
			header('Location:book.php?id='.$ebook_id);
		}
		
	}
?>	