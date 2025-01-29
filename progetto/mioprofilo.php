<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Nuvole di gelato - Prfilo";
$templateParams["nome"]="vedi_mioprofilo.php";
$templateParams["recensioni"]=$dbh->getRecensioni();

require 'template/base.php';
?>