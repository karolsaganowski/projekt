<?php
session_start();
    if(isset($_SESSION['zalogowano'])){

    }else{
        $_SESSION['zalogowano'] = false;
        $_SESSION['user'] = "";
        $_SESSION['upr'] = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System zarządzania projektami szkolnymi</title>
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
        <?php
            $host = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $database = "projekt";

            $login = $_SESSION['user'];

            $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

            if (!$conn) {
                die("błąd połączenia" . mysqli_connect_errno());
            }

            $sql = "SELECT * FROM projects, users, usersproject WHERE usersproject.project_id=projects.id AND usersproject.user_login=users.login AND users.login = '$login'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result)>0) {
                while($row=mysqli_fetch_assoc($result)){
                    echo "<div id='projekt'>";
                    echo "Nazwa projektu: ".$row["nazwa"]."<br>";
                    echo "Opis projektu: ".$row["opis"]."<br>";
                    echo "Kontakt z twórcą: ".$row["kontakt"];
                    echo "</div>";
                }
            } else {
                echo "<h1>Nie bierzesz udziału w żadnych projektach.</h1>";
            }

            mysqli_close($conn);
        ?>
    </div>

    <div id="bot">

    </div>
</body>
</html>