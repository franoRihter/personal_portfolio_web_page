<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php session_start();?>

<form action="upravljanje_slikama.php" method="post" enctype="multipart/form-data">
        <label for="slika">Unesite sliku:</label><br>
        <input  name="slika" type="file" requred><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>