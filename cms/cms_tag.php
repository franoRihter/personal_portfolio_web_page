<?php
session_start();
$id= $_SESSION["id"];
$username = $_SESSION["username"];
if (isset($_SESSION["id"])){
}
else{
    header("Location: /../index.php");
    die();
}
##samo za blog
include "/home/frano/Documents/projekti/osobna_web_stranica/web_stranica/connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/../style.css">
</head>
<body>
    <h1>Unesite novi tag:</h1>
    <div>
    <form action="unos_handler_tag.php" method="post">
    <label for="tag">Tag:</label>
    <input type="text" name="tag" requred>
    <label for="id_projekta">id_projekta:</label>
    <input type="text" placeholder="nije nuzno" name="id_projekta">
    <label for="id_bloga">id_bloga:</label>
    <input type="text" name="id_bloga" placeholder="nije nuzno">
    <br><br><button type="submit">unos</button>
</form>

    </div>
</body>
</html>