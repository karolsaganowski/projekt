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
        <form action="edycjaproj.php" method="post">
            <select name="nazwa" id="nazwa">
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
                        echo "<option value='".$row["id"]."'>".$row["nazwa"]."</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="EDYTUJ">
        </form>

        <?php
            if(isset($_POST["nazwa"])){
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";
                
                $nazwa = $_POST["nazwa"];
                
                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);
                
                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }
                
                $sql = "SELECT * FROM projects WHERE id='$nazwa'";
                
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result)>0) {
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<form action='edycjaproj.php' method='post' id='projekt'>";
                        echo "<input type='hidden' name='id' value='".$row["id"]."'>";
                        echo "<input type='text' name='nazwa1' value='".$row["nazwa"]."'>";
                        echo "<input type='text' name='opis' value='".$row["opis"]."'>";
                        echo "<input type='text' name='kontakt' value='".$row["kontakt"]."'>";
                        echo "<input type='submit' value='EDYTUJ'>";
                        echo "</form>";
                    }
                }
            }else{
                echo "";
            }
        ?>
        
        <?php
            if(isset($_POST["id"]) && isset($_POST["nazwa1"]) && isset($_POST["opis"]) && isset($_POST["kontakt"])){
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";
                
                $id = $_POST["id"];
                $nazwa = $_POST["nazwa1"];
                $opis = $_POST["opis"];
                $kontakt = $_POST["kontakt"];
                
                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);
                
                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }
                
                $sql = "UPDATE projects SET nazwa = '$nazwa', opis = '$opis', kontakt = '$kontakt' WHERE id = '$id'";
                
                mysqli_query($conn, $sql);

                header('Location: ./admin.php');
            }else{
                echo "";
            }
        ?>
    </div>
    
    <div id="bot">
        
        </div>
    </body>
    </html>