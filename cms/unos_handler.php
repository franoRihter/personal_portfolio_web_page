<?php 
include "/home/frano/Documents/projekti/osobna_web_stranica/web_stranica/connection.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo ($_POST["datum"]);
echo "INSERT INTO blog (datum, naslov, sadrzaj, citanje, link) VALUES ('".$_POST["datum"]."','".$_POST ["naslov"]."','".$_POST["sadrzaj"]."','".$_POST["vrijeme_citanja"]."','".$_POST["link"]."');";
$unos = "INSERT INTO blog (naslov, sadrzaj, citanje, link) VALUES ('".$_POST ["naslov"]."','".$_POST["sadrzaj"]."','".$_POST["vrijeme_citanja"]."','".$_POST["link"]."');";

//provjera unesenih polja
//if(empty($_POST["sadrzaj_stranice"])){
//    die("Sadrzaj nije unesen");
//}


if ($conn->query($unos) === TRUE) {
    echo "New record created successfully";
    header("Location: index.php");

} else {
    echo "Error: " . $unos . "<br>" . $conn->error;
}
