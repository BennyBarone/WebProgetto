<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Carrello";
$templateParams["nome"]="vedi_carrello.php";
//$templateParams["riepilogo_ordine"]=$dbh->riepilogo_ordine();

require 'template/base.php';
?>