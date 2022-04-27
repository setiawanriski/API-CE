
<?php
class Tbl_users{
    // db object
    private $db;
    // Table
    private $db_table = "tbl_users";
    // Columns
    public $id;
    public $nama;
    public $username;
    public $password;
    public $rolename;
    
    // Db dbaction
    public function __construct($db){
        $this->db = $db;
    }

    // GET ALL
    public function getTbl_users(){
        $sqlQuery = "SELECT id,nama,username,password,rolename FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // CREATE
    public function createTbl_users(){
        // sanitize
            $this->nama=htmlspecialchars(strip_tags($this->nama));
            $this->username=htmlspecialchars(strip_tags($this->username));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->rolename=htmlspecialchars(strip_tags($this->rolename));
            
        $sqlQuery = "INSERT INTO ". $this->db_table ." SET nama = '".$this->nama."',username = '".$this->username."',password = '".$this->password."',rolename= '".$this->rolename."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        } else {
            return false;
        }
        
    }
    

    // FIND
    public function getSingleTbl_users(){
        $sqlQuery = "SELECT id,nama,username,password,rolename FROM ". $this->db_table ." WHERE id = '".$this->id."'";
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->id = $dataRow['id'];
        $this->nama = $dataRow['nama'];
        $this->username = $dataRow['username'];
        $this->password = $dataRow['password'];
        $this->rolename = $dataRow['rolename'];
        
    }

    // UPDATE
    public function updateTbl_users(){
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->rolename=htmlspecialchars(strip_tags($this->rolename));
        $sqlQuery = "UPDATE ". $this->db_table ." SET nama = '".$this->nama."', username = '".$this->username."', password = '".$this->password."', rolename = '".$this->rolename."' WHERE id = ".$this->id;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE
    public function deleteTbl_users(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
    public function getLogin(){
        $pwd=MD5($this->password);
        $sqlQuery = "SELECT * FROM ". $this->db_table ." WHERE `username` = '".$this->username."' AND `password` = '".$pwd."'";
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->id = $dataRow['id'];
        $this->nama = $dataRow['nama'];
        $this->username = $dataRow['username'];
        $this->password = $dataRow['password'];
        $this->rolename = $dataRow['rolename'];
        
    }
}
?>