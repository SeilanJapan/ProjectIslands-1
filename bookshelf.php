<?php
	$pageTitle = 'Bookshelf';
	//header
	require('db_conn.php');
	require('header.php');
	require('test_input.php');
?>

	<!--MENU Books order by ....-->
		<ul class="nav nav-tabs">
			  <li role="presentation" class="active"><a href="bookshelf.php">Book by name</a></li>
			  <li role="presentation"><a href="#">Book by date</a></li>
			  <li role="presentation"><a href="#">Book by author</a></li>
		</ul>

	<!--LIST Books order by name-->

<?php

	$order_book_name = "SELECT * FROM `books` 
							LEFT JOIN `authors`
								ON `books`.`author_id`=`authors`.`author_id`
						WHERE `books`.`date_deleted` IS NULL 
						ORDER BY `books`.`book_name` ASC";
	$order_name_result = mysqli_query($conn, $order_book_name);
	echo '<div class="list-group">';
		if (mysqli_num_rows($order_name_result)>0) {
			while($row = mysqli_fetch_assoc($order_name_result)){
				echo '<a href="read_book.php?id='.$row['book_id'].'" class="list-group-item">
							<h4 class="text-primary">  '.$row['book_name'].'  </h4> 
								<strong>from</strong> 
									<span class="text-success">  '.$row['author_name'].'</span>
					</a>';
			}
		}
	echo '</div>';

?>
<?php
	require('footer.php');
?>
