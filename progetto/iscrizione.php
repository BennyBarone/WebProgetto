<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Nuvole di gelato - Iscrizione";
$templateParams["nome"]="vedi_iscrizione.php";

require 'template/base.php';


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
}
?>







?>