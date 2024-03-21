<?php 
include "/home/frano/Documents/projekti/osobna_web_stranica/web_stranica/connection.php";
session_start();
#error_reporting(E_ALL);
#ini_set('display_errors', 1);
#var_dump($_POST);

#provjerava koja su polja unesena i radi sql upit za unos
$unos="";
if ($_POST["tag"]!="" && $_POST["id_projekta"]!="" && $_POST["id_bloga"]!=""){
    $unos="INSERT INTO tag (tag, id_projekta, id_blog) VALUES ('".$_POST["tag"]."','".$_POST["id_projekta"]."','".$_POST["id_bloga"]."');";
}elseif($_POST["tag"]!="" && $_POST["id_projekta"]!="" && $_POST["id_bloga"]==""){
    $unos="INSERT INTO tag (tag, id_projekta) VALUES ('".$_POST["tag"]."','".$_POST["id_projekta"]."');";
}elseif($_POST["tag"]!="" && $_POST["id_projekta"]=="" && $_POST["id_bloga"]!=""){
    $unos="INSERT INTO tag (tag, id_blog) VALUES ('".$_POST["tag"]."','".$_POST["id_bloga"]."');";
}elseif($_POST["tag"]!="" && $_POST["id_projekta"]=="" && $_POST["id_bloga"]==""){
    $unos="INSERT INTO tag (tag) VALUES ('".$_POST["tag"]."');";
}
else{
    echo("error! kriv unos: tag, projekt, blog (mora biti unesen tag ovo drugo ne)");
}

if ($conn->query($unos) === TRUE) {
    echo "New record created successfully";
    header("Location: index.php");

} else {
    echo "Error: " . $unos . "<br>" . $conn->error;
}

