<?php

@ob_start();
session_start();
$target_file="";
#citanje slike
if(!empty($_FILES["slika"])){
var_dump($_FILES);
#trenutni direktorij
$target_dir=getcwd();
$ime_slike=$_FILES["slika"]["name"];

#

}else{
    echo "prazno";
}

