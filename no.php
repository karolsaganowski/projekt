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

                $ujid=$_POST['ujid'];
                
                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);
                
                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }
                
                $sqldelete = "DELETE FROM userjoin WHERE ujid = $ujid";
                
                mysqli_query($conn, $sqldelete);    

                header('Location: ./admin.php');
        ?>
    </div>

    <div id="bot">

    </div>
</body>
</html>