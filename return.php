<?php
	include('config.php');
	session_start();
	
	$borrow_id= $_GET['borrow'];
	$book_id= $_GET['book'];
	
	$borrow_query = "UPDATE borrow SET returned_date = NOW()
						WHERE borrow.id = '$borrow_id';";
	$result = mysqli_query($connect,$borrow_query);
	
	if (mysqli_errno($connect)){
		echo mysqli_error($connect);
	}else{
		$book_query = "SELECT available, avail_copies FROM book WHERE book.id='$book_id';";
		$result2 = mysqli_query($connect,$book_query);
		
		if (mysqli_errno($connect)){
			echo mysqli_error($connect);
		}else if ($result2->num_rows >0){
			while ($row=$result2->fetch_assoc()){
				$avail_copies = $row['avail_copies'] + 1;
				$available = $row['available'];
				
				if ($avail_copies > 0 ){
					$avail_query = "UPDATE book SET book.avail_copies='$avail_copies', book.available=1
									WHERE book.id='$book_id';";
					$result3 = mysqli_query($connect,$avail_query);
					
					if (mysqli_errno($connect)){
						echo mysqli_error($connect);
					}else{
						header('Location:lendings_catalog.php');
					}
				}else{
					$avail_query = "UPDATE book SET book.avail_copies='$avail_copies'
									WHERE book.id='$book_id';";
					$result3 = mysqli_query($connect,$avail_query);
					
					if (mysqli_errno($connect)){
						echo mysqli_error($connect);
					}else{
						header('Location:lendings_catalog.php');
					}
				}
			}
		}
	}
?>