<?php
require_once 'bootstrap.php';

$templateParams["titolo"]="Nuvole di gelato -Vedi Prodotti";
$templateParams["nome"]="vedi_prodotti.php";
$templateParams["gustiMigliori"]=$dbh->getBestGusti();
$templateParams["gusti"]=$dbh->getGusti();



require 'template/base.php';
?>