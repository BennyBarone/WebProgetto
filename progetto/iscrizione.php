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

<<<<<<< HEAD
var_dump($_POST); // Stampa tutti i dati inviati
exit; // Ferma l'esecuzione

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati dal moduloù

    $password == $_POST['Password'];
    $conferma_password == $_POST['Conferma_password'];

    // Controlla se le password corrispondono
    if ($password !== $conferma_password) {
        echo "Le password non corrispondono. Riprova.";
        exit;
    }

    exit;
=======
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
>>>>>>> aab927a0b32737cabe27948e7edf0cf1be34d349
}
require 'template/base.php';
?>
