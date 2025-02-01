<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$templateParams["titolo"] = "Nuvole di gelato - Carrello";
$templateParams["nome"]="vedi_carrello.php";

$id_cliente= $_SESSION['Id_cliente'];
if (!isset($_SESSION['Id_ordine'])) {
    // Se non esiste un ordine, crea un nuovo ordine
    $id_ordine = $dbh->inizio_ordine($id_cliente);
    if (!$id_ordine) {
        throw new Exception("Errore nella creazione dell'ordine.");
    }
    $_SESSION['Id_ordine'] = $id_ordine;
} else {
    $id_ordine = $_SESSION['Id_ordine'];
}
if (!isset($_SESSION['cart_count'])) {
    $_SESSION['cart_count'] = 0;
}

$templateParams["riepilogo_ordine"] = $dbh->riepilogo_ordine($id_ordine);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati inviati dal form
    $tipologia = $_POST['tipologia'] ?? null;
    $grandezza = $_POST['grandezza'] ?? null;
    $gusti = $_POST['gusto'] ?? null;
    $quantita = $_POST['quantita'] ?? null;

    if ($tipologia && $grandezza && $gusti && $quantita) {

        if (isset($_SESSION['cart_count'])) {
            $_SESSION['cart_count'] -= (int)$quantita;
            if ($_SESSION['cart_count'] < 0) {
                $_SESSION['cart_count'] = 0; 
            }
        }

        $success = $dbh->rimuovi_prodotto($id_ordine, $tipologia, $grandezza, $gusti);

        if ($success) {
            header("Location: carrello.php");
            exit;
        }
    }
}

$templateParams["mostra_prezzo"]= $dbh->mostra_prezzo($id_ordine);

require 'template/base.php';
?>