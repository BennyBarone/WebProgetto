<?php

require_once 'bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Pagamento";
$templateParams["nome"]="vedi_pagamento.php";

require 'template/base.php';
?>