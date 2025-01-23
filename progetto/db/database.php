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
}

?>