
<?php
class Tbl_ketum{
    // db object
    private $db;
    // Table
    private $db_table = "tbl_ketum";
    // Columns
    public $id;
    public $visi;
    public $misi;
    
    // Db dbaction
    public function __construct($db){
        $this->db = $db;
    }

    // GET ALL
    public function getTbl_ketum(){
        $sqlQuery = "SELECT id,visi,misi FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // CREATE
    public function createTbl_ketum(){
        // sanitize
            $this->visi=htmlspecialchars(strip_tags($this->visi));
            $this->misi=htmlspecialchars(strip_tags($this->misi));
            
        $sqlQuery = "INSERT INTO ". $this->db_table ." SET visi = '".$this->visi."',misi= '".$this->misi."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        } else {
            return false;
        }
        
    }
    

    // FIND
    public function getSingleTbl_ketum(){
        $sqlQuery = "SELECT id,visi,misi FROM ". $this->db_table ." WHERE id = '".$this->id."'";
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->id = $dataRow['id'];
        $this->visi = $dataRow['visi'];
        $this->misi = $dataRow['misi'];
        
    }

    // UPDATE
    public function updateTbl_ketum(){
        $this->visi=htmlspecialchars(strip_tags($this->visi));
        $this->misi=htmlspecialchars(strip_tags($this->misi));
        $sqlQuery = "UPDATE ". $this->db_table ." SET visi = '".$this->visi."', misi = '".$this->misi."' WHERE id = ".$this->id;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE
    public function deleteTbl_ketum(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>