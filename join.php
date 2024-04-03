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
        <?php
            //if(isset($_POST["id"]) && $_SESSION['user']!=""){
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $database = "projekt";

                $project = $_POST["project"];
                $user = $_SESSION['user'];

                $conn = mysqli_connect($host, $dbuser, $dbpass, $database);

                if (!$conn) {
                    die("błąd połączenia" . mysqli_connect_errno());
                }

                $sql = "INSERT INTO `userjoin` (`project_id`, `user_login`) VALUES ('$project', '$user');";

                mysqli_query($conn, $sql);

                echo "Pracownicy rozwarzą twoją prośbę o dołączenie do zespołu";
                
                mysqli_close($conn);
                
                echo "<script>setTimeout(() => {location.href = './index.php'}, '2000');</script>";
            //}else{
            //    echo "";
            //}
        ?>
    </div>

    <div id="bot">

    </div>
</body>
</html>