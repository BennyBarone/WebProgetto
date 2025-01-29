<?php
require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Home";
$templateParams["nome"]="home.php";
$templateParams["recensioni"]=$dbh->getRecensioni();

require 'template/base.php';
?>