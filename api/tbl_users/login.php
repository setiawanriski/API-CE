
<?php
// error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../database.php';
include_once '../../tbl_users.php';
include_once '../../token/token.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$security=getToken();
if (isset($_POST['token'])) {
    $token=$_POST['token'];
    if($token==$security){

        $database = new Database();
        $db = $database->getConnection();
        $item = new Tbl_users($db);
        $item->username = isset($_POST['username']) ? $_POST['username'] : die();
        $item->password = isset($_POST['password']) ? $_POST['password'] : die();
        $item->getLogin();
        if($item->username != null && $item->password != null){

            // create array
            $data = array(
                "id" => $item->id,
                "nama" => $item->nama,
                "username" => $item->username,
                "password" => $item->password,
                "rolename" => $item->rolename,
                "status" => "success",
                "message" => "record found."
            );

            http_response_code(200);
            
        }else{
            $data['status']='empty';
            $data['message']='Data not found.';
            
        }
    } else {
        $data['status']='denied';
        $data['message']='Unauthorize access.';
    }
    echo json_encode($data);
}
?>