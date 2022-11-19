<?php

session_start();

require_once("connection.php");

$conn = new mysqli($db_server, $db_user, $db_password, $db_name);

if($conn->connect_errno!=0){
    echo "Error: ". $conn->connect_errno;
}else{
    $id = $_POST['id']; 
    $title = $_POST['title'];
    $content = $_POST['content'];

    //SQL injection security
    $title = htmlentities($title, ENT_QUOTES, "UTF-8"); 
    $content = htmlentities($content, ENT_QUOTES, "UTF-8"); 
    echo sprintf("UPDATE posts SET title = '%s', content = '%s', created_at =  now() WHERE id=$id", mysqli_real_escape_string($conn, $title),
    mysqli_real_escape_string($conn, $content));

    $conn->query(sprintf("UPDATE posts SET title = '%s', content = '%s', created_at =  now() WHERE id=$id", mysqli_real_escape_string($conn, $title),
    mysqli_real_escape_string($conn, $content)));

    header('Location: index.php');

    $conn->close();
}