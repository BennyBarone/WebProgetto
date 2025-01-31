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

    public function getTutteRecensioni(){
        $query="SELECT Voto, Suggerimenti FROM recensioni ORDER BY RAND()";
        $stmt=$this->db->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();

        return $result -> fetch_all(MYSQLI_ASSOC);
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

    public function check_email($email){
        $query = "SELECT E_mail FROM clienti WHERE E_mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result(); // Memorizzo il risultato
        return $stmt->num_rows > 0; // Restituisco true se esiste almeno una riga
    }

    public function checkLogin($email, $password){
        $query = "SELECT Id_cliente, E_mail, Nome FROM clienti WHERE E_mail = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    } 

    public function inizio_ordine($id_cliente) {
        $query0 = "INSERT INTO ordini (Id_cliente, Id_fattura, Id_spedizione, Data_effettuazione, Stato_ordine, Prezzo_finale) VALUES (?,?,?,?,?,?)";
        $id_fattura = null;
        $id_spedizione = null;
        $data = date('Y-m-d'); // Formato: 2025-01-30
        $stato = "in corso";
        $prezzo_finale = 0;
        $stmt0 = $this->db->prepare($query0);
        $stmt0->bind_param('iiissd', $id_cliente, $id_fattura, $id_spedizione, $data, $stato, $prezzo_finale);
        if ($stmt0->execute()) {
            // Restituisci l'ID dell'ordine appena creato
            return $this->db->insert_id;
        }
        return false;
    }
    
    
    public function insert_dettaglio_ordine($id_ordine, $grandezza, $tipologia, $gusto1, $pallina1, $gusto2, $pallina2, $gusto3, $pallina3, $quantita) {
        try {
            // Disabilita l'autocommit
            $this->db->autocommit(false);
    
                // Aggiorno le scorte dei gusti
                $query = "UPDATE listino_gusti SET Scorte = Scorte - ? WHERE Nome_gusto = ?";
                $stmt = $this->db->prepare($query);
                $stmt->bind_param('is', $quantita, $gusto1);
                $succ1 = $stmt->execute();
                $stmt->bind_param('is', $quantita, $gusto2);
                $succ2 = $stmt->execute();
                $succ3 = true;
    
                if (!empty($gusto3)) {
                    $stmt->bind_param('is', $quantita, $gusto3);
                    $succ3 = $stmt->execute();
                }
    
                if ($succ1 && $succ2 && $succ3) {
                    // Recupero id del prodotto e prezzo
                    $query1 = "SELECT Id_prodotto, Prezzo FROM prodotti WHERE Tipologia_prodotto = ? AND Grandezza = ?";
                    $stmt1 = $this->db->prepare($query1);
                    $stmt1->bind_param('ss', $tipologia, $grandezza);
                    $stmt1->execute();
                    $result1 = $stmt1->get_result()->fetch_assoc();
    
                    if ($result1) {
                        $idProdotto = $result1['Id_prodotto'];
                        $prezzoUnitario = $result1['Prezzo'];
    
                        $query2 = "INSERT INTO prodotti_ordinati (Id_prodotto) VALUES (?)";
                        $stmt2 = $this->db->prepare($query2);
                        $stmt2->bind_param('i', $idProdotto);
                        $isInserted2 = $stmt2->execute();
    
                        if ($isInserted2) {
                            // Recupera l'id del prodotto ordinato
                            $idProdottoOrdinato = $this->db->insert_id;
    
                            // Inserisci le opzioni per i gusti
                            $query3 = "INSERT INTO opzioni (Nome_gusto, Id_prodotto_ordinato, Numero_pallina) VALUES (?,?,?)";
                            $stmt3 = $this->db->prepare($query3);
                            $stmt3->bind_param('sii', $gusto1, $idProdottoOrdinato, $pallina1);
                            $success1 = $stmt3->execute();
                            $stmt3->bind_param('sii', $gusto2, $idProdottoOrdinato, $pallina2);
                            $success2 = $stmt3->execute();
                            $success3 = true; // Di default è true, se gusto3 non è presente
    
                            if (!empty($gusto3)) {
                                $stmt3->bind_param('sii', $gusto3, $idProdottoOrdinato, $pallina3);
                                $success3 = $stmt3->execute();
                            }
    
                            if ($success1 && $success2 && $success3) {
                                $prezzoTotale = $quantita * $prezzoUnitario;
                                $query4 = "INSERT INTO dettaglio_acquisti(Id_ordine, Id_prodotto_ordinato, Quantita, PrezzoUnitario, PrezzoTotale) VALUES (?,?,?,?,?)";
                                $stmt4 = $this->db->prepare($query4);
                                $stmt4->bind_param('iiidd', $id_ordine, $idProdottoOrdinato, $quantita, $prezzoUnitario, $prezzoTotale);
                                $isInserted4 = $stmt4->execute();
    
                                if ($isInserted4) {
                                    // Commit della transazione
                                    $this->db->commit();
                                    return true;
                                }
                            }
                        }
                    }
                }
    
            // In caso di errore, effettua il rollback della transazione
            $this->db->rollback();
            return false;
        } catch (Exception $e) {
            // In caso di errore, effettua il rollback della transazione
            $this->db->rollback();
            throw $e;
        } finally {
            // Riabilita l'autocommit
            $this->db->autocommit(true);
        }
    }

    public function riepilogo_ordine($id_ordine){
        $query="SELECT Tipologia_prodotto, Grandezza, Gusto, Quantita, PrezzoUnitario, PrezzoTotale FROM prodotti_ordinati_estesi WHERE Id_ordine = ?";
        $stmt= $this->db->prepare($query);
        $stmt->bind_param('i', $id_ordine);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function rimuovi_prodotto($id_ordine, $tipologia, $grandezza, $gusti, $prezzo_unitario, $prezzo_totale){
        $query="SELECT Id_prodotto_ordinato FROM prodotti_ordinati_estesi WHERE Id_ordine= ? AND Tipologia_prodotto = ? AND Grandezza= ? AND Gusti = ?";
        $stmt= $this->db->prepare($query);
        $stmt->bind_param('isss', $id_ordine, $tipologia, $grandezza, $gusti);
        $stmt->execute;
        $result= $stmt->get_result()->fetch_assoc();

        if($result){
            $id_prodotto_ordinato= $result['Id_prodotto_ordinato'];
            //dovrebbe automaticamente togliersi anche da dettaglio_acquisti perchè collegato con delete on cascade
            $query1="DELETE FROM prodotti_ordinati WHERE Id_prodotto_ordinato= ? ";
        }
    }
}    
?>