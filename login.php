<?php
session_start();

if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
    header('Location: add_daily.php');
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
        <row class="d-flex justify-content-end p-5">
            <p><a href="index.php" class="text-secondary"><u>STRONA GŁÓWNA</u></a></p>
        </row>
        <row class="d-flex justify-content-center p-3">
            <P class="text-primary fw-bold h1">PANEL LOGOWANIA</P>
        </row>
        <row class="d-flex justify-content-center  pt-5">
            <form action="login_verify.php" method="POST" class="col-3">
                <div class="row pt-3">
                    <label class="form-label">
                        Email
                        <input type="text" class="form-control" name="email" required>
                    </label>
                </div>

                <div class="row pt-3">
                    <label class="form-label">
                        Hasło
                        <input type="password" class="form-control" name="password" required>
                    </label>
                </div>

                <div class="d-flex justify-content-center align-items-center validation">
                    <?php 
                    if(isset($_SESSION['error'])) echo "<p class='error'>Nieprawidłowy login lub hasło</p>";
                    ?>
                </div>

                <div class="d-flex justify-content-center pt-5 ">
                    <button type="submit" class="btn btn-success btn-lg col-6">ZALOGUJ</button>
                </div>
                <?php
                unset($_SESSION['error']);
                ?>
            </form>
            
        </row>


    </div>
</body>
</html>