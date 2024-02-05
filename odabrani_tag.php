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
$tekst = "SELECT id, DATE_FORMAT(datum, '%d, %m, %Y') formatirani_datum, naslov, citanje, link 
FROM blog;";
$result = mysqli_query($conn, $tekst);

$tagovi = "SELECT t.id, t.tag, t.id_blog FROM tag as t 
        WHERE t.id_blog IN (SELECT id from blog);";
$result1 = mysqli_query($conn, $tagovi);
?>
<div class="container">
    <div class="izbornik2"><div class="izbornik_naslov">
        <?php echo'
        <h1>'.$_GET["subject"].'</h1>';
        ?>
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
<body class = "blog_body">
<h2>Blog</h2>
<?php
while($row = mysqli_fetch_assoc($result)) {
    echo '
<div class="popis_kutija">
    <div class="kutija">
        <p class="datum">'.$row["formatirani_datum"].'</p>
        <p>'.$row["naslov"].'</p>
        <ul class="lista_tagova">
        ';
        while ($row1= mysqli_fetch_assoc($result1)){
            echo ' <li>'.$row1["tag"].'</li>';
        }
        echo '
        </ul>
        <p class="citanje">'.$row["citanje"].'</p>
    </div>
</div>
';}
?>
<h2>Projekti</h2>
<div class="popis_kutija">
    <div class="kutija">
        <p class="datum">'.$row["formatirani_datum"].'</p>
        <p>'.$row["naslov"].'</p>
        <ul class="lista_tagova">
        ';
        while ($row1= mysqli_fetch_assoc($result1)){
            echo ' <li>'.$row1["tag"].'</li>';
        }
        echo '
        </ul>
        <p class="citanje">'.$row["citanje"].'</p>
    </div>
</div>

    </div>
</body>
</html>