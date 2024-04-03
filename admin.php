<?php
session_start()
?>

<?php
if($_SESSION['upr'] != "admin"){
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
        <form action="dodawanie.php" method="post">
            <input type="submit" value="Dodawanie Projektów">
        </form>
        <form action="edycja.php" method="post">
            <input type="submit" value="Edytowanie Projektów">
        </form>
        <form action="edycjauser.php" method="post">
            <input type="submit" value="Edytowanie Użytkowników">
        </form>
        <form action="zespol.php" method="post">
            <input type="submit" value="Dodaj użytkownika do zespołu">
        </form>
    </div>

    <div id="bot">

    </div>
</body>
</html>