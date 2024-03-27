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

        <form action="zespol.php" id="projekt" method="post">
            <input type="text" name="id" placeholder="Id projektu">
            <input type="text" name="login" placeholder="Login użytkownia">
            <input type="submit" value="Dodaj użytkownika do zespołu projektu">
        </form>

        <?php
            if (isset($_POST['id']) && isset($_POST['login'])) {
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";

                $id=$_POST["id"];
                $login=$_POST["login"];

                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }

                $sql = "INSERT INTO usersproject (project_id, user_login) VALUES ('$id', '$login')";

                mysqli_query($conn, $sql);
            }else{
                echo "";
            }
        ?>
    </div>

    <div id="bot">

    </div>
</body>
</html>