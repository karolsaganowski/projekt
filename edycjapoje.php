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

                $id=$_POST["id"];

                $sql = "UPDATE projects SET nazwa = '$nazwa', opis = '$opis', kontakt = '$kontakt' WHERE id = $id";

                mysqli_query($conn, $sql);

                echo "Edytowano";
                echo "<script>setTimeout(() => {location.href = './admin.php'}, '2000');</script>";
            }
        ?>
    </div>

    <div id="bot">

    </div>
</body>
</html>