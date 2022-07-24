<?php
	$conn=mysqli_connect('localhost','root','','vegefoods_db');
	if ($conn->connect_error) {
		die("Connection_error : . $conn->connect_error ");
	}
?>