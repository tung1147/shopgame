<?php

    /*
     * @ Code web bán nick LMHT được viết bởi Hậu Nguyễn
     *
     * @ Liên hệ: 01652494946 (chỉ sms) nếu gặp lỗi.
     *
     */

	require 'haunguyen_hethong/dbconfig.php';

	$id = $_GET['id'];
	$type = $_POST['type'];

	$tmp_file = $_FILES['image']['tmp_name'];
	$filename = rand(1000,100000)."-".$_FILES['image']['name'];
	move_uploaded_file($tmp_file, 'assets/upload/'. $filename);
	// thêm vào sql
	if($_FILES['image']['name'] != ""){
	$query = "INSERT INTO image_acc (id_acc,patch,name,time,type) VALUES ('".$id."','assets/upload/','".$filename."','".time()."','".$type."')";
	mysql_query($query);
	}
?>