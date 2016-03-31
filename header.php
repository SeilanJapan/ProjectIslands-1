<?php
	session_start();
?>
<! DOCTYPE html>
<html>
		<head>
			<head>
				<meta chasrset="UTF-8">
				<title><?php echo $pageTitle; ?></title>
				<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

				<style>
				.text{
					height: 150px;
				}
				</style>

				
				
		</head> 
		<body>

			<div class="col-md-10 col-md-offset-1">

				<h1 class="text-center text-uppercase text-info">Island of thoughts</h1>
				<h1 class="text-left">
					<small>
						<blockquote>
	  						<p>If my thoughts of you were suddenly become grains of sand, I would made for you an island.</p>
	  						<footer>Thoughts of:
	  							<cite title="Source Title">Isaac Flowler</cite>
	  						</footer>
						</blockquote>
					</blockquote></small>
				</h1>

				<div class="btn-group btn-group-justified" role="group" aria-label="...">
				  <div class="btn-group" role="group">
				    <a href="bookshelf.php"><button type="button" class=" btn btn-primary btn-default">BOOKSHELF</button></a>
				  </div>
				  <div class="btn-group" role="group">
				    <a href="insert_quote.php"><button type="button" class="btn btn-info btn-default">THOUGHT</button></a>
				  </div>
				  <div class="btn-group" role="group">
				    <a href="insert_book.php"><button type="button" class="btn btn-warning btn-default">BOOK</button></a>
				  </div>
				   <div class="btn-group" role="group">
					 <a href="insert_author.php"><button type="button" class="btn btn-success btn-default">AUTHOR</button></a>
				</div>
				 <div class="btn-group" role="group">
					 <button type="button" class="btn btn-danger btn-default">TO READ</button>
				</div>

				</div>

		

