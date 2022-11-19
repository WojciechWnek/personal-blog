<?php
session_start();

if(!isset($_SESSION['logged'])){
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaliczenie PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    
    <style>
        textarea{
            height: 10rem;
        }
        .validation{
            height: 30px;

        }
        .error{
            color: red;
            font-weight: 500;
            margin: 0;
        }
    </style>

</head>
<body>
    <div class="container">
        <row class="d-flex justify-content-between p-5">
            <p><a href="index.php" class="text-secondary"><u>STRONA GŁÓWNA</u></a></p>
            <p><a href="logout.php" class="text-secondary"><u>WYLOGUJ</u></a></p>
        </row>
        <row class="d-flex justify-content-center p-3">
            <P class="text-primary fw-bold h1"> DODAJ WPIS DO DAILY BLOGA</P>
        </row>
        <row class="d-flex justify-content-center  pt-5">

            <form action="save_post.php" method="POST" class="row">
                <div class="row pt-3">
                    <label class="form-label">
                        Tytył
                        <input type="text" class="form-control" name="title" required>
                    </label>
                </div>
                <div class="row pt-3">
                    <label class="form-label">
                        Treść
                        <textarea class="form-control" name="content" required></textarea>
                    </label>
                </div>
                <div class="d-flex justify-content-center pt-5 ">
                    <input type="submit" name="submit" class="btn btn-success btn-lg col-6" value="ZAPISZ">
                    <!-- <button type="submit" name="submit" class="btn btn-success btn-lg col-6">ZAPISZ</button>-->
                </div>
            </form>
        </row>
    </div>
</body>
</html>