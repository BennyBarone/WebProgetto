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
        $dbh->insert_notifica($id_cliente,"Password Aggiornata", "Hai modificato la tua password con successo! Per il prossimo accesso però non dimenticarla... o senza gelato sarai!!");
    }

    if (isset($_POST['voto']) && isset($_POST['commento'])) {
        $valutazione = $_POST['voto'];
        $commento = $_POST['commento'];
        $dbh->insert_recensione($id_cliente, $valutazione, $commento);
        $dbh->insert_notifica($id_cliente, "Recensione inviata", "La tua recensione è stata inviata con successo. Il tuo feedback per noi è sempre molto importante perchè ci aiuta a migliorare. Grazie");
    }
}

require 'template/base.php';
?>