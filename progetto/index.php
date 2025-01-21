<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Nuvole di gelato - Home";
$templateParams["recensioni"]=$dbh->getRecensioni();

require 'template/base.php';
?>