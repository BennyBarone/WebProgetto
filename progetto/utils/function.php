<?php
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}


//La funzione isUserLoggedIn() verifica se l'utente è loggato controllando 
//se la variabile di sessione $_SESSION['idautore'] è impostata e non vuota. 
//Se la variabile di sessione contiene un valore, significa che l'utente è loggato, e la funzione restituisce true.
function isUserLoggedIn(){
    return !empty($_SESSION['idcliente']);
}


//La funzione registerLoggedUser prende come parametro un array $user contenente i dati dell'utente.
//Imposta le variabili di sessione $_SESSION["idautore"], $_SESSION["username"] e $_SESSION["nome"] con i valori corrispondenti dall'array $user.
//Questo registra l'utente come loggato, memorizzando le informazioni dell'utente nella sessione.

function registerLoggedUser($user){
    $_SESSION["idcliente"] = $user["idcliente"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["nome"] = $user["nome"];
}
?>