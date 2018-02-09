<?php
$verb = $_SERVER['REQUEST_METHOD'];

    if ($verb == 'GET') {

        $json_response = returnCommentsBlogposts();
        echo $json_response;
    }

    function returnCommentsBlogposts () {
        $host = "127.0.0.1";
        $user = "root";
        $pass = "";
        $db = "mydatabase";

        $connection = mysqli_connect($host, $user, $pass, $db);

        $sql = "SELECT * FROM comments";
        $result = $connection->query($sql);
        $answer = array();

        foreach ($result as $row) {
            $answer[] = array($row['id'], $row['comment'], $row['blog_id']);
        }
        
        $json_answer = json_encode($answer);
        return $json_answer;
        $connection = null;
    }
?>