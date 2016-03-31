<?php
	$pageTitle = 'Add Author';
	//header
	require('db_conn.php');
	require('header.php');
	require('test_input.php');
	
	//INSERT AUTHOR FORM

	echo '<div class="col-md-10 col-md-offset-1">';
			echo '<h2 class="text-center text-success">AUTHOR</h2>';

				echo '<form action="insert_author.php" method="post" class="form-horizontal">';
		
					echo '<div class="form-group">';
						echo '<label class="col-md-3 control-label text-left" for="author_name">Write name of author:</label>';
							echo '<div class="col-md-12">';
								echo '<input class="form-control" type="text" name="author_name" id="author_name" maxlength="100">';
							echo '</div>';
					echo '</div>';
					echo '<div class="form-group">';
						echo "<input type='submit' name='submit' value='Add new author' class='btn btn-success btn-block'>";
					echo '</div>';

				echo '</form>';
		echo '</div>';

	echo "</div>";
		

	if(isset($_POST['submit'])){

	//$author_name = $_POST['author_name'];
	$author_name = test_input($_POST['author_name']);
		
	$insert_author_query = 	"INSERT INTO `authors`(`author_name`) VALUES ('$author_name')";
	$insert_author_result= mysqli_query($conn, $insert_author_query);
		if ($insert_author_result) {
?>
				<p>You add author!</p>
<?php
			}else{
?>
			<p>You don't add author! Try again!</p>
<?php
			}
		}

		//DELETED query
	if (isset($_GET['id'])) {

		$author_id = $_GET['id'];
			$date = date('Y-m-d');

				$delete_author_query = "UPDATE `authors` SET `date_deleted`='$date' WHERE `author_id`=$author_id";	
				$delete_author_result = mysqli_query($conn, $delete_author_query);

					if ($delete_author_result) {
?>					
			<div class="col-md-10 col-md-offset-1">
						<h3>You deleted author!</h3>
			</div>
				<?php
					}
					else{
				?>
			<div class="col-md-10 col-md-offset-1">
						<ph3>You don't deleted author! Try again!</h3>
			</div>
<?php
					}
	}

		//read AUTHORS table
			$read_authors_query = "SELECT * FROM `authors` 
									WHERE `date_deleted` IS NULL 
									ORDER BY `authors`.`author_id` DESC";
			$read_authors_result = mysqli_query($conn, $read_authors_query);
?>
<div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">
		<table class="table table-striped">
			<tr class="success">
				<td >Authors</td>
				<td colspan="2">Correct</td>
			</tr><tr>
			<?php
				if (mysqli_num_rows($read_authors_result) > 0) {
					while($row = mysqli_fetch_assoc($read_authors_result)){ 
					echo '<td>'.$row['author_name'].'</td>';
					echo '<td>'.'<a href="update_author.php?id='.$row['author_id'].'">Edit</a></td>';
					echo '<td>'.'<a href="insert_author.php?id='.$row['author_id'].'">Delete</a></td></tr>';
					}
				}
			?>
		</table>
	</div>
</div>

<?php
	//footer
	require('footer.php');
?>
