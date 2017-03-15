<?php
include ('config.php');
include('includes/lib/nusoap.php');
include('includes/MobiCard.php');


if(isset($_POST['NLNapThe'])){
		$soseri = $_POST['txtSoSeri'];
		$sopin = $_POST['txtSoPin'];
		$type_card = $_POST['select_method'];
		
		
		if ($_POST['txtSoSeri'] == "" ) {
			echo '<script>alert("Vui lòng nhập Số Seri");</script>';
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			exit();
		}
		if ($_POST['txtSoPin'] == "" ) {
			echo '<script>alert("Vui lòng nhập Mã Thẻ");</script>';
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			exit();
		}
		
		 $arytype= array(92=>'VMS',93=>'VNP',107=>'VIETTEL',121=>'VCOIN',120=>'GATE');
	//Tiến hành kết nối thanh toán Thẻ cào.
	          $call = new MobiCard();
			  $rs = new Result();
			  $ref_code ='hoannet123' ;//time();
					
			  $rs = $call->CardPayWebservice($sopin,$soseri,$type_card,$ref_code,"Full name","Mobile","Email");
			  
			  if($rs->error_code == '00') {				
				// Cập nhật data tại đây
				   echo  '<script>alert("Bạn đã nạp thành công '.$rs->card_amount.' vào trong tài khoản.");</script>'; //$total_results;
			   }
			   else {
				   echo  '<script>alert("Lỗi :'.$rs->error_message.'");</script>';
			   }
	
		 //var_dump($rs);
	
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Nap thẻ - Có thêm Vcoin và GATE</title>
<style>
#ttNganluong {
    background: url("includes/images/napthe.png") no-repeat scroll 0 0 transparent;
    border: 0 none;
    cursor: pointer;
    display: inline-block;
    height: 30px;
    margin-right: 5px;
    text-indent: -3000px;
    vertical-align: middle;
    width: 122px;
}
</style>
</head><body>

<form name="napthe" action="#" method="post">
<div id="body12" style="border: 1px solid #444444;  margin: 0 auto;  padding: 10px;  width: 600px;">
<div style="color:#444444;margin-top:10px;font-size:14px" align="center">
	Chọn loại thẻ để nạp
</div>

<table align="center">
	
	<tr>
    	<td colspan="3">
        	<table>
            	<tr>
					<td style="padding-left:0px;padding-top:5px" align="right" ><label for="92"><img  src="includes/images/mobifone.jpg" /></label> </td>
                    <td style="padding-left:10px;padding-top:5px"><label for="93"><img  src="includes/images/vinaphone.jpg" /></label></td>
                     <td style="padding-top:5px;padding-left:5px" align="left"><label for="107"><img  src="includes/images/viettel.jpg" width="110" height="35" /></label></td>
                     <td style="padding-top:5px;padding-left:5px" align="left"><label for="121"><img width="100" height="35" src="includes/images/vtc.jpg"></label> </td>
                     <td style="padding-top:5px;padding-left:5px" align="left"> <label for="120"><img width="100" height="35" src="includes/images/gate.jpg"></label></td>
                </tr>
                <tr>
					<td align="center" style="padding-bottom:0px;">
                        <input type="radio" name="select_method" checked="true" value="VMS" id="92"  />
                    </td>
                    <td align="center" style="padding-bottom:0px;padding-left:5px">
                        <input type="radio"  name="select_method" value="VNP" id="93" />
                    </td>
                     <td align="center" style="padding-bottom:0px;padding-right:0px">
                        <input type="radio"  name="select_method" value="VIETTEL" id="107" />
                    </td>
                    <td align="center" style="padding-right:10px">
						<input type="radio" id="121" value="VCOIN" name="select_method">
					</td>
					
                    <td align="center" style="padding-bottom:0px;padding-right:0px">
                         <input type="radio" id="120" value="GATE" name="select_method">
                    </td>
					
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
        <td align="right" style="padding-bottom:10px">Số Seri :</td>
        <td colspan="2"><input type="text" id="txtSoSeri" name="txtSoSeri" style="height:25px;width:200px" /></td>
    </tr>
     <tr>
        <td align="right">Mã số thẻ : </td>
        <td colspan="2">
        	<input type="text" id="txtSoPin" name="txtSoPin" style="height:25px;width:200px" />
            
        </td>
    </tr>
   
	<tr>
        <td colspan="3" align="center" style="padding-bottom:10px;padding-right:10px">
				<input type="submit" id="ttNganluong" name="NLNapThe" value="Nạp Thẻ"  /> 
		 </td>
    </tr>	
</table>

</div>
</form>
</body></html>
