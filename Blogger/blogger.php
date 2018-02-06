<?php
$verb = $_SERVER['REQUEST_METHOD'];

if ($verb == "POST") {
			//identify the category and blogpost to add an id
			if (isset($_GET['categories']) and isset($_GET['blogposts'])) {
				sendBlogpostsToDB($_GET['categories'], ($_GET['blogposts']));
				http_response_code(200);
			}
		} else {
			http_response_code(400);
	}

	function sendBlogpostsToDB ($category, $blogposts) {
	$host = "127.0.0.1";
	$user = "root";
	$pass = "";
	$db = "mydatabase";

	$connect = mysqli_connect($host,$user,$pass,$db);
	if($connect) {
			$sql = "INSERT INTO blogposts (category, blogposts)" . "VALUES ('$category', '$blogposts')";
			$query = mysqli_query($connect,$sql);
		if($query){
			echo "data entered succesfully";
		}else{
			echo mysqli_error ($connect);
		}
		
		$connection = null; // Close connection
	}
}

?>