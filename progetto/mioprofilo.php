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
      $_SESSION["password_section_open"] = true;
    $password1=$_POST["nuova_password"];
    $password2=$_POST["conferma_nuova_password"];
    $errore = false;

    if($password1!==$password2){
        $errore=true;
        $templateParams["erroreRegister"] = "Le password non coincidono";
    }

    if (!$errore) {
        $dbh->nuova_password($password1,$id_cliente);
        $templateParams["successo"] = "Password cambiata con successo!";
        
    }

}


require 'template/base.php';
?>