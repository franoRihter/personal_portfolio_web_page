<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<div class="container">
    <div class="izbornik2"><div class="izbornik_naslov">
        <h1>Ovo su projekti</h1>
    </div>
</div>
    <div class="izbornik2"><div class="izbornik_lista">
        <ul class="lista">
            <li><a href="index.php">index</a></li>
            <li><a href="projekt.php">projekti</a></li>
            <li>kontakt</li>
            <li><a href="blog.php">blog</a></li>
        </ul>
    </div>
</div>
</div>
<body class = "blog_body">
<?php
    //korisno za prikazivanje errora
    ini_set('display_errors', 1);
include "connection.php";

$tekst ="SELECT id, jezik, naslov, opis, link FROM projekti;";
$result=mysqli_query($conn, $tekst);

$tekst1 ="SELECT t.id, t.tag, t.id_projekta, t.link FROM tag as t 
WHERE t.id_projekta IN (SELECT id from blog);";
$result1=mysqli_query($conn, $tekst1);
?>
<?php
while ($row = mysqli_fetch_assoc($result)){
echo '
<div class="opis_projekta">
    <div class="projekt">
        <p class="jezici">';while ($row1 = mysqli_fetch_assoc($result1)){echo '<a href="link_za_tag.php">#'.$row1["tag"].'</a>&nbsp';}
        echo '</p>
        <div> <a href="'.$row["link"].'">
        <h2>'.$row["naslov"].'</h2>
        <p class="opis_projekta">'.$row["opis"].'</p>
        </a><div\>
    </div>
    ';}?>
</div>
</body>
</html>