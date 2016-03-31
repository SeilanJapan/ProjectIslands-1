<?php
	$pageTitle = 'Add tougth';
	//header
	require('db_conn.php');
	require('header.php');
	require('test_input.php');

		//iNSERT THOUGH FORM

		echo '<div class="col-md-10 col-md-offset-1">';
			echo '<h2 class="text-center text-info">ADD THOUGHT</h2>';
			
				echo '<form action="insert_quote.php" method="post" class="form-horizontal">';
					echo '<div class="form-group">';
						echo '<label class="col-md-2 control-label text-center" for="books">Choose book:</label>';
							echo '<div class="col-md-12">';
								echo '<select name="book_id" id="books" class="form-control">';

									$read_books_query = "SELECT * FROM `books` 
															WHERE `date_deleted` IS NULL 
															ORDER BY `books`.`book_id` DESC";
									$read_books_result = mysqli_query($conn, $read_books_query);
										if (mysqli_num_rows($read_books_result) > 0) {
											while($row = mysqli_fetch_assoc($read_books_result)){ 
													echo '<option value="'.$row['book_id'].'" selscted>'.$row['book_name'].'</option>';
											}
										}
								echo '</select>';
										echo '<a href ="insert_book.php">HERE Add book if book is not in a list</a><br/>';
										echo '<a href ="insert_author.php">HERE Add author if author is not in a list</a>';
								
							echo "</div>";
					echo '</div>';
					echo '<div class="form-group">';
						echo '<label class="col-md-2 control-label text-left" for="quoute">Write here:</label>';
							echo '<div class="col-md-12">';
								echo '<input class="form-control" type="text" name="quoute" id="quoute" maxlength="1000">';
							echo '</div>';
					echo '</div>';
					echo '<div class="form-group">';
						echo "<input type='submit' name='submit' value='Add new thought' class='btn btn-info btn-block'>";
					echo '</div>';
				echo '</form>';
		echo '</div>';
		
	?>

<?php
	if(isset($_POST['submit'])){

		$quoute = test_input($_POST['quoute']);
		$book_id = $_POST['book_id'];
		$date = date('Y-m-d');
		
			$insert_thought = "INSERT INTO `quoutes` (`quoute`, `quoute_date`, `book_id`) VALUES ('$quoute' ,'$date', $book_id)";
			$insert_thought_result= mysqli_query($conn, $insert_thought);
				if ($insert_thought_result) {
					echo '<div class="col-md-12">';
						echo '<h3>You add book!</h3>';
					echo '</div>';

				}
				else{
					echo '<div class="col-md-12">';
						echo "<h3>You Try again!</h3>";
					echo '</div>';
				}
	}


	require('footer.php');
?>