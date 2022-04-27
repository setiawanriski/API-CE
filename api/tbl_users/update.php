
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../database.php';
include_once '../../tbl_users.php';
include_once '../../token/token.php';

$security=getToken();
if (isset($_POST['token'])) {
    $token=$_POST['token'];
    if($token==$security){
        $database = new Database();
        $db = $database->getConnection();
        $item = new Tbl_users($db);
        $item->id = isset($_POST['id']) ? $_POST['id'] : die();
        $item->nama = $_POST['nama'];
        $item->username = $_POST['username'];
        $item->password = $_POST['password'];
        $item->rolename = $_POST['rolename'];
        
        if($item->updateTbl_users()){
            $data['status']='success';
            $data['message']='Tbl_users data updated.';
            
        } else{
            error_reporting(0);
            $data['status']='failed';
            $data['message']='Tbl_users Data could not be updated.';
            
        }
        
    } else {
        error_reporting(0);
        $data['status']='denied';
        $data['message']='unauthorize access.';
        
        
    }
    echo json_encode($data);
}
?>