<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define("UPLOAD_DIR", "./upload/"); //crea variabile
require_once("utils/function.php"); //include solo una volta il file
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "negozio_gelateria");

?>