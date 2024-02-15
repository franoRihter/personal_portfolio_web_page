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

//SELECT DISTINCT Country FROM Customers;
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
    <h2>Blog</h2>
    <label for="username">Naslov:</label><br>
    <input type="text" name="username" requred><br>
    
    <label for="username">Datum:</label><br>
    <input type="date" id="datum" name="datum"><br>

    <label for="username">Sadržaj:</label><br>
    <input type="text" name="username" requred><br>

    <label for="username">Vrijeme čitanja:</label><br>
    <input type="text" name="username" requred><br>

    <label for="username">Link:</label><br>
    <input type="text" name="username" requred><br>

    <label for="username">Tagovi:</label><br>
    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"><br>


</body>
</html>