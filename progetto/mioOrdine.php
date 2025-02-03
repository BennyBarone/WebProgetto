<?php

require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - I miei Ordini";
$templateParams["nome"] = "vedi_mieiOrdini.php";
$id_cliente = $_SESSION["Id_cliente"];
$templateParams["mostra_ordine"]=$dbh->mostra_ordine($id_cliente);

require 'template/base.php';
?>