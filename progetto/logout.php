<?php
require_once 'bootstrap.php';

logoutUser(); // Funzione per effettuare il logout dell'utente
header("Location: index.php"); // Reindirizza alla homepage
exit();

require 'template/base.php';
?>
