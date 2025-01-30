<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

try {
    if (!isset($_SESSION['Id_cliente'])) {
        throw new Exception("Sessione non attiva! Assicurati di essere loggato.");
    }

    $id_cliente = $_SESSION['Id_cliente'];
    $tipologia = $_POST['tipologia'] ?? null;
    $grandezza = $_POST['grandezza'] ?? null;
    $gusto1 = $_POST['gusto1'] ?? null;
    $gusto2 = $_POST['gusto2'] ?? null;
    $gusto3 = $_POST['gusto3'] ?? null;
    $quantita = $_POST['quantita'] ?? 1;

    if (is_null($tipologia) || is_null($grandezza) || is_null($gusto1) || is_null($gusto2)) {
        throw new Exception("Dati mancanti nel form.");
    }

    // Chiama la funzione del database
    $result = $dbh->insert_dettaglio_ordine($id_cliente, $grandezza, $tipologia, $gusto1, 1, $gusto2, 2, $gusto3, 3, $quantita);

    if ($result) {
        // Reindirizza a una pagina di successo o mostra un messaggio
        header("Location: prodotti.php");
    } else {
        throw new Exception("Errore durante l'inserimento dell'ordine.");
    }
} catch (Exception $e) {
    // Mostra l'errore o reindirizza a una pagina di errore
    echo "Errore: " . $e->getMessage();
}

    require 'template/base.php';

?>
