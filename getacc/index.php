<?php
session_start();
ob_start();

    /*
     * @ Code web bán nick LMHT được viết bởi Hậu Nguyễn
     *
     * @ Liên hệ: 01652494946 (chỉ sms) nếu gặp lỗi.
     *
     */

	require('../haunguyen_hethong/function.php');
/*
if(isset($_POST['id'])) {
    $id = $_POST['id'];
} else if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
*/
// biến
$id = $_POST['id'];
$get = mysql_fetch_array(mysql_query("SELECT * FROM `Danhsachacc` WHERE `id` = '{$id}' LIMIT 1"));
$name = $get['username'];
$pwd = $get['password'];
$vnd = $get['vnd'];
$id_user = $_SESSION['FBID'];

if(empty($_SESSION['FBID'])){
echo'{"err":1,"msg":"Bạn chưa đăng nhập"}';
exit;
}elseif(kiemtra('Danhsachacc',"`id` = '$id'")==0){
echo'{"err":1,"msg":"Tài khoản này không có trong hệ thống của chúng tôi."}';
exit;
}elseif(kiemtra('Danhsachacc',"`status` = '1' AND `id` = '$id'") > 0){
echo'{"err":1,"msg":"Tài khoản này đã được mua bởi người khác."}';
exit;
}elseif(get_vnd($_SESSION['FBID']) < $get['vnd']){
echo'{"err":1,"msg":"Bạn không có đủ tiền, hãy nạp thêm."}';
exit;
}else{
echo'{"err":0,"msg":"Mua thành công, hãy xem lịch sử giao dịch"}';
updatestatus($id);
updatelog($name,$pwd,$vnd,$id_user,$id);

// trừ tiền
//mysql_query("UPDATE Users SET `vnd` = `vnd` - $vnd where Fuid = '$id_user'");
mysql_query("update `Users` set `vnd` = `vnd` - $vnd where `Fuid` = $id_user");

}
?>