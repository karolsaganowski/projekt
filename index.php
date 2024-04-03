<?php
session_start();
?>

<?php
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
                    echo "Zespół projektu: ";
                    $id=$row['project_id'];
                    $sql2 = "SELECT * FROM usersproject WHERE project_id=$id";

                    $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2)>0) {
                            $i=0;
                            while($row2=mysqli_fetch_assoc($result2)){
                                $i=$i+1;
                                if(mysqli_num_rows($result2)>$i){
                                    echo $row2["user_login"].", ";
                                }else{
                                    echo $row2["user_login"];
                                }
                            }
                        }
                    echo "<br>";
                    echo "Kontakt: ".$row["kontakt"]."<br>";
                    echo "</div>";
                }
            }else if($_SESSION['upr']!=""){
                echo "<h1>Nie bierzesz udziału w żadnych projektach.</h1>";
            }else{
                echo "<h1>Zaloguj się aby zobaczyć projekty w których bierzesz udział.</h1>";
            }

            mysqli_close($conn);
        ?>
    </div>

    <div id="bot">

    </div>
</body>
</html>