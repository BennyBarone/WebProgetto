<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Recensioni";
$templateParams["nome"]="vedi_recensioni.php";
$templateParams["tutte_recensioni"]=$dbh->getTutteRecensioni();

require 'template/base.php';
?>