<?php
	session_start();
	require('db_conn.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Register form</title>

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

		// define variables and set to empty 
				//$user_name = $user_password = $user_moto = "";
		// FORM - before Submit
		if (isset($_POST['submit'])) {	

				$user_name = $_POST['user_name'];
				$user_password = $_POST['user_password'];
				$user_moto = $_POST['user_moto'];

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
				$user_password = test_input($_POST['user_password']);
				$user_moto = test_input($_POST['user_moto']);

			if (strlen($user_name)<=10 &&  strlen($user_password)<=10) {

				$user_password = md5($user_password);

		        $insert_users_query = "INSERT INTO `users`(`user_name`, `user_password`, `user_moto`) VALUES ('".$user_name."','".$user_password."','".$user_moto."')";
		        $insert_users_result = mysqli_query($conn, $insert_users_query);
		        
			        if ($insert_users_result) {
			      	?>
	
	<h1>Welcome to Islands!</h1>
	<p>Your registrtion was successful! </p>
   	<a href='index.php'>Go to your Island</a>		      	
			      		
			       <?php
			        }
			        else{
			        ?>

	<h1>Problem</h1>
	<p>There is problem! Try again!</p>
	<a href="registration.php">Try Again To Register</a>

					<?php
			        }
		       }
		       else{
		       	echo "*Username and Password must be shorter than 10 symbols!<br/>";
		       	echo '<a href="registration.php">Go To Registration FORM</a>';
		       }
		}
		else{
		?>

			<!--Registration FORM-->
		<form action="registration.php" method="post">
			<fieldset>
			    <legend>Registration Form</legend>
			    	<label>Username:</label>
			   			<input type="text" name="user_name"><br/><br/>
			   		<label>Password:</label>
			   			<input type="password" name="user_password"><br/>
			   			<p>*Username and Password must be shorter than 10 symbols!</p>
			   		<label>Flag of your Island - write your moto</label>
			   			<input type="textbox" name="user_moto">
			   			<br/>
			    <input type="submit" name="submit" value="Registration"><br/><br/>
			  </fieldset>
		</form>

		<?php
		}
		require('footer.php');
		?>
