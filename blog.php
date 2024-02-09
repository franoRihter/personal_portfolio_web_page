<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
//korisno za prikazivanje errora
ini_set('display_errors', 1);

include "connection.php";
$tekst = "SELECT id, DATE_FORMAT(datum, '%d, %m, %Y') formatirani_datum, naslov, citanje, link 
FROM blog;";
$result = mysqli_query($conn, $tekst);

$tagovi = "SELECT t.id, t.tag, t.id_blog FROM tag as t 
        WHERE t.id_blog IN (SELECT id from blog);";
$result1 = mysqli_query($conn, $tagovi);
?>
<div class="container">
    <div class="izbornik2"><div class="izbornik_naslov">
        <h1>Ovo je blog</h1>
    </div>
</div>
    <div class="izbornik2"><div class="izbornik_lista">
        <ul class="lista">
            <li><a href="index.php">index</a></li>
            <li><a href="projekti.php">projekti</a></li>
            <li>kontakt</li>
            <li><a href="blog.php">blog</a></li>
        </ul>
    </div>
</div>
</div>
<body class = "blog_body">

<?php
while($row = mysqli_fetch_assoc($result)) {
    echo '
<div class="popis_kutija">
    <div class="kutija">
        <p class="datum">'.$row["formatirani_datum"].'</p>
        <p><a href="'.$row["link"].'">'.$row["naslov"].'</a></p>
        <ul class="lista_tagova">
        ';
        while ($row1= mysqli_fetch_assoc($result1)){
            echo ' <li><a href="odabrani_tag.php?subject='.$row1["tag"].'">'.$row1["tag"].'</a></li>';
        }
        echo '
        </ul>
        <p class="citanje">'.$row["citanje"].'</p>
    </div>
</div>
';}
?>
    </div>
</body>
</html>