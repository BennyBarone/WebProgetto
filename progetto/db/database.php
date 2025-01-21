<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    /*public function getRecensioni(){
        $query = $this->db->("SELECT Voto, Suggerimenti FROM recensioni LIMIT 3");
        $stmt= $this->db->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }*/
}

?>