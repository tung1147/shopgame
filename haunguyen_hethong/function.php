<?php
// Turn off all error reporting
//error_reporting(0);

require 'dbconfig.php';
// check user
	function checkuser($fuid,$ffname,$femail){
    	$check = mysql_query("select * from Users where Fuid='$fuid'");
		$check = mysql_num_rows($check);
		if (empty($check)) { // if new user . Insert a new record		
		$query = "INSERT INTO Users (Fuid,Ffname,Femail) VALUES ('$fuid','$ffname','$femail')";
		mysql_query($query);	
		} else {   // If Returned user . update the user record		
		$query = "UPDATE Users SET Ffname='$ffname', Femail='$femail' where Fuid='$fuid'";
		mysql_query($query);
		}
	}

	function addnick($name,$pwd,$vnd,$rank,$type,$skin,$tuong){		
		$query = "INSERT INTO Danhsachacc (username,password,vnd,rank,type,time,skin,tuong) VALUES ('$name','$pwd','$vnd','$rank','$type','".time()."','$skin','$tuong')";
		mysql_query($query);
		$loadid = mysql_insert_id();
		header('Location: /acc/?id='.$loadid.'');
		}


function timeout($gio){
$time = time();
$jun = floor(($time-$gio)/60);
if($jun<1){$jun="Vừa xong";}
if($jun>=1 && $jun<60){$jun="$jun phút";}
if($jun>=60){$phut1=$jun; $jun=floor($jun/60); $phut2=($phut1-($jun*60)); $jun="$jun giờ $phut2 phút";}
return $jun;
}

// truy xuat du lieu user

function updatestatus($id){
		$query = "UPDATE Danhsachacc SET status='1' where id='$id'";
		mysql_query($query);
}

function updatelog($name,$pwd,$vnd,$id_user,$idacc){
		$query = "INSERT INTO giaodich (username,password,vnd,time,id_user,id_acc) VALUES ('$name','$pwd','$vnd','".time()."','$id_user','$idacc')";
		mysql_query($query);
}

function kiemtra($table, $malenh){
	$echo = mysql_result(mysql_query("SELECT COUNT(*) FROM `$table` WHERE $malenh"), 0);
	return $echo;
}

function vnd($id){
	$id = mysql_fetch_array(mysql_query("SELECT * FROM `Users` WHERE `Fuid` = '$id' LIMIT 1"));
	return number_format($id['vnd']);
}

function get_vnd($id){
	$id = mysql_fetch_array(mysql_query("SELECT * FROM `Users` WHERE `Fuid` = '$id' LIMIT 1"));
	return $id['vnd'];
}

function admin($id){
	$id = mysql_fetch_array(mysql_query("SELECT * FROM `Users` WHERE `admin` >= '0' AND `Fuid` ='{$id}' LIMIT 1"));
	return $id['admin'];
}

function reurl($text) {
$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
$text = preg_replace("/(đ)/", 'd', $text);
$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
$text = preg_replace("/(Đ)/", 'D', $text);
$text = preg_replace('/[^A-z0-9]/','-',$text);
$text = preg_replace('/-{2,}/','-',$text);
$text=str_replace("[","",$text);
$text=str_replace("]","",$text);
$text=str_replace("_","-",$text);
$text=str_replace("^","-", $text);
$text=str_replace("--","-", $text);
$text= trim($text,'-');
$text= strtolower($text);
return $text;
}
?>