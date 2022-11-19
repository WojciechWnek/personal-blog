<?php

session_start();

require_once("connection.php");

$conn = new mysqli($db_server, $db_user, $db_password, $db_name);

if($conn->connect_errno!=0){
    echo "Error: ". $conn->connect_errno;
}else{
    $id = $_POST['id'];

    //SQL injection security
    $id = htmlentities($id, ENT_QUOTES, "UTF-8"); 

    $conn->query("DELETE FROM posts WHERE id='$id'");

    header('Location: index.php');

    $conn->close();
}