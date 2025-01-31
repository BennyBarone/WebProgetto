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

    // Verifico se esiste un ordine attivo nella sessione
    if (!isset($_SESSION['Id_ordine'])) {
        // Se non esiste un ordine, crea un nuovo ordine
        $id_ordine = $dbh->inizio_ordine($id_cliente);
        if (!$id_ordine) {
            throw new Exception("Errore nella creazione dell'ordine.");
        }

        // Salva l'ID dell'ordine nella sessione, una volta che si termina l'ordine bisogna che la sessione dell'id_ordine scada
        //altrimenti si continua a comprare con lo stesso id_ordine e non va bene.
        $_SESSION['Id_ordine'] = $id_ordine;
    } else {
        $id_ordine = $_SESSION['Id_ordine'];
    }
    
    $result = $dbh->insert_dettaglio_ordine($id_ordine, $grandezza, $tipologia, $gusto1, 1, $gusto2, 2, $gusto3, 3, $quantita);

    if ($result) {
        
        if (!isset($_SESSION['cart_count'])) {
            $_SESSION['cart_count'] = 0;
        }
        $_SESSION['cart_count'] += $quantita;
        // Reindirizza a una pagina di successo o mostra un messaggio
        header("Location: prodotti.php");
        exit;
    } else {
        throw new Exception("Errore durante l'inserimento del prodotto nell'ordine.");
    }
} catch (Exception $e) {
    // Mostra l'errore o reindirizza a una pagina di errore
    echo "Errore: " . $e->getMessage();
}

require 'template/base.php';
?>
