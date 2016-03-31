<?php
	$conn = mysqli_connect('localhost', 'root', '', 'project');
	mysqli_set_charset($conn, 'utf8');
	/*
	if (!$conn) {
		die("Database connection failed: " . mysqli_connect_error());
	} else {
		echo "Connected successfully !";
	}
	*/
?>