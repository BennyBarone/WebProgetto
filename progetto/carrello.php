<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Carrello";
$templateParams["nome"]="vedi_carrello.php";

$id_ordine = $_SESSION['Id_ordine'];
$templateParams["riepilogo_ordine"]=$dbh->riepilogo_ordine($id_ordine);

require 'template/base.php';
?>