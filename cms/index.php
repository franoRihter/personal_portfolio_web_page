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
    <h1>Dodavanje sadržaja</h1>
    <p>Pozdrav <?php echo $username;?>. Dobrodošli!</p>
    <br>
    <div>
    <a href="../cms/cms_projekti.php"> > Uredi Projekte</a>
    <br><br>
    <a href="../cms/cms_blog.php"> > Uredi Blog</a>
    <br><br>
    <a href="../cms/cms_tag.php"> > Uredi Tagove</a>
    <br><br>
    <a href="../cms/cms_kontakt.php"> > Uredi Kontakt Informacije</a>
    </div>
</body>
</html>