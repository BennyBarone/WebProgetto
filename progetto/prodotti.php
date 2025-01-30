<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Vedi Prodotti";
$templateParams["nome"] = "vedi_prodotti.php";
$templateParams["gustiMigliori"] = $dbh->getBestGusti();
$templateParams["gusti"] = $dbh->getGusti();

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'Tutti';
if ($filtro === 'Tutti') {
    $templateParams["prodotti"] = $dbh->getProdotti();
} else {
    $templateParams["prodotti"] = $dbh->getProdottiByTipo($filtro);
}

$templateParams["listaGusti"]=$dbh->getListaGusti();

require 'template/base.php';
?>