<?php

//korisno za prikazivanje errora
ini_set('display_errors', 1);


$servername = "localhost";
$username = "root";
$password = "root";

//create connection
$conn = mysqli_connect($servername, $username, $password, "osobna_web_stranica");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

