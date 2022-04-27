
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../database.php';
include_once '../../tbl_proker.php';
include_once '../../token/token.php';
$security=getToken();
if (isset($_POST['token'])) {
    $token=$_POST['token'];
    if($token==$security){

        $database = new Database();
        $db = $database->getConnection();
        $items = new Tbl_proker($db);
        $records = $items->getTbl_proker();
        $itemCount = $records->num_rows;
        
        $data = array();
        if($itemCount > 0){
            
            $data["body"] = array();
            $data["itemCount"] = $itemCount;
            while ($row = $records->fetch_assoc())
            {
            array_push($data["body"], $row);
            }
            $data['status']='success';
            $data['message']='Records found.';
        }else{
            error_reporting(0);
            http_response_code(404);
            $data['status']='empty';
            $data['message']='No records found.';
            
        }
    } else {
        error_reporting(0);
        $data['status']='denied';
        $data['message']='Unauthorize access.';
    }

    $jsondata= json_encode($data);
    echo $jsondata;
}
?>