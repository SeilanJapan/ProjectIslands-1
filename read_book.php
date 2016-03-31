<?php
	$pageTitle = 'Bookshelf';
	//header
	require('db_conn.php');
	require('header.php');
	require('test_input.php');
?>
<?php
	
$book_id = $_GET['id'];
echo "<div>";
	$book_quotes = " SELECT * FROM `quoutes` 
					LEFT JOIN `books` 
						ON `quoutes`.`book_id`=`books`.`book_id` 
					WHERE `quoutes`.`book_id`=$book_id 
					AND `quoutes`.`data_delete`IS NULL";
	$book_quotes_result = mysqli_query($conn, $book_quotes);
	$row1 =mysqli_fetch_assoc($book_quotes_result);
	if ($row1) {
		echo "<h2 class='text-center text-primary'><small>Book:   </small>".$row1['book_name']."<h2><br/>";
		echo '<div class="form-group">';
		echo "<a href='insert_quote.php?id=".$row1['book_id']."'><button class='btn btn-primary btn-block'>ADD NEW TOUGHT IN BOOK</button></a>";
	echo '</div>';
	}

	
	
?>
		<!--TABLE THOUGTHS-->
		<div class="table-responsive">
			<table class="table table-striped">
				<tr class="primary">
					<td >Date</td>
					<td >Thought</td>
					<td colspan="2">Correct</td>
				</tr><tr>
<?php
	$book_quotes = " SELECT * FROM `quoutes` 
					LEFT JOIN `books` 
						ON `quoutes`.`book_id`=`books`.`book_id` 
					WHERE `quoutes`.`book_id`=$book_id 
					AND `quoutes`.`data_delete`IS NULL";
	$book_quotes_result = mysqli_query($conn, $book_quotes);
				if (mysqli_num_rows($book_quotes_result)>0) {
					while($row = mysqli_fetch_assoc($book_quotes_result)){
						echo '<td>'.$row['quoute_date'].'</td>';
						echo '<td>'.$row['quoute'].'</td>';
							echo '<td>'.'<a href="update_quote.php?id='.$row['quoute_id'].'">Edit</a></td>';
							echo '<td>'.'<a href="read_book.php?id='.$row['quoute_id'].'">Delete</a></td></tr>';
					}
				}
		echo '</div>';
echo "</div>";



	
?>
<?php
	require('footer.php');
?>