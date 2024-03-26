<?php 
include "/home/frano/Documents/projekti/osobna_web_stranica/web_stranica/connection.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
#echo count($_POST);
var_dump($_POST);
#$myfile = fopen("error_dump.txt", "w");
#fwrite($myfile, $username.$password."\n");
#fwrite($myfile, "");
#fclose($myfile);
#echo ($_POST["datum"]);

$promjena = "UPDATE blog set naslov='".$_POST["naslov"]."', sadrzaj='".$_POST["sadrzaj"]."', citanje='".$_POST["citanje"]."' WHERE id=".$_POST["id"].";";
//provjera unesenih polja
//if(empty($_POST["sadrzaj_stranice"])){
//    die("Sadrzaj nije unesen");
//}


if ($conn->query($promjena) === TRUE) {
    echo "New change commited!";
    header("Location: index.php");

} else {
    echo "Error: " . $promjena . "<br>" . $conn->error;
}

