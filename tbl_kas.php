
<?php
class Tbl_kas{
    // db object
    private $db;
    // Table
    private $db_table = "tbl_kas";
    // Columns
    public $id;
    public $bulan;
    public $jumlah_kas;
    
    // Db dbaction
    public function __construct($db){
        $this->db = $db;
    }

    // GET ALL
    public function getTbl_kas(){
        $sqlQuery = "SELECT id,bulan,jumlah_kas FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // CREATE
    public function createTbl_kas(){
        // sanitize
            $this->bulan=htmlspecialchars(strip_tags($this->bulan));
            $this->jumlah_kas=htmlspecialchars(strip_tags($this->jumlah_kas));
            
        $sqlQuery = "INSERT INTO ". $this->db_table ." SET bulan = '".$this->bulan."',jumlah_kas= '".$this->jumlah_kas."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        } else {
            return false;
        }
        
    }
    

    // FIND
    public function getSingleTbl_kas(){
        $sqlQuery = "SELECT id,bulan,jumlah_kas FROM ". $this->db_table ." WHERE id = '".$this->id."'";
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->id = $dataRow['id'];
        $this->bulan = $dataRow['bulan'];
        $this->jumlah_kas = $dataRow['jumlah_kas'];
        
    }

    // UPDATE
    public function updateTbl_kas(){
        $this->bulan=htmlspecialchars(strip_tags($this->bulan));
        $this->jumlah_kas=htmlspecialchars(strip_tags($this->jumlah_kas));
        $sqlQuery = "UPDATE ". $this->db_table ." SET bulan = '".$this->bulan."', jumlah_kas = '".$this->jumlah_kas."' WHERE id = ".$this->id;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE
    public function deleteTbl_kas(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>