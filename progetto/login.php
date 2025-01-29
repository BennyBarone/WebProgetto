<?php
require_once 'bootstrap.php';

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
    $templateParams["nome"]="home.php";    
}else{
    $templateParams["titolo"] = "Nuvole di gelato - Login";
    $templateParams["nome"]="vedi_login.php";
}

require 'template/base.php';
?>