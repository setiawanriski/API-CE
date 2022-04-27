
<?php
class Tbl_proker{
    // db object
    private $db;
    // Table
    private $db_table = "tbl_proker";
    // Columns
    public $id;
    public $nama_proker;
    public $stat;
    
    // Db dbaction
    public function __construct($db){
        $this->db = $db;
    }

    // GET ALL
    public function getTbl_proker(){
        $sqlQuery = "SELECT id,nama_proker,stat FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // CREATE
    public function createTbl_proker(){
        // sanitize
            $this->nama_proker=htmlspecialchars(strip_tags($this->nama_proker));
            $this->stat=htmlspecialchars(strip_tags($this->stat));
            
        $sqlQuery = "INSERT INTO ". $this->db_table ." SET nama_proker = '".$this->nama_proker."',stat= '".$this->stat."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        } else {
            return false;
        }
        
    }
    

    // FIND
    public function getSingleTbl_proker(){
        $sqlQuery = "SELECT id,nama_proker,stat FROM ". $this->db_table ." WHERE id = '".$this->id."'";
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->id = $dataRow['id'];
        $this->nama_proker = $dataRow['nama_proker'];
        $this->stat = $dataRow['stat'];
        
    }

    // UPDATE
    public function updateTbl_proker(){
        $this->nama_proker=htmlspecialchars(strip_tags($this->nama_proker));
        $this->stat=htmlspecialchars(strip_tags($this->stat));
        $sqlQuery = "UPDATE ". $this->db_table ." SET nama_proker = '".$this->nama_proker."', stat = '".$this->stat."' WHERE id = ".$this->id;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE
    public function deleteTbl_proker(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>