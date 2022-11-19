<?php

session_start();

require_once("connection.php");

$conn = new mysqli($db_server, $db_user, $db_password, $db_name);

if($conn->connect_errno!=0){
    echo "Error: ". $conn->connect_errno;
}else{
    $title = $_POST['title'];
    $content = $_POST['content'];

    //SQL injection security
    $title = htmlentities($title, ENT_QUOTES, "UTF-8"); 
    $content = htmlentities($content, ENT_QUOTES, "UTF-8"); 

    $conn->query(sprintf("INSERT INTO posts VALUES (NULL, '%s', '%s', now())", mysqli_real_escape_string($conn, $title),
    mysqli_real_escape_string($conn, $content)));

    header('Location: index.php');

    $conn->close();
}