<a href='./'>STRONA GŁÓWNA</a>
<a href='./projekty.php'>PROJEKTY</a>
<?php
if($_SESSION['upr'] == "admin"){
    echo "<a href='./admin.php'>STRONA ADMINA</a>";
}else{
    echo "";
}
?>

<?php
if(!$_SESSION["zalogowano"]){
    echo "<div style='float:right; padding-left:25px;'><a href='./rejestracja.php'>REJESTRACJA</a></div>";
    echo "<div style='float:right;'><a href='./logowanie.php'>ZALOGUJ</a></div>";
}else{
    echo "<div style='float:right'><a href='./wyloguj.php'>WYLOGUJ</a></div>";
}
?>