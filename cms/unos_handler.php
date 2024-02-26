<?php 
include "/home/frano/Documents/projekti/osobna_web_stranica/web_stranica/connection.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
#ovo radi 19.02. u 16:40
echo ($_POST["datum"]);
echo "INSERT INTO blog (datum, naslov, sadrzaj, citanje, link) VALUES ('".$_POST["datum"]."','".$_POST ["naslov"]."','".$_POST["sadrzaj"]."','".$_POST["vrijeme_citanja"]."','".$_POST["link"]."');";
$unos = "INSERT INTO blog (naslov, sadrzaj, citanje, link) VALUES ('".$_POST ["naslov"]."','".$_POST["sadrzaj"]."','".$_POST["vrijeme_citanja"]."','".$_POST["link"]."');";


if ($conn->query($unos) === TRUE) {
    echo "New record created successfully";
    header("Location: index.php");

} else {
    echo "Error: " . $unos . "<br>" . $conn->error;
}
