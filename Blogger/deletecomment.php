<?php
    

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment_id = $_GET["commentid"];
    $dsn = "mysql:dbname=mydatabase;host=127.0.0.1";
    $user_name = "root";
    $pass_word = "";

    //$connection = new mysqli("localhost","root", "", "blog");
    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $sql = "DELETE FROM comments WHERE id = $comment_id";
        $connection->exec($sql);
        echo "comment $comment_id deleted succesfully";
        echo "<script> 
             window.history.go(-1);
            </script>";   
        //echo $blogText ."added to database";
    }
    catch(PDOException $e) {
        echo $sql . $e->getMessage();
    }
    $connection = null;
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }
}

?>