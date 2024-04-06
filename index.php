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
<nav><h1 class="naslov_mobilni">Frano Rihter</h1><div class="ham-menu"> 
        <span></span>
        <span></span>
        <span></span>
    </div></nav>

    <h3>Aktivnosi:</h3>
    <div class="paragraf1">
        <h4>Projekti</h4>
    <?php 
    $unos1= "SELECT id, DATE_FORMAT(datum, '%d. %m. %Y.') formatirani_datum, naslov FROM projekti ORDER BY datum DESC;";
    $result = mysqli_query($conn, $unos1);

    #Dakle naoravi da jedne strane bude blog postovi, a s druge projekti
    # kad je u mobile modu onda se skaliraj u prvo projekti, a onda blog

    $brojac_boje=True;
    while($row = mysqli_fetch_assoc($result)){
        if($brojac_boje==True){
            echo '<a href = "projekt.php?subject='.$row["id"].'"><div div class="popis1">
            <em>'.$row["formatirani_datum"].'|</em>
            <em>'.$row["naslov"].'</em>
            </div></a>';
            $brojac_boje=False;
        }else{
            echo '<a href = "projekt.php?subject='.$row["id"].'"><div class="popis">
            <em>'.$row["formatirani_datum"].'|</em>
            <em>'.$row["naslov"].'</em>
            </div></a>';
            $brojac_boje=True;
        }
    }
    #<textarea name="" id="" cols="30" rows="10">ovo je tekst</textarea>
?>
    </div>
    <div class="paragraf2">
        <h4>Blog</h4>
    <?php 
    $unos2= "SELECT id, DATE_FORMAT(datum, '%d. %m. %Y.') formatirani_datum, naslov FROM blog ORDER BY datum DESC;";
    $result1 = mysqli_query($conn, $unos2);

    #Dakle naoravi da jedne strane bude blog postovi, a s druge projekti
    # kad je u mobile modu onda se skaliraj u prvo projekti, a onda blog

    $brojac_boje=True;
    while($row1 = mysqli_fetch_assoc($result1)){
        if($brojac_boje==True){
            echo '<a href = "projekt.php?subject='.$row1["id"].'"><div class="popis">
            <em>'.$row1["formatirani_datum"].'|</em>
            <em>'.$row1["naslov"].'</em>
            </div></a>';
            $brojac_boje=False;
        }else{
            echo '<a href = "projekt.php?subject='.$row1["id"].'"><div div class="popis1">
            <em>'.$row1["formatirani_datum"].'|</em>
            <em>'.$row1["naslov"].'</em>
            </div></a>';
            $brojac_boje=True;
        }
    }
    #<textarea name="" id="" cols="30" rows="10">ovo je tekst</textarea>
?>
    </div>
    <script src="skripta.js"></script> 
</body>

</html>
