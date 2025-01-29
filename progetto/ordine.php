<?php
require_once 'bootstrap.php';

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    try {
        $tipologia = $data["tipologia"];
        $grandezza = $data["grandezza"];
        $gusto1 = $data["gusto1"];
        $gusto2 = $data["gusto2"];
        $gusto3 = isset($data["gusto3"]) ? $data["gusto3"] : null;
        $quantita = $data["quantita"];

        // Chiama la funzione del database
        $result = $dbh->insert_dettaglio_ordine($grandezza, $tipologia, $gusto1, 1, $gusto2, 2, $gusto3, 3, $quantita);

        if ($result) {
            echo json_encode(["success" => true, "message" => "Ordine inserito con successo!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Errore durante l'inserimento dell'ordine."]);
        }
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Dati non validi"]);
}
?>
