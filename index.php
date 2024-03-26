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
$tekst = "SELECT id, tekst FROM pocetna;";
$result = mysqli_query($conn, $tekst);
?>
<body>
    <div class="container">
            <div class="izbornik2"><div class="izbornik_naslov">
                <h1>Frano Rihter</h1>
            </div>
        </div>
            <div class="izbornik2"><div class="izbornik_lista">
                <ul class="lista">
                    <li><a href="index.php">index</a></li>
                    <li><a href="projekti.php">projekti</a></li>
                    <li><a href="kontakt.php">kontakt</a></li>
                    <li><a href="blog.php">blog</a></li>
                </ul>
            </div>
    </div>
    </div>
    <?php $row = mysqli_fetch_assoc($result)?>
    <div class="paragraf1">
    <?php 
    /* 
    #Dakle naoravi da jedne strane bude blog postovi, a s druge projekti
    # kad je u mobile modu onda se skaliraj u prvo projekti, a onda blog

    $brojac_boje=True;
    while($blog1 = mysqli_fetch_assoc($blog)){
        if($brojac_boje==True){
            echo '<a href = "uredi_blog.php?subject='.$blog1["id"].'"><div>
            <em>'.$blog1["id"].'|</em>
            <em>'.$blog1["naslov"].'|</em>
            <em>'.$blog1["sadrzaj"].'|</em>
            </div></a>';
            $brojac_boje=False;
        }else{
            echo '<a href = "uredi_blog.php?subject='.$blog1["id"].'"><div class="popis">
            <em>'.$blog1["id"].'|</em>
            <em>'.$blog1["naslov"].'|</em>
            <em>'.$blog1["sadrzaj"].'|</em>
            </div></a>';
            $brojac_boje=True;
        }
        
    }
    #<textarea name="" id="" cols="30" rows="10">ovo je tekst</textarea>
    */?>
    </div>
    
</body>

</html>
