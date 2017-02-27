<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start();
define("TPATH","/gameshop/src");


    /*
     * @ Code web bán nick LMHT được viết bởi Hậu Nguyễn
     *
     * @ Liên hệ: 01652494946 (chỉ sms) nếu gặp lỗi.
     *
     */
	# Tiêu đề trang 
        $headtitle = 'Bán Acc LMHT';
	
	# Import Hệ thống
	require('haunguyen_hethong/function.php');
	require('haunguyen_hethong/head.php');
	require('haunguyen_main/danhsach_taikhoanlmht.php');
	require('haunguyen_hethong/foot.php');
?>
