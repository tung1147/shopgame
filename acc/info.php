<?php
define("TPATH","/gameshop/src");
require('../haunguyen_hethong/function.php');

$id = $_GET['id'];
$get = mysql_fetch_array(mysql_query("SELECT * FROM `Danhsachacc` WHERE `id` = '$id' LIMIT 1"));
if(empty(kiemtra('Danhsachacc',"`id` = '$id'"))){
echo'<!-- Modal -->
  <div class="modal-dialog">
  <div class="modal-content">
    <!-- Modal Header -->
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
    </div>
    <!-- Modal Body -->
    <div class="modal-body">
      <div class="alert alert-danger"><span><strong>Opps! </strong> Tài khoản này không có hoặc đã bị xóa.</span></div>
    </div>
    <!-- Modal Footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
    </div>
  </div>
</div> ';
exit;
}
?>
<!-- Modal -->
  
<div class="modal-dialog modal-lg modal-dialog-top">
  <div class="modal-content">
                
			
            <div class="block block-themed block-transparent remove-margin-b">
			
      <div class="block-header bg-primary-dark">
        <ul class="block-options">
          <li>
            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
          </li>
        </ul>
        <h3 class="block-title">Tài khoản LMHT #<?=$get['id'];?></h3>
      </div>
							<ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#imgs" aria-controls="imgs" role="tab" data-toggle="tab" aria-expanded="true">Hình ảnh</a></li>
        <li class=""><a href="#champions" aria-controls="champions" role="tab" data-toggle="tab" aria-expanded="false">Tướng <span class="label label-danger"><?=$get['tuong'];?></span></a></li>
        <li class=""><a href="#skins" aria-controls="skins" role="tab" data-toggle="tab" aria-expanded="false">Skin <span class="label label-danger"><?=$get['skin'];?></span></a> </li>
      </ul>
      <div class="block-content bg-gray-lighter">
        <div class="row items-push remove-padding-b">
			          <div class="col-xs-12 remove-margin-b">

            <div class="font-s13 text-muted"><?php echo empty($row['type']) ? 'Trắng thông tin' : ''.$row['type'].''; ?></div>
					</div></div>
      </div>
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
if(kiemtra('image_acc',"`id_acc` = '{$id}' AND `type`='2'") > 0){
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
if(kiemtra('image_acc',"`id_acc` = '{$id}' AND `type`='3'") > 0){
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
   
    <!-- Modal Footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Đóng</button> <button class="btn btn-sm btn-success" onclick="alert('Đã copy link tài khoản #<?=$get['id'];?>');" data-clipboard-text="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/acc?id=<?=$get['id'];?>">
  <i class="fa fa-link"></i>  Copy link tài khoản
</button><button id="btn-buy" data-loading-text="Hãy chờ..." type="button" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Mua với giá <?=number_format($get['vnd']);?> <sup style="color:white;">vnđ</sup></button>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      var req;
      $("#btn-buy").click(function() {
        var $btn = $(this);
        $btn.button('loading');
        if (req) {
          req.abort();
        }
        req = $.ajax({
          url: "http://<?=$_SERVER['HTTP_HOST'].TPATH?>/getacc/index.php",
          type: "POST",
          data: "id=<?=$get['id'];?>"
        });
        req.done(function(response, textStatus, jqXHR) {
          var json = $.parseJSON(response);
          console.log(json);
          if (json.err == 0) {
            App.notifyTopCenter('<strong>Ok!</strong> ' + json.msg, 'success', 'fa fa-times');
          } else {
            App.notifyTopCenter('<strong>Opps!</strong> ' + json.msg, 'danger', 'fa fa-times');
          }
          $btn.button('reset');
        });
        event.preventDefault();
      });
    });
  </script>
						
			