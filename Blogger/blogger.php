<?php
$verb = $_SERVER['REQUEST_METHOD'];

$dsn = 'mysql:host=127.0.0.1;dbname=mydatabase';
$user_name = 'root';
$pass_word = "";

if ($verb == "POST") {
			//identify the category and blogpost to add an id
			if (isset($_GET['categories']) and isset($_GET['blogposts'])) {
				sendBlogpostsToDB($_GET['categories'], ($_GET['blogposts']));
				http_response_code(200);
			}
			} else {
				http_response_code(400);
		}

/*if ($verb == "POST") {
			//identify the category and blogpost to add an id
	if(!empty($_POST['categories'])) {

		foreach ($_POST['categories'] as $select) {

			if (isset($_GET['categories']) and isset($_GET['blogposts'])) {
				sendBlogpostsToDB($_GET['categories'], ($_GET['blogposts']));
				http_response_code(200);
			}

			} else {
				http_response_code(400);
		}
	}
}*/

	function sendBlogpostsToDB ($category, $blogposts) {
	global $dsn;
	global $user_name;
	global $pass_word;

	$connection = new PDO($dsn, $user_name, $pass_word);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$category_id_list = get_category_id($category);


	//add the blogpost to the database blogposts
	$sql = "INSERT INTO blogposts (blogposts) " . "VALUES ('$blogposts')";
	$connection->exec($sql);


	$sql = "SELECT blogposts.id FROM blogposts";
	$result = $connection->query($sql);
	$ids=[];
	foreach ($result as $row) {
		$ids[] = $row['id'];
	}
	$last_id = $ids[count($ids) - 1];
	//compare the category from the blogpost with the category from the database
	for ($i = 0 ; $i < count($category_id_list) ; $i++) {
		//add the correct category and blogpost id to database
		$sql = "INSERT INTO category_blogposts (Category_id, blogpost_id) " . "VALUES ('$category_id_list[$i]', '$last_id')";
		$connection->exec($sql);
	}
	$connection = null; // Close connection


}
// retrieve the categories from the database
function get_categories_from_database() {
	global $dsn;
	global $user_name;
	global $pass_word;

	$connection = new PDO($dsn, $user_name, $pass_word);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "SELECT * FROM Category";
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


}

?>