<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Nuvole di gelato - Iscrizione";
$templateParams["nome"]="vedi_iscrizione.php";

require 'template/base.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati dal modulo
    $password = $_POST['Password'];
    $conferma_password = $_POST['Conferma_password'];

    // Controlla se le password corrispondono
    if ($password !== $conferma_password) {
        // Reindirizza indietro con errore
        header('Location: iscrizione.php?errore=passwords_non_corrispondono');
        exit;
    }

    // Qui puoi inserire il codice per salvare i dati nel database o altre operazioni
    // Esempio: salva nel database, invia email di conferma, ecc.

    // Se il processo è andato a buon fine, puoi reindirizzare su una pagina di successo
    header('Location: success.php');
    exit;
}
?>







?>