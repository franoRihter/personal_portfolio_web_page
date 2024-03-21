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
#echo "INSERT INTO blog (datum, naslov, sadrzaj, citanje, link) VALUES ('".$_POST["datum"]."','".$_POST ["naslov"]."','".$_POST["sadrzaj"]."','".$_POST["vrijeme_citanja"]."','".$_POST["link"]."');";
$unos = "INSERT INTO blog (datum, naslov, sadrzaj, citanje, link) VALUES ('".date("YYYY.MM.DD")."','".$_POST ["naslov"]."','".$_POST["sadrzaj"]."','".$_POST["vrijeme_citanja"]."','".$_POST["link"]."');";

//provjera unesenih polja
//if(empty($_POST["sadrzaj_stranice"])){
//    die("Sadrzaj nije unesen");
//}


if ($conn->query($unos) === TRUE) {
    echo "New record created successfully";
    #header("Location: index.php");

} else {
    echo "Error: " . $unos . "<br>" . $conn->error;
}
$id_trenutnog_bloga="SELECT id FROM blog ORDER BY id DESC LIMIT 1;";
$pom=mysqli_fetch_assoc(mysqli_query($conn, $id_trenutnog_bloga));

$brojac=0;
foreach($_POST as $key=>$value){
    if($brojac>4){
        #echo $value;
        $tag = "INSERT INTO tag (tag, id_blog) VALUES ('$value',".$pom["id"].");";
        if ($conn->query($tag) === TRUE) {
            echo "New record created successfully u tagu";
            header("Location: index.php");
        
        } else {
            echo "Error: " . $unos . "<br>" . $conn->error;
        }
    }
    

    $brojac++;
}
