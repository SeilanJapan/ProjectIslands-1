<?php
	require('db_conn.php');
	require('header.php');

	// TOP 3 LIKES

	echo '<div class="col-md-12">';
			echo '<h2 class="text-center text-success">TOP 3 THOUGTHS</h2>';

	echo '<form action="likes.php" method="post">';
	
	$qoute_list = "SELECT * FROM `quoutes` 
					WHERE `data_delete` IS NULL 
					ORDER BY `quoutes`.`quoute_like` DESC
					LIMIT 3";
	$qoute_list_result = mysqli_query($conn, $qoute_list);
		if (mysqli_num_rows($qoute_list_result)>0) {
			while ($row = mysqli_fetch_assoc($qoute_list_result)) {
				echo '<input type="hidden" name="quoute_id" value="'.$row['quoute_id'].'">';
				echo '<blockquote>
  						<p>'.$row['quoute'].'</p>
					</blockquote>';
				
				echo "Likes: ". $row['quoute_like']."  ";

	echo '<a href="likes.php?id='.$row['quoute_id'].'"><span class="glyphicon glyphicon-hand-up" aria-hidden="true"> LIKE</span></a>';	
					echo "<hr/>";
			}
		}
		
	echo '</form>';
	echo '</div>';


	// LIKE SYSTEM

	echo '<div class="col-md-12">';
			echo '<h2 class="text-center text-success">NO MAN IS AN ISLAND <br/> OR Let See What Think Others?!?</h2>';

	echo '<form action="likes.php" method="post">';
	
	$qoute_list = "SELECT * FROM `quoutes` 
					WHERE `data_delete` IS NULL 
					ORDER BY `quoutes`.`quoute_like` DESC";
	$qoute_list_result = mysqli_query($conn, $qoute_list);
		if (mysqli_num_rows($qoute_list_result)>0) {
			while ($row = mysqli_fetch_assoc($qoute_list_result)) {
				echo '<input type="hidden" name="quoute_id" value="'.$row['quoute_id'].'">';
				echo '<blockquote>
  						<p>'.$row['quoute'].'</p>
					</blockquote>';
				
				echo "Likes: ". $row['quoute_like']."  ";

	echo '<a href="likes.php?id='.$row['quoute_id'].'"><span class="glyphicon glyphicon-hand-up" aria-hidden="true"> LIKE</span></a>';	
					echo "<hr/>";
			}
		}
		
	echo '</form>';

	if (isset($_GET['id'])) {
		$quoute_id = $_GET['id'];
		//echo $quoute_id;

		$insert_like = "UPDATE `quoutes` SET `quoute_like`=`quoute_like`+1 WHERE `quoute_id` = $quoute_id";
		$insert_like_result = mysqli_query($conn, $insert_like);
		if ($insert_like_result) {
		}
	}

echo "</div>";
	require('footer.php');
?>