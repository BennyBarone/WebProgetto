<?php
require_once 'bootstrap.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Profilo";
$templateParams["nome"]="vedi_mioprofilo.php";
$id_cliente = $_SESSION["Id_cliente"];
$templateParams["mio_profilo"]=$dbh->mio_profilo($id_cliente);

require 'template/base.php';
?>