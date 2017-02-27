<?php
session_start();
define("TPATH","/gameshop/src");
ob_start();

    /*
     * @ Code web bán nick LMHT được viết bởi Hậu Nguyễn
     *
     * @ Liên hệ: 01652494946 (chỉ sms) nếu gặp lỗi.
     *
     */

	require('../haunguyen_hethong/function.php');

$id = $_GET['id'];
$get = mysql_fetch_array(mysql_query("SELECT * FROM `Danhsachacc` WHERE `id` = '$id' LIMIT 1"));
if(empty(kiemtra('Danhsachacc',"`id` = '$id'"))){
header('Location: http://'.$_SERVER['HTTP_HOST'].'');
exit;
}

	# Tiêu đề trang 
        $headtitle = 'Thông tin tài khoản LMHT #'.$id.'';
	
	# Import Hệ thống
	require('../haunguyen_hethong/head.php');
?>
<div class="container">  



<div class="block remove-margin-b remove-padding-b">
	<div class="block-content bg-gray-lighter text-center remove-padding-b">
		<h2 class="page-heading">Tài khoản LMHT #<?=$get['id'];?> - Giá: 
                                           <span class="text-danger"><?=number_format($get['vnd']);?> <sup class="text-muted">vnđ </sup></span>  </h2>
		<div class="font-s14">
			<?php echo empty($row['type']) ? 'Trắng thông tin' : ''.$row['type'].''; ?>		</div>

<button class="btn btn-primary push-15-t" data-loading-text="Chờ..." id="btn-buy" type="button"><i class="fa fa-check"></i> Mua luôn</button>
<?php if ($_SESSION['FBID']): ?>

<?php if(admin($_SESSION['FBID'])>'0'){ echo'<a href="http://'.$_SERVER['HTTP_HOST'].TPATH.'/dashboard.php?addanh&id='.$get['id'].'"><button class="btn btn-primary push-15-t" type="button"><i class="fa fa-book"></i> Thêm ảnh</button></a> <a href="http://'.$_SERVER['HTTP_HOST'].TPATH.'/dashboard.php?edit&id='.$get['id'].'"><button class="btn btn-primary push-15-t" type="button"><i class="fa fa-pencil"></i> Chỉnh sửa</button></a>';
}?>

<?php endif ?>  

	</div>
</div>

                
			
<div class="block bg-gray-lighter remove-margin-b">
							<ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#imgs" aria-controls="imgs" role="tab" data-toggle="tab" aria-expanded="true">Hình ảnh</a></li>
        <li class=""><a href="#champions" aria-controls="champions" role="tab" data-toggle="tab" aria-expanded="false">Tướng <span class="label label-danger"><?=$get['tuong'];?></span></a></li>
        <li class=""><a href="#skins" aria-controls="skins" role="tab" data-toggle="tab" aria-expanded="false">Skin <span class="label label-danger"><?=$get['skin'];?></span></a> </li>
      </ul>

		<div class="block-content tab-content remove-padding-b">
					<div role="tabpanel" class="tab-pane active" id="imgs">
<!-- Slider with dots and hover arrows --> 
						 
<div class="js-slider slick-nav-white slick-nav-hover" data-slider-dots="true" data-slider-arrows="true">
<?php
if(kiemtra('image_acc',"`id_acc` = '{$id}' AND `type`='1'") > 0){
$result = mysql_query("SELECT * FROM image_acc where `id_acc`='$id' AND `type`='1' order by time DESC");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo'<div><img class="img-responsive" src="http://'.$_SERVER['HTTP_HOST'].'/'.$row['patch'].''.$row['name'].'"></div> ';
}
}else{
echo'<div><img class="img-responsive" src="http://'.$_SERVER['HTTP_HOST'].'/assets/img/no-img.png"></div> ';

}
?>
</div>


					</div>
					<div role="tabpanel" class="tab-pane" id="champions">


<!-- Slider with dots and hover arrows --> 
						 
<div class="js-slider slick-nav-white slick-nav-hover" data-slider-dots="true" data-slider-arrows="true">
 
<?php
if(kiemtra('image_acc',"`id_acc` = '{$id}' AND `type`='1'") > 0){
$result = mysql_query("SELECT * FROM image_acc where `id_acc`='$id' AND `type`='2' order by time DESC");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo'<div><img class="img-responsive" src="http://'.$_SERVER['HTTP_HOST'].'/'.$row['patch'].''.$row['name'].'"></div> ';
}
}else{
echo'<div><img class="img-responsive" src="http://'.$_SERVER['HTTP_HOST'].'/assets/img/no-img.png"></div> ';

}
?>
</div>


        </div>
					<div role="tabpanel" class="tab-pane" id="skins">



<!-- Slider with dots and hover arrows --> 
						 
<div class="js-slider slick-nav-white slick-nav-hover" data-slider-dots="true" data-slider-arrows="true">
 
<?php
if(kiemtra('image_acc',"`id_acc` = '{$id}' AND `type`='1'") > 0){
$result = mysql_query("SELECT * FROM image_acc where `id_acc`='$id' AND `type`='3' order by time DESC");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo'<div><img class="img-responsive" src="http://'.$_SERVER['HTTP_HOST'].'/'.$row['patch'].''.$row['name'].'"></div> ';
}
}else{
echo'<div><img class="img-responsive" src="http://'.$_SERVER['HTTP_HOST'].'/assets/img/no-img.png"></div> ';

}
?>
</div>


        </div>
      
		  
      </div>
 <div class="block-content remove-padding-b">
 <div class="fb-comments" data-href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/acc?id=<?=$get['id'];?>" data-width="100%" data-numposts="5"></div>
					



			 
</div>
  
  </div>



<?
	require('../haunguyen_hethong/foot2.php');
?>
