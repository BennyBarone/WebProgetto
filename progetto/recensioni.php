<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Nuvole di gelato - Recensioni";
$templateParams["nome"]="vedi_recensioni.php";
$templateParams["tutte_recensioni"]=$dbh->getTutteRecensioni();

require 'template/base.php';
?>