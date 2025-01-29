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

    public function registrazione($nome, $cognome, $numero_cell, $email, $password){
        $punti=0;
        $citta=null;
        $indirizzo=null;
        $query="INSERT INTO clienti (Nome, Cognome, Citta, Indirizzo, Numero_cell, E_mail, Password, Punti_accumulati) VALUES (?,?,?,?,?,?,?,?)";
        $stmt=$this->db->prepare($query);
        $stmt->bind_param('sssssssi',$nome, $cognome, $citta, $indirizzo, $numero_cell, $email, $password, $punti);
        return $stmt->execute();
    }


    //da sistemare con i bind_param
    public function insert_dettaglio_ordine($grandezza, $tipologia, $gusto1, $pallina1, $gusto2, $pallina2, $gusto3, $pallina3, $quantita) {
        try {
            // Avvia una transazione
            $this->db->beginTransaction();
    
            // Aggiorna le scorte per i gusti
            $query = "UPDATE listino_gusti SET Scorte = Scorte - ? WHERE Nome_gusto = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$quantita, $gusto1]);
            $stmt->execute([$quantita, $gusto2]);
    
            if (!empty($gusto3)) {
                $stmt->execute([$quantita, $gusto3]);
            }
    
            // Recupera l'id e il prezzo del prodotto
            $query1 = "SELECT Id_prodotto, Prezzo FROM prodotti WHERE Tipologia_prodotto = ? AND Grandezza = ?";
            $stmt1 = $this->db->prepare($query1);
            $stmt1->execute([$tipologia, $grandezza]);
            $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    
            if ($result1) {
                $idProdotto = $result1['Id_prodotto'];
                $prezzoUnitario = $result1['Prezzo'];
    
                // Inserisci il prodotto ordinato
                $query2 = "INSERT INTO prodotti_ordinati (Id_prodotto) VALUES (?)";
                $stmt2 = $this->db->prepare($query2);
                $stmt2->bind_param('i', $idProdotto);
                $isInserted2 = $stmt2->execute();
    
                if ($isInserted2) {
                    // Recupera l'id del prodotto ordinato
                    $idProdottoOrdinato = $this->db->lastInsertId();
    
                    // Inserisci le opzioni per i gusti
                    $query3 = "INSERT INTO opzioni (Nome_gusto, Id_prodotto_ordinato, Numero_pallina) VALUES (?,?,?)";
                    $stmt3 = $this->db->prepare($query3);
    
                    $success1 = $stmt3->execute([$gusto1, $idProdottoOrdinato, $pallina1]);
                    $success2 = $stmt3->execute([$gusto2, $idProdottoOrdinato, $pallina2]);
                    $success3 = true; // Di default è true, se gusto3 non è presente
    
                    if (!empty($gusto3)) {
                        $success3 = $stmt3->execute([$gusto3, $idProdottoOrdinato, $pallina3]);
                    }
    
                    // Inserisci il dettaglio acquisti solo se tutte le opzioni sono state inserite correttamente
                    if ($success1 && $success2 && $success3) {
                        $prezzoTotale = $quantita * $prezzoUnitario;
                        $query4 = "INSERT INTO dettaglio_acquisti(Id_ordine, Id_prodotto_ordinato, Quantita, PrezzoUnitario, PrezzoTotale) VALUES (?,?,?,?,?)";
                        $stmt4 = $this->db->prepare($query4);    
                        // Id_ordine è impostato a NULL perché sarà aggiornato al pagamento
                        $stmt4->execute([null, $idProdottoOrdinato, $quantita, $prezzoUnitario, $prezzoTotale]);
                        // Conferma la transazione e restituisci true
                        $this->db->commit();
                        return true;
                    } else {
                        throw new Exception("Errore nell'inserimento delle opzioni.");
                    }
                } else {
                    throw new Exception("Errore nell'inserimento del prodotto ordinato.");
                }
            } else {
                throw new Exception("Prodotto non trovato.");
            }
        } catch (Exception $e) {
            // In caso di errore, effettua il rollback della transazione
            $this->db->rollBack();
            throw $e;
        }
    }    
}
?>