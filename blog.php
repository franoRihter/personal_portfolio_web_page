<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfelj | blog</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
//korisno za prikazivanje errora
ini_set('display_errors', 1);

include "connection.php";
$tekst = "SELECT id, DATE_FORMAT(datum, '%d. %m. %Y.') formatirani_datum, naslov, citanje, link 
FROM blog;";
$result = mysqli_query($conn, $tekst);

$tagovi = "SELECT t.id, t.tag, t.id_blog FROM tag as t 
        WHERE t.id_blog IN (SELECT id FROM blog);";

?>

<body>
<div class="container">
    <div class="izbornik2"><div class="izbornik_naslov">
                <h1>Blog</h1>
            </div>
        </div>
            <div class="izbornik2"><div class="izbornik_lista">
                <ul class="lista">
                    <li><a class="meni_navigacija" href="index.php">index</a></li>
                    <li><a class="meni_navigacija" href="projekti.php">projekti</a></li>
                    <li><a class="meni_navigacija" href="/../kontakt.html">kontakt</a></li>
                    <li><a class="meni_navigacija" href="blog.php">blog</a></li>
                </ul>
            </div>
    </div>
    
    </div>
    <!-- ovj je mobilni dio-->
            <div class="mobilni_izbornik">
                    <div class="mobilni_izbornik_elementi"><a href="index.php">index</a></div>
                    <div class="mobilni_izbornik_elementi"><a href="projekti.php">projekti</a></div>
                    <div class="mobilni_izbornik_elementi"><a href="/../kontakt.html">kontakt</a></div>
                    <div class="mobilni_izbornik_elementi"><a  href="blog.php">blog</a></div>
                
</div>
<nav><h1 class="naslov_mobilni">Blog</h1><div class="ham-menu"> 
        <span></span>
        <span></span>
        <span></span>
    </div></nav>
    <div class = "blog_body">
<?php
while($row = mysqli_fetch_assoc($result)) {
    echo '
<div class="popis_kutija">
    <div class="kutija">
        <p class="datum">'.$row["formatirani_datum"].'</p>
        <p><a href="blog_post.php?subject='.$row["id"].'" class="blog_naslovi">'.$row["naslov"].'</a></p>
        <ul class="lista_tagova">
        ';
        $result1=mysqli_query($conn, $tagovi); while ($row1 = mysqli_fetch_assoc($result1)){if($row["id"]==$row1["id_blog"]){echo '<a class="tag" href="odabrani_tag.php?subject='.$row1["tag"].'">#'.$row1["tag"].'</a>&nbsp';}};
        echo '
        </ul>
        <p class="citanje">'.$row["citanje"].'</p>
    </div>
</div>
';}
?>
    </div>
    </div>
</body>
<script src="skripta.js"></script> 
</html>