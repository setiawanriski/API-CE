
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../database.php';
include_once '../../tbl_anggota.php';
include_once '../../token/token.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$security=getToken();
if (isset($_POST['token'])) {
    $token=$_POST['token'];
    if($token==$security){

        $database = new Database();
        $db = $database->getConnection();
        $item = new Tbl_anggota($db);
        $item->no_anggota = isset($_POST['no_anggota']) ? $_POST['no_anggota'] : die();
        $item->getSingleTbl_anggota();
        if($item->no_anggota != null){

            // create array
            $data = array(
            "id" => $item->id,
                "nama" => $item->nama,
                "no_anggota" => $item->no_anggota,
                "lahir" => $item->lahir,
                "nomer_hp" => $item->nomer_hp,
                "prodi" => $item->prodi,
                "alamat" => $item->alamat,
                "jabatan" => $item->jabatan,
                "status" => "success",
                "message" => "record found."
            );

            http_response_code(200);
        
        }else{
            error_reporting(0);
            
            $data['status']='empty';
            $data['message']='Data not found.';
            
        }
    } else {
        error_reporting(0);
        $data['status']='denied';
        $data['message']='Unauthorize access.';
    }
    echo json_encode($data);
}
?>