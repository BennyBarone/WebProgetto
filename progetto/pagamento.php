<?php

require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Pagamento";
$templateParams["nome"]="vedi_pagamento.php";

$id_cliente=$_SESSION['Id_cliente'];
$id_ordine=$_SESSION['Id_ordine'];

$templateParams["mostra_prezzo"]=$dbh->mostra_prezzo($id_ordine);
$templateParams["punti"]=$dbh->controllo_punti($id_cliente);

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

require 'template/base.php';
?>