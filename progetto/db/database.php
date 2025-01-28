<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function getRecensioni(){
        $query = "SELECT Voto, Suggerimenti FROM recensioni ORDER BY RAND() LIMIT 3";
        $stmt= $this->db->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getBestGusti(){
        $query= "SELECT g.Nome_gusto, SUM(g.Quantita) as quantita_venduta FROM gusti_con_quantita g GROUP BY g.Nome_gusto ORDER BY quantita_venduta DESC LIMIT 4";
        $stmt= $this->db->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getGusti(){
        $query=" SELECT l.Nome_gusto FROM listino_gusti l LEFT JOIN (SELECT g.Nome_gusto FROM gusti_con_quantita g GROUP BY g.Nome_gusto ORDER BY SUM(g.Quantita) DESC LIMIT 4) AS top_gusti
        ON l.Nome_gusto = top_gusti.Nome_gusto WHERE top_gusti.Nome_gusto IS NULL";
        $stmt= $this->db->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProdotti(){
        $query="SELECT Tipologia_prodotto, Grandezza, Prezzo FROM prodotti";
        $stmt= $this->db->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProdottiByTipo($filtro){
        $query="SELECT Tipologia_prodotto, Grandezza, Prezzo FROM prodotti WHERE Tipologia_prodotto = ?";
        $stmt= $this->db->prepare($query);
        $stmt->execute([$filtro]);
        $result=$stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getListaGusti(){
        $query="SELECT Nome_gusto FROM listino_gusti WHERE Scorte > 0";
        $stmt=$this->db->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function dettaglio_ordine($grandezza, $tipologia, $gusto1, $pallina1, $gusto2, $pallina2, $gusto3, $pallina3, $quantita){
        
        $this->db->beginTransaction();

        $query="UPDATE listino_gusti SET Scorte = Scorte - ? WHERE Nome_gusto=?";
        $stmt=$this->db->prepare($query);
        $stmt->execute([$quantita], [$gusto1]);
        $stmt->execute([$quantita], [$gusto2]);
        
        if(!empty($gusto3)){
            $stmt->execute([$quantita], [$gusto3]);
        }

        $query1="SELECT Id_prodotto, Prezzo FROM prodotti WHERE Tipologia_prodotto = ? AND Grandezza = ?";
        $stmt1=$this->db->prepare($query1);
        $stmt2->execute([$tipologia], [grandezza]);
        $result1=$stmt1->fetch(PDO::FETCH_ASSOC);

        if ($result1) {
        //prendo l'id_prodotto dalla query1 che mi serve per la query2
        $idProdotto = $result1['Id_prodotto'];
        $prezzoUnitario = $result1['Prezzo'];

        $query2 = "INSERT INTO prodotti_ordinati (Id_prodotto) VALUES (?)";
        $stmt2 = $this->db->prepare($query2);
        $isInserted2 = $stmt2->execute([$idProdotto]);

        // Controlla se la seconda query è andata a buon fine
        if ($isInserted2) {
            $idProdottoOrdinato = $this->db->lastInsertId();
        
            $query3 = "INSERT INTO opzioni (Nome_gusto, Id_prodotto_ordinato, Numero_pallina) VALUES (?,?,?)";
            $stmt3 = $this->db->prepare($query3);
            $success1 = $stmt3->execute([$gusto1, $idProdottoOrdinato, $pallina1]);
            $success2 = $stmt3->execute([$gusto2, $idProdottoOrdinato, $pallina2]);
            // Esegui query3 per gusto3 (se fornito)
            $success3 = true; // Valore di default se gusto3 non esiste
            if (!empty($gusto3)) {
                $success3 = $stmt3->execute([$gusto3, $idProdottoOrdinato, $pallina3]);
            }
            //id_ordine devo renderlo null nel database e si inserisce solo al momento del pagamento quando l'utente è loggato
            if ($success1 && $success2 && $success3) {
                $query4 = "INSERT INTO DETTAGLIO_ACQUISTI (Id_ordine, Id_prodotto_ordinato, Quantita, PrezzoUnitario, PrezzoTotale) VALUES (?,?,?,?,?)";
                $stmt4 = $this->db->prepare($query4);
                $prezzoTotale = $quantita * $prezzoUnitario;
                $stmt4->execute([$id_ordine, $idProdottoOrdinato, $quantita, $prezzoUnitario, $prezzoTotale]);
            }
        }       
    }
        $this->db->commit();
    }
}

?>