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
    <style>
        body{
            margin: 0;
            display: grid;
            grid-template-columns: 25% 75%;
            grid-template-rows: 15vh 3vh 72vh 10vh;
            grid-template-areas: 
            "top1 top2"
            "mid2 mid2"
            "mid mid"
            "bot bot";
        }

        #mid2{
            grid-area: mid2;
            background-color: #EE92C2;
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

    <div id='mid2'>
        <form action="projekty.php" method="post" id="searchform">
            <input type="search" name="search" id="search">
            <input type="submit" value="Szukaj">
        </form>
    </div>
    
    <div id="mid">
            <?php
            if(isset($_POST["search"])){
                $host = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $database = "projekt";
            
            $search = $_POST["search"];

            $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

            if (!$conn) {
                die("błąd połączenia" . mysqli_connect_errno());
            }
            
            $sql = "SELECT * FROM projects WHERE nazwa LIKE '%".$search."%'";
            
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result)>0) {
                while($row=mysqli_fetch_assoc($result)){
                    echo "<div id='projekt'>";
                    echo "Nazwa projektu: ".$row["nazwa"]."<br>";
                    echo "Opis projektu: ".$row["opis"]."<br>";
                    echo "Kontakt: ".$row["kontakt"]."<br>";
                    echo "<form action='join.php' method='post'>";
                    echo "<input type='hidden' name='project' value='".$row["id"]."'>"."<br>";
                    if($_SESSION['zalogowano']==true){
                        echo "<input type='submit' value='Dołącz'>";
                    }else{
                        echo "Zaloguj się aby dołączyć";
                    }
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<h1>Brak wyników</h1>";
            }
            
            mysqli_close($conn);
            }else{
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
                    echo "<input type='hidden' name='project' value='".$row["id"]."'>"."<br>";
                    if($_SESSION['zalogowano']==true){
                        echo "<input type='submit' value='Dołącz'>";
                    }else{
                        echo "Zaloguj się aby dołączyć";
                    }
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<h1>Brak projektów</h1>";
            }
            
            mysqli_close($conn);
            }
            ?>
    </div>
    
    <div id="bot">
        
    </div>
</body>
</html>