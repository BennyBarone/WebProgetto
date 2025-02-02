<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Pagamento";
$templateParams["nome"]="vedi_pagamento.php";

$id_cliente = $_SESSION['Id_cliente'];
$id_ordine = $_SESSION['Id_ordine'];

$templateParams["mostra_prezzo"] = $dbh->mostra_prezzo($id_ordine);
$templateParams["punti"] = $dbh->controllo_punti($id_cliente);

$prezzoTotale = $templateParams["mostra_prezzo"];
$puntiCliente = $templateParams["punti"];

if ($puntiCliente >= 15) {
    $sconto = "Si";
    $prezzoFinale = $prezzoTotale * 0.8; // Sconto del 20%
} else {
    $sconto = "No, non hai abbastanza punti";
    $prezzoFinale = $prezzoTotale;
}

$templateParams["sconto"] = $sconto;
$templateParams["prezzo_finale"] = $prezzoFinale;

// Se il cliente ha premuto il bottone "Paga"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['payment'])) {
        $metodo_pagamento = $_POST['payment']; // "Carta" o "Contanti"
    } else {
        $metodo_pagamento = "Non specificato";
    }

    $dbh->fine_ordine($id_cliente, $id_ordine, $prezzoFinale, $metodo_pagamento);
    $dbh->insert_notifica($id_cliente, "Ordine inviato!", "Il tuo ordine (n. $id_ordine) è stato inviato con successo! Troverai tutti i dettagli che lo riguardano nella tua pagina personale 'I miei ordini'.
    Riceverai nei prossimi giorni (speriamo entro 48h) un'ulteriore notifica riguardante il tuo gelato! Rimani sintonizzata/o!! ");

    //Termino la sessione dell'ordine e svuoto il carrello
    unset($_SESSION['Id_ordine']);
    $_SESSION['cart_count'] = 0; // Svuota il carrello


    //Reindirizzo alla pagina di conferma
    header("Location: mioOrdine.php");
    exit();
}

require 'template/base.php';
?>
