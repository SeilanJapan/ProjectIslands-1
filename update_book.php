<?php
	$pageTitle = 'Edit Book';
	//header
	require('db_conn.php');
	require('header.php');
	require('test_input.php');
?>


	
<!--iNSERT Book FORM--> 
	<?php 

	if(empty($_POST['submit'])){

		$book_id = $_GET['id'];

		$read_update_info = "SELECT * FROM `books` 
								LEFT JOIN `authors` 
									ON `books`.`author_id`=`authors`.`author_id` 
							WHERE `books`.`book_id`=$book_id";
		$update_info_result = mysqli_query($conn, $read_update_info );
		$row = mysqli_fetch_assoc($update_info_result);

		// UPDTE FORM
		
		echo '<div class="col-md-10 col-md-offset-1"">';
			echo "<h2 class='text-center text-warning'>Edit book</h2>";

			echo'<form action="update_book.php" method="post" class="form-horizontal">';
				echo '<div class="form-group">';
					echo '<input type="hidden" name="book_id" class="input-lg" value="'.$row['book_id'].'">';

					echo '<label class="col-md-2 control-label text-center" for="first">Name of book</label>';
						echo '<div class="col-md-12">';
							echo '<input class="form-control" type="text" name="book_name" value="'.$row['book_name'].'" id="first">';
						echo '</div>';
				echo '</div>';

				echo '<div class="form-group">';
					echo '<label class="col-md-2 control-label text-left" for="second">Author of book</label>';
					
						echo '<div class="col-md-12">';
						echo '<input type="hidden" name="author_id" value="'.$row['author_id'].'">';
							echo '<select class="form-control" name="author_id" for="second">';
												echo '<option value="'.$row['author_id'].'" selscted>'.$row['author_name'].'</option>';	
									$read_authors_query = "SELECT * FROM `authors` WHERE `date_deleted` IS NULL";
									$read_authors_result = mysqli_query($conn, $read_authors_query);
										if (mysqli_num_rows($read_authors_result) > 0) {
											while($row = mysqli_fetch_assoc($read_authors_result)){ 
												echo '<option value="'.$row['author_id'].'">'.$row['author_name'].'</option>';
											}
										}
							echo '</select>';

							echo '<a href ="insert_author.php">Add author if author is not in a list</a>';
						echo '</div>';
				echo '</div>';		
			echo '</div>';

			echo '<div class="col-md-12">';
				echo '<input type="submit" name="submit" value="Edit book" class="btn btn-warning  btn-block">';
			echo '</div>';
			echo '</form>';
		echo '<div>';

	}


		if(isset($_POST['submit'])){

				$book_id = $_POST['book_id'];
				$book_name = test_input($_POST['book_name']);
				$author_id = $_POST['author_id'];
				
				$update_book = "UPDATE `books` 
									SET `book_name`='$book_name',`author_id`=$author_id  
								WHERE `book_id`=$book_id";
					
				$update_book_result= mysqli_query($conn, $update_book);
				if ($update_book_result) {
					echo "<h3>Edit book!</h3>";
				}
				else{
					echo "<h3>Have a problem! Try again to edit book!</h3>";
				}
			}
		?>
<?php
	//footer
	require('footer.php');
?>