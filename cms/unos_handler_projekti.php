<?php 
include "/home/frano/Documents/projekti/osobna_web_stranica/web_stranica/connection.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
#echo count($_POST);
#var_dump($_POST);
#$myfile = fopen("error_dump.txt", "w");
#fwrite($myfile, $username.$password."\n");
#fwrite($myfile, "");
#fclose($myfile);

#echo ($_POST["datum"]);

$unos = "INSERT INTO projekti (naslov, opis, datum, link) VALUES ('".$_POST ["naslov"]."','".$_POST["opis"]."','".date("Y.m.d.")."','".$_POST["link"]."');";

//provjera unesenih polja
//if(empty($_POST["sadrzaj_stranice"])){
//    die("Sadrzaj nije unesen");
//}


if ($conn->query($unos) === TRUE) {
    echo "New record created successfully";
    #sjeti se testirat je li se sve upiše prije nego se izvrši linija ispid 
    #header("Location: index.php");

} else {
    echo "Error: " . $unos . "<br>" . $conn->error;
}
$id_trenutnog_projekta="SELECT id FROM projekti ORDER BY id DESC LIMIT 1;";
$pom=mysqli_fetch_assoc(mysqli_query($conn, $id_trenutnog_projekta));

$brojac=0;
foreach($_POST as $key=>$value){
    if($brojac>4){
        #echo $value;
        $tag = "INSERT INTO tag (tag, id_propjekta) VALUES ('$value',".$pom["id"].");";
        if ($conn->query($tag) === TRUE) {
            echo "New record created successfully u tagu";
            #sjeti se testirat je li se sve upiše prije nego se izvrši linija ispid 
            #header("Location: index.php");
        
        } else {
            echo "Error: " . $unos . "<br>" . $conn->error;
        }
    }
    

    $brojac++;
}
