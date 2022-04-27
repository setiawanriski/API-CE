<?php
if ($_GET) {
	if (isset($_GET['show'])) {
    	print_r(getToken());
	}
}
function getToken(){
    $security=MD5(base64_encode('setiawan.dev' . date('Y-m-d H:i')));
    return $security;
}
function MyToken(){
    $security="'setiawan.dev' . date('Y-m-d H:i')";
    return $security;
}
?>

