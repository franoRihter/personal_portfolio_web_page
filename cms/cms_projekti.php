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
$upit = "SELECT DISTINCT(tag) FROM tag;";
$tagovi = mysqli_query($conn, $upit);
$brojac_tagova = 0;

$upit_projekata="SELECT id, naslov, datum, opis FROM projekti;";
$projekti = mysqli_query($conn, $upit_projekata);

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

    <!-- ovdje napraviti cijeli cms. dakle ideja je jednostavna
    samo napravi input polje za svaki unos u bazi i tjt.
    trebalo bi smislit kako ubacit slike to je malo zajebano, ali snađi se-->
    <div>
    <div class="dodaj">
    <h2>Dodaj novi projekt</h2>
    <form action="unos_handler_projekti.php" method="post">
    <label for="naslov">Naslov:</label><br>
    <input type="text" name="naslov" requred><br>

    <label for="opis">Opis:</label><br>
    <input type="text" name="opis" requred><br>

    <label for="link">Link:</label><br>
    <input type="text" name="link" requred><br>

    <label for="tagovi">Tagovi:</label><br>
    <?php
    while($tag = mysqli_fetch_assoc($tagovi)){
        echo '<input type="checkbox" id=tag'.$brojac_tagova.' name=tag'.$brojac_tagova.' value="'.$tag["tag"].'">
        <label for="tag'.$brojac_tagova.'">'.$tag["tag"].'</label><br>';
        $brojac_tagova+=1;
    }
    ?>
    <br><button type="submit">unos</button>
    </form>
    </div>

    <div class="uredi">
    <h2>Uredi</h2>
    <form action="update_handler_projekti">
    <?php 
    $brojac_boje=True;
    while($projekt = mysqli_fetch_assoc($projekti)){
        if($brojac_boje==True){
            echo '<a href = "uredi_projekt.php?subject='.$projekt["id"].'"><div>
            <em>'.$projekt["id"].'|</em>
            <em>'.$projekt["naslov"].'|</em>
            <em>'.$projekt["opis"].'|</em>
            </div></a>';
            $brojac_boje=False;
        }else{
            echo '<a href = "uredi_projekt.php?subject='.$projekt["id"].'"><div class="popis">
            <em>'.$projekt["id"].'|</em>
            <em>'.$projekt["naslov"].'|</em>
            <em>'.$projekt["opis"].'|</em>
            </div></a>';
            $brojac_boje=True;
        }
        
    }
    #<textarea name="" id="" cols="30" rows="10">ovo je tekst</textarea>
    ?>
    </form>

    </div>
    </div>
</body>
</html>