<?php
header("Content-Type:application/json");
$verb = $_SERVER['REQUEST_METHOD'];

	if ($verb == 'GET') {
		if (isset($_GET )) {
			$json_response = returnBlogposts();
			echo $json_response;
		} else {
			http_response_code(200);
			
		}

	}

	function returnBlogposts () {
	$host = "127.0.0.1";
	$user = "root";
	$pass = "";
	$db = "mydatabase";

	$connection = mysqli_connect($host, $user, $pass, $db);
	$sql = "SELECT blogposts.id, category.Name, blogposts.blogposts FROM category INNER JOIN category_blogposts ON category.id = category_blogposts.Category_id INNER JOIN blogposts ON category_blogposts.blogpost_id = blogposts.id";

	$result = $connection->query($sql);
	$answer = array();
	foreach ($result as $row) {
		$answer[] = array($row['id'], $row['Name'], $row['blogposts']);
	}
	$json_answer = json_encode($answer);
	return $json_answer;
	$connection = null;

}








	/*if (isset($_GET)) {
			http_response_code(200);
			$blogposts = get_messages_from_database_by_category();
			$response = array();
			foreach ($blogposts as $row) {
				$response[] = array($row['id'], $row['category'], $row['blogposts']);
			}

	//
	function get_blogposts_from_database_by_category($category) {
		global $dsn;
		global $user_name;
		global $pass_word;
		$connection = new PDO($dsn, $user_name, $pass_word);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT b.id, c.Name, b.blogposts FROM blogposts b, category c, category_blogposts cb 
				where cb.blogpost_id = b.id AND cb.category_id = c.id AND
				c.Name = '$category'";
		return $connection->query($sql);
	}
	// retrieve the categories from the database
	function get_categories_from_database() {
		global $dsn;
		global $user_name;
		global $pass_word;
		$connection = new PDO($dsn, $user_name, $pass_word);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM category";
		$result = $connection->query($sql);
		$category = [];
		foreach ($result as $row) {
			$category[] = array($row['id'], $row['Name']);
		}
		return $category;
	}
	// list the categories from the database
	function get_category_id($category) {
		$category_list = get_categories_from_database();
		$category_id_list = [];
		$category = explode(",", $category);
		for ($i = 0 ; $i < count($category_list) ; $i++) {
			for ($j = 0 ; $j < count($category) ; $j++) {
				if ($category[$j] == $category_list[$i][1]) {
					$category_id_list[] = $category_list[$i][0];
				}
			}
		}
		return $category_id_list;
	}*/

	/*function get_blogposts_from_database_by_category($categories) {
		global $dsn;
		global $user_name;
		global $pass_word;
		$connection = new PDO($dsn, $user_name, $pass_word);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT b.id, c.Name, b.message FROM blogposts b, category c, category_blogposts cb 
				where cb.blogpost_id = b.id AND cb.category_id = c.id AND
				c.Name = '$categories'";
		return $connection->query($sql);
	}*/

	?>
