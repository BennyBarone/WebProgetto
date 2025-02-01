<?php
require_once 'bootstrap.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$templateParams["titolo"] = "Nuvole di gelato - Profilo";
$templateParams["nome"]="vedi_mioprofilo.php";
$id_cliente = $_SESSION["Id_cliente"];
$templateParams["mio_profilo"]=$dbh->mio_profilo($id_cliente);

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    if (isset($_POST["nuova_password"])) {
        $password1 = $_POST["nuova_password"];
        $dbh->nuova_password($password1, $id_cliente);
    }

    if (isset($_POST['voto']) && isset($_POST['commento'])) {
        $valutazione = $_POST['voto'];
        $commento = $_POST['commento'];
        $dbh->insert_recensione($id_cliente, $valutazione, $commento);
    }
}

require 'template/base.php';
?>