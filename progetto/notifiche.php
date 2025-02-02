<?php
require_once 'bootstrap.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Notifiche";
$templateParams["nome"]="vedi_notifiche.php";
$id_cliente = $_SESSION["Id_cliente"];

require 'template/base.php';
?>