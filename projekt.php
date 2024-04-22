<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Portfelj | projekt</title>
</head>
<body>
<?php

    //korisno za prikazivanje errora
    ini_set('display_errors', 1);

include "connection.php";
$subject = mysqli_real_escape_string($conn, $_GET['subject']);

//ovisno o getu clanak
$tekst ="SELECT id, naslov, opis, link FROM projekti
WHERE id = ".$subject .";";

$result=mysqli_query($conn, $tekst);
$row = mysqli_fetch_assoc($result);

//tagovi
$tagovi = "SELECT id, tag, id_projekta FROM tag
WHERE id_projekta = ".$subject.";";
$result1 = mysqli_query($conn, $tagovi);


//slike
$slike="SELECT id, naziv, id_projekta FROM slike 
WHERE id_projekta = ".$subject."; ";
$result2 = mysqli_query($conn, $slike);

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
            <span><a class="strjelice" href="projekti.php">&#10006;</a></span>
            <span class="navigacija_strjelice">
                <a class="strjelice" href="<?php echo "projekt.php?subject=".nazad();?>">&lsaquo;&#10229;</a>
                <span>&nbsp&#8725;&nbsp</span>
                <a class="strjelice" href="<?php echo "projekt.php?subject=".naprijed();?>">&#10230;&rsaquo;</a>
            </span>
        </div>
        <!-- tagovi -->
        <p class="projekt_tag"><?php 
        $brojac=1;
        $rowcount=mysqli_num_rows($result1);
        //grananje je radi zareza na kraju zadnjeg taga
        while ($row1 = mysqli_fetch_assoc($result1)){
            if($brojac != $rowcount){
                echo '<a class="meni_navigacija" href="odabrani_tag.php?subject='.$row1["tag"].'">'.$row1["tag"].',</a>&nbsp';
            }else{
                echo '<a class="meni_navigacija" href="odabrani_tag.php?subject='.$row1["tag"].'">'.$row1["tag"].'</a>&nbsp';
            }
            $brojac+=1;
            }?></p>
        <h2><?php echo $row["naslov"];?></h2>
        <p><?php echo $row["opis"];?></p>
        <br>
        <?php 
        if($row["link"]!=Null){
        echo '<a class="github_link" href="'.$row["link"].'";>>Link GitHub</a>';}else{
            echo'';
        }
        ?>
    </div>

    <div class = "prikaz">
    <?php

    while($row2=mysqli_fetch_assoc($result2)){
    echo '<img src="/../images/'.$row2["naziv"].'" alt="'.$row2["naziv"].'", class="slika"><br>';
}
    ?>
    </div>
    </body>
</html>