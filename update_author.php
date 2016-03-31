<?php
	$pageTitle = 'Add Author';
	//header
	require('db_conn.php');
	require('header.php');
	require('test_input.php');

	//UPDATE author

if (empty($_POST['submit'])) {
	

	$author_id = $_GET['id'];

	$read_authors_query = "SELECT * FROM `authors` 
									WHERE `author_id` = $author_id";
	$read_authors_result = mysqli_query($conn, $read_authors_query);
	$row = mysqli_fetch_assoc($read_authors_result);

		echo '<div class="col-md-10 col-md-offset-1">';
			echo '<h2 class="text-center text-success">Edit AUTHOR</h2>';

				echo '<form action="update_author.php" method="post" class="form-horizontal">';
		
					echo '<div class="form-group">';
						echo '<label class="col-md-3 control-label text-left" for="author_name">Edit name of author:</label>';
							echo '<div class="col-md-12">';
								echo '<input type="hidden" name="author_id" value="'.$row['author_id'].'">';
								echo '<input class="form-control" type="text" name="author_name" value="'.$row['author_name'].'" id="author_name" maxlength="100">';
							echo '</div>';
					echo '</div>';
					echo '<div class="form-group">';
						echo "<input type='submit' name='submit' value='Edit author' class='btn btn-success btn-block'>";
					echo '</div>';

				echo '</form>';
		echo '</div>';

	echo "</div>";
}


		

	if(isset($_POST['submit'])){

	
	$author_id = $_POST['author_id'];	
	$author_name = test_input($_POST['author_name']);
		
	$edit_author_query = "UPDATE `authors` SET `author_name`='$author_name' 
							WHERE `author_id`=$author_id";
	$edit_author_result= mysqli_query($conn, $edit_author_query);
		if ($edit_author_result) {
?>				
			<div class="col-md-10 col-md-offset-1">
				<h3>You edit name of author!</h3>
			</div>
<?php
			}else{
?>
		<div class="col-md-10 col-md-offset-1">
			<h3>You don't edit name of author! Try again!</h3>
		</div>
<?php
			}
		}



	require('footer.php');
?>