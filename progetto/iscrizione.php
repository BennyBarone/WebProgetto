<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
        if (!$errore) {
            $dbh->registrazione($nome, $cognome, $numero_cell, $email, $password);
            
            // Recupera i dati dell'utente appena registrato
            $login_result = $dbh->checkLogin($email, $password);
 
            // Effettua il login automatico
            if (count($login_result) > 0) {
                registerLoggedUser($login_result[0]);
                $id_cliente= $_SESSION['Id_cliente'];
                $dbh->insert_notifica($id_cliente, "Benvenuto", "Ciao $nome. Benvenuta/o in Nuvole di Gelato!
                Siamo felici di averti qui. Questo è il posto perfetto per chi ama la freschezza e i sapori autentici. 
                Lasciati tentare da NUOVE dolcezze!");
                header("Location: index.php"); // Reindirizza alla homepage
                exit();
            }
        }
}
require 'template/base.php';
?>
