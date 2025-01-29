<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Nuvole di gelato - Iscrizione";
$templateParams["nome"]="vedi_iscrizione.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $numero_cell = $_POST["telefono"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confermaPassword = $_POST["conferma_password"];
        $errore = false;

        // Verifica che le password coincidano
        if ($password !== $confermaPassword) {
            $errore = true;
            $templateParams["erroreRegister"] = "Le password non coincidono";
        }

        if ($dbh->check_email($email)) {
            $errore = true;
            $templateParams["erroreRegister"] = "Email esistente, effettua il login";
        }
        // Chiama la funzione di registrazione del database
        if(!$errore){
            $dbh->registrazione($nome, $cognome, $numero_cell, $email, $password);
            
        }
    }

require 'template/base.php';
?>
