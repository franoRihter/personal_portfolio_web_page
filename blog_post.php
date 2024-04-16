<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfelj | post</title>
    <link rel="stylesheet" href="/../style.css">
</head>
<body>
    <?php
        ini_set('display_errors', 1);

        include "connection.php";
        #var_dump($_GET);
        $subject = mysqli_real_escape_string($conn, $_GET['subject']);
        #var_dump($subject);
        //ovisno o getu clanak
        $tekst ="SELECT id, naslov, sadrzaj, DATE_FORMAT(datum, '%d. %m. %Y.') formatirani_datum, citanje FROM blog
        WHERE id = ".$subject .";";
        
        $result=mysqli_query($conn, $tekst);
        $row = mysqli_fetch_assoc($result);
        
        //tagovi
        $tagovi = "SELECT id, tag, id_blog FROM tag
        WHERE id_blog = ".$subject.";";
        $result1 = mysqli_query($conn, $tagovi);
    ?>
<div class="container">
            <div class="izbornik2"><div class="izbornik_naslov">
                <h1></h1>
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
<nav><h1 class="naslov_mobilni"></h1><div class="ham-menu"> 
        <span></span>
        <span></span>
        <span></span>
    </div></nav>
<h1><?php echo $row["naslov"];?></h1>
    <div class="blog_citanje_datum">
        <span>
            <li style="color: #bdae93"><?php echo $row["formatirani_datum"];?></li>
            <li style="color: #bdae93">vrijeme čitanja: <?php echo $row["citanje"];?></li>
</span>
    </div>
    <div class="blog_sadrzaj">
    <div class="blog_tekst"><p><?php echo $row["sadrzaj"];?></p></div>
    <div class="tagovi_bloga">
        <div class="naslov_tagova"><h3>Tema:</h3></div>
        
    <?php 
        //grananje je radi zareza na kraju zadnjeg taga
        while ($row1 = mysqli_fetch_assoc($result1)){
            echo '<a href="odabrani_tag.php?subject='.$row1["tag"].'" class="blog_tag_stil">#'.$row1["tag"].'</a>&nbsp';
            }
            ?>
    </div>
    </div>
</body>
<script src="skripta.js"></script> 
</html>