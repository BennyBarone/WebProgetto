<?php
require_once 'bootstrap.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Profilo";
$templateParams["nome"]="vedi_mioprofilo.php";



if (isset($_SESSION["Id_cliente"])) {
    $id_cliente = $_SESSION["Id_cliente"]; // Recupera l'ID dalla sessione
} else {
    die("Errore: ID cliente non definito."); // Blocca l'esecuzione se manca
}


$templateParams["profilo"]=$dbh->mio_profilo($id_cliente);

require 'template/base.php';
?>