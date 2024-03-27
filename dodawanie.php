<?php
session_start()
?>

<?php
if($_SESSION['upr'] != "worker" && $_SESSION['upr'] != "admin"){
    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <form action="dodawanie.php" method="post">
            <input type="text" name="nazwa" placeholder="Nazwa projektu">
            <input type="text" name="opis" placeholder="Opis projektu">
            <input type="text" name="kontakt" placeholder="Kontakt">
            <input type="submit" value="DODAJ">
        </form>

        <?php
            if(isset($_POST["nazwa"]) && isset($_POST["opis"]) && isset($_POST["kontakt"])){
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";

                $nazwa = $_POST["nazwa"];
                $opis = $_POST["opis"];
                $kontakt = $_POST["kontakt"];

                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }

                $sql = "INSERT INTO `projects` (`nazwa`, `opis`, `kontakt`) VALUES ('$nazwa', '$opis', '$kontakt');";

                $result = mysqli_query($conn, $sql);

                mysqli_close($conn);
            }else{
                echo "";
            }
        ?>
    </div>

    <div id="bot">

    </div>
</body>
</html>