
<?php
class Tbl_article{
    // db object
    private $db;
    // Table
    private $db_table = "tbl_article";
    // Columns
    public $id_article;
    public $title;
    public $cover;
    public $content;
    public $tgl_upload;
    public $author;
    public $foto;
    
    // Db dbaction
    public function __construct($db){
        $this->db = $db;
    }

    // GET ALL
    public function getTbl_article(){
        $sqlQuery = "SELECT id_article,title,cover,content,tgl_upload,author,foto FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // CREATE
    public function createTbl_article(){
        // sanitize
            $this->title=htmlspecialchars(strip_tags($this->title));
            $this->cover=htmlspecialchars(strip_tags($this->cover));
            $this->content=htmlspecialchars(strip_tags($this->content));
            $this->tgl_upload=htmlspecialchars(strip_tags($this->tgl_upload));
            $this->author=htmlspecialchars(strip_tags($this->author));
            $this->foto=htmlspecialchars(strip_tags($this->foto));
            
        $sqlQuery = "INSERT INTO ". $this->db_table ." SET title = '".$this->title."',cover = '".$this->cover."',content = '".$this->content."',tgl_upload = '".$this->tgl_upload."',author = '".$this->author."',foto= '".$this->foto."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        } else {
            return false;
        }
        
    }
    

    // FIND
    public function getSingleTbl_article(){
        $sqlQuery = "SELECT id_article,title,cover,content,tgl_upload,author,foto FROM ". $this->db_table ." WHERE id_article = '".$this->id_article."'";
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->id_article = $dataRow['id_article'];
        $this->title = $dataRow['title'];
        $this->cover = $dataRow['cover'];
        $this->content = $dataRow['content'];
        $this->tgl_upload = $dataRow['tgl_upload'];
        $this->author = $dataRow['author'];
        $this->foto = $dataRow['foto'];
        
    }

    // UPDATE
    public function updateTbl_article(){
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->cover=htmlspecialchars(strip_tags($this->cover));
        $this->content=htmlspecialchars(strip_tags($this->content));
        $this->tgl_upload=htmlspecialchars(strip_tags($this->tgl_upload));
        $this->author=htmlspecialchars(strip_tags($this->author));
        $this->foto=htmlspecialchars(strip_tags($this->foto));
        $sqlQuery = "UPDATE ". $this->db_table ." SET title = '".$this->title."', cover = '".$this->cover."', content = '".$this->content."', tgl_upload = '".$this->tgl_upload."', author = '".$this->author."', foto = '".$this->foto."' WHERE id_article = ".$this->id_article;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE
    public function deleteTbl_article(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id_article = ".$this->id_article;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>