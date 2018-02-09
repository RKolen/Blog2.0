<!doctype html>
<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

	<body>
		<h1>Leave a comment:</h1>
		<form action="comment.php" method="POST">
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