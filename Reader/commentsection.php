<!doctype html>
<html>
	<head>
		<title></title>
		<!--<link rel="stylesheet" type="text/css" href="stylesheetBlog.css">-->
		<!--<script src="scripts.js"></script>-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

	<body>
		<h1>Leave a comment:</h1>
		<form action="comment.php" method="POST">
			<!-- Here the shit they must fill out -->
			<textarea name="comment" id="commentBody" placeholder="Leave a comment"></textarea>
			<input type="hidden" name="blogid" value="
			<?php
				echo $_GET['blogid'];
			?>
			"/>
			<input type="submit" />
		</form>
	</body>
</html>