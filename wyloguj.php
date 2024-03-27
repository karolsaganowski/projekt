<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wylogowywanie</title>
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
            $_SESSION['zalogowano'] = false;
            $_SESSION['user'] = "";
            $_SESSION['upr'] = "";
            echo "Wylogowano";
            echo "<script>setTimeout(() => {location.href = './index.php'}, '2000');</script>";
        ?>
    </div>

    <div id="bot">

    </div>
</body>

</html>