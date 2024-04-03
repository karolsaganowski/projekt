<?php
session_start();
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

            $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

            if (!$conn) {
                die("błąd połączenia" . mysqli_connect_errno());
            }

            $sql = "SELECT * FROM projects WHERE 1";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result)>0) {
                while($row=mysqli_fetch_assoc($result)){
                    echo "<div id='projekt'>";
                    echo "Nazwa projektu: ".$row["nazwa"]."<br>";
                    echo "Opis projektu: ".$row["opis"]."<br>";
                    echo "Kontakt: ".$row["kontakt"]."<br>";
                    echo "<form action='join.php' method='post'>";
                    echo "<input type='hidden' name='project' value='".$row["id"]."'>";
                    echo "<input type='submit' value='Dołącz'>";
                    echo "</form>";
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