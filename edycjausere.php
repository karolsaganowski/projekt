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
            if(isset($_POST["login"]) && isset($_POST["upr"])){
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";

                $loginog = $_POST["loginog"];
                $login = $_POST["login"];
                $upr = $_POST["upr"];

                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }

                $sql = "UPDATE users SET login = '$login', upr = '$upr' WHERE login = '$loginog'";

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