<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "/home/frano/Documents/projekti/osobna_web_stranica/web_stranica/connection.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["username"]) && isset($_POST["password"])){
        // ođe je zajebancija
        $tekst = "SELECT id, username, pass FROM korisnik WHERE username = "."'".$_POST["username"]."'".";";
        $result = mysqli_query($conn, $tekst);
        $row = mysqli_fetch_assoc($result);
        
        $username=$row["username"];
        $password=$row["pass"];
        if($_POST["password"] === $password && $_POST["username"]===$username){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
            exit;
        }else{
            //$myfile = fopen("error_dump.txt", "w");
            //fwrite($myfile, $username.$password."\n");
            //fwrite($myfile, $_POST["username"].$_POST["password"]."\n");
            //fclose($myfile);
            header("Location: login.html?error=invalid_credentials");
        }

    }
}