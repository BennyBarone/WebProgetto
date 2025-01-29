<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Nuvole di gelato - Iscrizione";
$templateParams["nome"]="vedi_iscrizione.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $numero_cell = $_POST["telefono"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confermaPassword = $_POST["conferma_password"];

        // Verifica che le password coincidano
        if ($password !== $confermaPassword) {
            echo "Le password non coincidono";
            exit;
        }

        // Chiama la funzione di registrazione del database
        $result = $dbh->registrazione($nome, $cognome, $numero_cell, $email, $password);

        if ($result) {
            echo "Registrazione avvenuta con successo!";
        } else {
            echo "Errore durante la registrazione";
        }
    } catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
    }
} else {
    echo "Dati non validi";
}
require 'template/base.php';
?>
