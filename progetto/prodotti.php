<?php
require_once 'bootstrap.php';

$templateParams["titolo"]="Nuvole di gelato -Vedi Prodotti";
$templateParams["nome"]="vedi_prodotti.php";
$templateParams["gustiMigliori"]=$dbh->getBestGusti();


require 'template/base.php';
?>