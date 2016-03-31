<?php
	$pageTitle = 'Add Book';
	//header
	require('db_conn.php');
	require('header.php');
	require('test_input.php');
?>


	
<!--iNSERT Book FORM--> 

	<?php
		echo '<div class="col-md-10 col-md-offset-1">';
			echo '<h2 class="text-center text-warning">BOOK</h2>';
			
				echo '<form action="insert_book.php" method="post" class="form-horizontal">';
					echo '<div class="form-group">';
						echo '<label class="col-md-2 control-label text-center" for="">Author:</label>';
							echo '<div class="col-md-12">';
								echo '<select name="author_id" id="first" class="form-control">';
							
									/*$read_authors_query = "SELECT `books`.`author_id`, `authors`.`author_name` 
											 				FROM `books` 
									 							LEFT JOIN `authors` 
									 							ON `books`.`author_id`=`authors`.`author_id` 
									 	  					WHERE `books`.`date_deleted` IS NULL 
									 						ORDER BY `authors`.`author_name` ASC";*/

									$read_authors_query = "SELECT * FROM `authors` 
															WHERE `date_deleted` IS NULL 
															ORDER BY `authors`.`author_name` ASC";
									$read_authors_result = mysqli_query($conn, $read_authors_query);
										if (mysqli_num_rows($read_authors_result) > 0) {
											while($row = mysqli_fetch_assoc($read_authors_result)){ 
													echo '<option value="'.$row['author_id'].'">'.$row['author_name'].'</option>';
											}
										}
								echo '</select>';
								
										echo '<a href ="insert_author.php">HERE Add author if author is not in a list</a>';
								
							echo "</div>";
					echo '</div>';
					echo '<div class="form-group">';
						echo '<label class="col-md-2 control-label text-left" for="bookname">Name of book:</label>';
							echo '<div class="col-md-12">';
								echo '<input class="form-control" type="text" name="book_name" id="bookname" maxlength="100">';
							echo '</div>';
					echo '</div>';
					echo '<div class="form-group">';
						echo "<input type='submit' name='submit' value='Add new book' class='btn btn-warning btn-block'>";
					echo '</div>';
				echo '</form>';
		echo '</div>';
		
		//echo '</div>';
	?>

<?php
	if(isset($_POST['submit'])){

	$book_name = test_input($_POST['book_name']);
	//$author_id = test_input($_POST['author_id']);
	$author_id = $_POST['author_id'];
	$date = date('Y-m-d');
		
	$insert_book_query = "INSERT INTO `books`(`book_name`, `author_id`, `book_date`) 
									  VALUES ('$book_name', $author_id, '$date')";
	$insert_book_result= mysqli_query($conn, $insert_book_query);
		if ($insert_book_result) {
				echo '<h3>You add book!</h3>';

			}else{
				echo "<h3>You Try again!</h3>";
			}
		}
echo '<div class="col-md-8 col-md-offset-1">';
		//DELETED BOOK query --------------------------------------------------------------------------------------------------
	if (isset($_GET['id'])) {

		$book_id = $_GET['id'];
			$date = date('Y-m-d'); 

				$delete_book_query = "UPDATE `books` SET `date_deleted`='$date'  WHERE `book_id`=$book_id";	
				$delete_book_result = mysqli_query($conn, $delete_book_query);

					if ($delete_book_result) {	
						echo'<h3>You deleted book!</h3>';
	
					}
					else{
				?>
						<h3>You don't deleted book! Try again!</h3>
			
<?php
					}
	}
	echo '</div>';
		//READ BOOK table -----------------------------------------------------------------------------------------------------
			$read_books_query = "SELECT * FROM `books` 
									LEFT JOIN `authors` 
										ON `books`.`author_id`=`authors`.`author_id` 
								WHERE `books`.`date_deleted` IS NULL 
								ORDER BY `books`.`book_id` DESC";
			$read_books_result = mysqli_query($conn, $read_books_query);

echo '<div class="col-md-12>';
	echo '<div class="table-responsive>';
		echo '<table class="table table-striped">';
			echo '<tr class="warning">';
				echo '<td >Date</td>';
				echo '<td >Books</td>';
				echo '<td >Author</td>';
				echo '<td colspan="2">Correct</td>';
			echo '</tr><tr>';
			
				if (mysqli_num_rows($read_books_result) > 0) {
					while($row = mysqli_fetch_assoc($read_books_result)){ 

					echo '<td>'.$row['book_date'].'</td>';
					echo '<td>'.$row['book_name'].'</td>';
					echo '<td>'.$row['author_name'].'</td>';
					echo '<td>'.'<a href="update_book.php?id='.$row['book_id'].'">Edit</a></td>';
					echo '<td>'.'<a href="insert_book.php?id='.$row['book_id'].'">Delete</a></td></tr>';
					}
				}
		
		echo '</table>';
	echo '</div>';
echo '</div>';
	

	//footer
	require('footer.php');
?>