
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../database.php';
include_once '../../tbl_kas.php';
include_once '../../token/token.php';

$security=getToken();
if (isset($_POST['token'])) {
    $token=$_POST['token'];
    if($token==$security){

        $database = new Database();
        $db = $database->getConnection();
        $item = new Tbl_kas($db);
    $item->bulan = $_POST['bulan'];
    $item->jumlah_kas = $_POST['jumlah_kas'];
    
        if($item->createTbl_kas()){

            $data['status']="success";
            $data['message']= "Tbl_kas data created successfully.";
        
        } else{
            error_reporting(0);

            $data['status']="failed";
            $data['message']="Tbl_kas data not created.";
        }
    } else {
        error_reporting(0);

        $data['status']="denied";
        $data['message']="Unauthorize access.";

    }
    echo json_encode($data);
}
?>


