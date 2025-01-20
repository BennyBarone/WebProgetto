<?php 
session_start();
define("UPLOAD_DIR", "./upload/"); //crea variabile
//require_once("utils/functions.php"); //include solo una volta il file
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "negozio_gelateria");

?>