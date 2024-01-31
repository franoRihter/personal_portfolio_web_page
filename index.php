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
                    <li>kontakt</li>
                    <li><a href="blog.php">blog</a></li>
                </ul>
            </div>
    </div>
    </div>
    <?php $row = mysqli_fetch_assoc($result)?>
    <div class="paragraf1">
        <p><?php echo "ovo je tekst";?></p>
        <p><?php echo $row["naslov"];?></p>
        <p><?php echo $row["clanak"];?></p>
    </div>
    
</body>

</html>
