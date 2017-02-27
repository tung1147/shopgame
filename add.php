<?php
session_start();
ob_start();
define("TPATH","/gameshop/src");

    /*
     * @ Code web bán nick LMHT được viết bởi Hậu Nguyễn
     *
     * @ Liên hệ: 01652494946 (chỉ sms) nếu gặp lỗi.
     *
     */
	# Tiêu đề trang 
        $headtitle = 'Không có tiêu đề';
	
	# Import Hệ thống
	require('haunguyen_hethong/function.php');

$name = $_POST['name'];
$pwd = $_POST['pwd'];
$rank = $_POST['rank'];
$vnd = $_POST['vnd'];
$type = $_POST['type'];
$rank = $_POST['rank'];
$tuong = $_POST['sotuong'];
$skin = $_POST['soskin'];

if(isset($_POST['addaccount'])){
if(kiemtra('Danhsachacc',"`username` = '$name'")>0){
echo'<div class="alert alert-danger">
  <strong>Lỗi!</strong> có một tài khoản đã tồn tại trong hệ thống, hãy kiểm tra lại.
</div>';
exit;
}elseif(empty($name) xor empty($pwd) xor empty($rank)){
echo'<div class="alert alert-danger">
  <strong>Lỗi!</strong> vui lòng nhập đầy đủ thông tin.
</div>';
exit;
}

addnick($name,$pwd,$vnd,$rank,$type,$skin,$tuong); // add to CSDL
/*echo'<div class="alert alert-success">
  <strong>Success!</strong> Thao tác thành công, sẽ chuyễn sang trang thêm thông tin sau 5s
</div>';*/
}

?>