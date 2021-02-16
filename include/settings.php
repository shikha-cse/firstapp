<?php
	 $mysqli=new mysqli("localhost","root","","mysqlab");
	 if (mysqli_connect_errno())
	 {
	 	echo "error in connection".mysqli_connect_errno();
	 	exit();
	 }
	 function baseurl()
	 {
	 	return "http://localhost/um/";
	 }
	 session_start();
	 ?>