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
        <form action="edycjauser.php" method="post">
            <select name="login" id="login">
                <?php
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";

                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }

                $sql = "SELECT * FROM users WHERE 1";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result)>0) {
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<option value='".$row["login"]."'>".$row["login"]."</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="EDYTUJ">
        </form>

        <?php
            if(isset($_POST["login"])){
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";
                
                $login = $_POST["login"];
                
                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);
                
                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }
                
                $sql = "SELECT * FROM users WHERE login='$login'";
                
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result)>0) {
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<form action='edycjauser.php' method='post' id='projekt'>";
                        echo "<input type='text' name='login' value='".$row["login"]."'>";
                        echo "<input type='text' name='upr' value='".$row["upr"]."'>";
                        echo "<input type='submit' value='EDYTUJ'>";
                        echo "</form>";
                    }
                }
            }else{
                echo "";
            }
        ?>
        
        <?php
            if(isset($_POST["login"]) && isset($_POST["pass"]) && isset($_POST["upr"])){
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";
                
                $login = $_POST["login"];
                $upr = $_POST["upr"];
                
                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);
                
                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }
                
                $sql = "UPDATE users SET login = '$login', upr = '$upr' WHERE login = '$login'";
                
                mysqli_query($conn, $sql);

                header('Location: ./index.php');
            }else{
                echo "";
            }
        ?>
    </div>
    
    <div id="bot">
        
        </div>
    </body>
    </html>