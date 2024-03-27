<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="top1">
        <img src="logo.png" alt="logo" id="logo">
    </div>

    <div id="top2">
        <?php
            include "menu.php";
        ?>
    </div>

    <div id="mid">
    <form action="" method="POST" id="loginform">
        <input type="text" name='login' placeholder="LOGIN">
        <input type="password" name='password' placeholder="HASŁO">
        <input type="submit" value="ZAREJESTRUJ SIĘ">
    </form>
    <?php
    if (isset($_POST['login']) && isset($_POST['password'])) {

        $login = $_POST['login'];
        $password = $_POST['password'];

        function szyfrujHasło($password){
            return md5($password);
        }

        $hashedPassword = szyfrujHasło($password); 

        $host = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $database = "projekt";

        $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

        if (!$conn) {
            die("błąd połączenia" . mysqli_connect_errno());
        }

        $sql = "INSERT INTO `users`(`login`, `pass`, `upr`) VALUES ('$login','$hashedPassword','user')";

        if (mysqli_query($conn, $sql) === TRUE) {
            echo "dodano użytkownika";
        } else {
            echo "błąd nwm";
        }

        mysqli_close($conn);
    } else {
        echo "";
    }
    ?>
    </div>

    <div id="bot">

    </div>
</body>

</html>