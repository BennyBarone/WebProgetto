<?php
require_once 'bootstrap.php';

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

require 'template/base.php';
?>