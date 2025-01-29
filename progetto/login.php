<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result= $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"]="Errore! Controllare username o password!";
    }
    else{
       registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $templateParams["titolo"]= "Nuvole di gelato - Home";
    $templateParams["nome"]="home.php";
    $templateParams["recensioni"]=$dbh->getRecensioni(); 

}else{
    $templateParams["titolo"] = "Nuvole di gelato - Login";
    $templateParams["nome"]="vedi_login.php";
}

require 'template/base.php';
?>