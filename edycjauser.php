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
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";

                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }

                $login=$_POST["login"];

                $sql = "SELECT * FROM users WHERE login='$login'";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result)>0) {
                    while($row=mysqli_fetch_assoc($result)){
                        $upr=$row['upr'];
                        echo "<form action='edycjausere.php' method='post'>
                        <input type='text' name='login' placeholder='Nazwa projektu' value='$login'>
                        <input type='hidden' name='loginog' placeholder='Nazwa projektu' value='$login'>
                        <input type='text' name='upr' placeholder='Opis projektu' value='$upr'>
                        <input type='submit' value='EDYTUJ'>
                        </form>";
                    }
                }
                
        ?>
    </div>

    <div id="bot">

    </div>
</body>
</html>