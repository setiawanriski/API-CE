
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../database.php';
include_once '../../tbl_article.php';
include_once '../../token/token.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$security=getToken();
if (isset($_POST['token'])) {
    $token=$_POST['token'];
    if($token==$security){

        $database = new Database();
        $db = $database->getConnection();
        $item = new Tbl_article($db);
        $item->id_article = isset($_POST['id_article']) ? $_POST['id_article'] : die();
        $item->getSingleTbl_article();
        if($item->id_article != null){

            // create array
            $data = array(
            "id_article" => $item->id_article,
                "title" => $item->title,
                "cover" => $item->cover,
                "content" => $item->content,
                "tgl_upload" => $item->tgl_upload,
                "author" => $item->author,
                "foto" => $item->foto,
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