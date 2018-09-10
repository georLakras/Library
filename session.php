<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['username'];
   
   $result = mysqli_query($connect,"select username from admins where username = '$user_check' ");
   
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
	  
   }