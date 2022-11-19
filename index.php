<?php
session_start();

unset($_SESSION['error']);

require("connection.php");

$conn = new mysqli($db_server, $db_user, $db_password, $db_name);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaliczenie PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">


</head>
<body>
    <div class="container">
        <row class="d-flex justify-content-end p-5">
            <p><a href="login.php" class="text-secondary"><u>LOGOWANIE</u></a></p>
        </row>
        <row class="d-flex justify-content-center p-3">
            <P class="text-primary fw-bold h1"> WITAMY NA DAILI BLOGU JANA KOWALSKIEG</P>
        </row>
        <div class="d-flex flex-column-reverse">

        <?php
        if($conn->connect_errno!=0){
            echo "Error: ". $conn->connect_errno;
        }else{
            $sql = "SELECT title, content, created_at FROM posts";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div>';
                    echo '<row class="d-flex justify-content-center  pt-5"> <p class="text-secondary fw-bold h2">' . $row['title'] . '</p></row>';
                    echo '<row class="d-flex justify-content-center fs-5 "><p class="text-secondary">' . substr($row['created_at'], 0, -3) . '</p></row>';
                    echo '<row class="d-flex fs-5 "><p class="text-secondary  text-justify">' . $row['content'] . '</p></row>';
                    echo '</div>';
                }
            }
        }
        include("visitor_counter.php");
        ?>

        </div>
        <row class="d-flex justify-content-center pt-5">
            <p class="text-success">Unikalnych odwiedzin <b><?php echo $_SESSION['licznik']; ?></b></p>
        </row>


    </div>
    <?php
    $conn->close();
    ?>
</body>
</html>