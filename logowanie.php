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
    <style>
        #mid{
            grid-area: mid;
            background-color: #EE92C2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow-y: auto;
            flex-wrap: wrap;
        }
    </style>
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
                <input type="submit" value="ZALOGUJ SIĘ">
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

        $sql = "SELECT * FROM users WHERE login='$login' AND pass='$hashedPassword'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)>0) {
            echo "zalogowano";
            $_SESSION['zalogowano'] = true;
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $row['login'];
            $_SESSION['upr'] = $row['upr'];
            header('Location: ./index.php');
        } else {
            echo "niezalogowano";
            $_SESSION['zalogowano'] = false;
            $_SESSION['user'] = "";
            $_SESSION['upr'] = "";
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