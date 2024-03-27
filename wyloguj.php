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
    <?php
    include "menu.php";


    $_SESSION['zalogowano'] = false;
    $_SESSION['user'] = "";
    $_SESSION['upr'] = "";
    echo "Wylogowano";
    echo "<script>setTimeout(() => {location.href = './index.php'}, '2000');</script>";
    ?>
</body>

</html>