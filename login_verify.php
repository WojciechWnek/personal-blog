<?php

session_start();

if(!isset($_POST['email']) || !isset($_POST['password'])){
    header('Location: index.php');
}

require_once("connection.php");

$conn = new mysqli($db_server, $db_user, $db_password, $db_name);

if($conn->connect_errno!=0){
    echo "Error: ". $conn->connect_errno;
}else{
    $email = $_POST['email'];
    $password = $_POST['password'];

    //SQL injection security
    $email = htmlentities($email, ENT_QUOTES, "UTF-8"); 

    if($result = $conn->query(sprintf("SELECT * FROM users WHERE email='%s'", mysqli_real_escape_string($conn, $email)))){
        $how_many_users = $result->num_rows;
        if($how_many_users>0){

            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password'])){
                $_SESSION['logged'] = true;

                unset($_SESSION['error']);
                $result->free_result();
                header('Location: add_daily.php'); 
            }else{
                $_SESSION['error'] = true;
                header('Location: login.php');
            }  
        }else{
            $_SESSION['error'] = true;
            header('Location: login.php');
        }
    }
    $conn->close();
}