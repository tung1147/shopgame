<?php	
	
	header("Content-Type: text/html; charset=utf-8");	
	define('NGANLUONG_URL_CARD_POST', 'https://www.nganluong.vn/mobile_card.api.post.v2.php');
	define('NGANLUONG_URL_CARD_SOAP', 'https://nganluong.vn/mobile_card_api.php?wsdl');		
	class Config
	{
		  public static $_FUNCTION = "CardCharge";
		  public static $_VERSION = "2.0";
		  //Thay đổi 3 thông tin ở phía dưới
		  public static $_MERCHANT_ID = "36680";
		  public static $_MERCHANT_PASSWORD = "matkhauketnoi";
		  public static $_EMAIL_RECEIVE_MONEY = "demo@nganluong.vn";
	}
	
?>


	