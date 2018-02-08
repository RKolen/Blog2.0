<?php

	header("Content-Type:application/json");
	$verb = $_SERVER['REQUEST_METHOD'];

	if ($verb == 'GET') {

		$json_response = returnBlogposts();
		echo $json_response;
	}

	function returnBlogposts () {
		$host = "127.0.0.1";
		$user = "root";
		$pass = "";
		$db = "mydatabase";

		$connection = mysqli_connect($host, $user, $pass, $db);

		$sql = "SELECT blogposts.id, category.Name, blogposts.blogposts 
				FROM category 
				INNER JOIN category_blogposts ON category.id = category_blogposts.Category_id 
				INNER JOIN blogposts ON category_blogposts.blogpost_id = blogposts.id";
		$result = $connection->query($sql);
		$answer = array();

		foreach ($result as $row) {
			$answer[] = array($row['id'], $row['Name'], $row['blogposts']);
		}
		
		$json_answer = json_encode($answer);
		return $json_answer;
		$connection = null;
	}
?>
