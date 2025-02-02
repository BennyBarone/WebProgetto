<?php
require_once 'bootstrap.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Notifiche";
$templateParams["nome"]="vedi_notifiche.php";
$id_cliente = $_SESSION["Id_cliente"];

$templateParams["mostra_notifiche"]=$dbh->mostra_notifiche($id_cliente);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_notifica"])) {
        $id_notifica = intval($_POST["id_notifica"]);
        
        if (isset($_POST["azione"]) && $_POST["azione"] === "elimina") {
            $dbh->elimina_notifica($id_notifica);
        } else {
            $dbh->modifica_Statonotifica($id_notifica);
        }

        // Reindirizza alla pagina delle notifiche
        header("Location: notifiche.php");
        exit();
    }
}

require 'template/base.php';
?>