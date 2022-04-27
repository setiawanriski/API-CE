
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../database.php';
include_once '../../tbl_anggota.php';
include_once '../../token/token.php';

$security=getToken();
if (isset($_POST['token'])) {
    $token=$_POST['token'];
    if($token==$security){
        $database = new Database();
        $db = $database->getConnection();
        $item = new Tbl_anggota($db);
        $item->id = isset($_POST['id']) ? $_POST['id'] : die();
        $item->nama = $_POST['nama'];
        $item->no_anggota = $_POST['no_anggota'];
        $item->lahir = $_POST['lahir'];
        $item->nomer_hp = $_POST['nomer_hp'];
        $item->prodi = $_POST['prodi'];
        $item->alamat = $_POST['alamat'];
        $item->jabatan = $_POST['jabatan'];
        
        if($item->updateTbl_anggota()){
            $data['status']='success';
            $data['message']='Tbl_anggota data updated.';
            
        } else{
            error_reporting(0);
            $data['status']='failed';
            $data['message']='Tbl_anggota Data could not be updated.';
            
        }
        
    } else {
        error_reporting(0);
        $data['status']='denied';
        $data['message']='unauthorize access.';
        
        
    }
    echo json_encode($data);
}
?>