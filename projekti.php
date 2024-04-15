<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfelj | projekti</title>
    <link rel="stylesheet" href="style.css">
</head>
<div class="container">
            <div class="izbornik2"><div class="izbornik_naslov">
                <h1>Ovo su projekti</h1>
            </div>
        </div>
            <div class="izbornik2"><div class="izbornik_lista">
                <ul class="lista">
                    <li><a class="meni_navigacija" href="index.php">index</a></li>
                    <li><a class="meni_navigacija" href="projekti.php">projekti</a></li>
                    <li><a class="meni_navigacija" href="/../kontakt.html">kontakt</a></li>
                    <li><a class="meni_navigacija" href="blog.php">blog</a></li>
                </ul>
            </div>
    </div>
    
    </div>
    <!-- ovj je mobilni dio-->
            <div class="mobilni_izbornik">
                    <div class="mobilni_izbornik_elementi"><a href="index.php">index</a></div>
                    <div class="mobilni_izbornik_elementi"><a href="projekti.php">projekti</a></div>
                    <div class="mobilni_izbornik_elementi"><a href="/../kontakt.html">kontakt</a></div>
                    <div class="mobilni_izbornik_elementi"><a  href="blog.php">blog</a></div>
                
</div>
<nav><h1 class="naslov_mobilni">Projekti</h1><div class="ham-menu"> 
        <span></span>
        <span></span>
        <span></span>
    </div></nav>
<body class = "blog_body">
<?php
    //korisno za prikazivanje errora
    ini_set('display_errors', 1);
include "connection.php";

$tekst ="SELECT id, naslov, opis, link FROM projekti;";
$result=mysqli_query($conn, $tekst);

$tekst1 ="SELECT t.id, t.tag, t.id_projekta, t.link FROM tag as t 
WHERE t.id_projekta in (SELECT id from projekti);";

$result1=mysqli_query($conn, $tekst1);
?>
<div class="opis_projekta">
<?php
while ($row = mysqli_fetch_assoc($result)){
echo '
    <div class="projekt">
        <p class="jezici">'; $result1=mysqli_query($conn, $tekst1); while ($row1 = mysqli_fetch_assoc($result1)){if($row["id"]==$row1["id_projekta"]){echo '<a href="odabrani_tag.php?subject='.$row1["tag"].'">#'.$row1["tag"].'</a>&nbsp';}}
        echo '</p>
        <div> <a href="projekt.php?subject='.$row["id"].'">
        <h2>'.$row["naslov"].'</h2>
        <p class="opis_projekta">'.$row["opis"].'</p>
        </a></div>
    </div>'
;}?>
</div>
</div>
<script src="skripta.js"></script> 
</body>
</html>