<?php
	session_start();
	require('db_conn.php');
?>
<!DOCTYPE html>
<html>
			<head>
				<meta charset="UTF-8">
				<title>IslandsLogIn</title>

				<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			</head> 


	<body>

		<?php
			if (empty($_POST['submit'])) {
		?>
		
		<form action="index.php" method="post">
			<fieldset>
			    <legend>LogIn</legend>
			    	<label>Username:</label><br/>
			   			<input type="text" name="user_name">
			   		<label>Password:</label><br/>
			   			<input type="password" name="user_password">
			    <input type="submit" name="submit" value="LogIn">
			  </fieldset>
		</form>

		<a href="registration.php">Registration NOW</a>
		
		<?php
			}
			else {

			//if ($_SERVER["REQUEST_METHOD"] == "POST") { 
				if (isset($_POST['submit'])) {

				   $user_name = $_POST['user_name'];
				   $user_password = $_POST['user_password'];

				   //Validation form
				function test_input($data) {  
				   $data = trim($data);
				   $data = stripslashes($data);
				   $data = addslashes($data);
				   $data = addcslashes($data, ';|<>\'"');
				   $data = htmlspecialchars($data);
				   $data = quotemeta($data);
				   return $data;
				}

				$user_name = test_input($_POST['user_name']);
				$user_password = md5(test_input($_POST['user_password']));

					$read_username = "SELECT `user_id`, `user_name`, `user_password` FROM `users` WHERE `user_name`='".$user_name."' AND `user_password`='".$user_password."' ";
					$read_username_result = mysqli_query($conn, $read_username);
			

					if (mysqli_num_rows($read_username_result) > 0) {

							$_SESSION['logged'] = true; 
		        			

			        }

			        $_SESSION['user_name'] = $user_name;

			        echo "Welcome, ".$_SESSION['user_name'].'!';
			    }
				
			}

	//footer
	require('footer.php');
?>