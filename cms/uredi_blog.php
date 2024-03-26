<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/../style.css">
</head>
<body>
<?php
//napravi funkciju za strijelice koja koristi novi get ispocetak
//napravi uvijet u funkicji koji gleda jeli id sljedece funkcije manji od 0 (odnosno 1) 
//i onda vrti novu ili ne vrti uopce
//////Pokusaj koristit rijecnik???

    //korisno za prikazivanje errora
    ini_set('display_errors', 1);

include "/home/frano/Documents/projekti/osobna_web_stranica/web_stranica/connection.php";
$subject = mysqli_real_escape_string($conn, $_GET['subject']);

//ovisno o getu clanak
$tekst ="SELECT id, naslov, sadrzaj, citanje FROM blog
WHERE id = ".$subject .";";
$result=mysqli_query($conn,$tekst);
$row=mysqli_fetch_assoc($result);
?>
<form action="uredi_handler_blog.php" method="post">
<?php
echo '
<p>Id projekta</p>
<input type="text" name="id", id="id" value="'.$subject.'" readonly>
<p>Naslov</p>
<textarea name="naslov" id="naslov" cols="30" rows="2">'.$row["naslov"].'</textarea>
<p>Sadrzaj</p>
<textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10">'.$row["sadrzaj"].'</textarea>
<p>Vrjeme citanja</p>
<textarea name="citanje" id="citanje" cols="30" rows="1">'.$row["citanje"].'</textarea>
<p>tagovi se dodaju u glavnom izborniku</p>';

?>
<br><button type="submit">unos</button>
</form>
</body>
</html>