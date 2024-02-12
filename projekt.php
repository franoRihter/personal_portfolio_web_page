<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
//napravi funkciju za strijelice koja koristi novi get ispocetak
//napravi uvijet u funkicji koji gleda jeli id sljedece funkcije manji od 0 (odnosno 1) 
//i onda vrti novu ili ne vrti uopce
//////Pokusaj koristit rijecnik???

    //korisno za prikazivanje errora
    ini_set('display_errors', 1);

include "connection.php";
$subject = mysqli_real_escape_string($conn, $_GET['subject']);

//ovisno o getu clanak
$tekst ="SELECT id, jezik, naslov, opis, link FROM projekti
WHERE id = ".$subject .";";

$result=mysqli_query($conn, $tekst);
$row = mysqli_fetch_assoc($result);

//tagovi
$tagovi = "SELECT id, tag, id_projekta FROM tag
WHERE id_projekta = ".$subject.";";
$result1 = mysqli_query($conn, $tagovi);


// navigacija strjelicama
function naprijed(){
    include "connection.php";
    $subject = $_GET['subject'];
    $upit = "SELECT count(id) FROM projekti;";
    $result2 = mysqli_query($conn, $upit);
    $row=mysqli_fetch_assoc($result2);
    $zbroj_projekta = intval($row["count(id)"]);

    if(intval($subject) == $zbroj_projekta-1){
        $subject = "0";
    }else{
        $subject = $subject = strval(intval($subject)+1);
    }
    return $subject;

}
naprijed();

function nazad(){
    include "connection.php";
    $subject = $_GET['subject'];
    $upit = "SELECT count(id) FROM projekti;";
    $result2 = mysqli_query($conn, $upit);
    $row=mysqli_fetch_assoc($result2);
    $zbroj_projekta = intval($row["count(id)"]);

    if(intval($subject) == 0){
        $subject = $zbroj_projekta-1;
    }else{
        $subject = $subject = intval($subject)-1;
    }
    return $subject;

}
?>
    <div class = "opis">
        <div class = "listanje_projekata">
            <span><a href="projekti.php">&#10006;</a></span>
            <span class="navigacija_strjelice">
                <a href="<?php echo "projekt.php?subject=".nazad();?>">&lsaquo;&#10229;</a>
                <span>&nbsp&#8725;&nbsp</span>
                <a href="<?php echo "projekt.php?subject=".naprijed();?>">&#10230;&rsaquo;</a>
            </span>
        </div>
        <!-- tagovi -->
        <p><?php 
        $brojac=0;
        //grananje je radi zareza na kraju zadnjeg taga
        while ($row1 = mysqli_fetch_assoc($result1)){
            if($brojac != (count($row1)-2)){
                echo '<a href="odabrani_tag.php?subject='.$row1["tag"].'">'.$row1["tag"].',</a>&nbsp';
            }else{
                echo '<a href="odabrani_tag.php?subject='.$row1["tag"].'">'.$row1["tag"].'</a>&nbsp';
            }
            $brojac+=1;
            }?></p>
        <h2><?php echo $row["naslov"];?></h2>
        <p><?php echo $row["opis"];?></p>
        <a href="".<?php echo $row["link"];?>."">Link GitHub</a>
    </div>
</body>
    <div class = "prikaz">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit cumque, sapiente recusandae molestias ex, laboriosam consequatur, alias ipsa et aut eos? Eum eligendi iste iusto? Ipsa ut impedit aspernatur molestias.</p>
    </div>

</html>