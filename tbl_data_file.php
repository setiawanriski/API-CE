
<?php
class Tbl_data_file{
    // db object
    private $db;
    // Table
    private $db_table = "tbl_data_file";
    // Columns
    public $id;
    public $judul;
    public $nama_file;
    
    // Db dbaction
    public function __construct($db){
        $this->db = $db;
    }

    // GET ALL
    public function getTbl_data_file(){
        $sqlQuery = "SELECT id,judul,nama_file FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // CREATE
    public function createTbl_data_file(){
        // sanitize
            $this->judul=htmlspecialchars(strip_tags($this->judul));
            $this->nama_file=htmlspecialchars(strip_tags($this->nama_file));
            
        $sqlQuery = "INSERT INTO ". $this->db_table ." SET judul = '".$this->judul."',nama_file= '".$this->nama_file."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        } else {
            return false;
        }
        
    }
    

    // FIND
    public function getSingleTbl_data_file(){
        $sqlQuery = "SELECT id,judul,nama_file FROM ". $this->db_table ." WHERE id = '".$this->id."'";
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->id = $dataRow['id'];
        $this->judul = $dataRow['judul'];
        $this->nama_file = $dataRow['nama_file'];
        
    }

    // UPDATE
    public function updateTbl_data_file(){
        $this->judul=htmlspecialchars(strip_tags($this->judul));
        $this->nama_file=htmlspecialchars(strip_tags($this->nama_file));
        $sqlQuery = "UPDATE ". $this->db_table ." SET judul = '".$this->judul."', nama_file = '".$this->nama_file."' WHERE id = ".$this->id;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE
    public function deleteTbl_data_file(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>