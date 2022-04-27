
<?php
class Tbl_anggota{
    // db object
    private $db;
    // Table
    private $db_table = "tbl_anggota";
    // Columns
    public $id;
    public $nama;
    public $no_anggota;
    public $lahir;
    public $nomer_hp;
    public $prodi;
    public $alamat;
    public $jabatan;
    
    // Db dbaction
    public function __construct($db){
        $this->db = $db;
    }

    // GET ALL
    public function getTbl_anggota(){
        $sqlQuery = "SELECT id,nama,no_anggota,lahir,nomer_hp,prodi,alamat,jabatan FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // CREATE
    public function createTbl_anggota(){
        // sanitize
            $this->nama=htmlspecialchars(strip_tags($this->nama));
            $this->no_anggota=htmlspecialchars(strip_tags($this->no_anggota));
            $this->lahir=htmlspecialchars(strip_tags($this->lahir));
            $this->nomer_hp=htmlspecialchars(strip_tags($this->nomer_hp));
            $this->prodi=htmlspecialchars(strip_tags($this->prodi));
            $this->alamat=htmlspecialchars(strip_tags($this->alamat));
            $this->jabatan=htmlspecialchars(strip_tags($this->jabatan));
            
        $sqlQuery = "INSERT INTO ". $this->db_table ." SET nama = '".$this->nama."',no_anggota = '".$this->no_anggota."',lahir = '".$this->lahir."',nomer_hp = '".$this->nomer_hp."',prodi = '".$this->prodi."',alamat = '".$this->alamat."',jabatan= '".$this->jabatan."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        } else {
            return false;
        }
        
    }
    

    // FIND
    public function getSingleTbl_anggota(){
        $sqlQuery = "SELECT id,nama,no_anggota,lahir,nomer_hp,prodi,alamat,jabatan FROM ". $this->db_table ." WHERE no_anggota = '".$this->no_anggota."'";
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->id = $dataRow['id'];
        $this->nama = $dataRow['nama'];
        $this->no_anggota = $dataRow['no_anggota'];
        $this->lahir = $dataRow['lahir'];
        $this->nomer_hp = $dataRow['nomer_hp'];
        $this->prodi = $dataRow['prodi'];
        $this->alamat = $dataRow['alamat'];
        $this->jabatan = $dataRow['jabatan'];
        
    }

    // UPDATE
    public function updateTbl_anggota(){
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->no_anggota=htmlspecialchars(strip_tags($this->no_anggota));
        $this->lahir=htmlspecialchars(strip_tags($this->lahir));
        $this->nomer_hp=htmlspecialchars(strip_tags($this->nomer_hp));
        $this->prodi=htmlspecialchars(strip_tags($this->prodi));
        $this->alamat=htmlspecialchars(strip_tags($this->alamat));
        $this->jabatan=htmlspecialchars(strip_tags($this->jabatan));
        $sqlQuery = "UPDATE ". $this->db_table ." SET nama = '".$this->nama."', no_anggota = '".$this->no_anggota."', lahir = '".$this->lahir."', nomer_hp = '".$this->nomer_hp."', prodi = '".$this->prodi."', alamat = '".$this->alamat."', jabatan = '".$this->jabatan."' WHERE id = ".$this->id;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE
    public function deleteTbl_anggota(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>