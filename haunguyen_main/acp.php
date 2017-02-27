<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start();


if(admin($_SESSION['FBID']) < '1'){
header('Location: http://'.$_SERVER['HTTP_HOST'].'');
exit;
}

if(isset($_GET['addanh'])){
?>
	<style>
		input[type=file]{
			float:left;
		}
	</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thêm tài ảnh vào tài khoản #<?=addslashes($_GET['id'])?> <?=admin($_SESSION['FBID'])?></h3>
                    </div>
                    <div class="panel-body">
		<form action="#">
			<input type="file" name="image" >

			<button class="btn btn-sm btn-info upload" type="submit">Upload</button>
			<button type="button" class="btn btn-sm btn-danger cancel">Hủy</button>
<br/><br/>
<label class="radio-inline"><input type="radio" name="type" value="1">Hình ảnh</label>
<label class="radio-inline"><input type="radio" name="type" value="2">Ảnh tướng</label>
<label class="radio-inline"><input type="radio" name="type" value="3">Ảnh skin</label>
<br/><br/>
				<div class="progress-bar" style="width:0%"></div>
<hr/>
		</form>

		<form action="#">
			<input type="file" name="image" >
			<button class="btn btn-sm btn-info upload" type="submit">Upload</button>
			<button type="button" class="btn btn-sm btn-danger cancel">Hủy</button>

<br/><br/>
<label class="radio-inline"><input type="radio" name="type" value="1">Hình ảnh</label>
<label class="radio-inline"><input type="radio" name="type" value="2">Ảnh tướng</label>
<label class="radio-inline"><input type="radio" name="type" value="3">Ảnh skin</label>
<br/><br/>				<div class="progress-bar" style="width:0%"></div>
<hr/>
		</form>

		<form action="#">
			<input type="file" name="image" >
			<button class="btn btn-sm btn-info upload" type="submit">Upload</button>
			<button type="button" class="btn btn-sm btn-danger cancel">Hủy</button>

<br/><br/>
<label class="radio-inline"><input type="radio" name="type" value="1">Hình ảnh</label>
<label class="radio-inline"><input type="radio" name="type" value="2">Ảnh tướng</label>
<label class="radio-inline"><input type="radio" name="type" value="3">Ảnh skin</label>
<br/><br/>				<div class="progress-bar" style="width:0%"></div>
<hr/>
		</form>


		<button class="btn btn-sm btn-danger cancel-all">Hủy bỏ tất cả file đang upload</button>

	</div>
</div>
</div><!-- end .container -->
	<script>


		$('.upload-all').click(function(){
			//submit all form
			$('form').submit();
		});
		$('.cancel-all').click(function(){
			//submit all form
			$('form .cancel').click();
		});
		$(document).on('submit','form',function(e){
			e.preventDefault();
			$form = $(this);
			uploadImage($form);
		});
		function uploadImage($form){
			$form.find('.progress-bar').removeClass('progress-bar-success')
										.removeClass('progress-bar-danger');
			var formdata = new FormData($form[0]); //formelement
			var request = new XMLHttpRequest();
			//progress event...
			request.upload.addEventListener('progress',function(e){
				var percent = Math.round(e.loaded/e.total * 100);
				$form.find('.progress-bar').width(percent+'%').html(percent+'%');
			});
			//progress completed load event
			request.addEventListener('load',function(e){
				$form.find('.progress-bar').addClass('progress-bar-success').html('Tải ảnh lên thành công....');
			});
			request.open('post', 'upload.php?id=<?=$_GET['id']?>');
			request.send(formdata);
			$form.on('click','.cancel',function(){
				request.abort();
				$form.find('.progress-bar')
					.addClass('progress-bar-danger')
					.removeClass('progress-bar-success')
					.html('Tải ảnh lên thất bại...');
			});
		}
	</script>
<?php
}elseif(isset($_GET['addnick'])){

echo'<div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thêm tài khoản rao bán</h3>
                    </div>
                    <div class="panel-body">
<form action="add.php" method="post">

  <div class="form-group">
    <label for="username">Nhập tên tài khoản Garena:</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="pwd">Nhập mật khẩu:</label>
    <input type="password" class="form-control" name="pwd">
  </div>
  <div class="form-group">
    <label for="sotuong">Số tướng:</label>
    <input type="number" class="form-control" name="sotuong" min="0" max="100" step="10">
  </div>
  <div class="form-group">
    <label for="soskin">Số Skin:</label>
    <input type="number" class="form-control" name="soskin"min="0" max="100" step="10">
  </div>
  <div class="form-group">
    <label for="vnd">Giá:</label>
    <input type="number" class="form-control" name="vnd" min="0" step="1000">
  </div>
<div class="form-group">
  <label for="type">Loại tài khoản <small>(để trắng nếu tài khoản trắng thông tin)</small>:</label>
  <textarea class="form-control" rows="5" name="type"></textarea>
</div>
<div class="form-group">
    <label for="rank">Chọn rank:</label>
<label class="radio-inline"><input type="radio" name="rank" value="provisional">Chưa có</label>
<label class="radio-inline"><input type="radio" name="rank" value="bronze">Đồng đoàn</label>
<label class="radio-inline"><input type="radio" name="rank" value="silver">Bạc đoàn</label>
<label class="radio-inline"><input type="radio" name="rank" value="gold">Vàng đoàn</label>
<label class="radio-inline"><input type="radio" name="rank" value="platinum">Bạch kim</label>
<label class="radio-inline"><input type="radio" name="rank" value="diamond">Kim cương</label>
<label class="radio-inline"><input type="radio" name="rank" value="master">Cao thủ</label>
<label class="radio-inline"><input type="radio" name="rank" value="challenger">Thách đấu</label>
</div>
  <button type="submit" class="btn btn-default" name="addaccount">Thêm</button>
</form>
</div>
</div>
</div>';

}elseif(isset($_GET['edit'])){
$id = $_GET['id'];
$get = mysql_fetch_array(mysql_query("SELECT * FROM `Danhsachacc` WHERE `id` = '$id' LIMIT 1"));
echo'<div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Chỉnh sửa tài khoản #'.$_GET['id'].'</h3>
                    </div>
                    <div class="panel-body">
<form action="" method="post">

  <div class="form-group">
    <label for="username">Nhập tên tài khoản Garena:</label>
    <input type="text" class="form-control" name="name" value="'.$get['username'].'">
  </div>
  <div class="form-group">
    <label for="pwd">Nhập mật khẩu:</label>
    <input type="password" class="form-control" name="pwd" value="'.$get['password'].'">
  </div>
  <div class="form-group">
    <label for="sotuong">Số tướng:</label>
    <input type="number" class="form-control" name="sotuong" min="0" max="100" step="10" value="'.$get['tuong'].'">
  </div>
  <div class="form-group">
    <label for="soskin">Số Skin:</label>
    <input type="number" class="form-control" name="soskin"min="0" max="100" step="10" value="'.$get['skin'].'">
  </div>
  <div class="form-group">
    <label for="vnd">Giá:</label>
    <input type="number" class="form-control" name="vnd" min="0" step="1000" value="'.$get['vnd'].'">
  </div>
<div class="form-group">
  <label for="type">Loại tài khoản <small>(để trắng nếu tài khoản trắng thông tin)</small>:</label>
  <textarea class="form-control" rows="5" name="type" value="'.$get['type'].'"></textarea>
</div>
<div class="form-group">
    <label for="rank">Chọn rank:</label>
<label class="radio-inline"><input type="radio" name="rank" value="provisional">Chưa có</label>
<label class="radio-inline"><input type="radio" name="rank" value="bronze">Đồng đoàn</label>
<label class="radio-inline"><input type="radio" name="rank" value="silver">Bạc đoàn</label>
<label class="radio-inline"><input type="radio" name="rank" value="gold">Vàng đoàn</label>
<label class="radio-inline"><input type="radio" name="rank" value="platinum">Bạch kim</label>
<label class="radio-inline"><input type="radio" name="rank" value="diamond">Kim cương</label>
<label class="radio-inline"><input type="radio" name="rank" value="master">Cao thủ</label>
<label class="radio-inline"><input type="radio" name="rank" value="challenger">Thách đấu</label>
</div>
  <button type="submit" class="btn btn-default" name="editaccount">Thêm</button>
</form>
</div>
</div>
</div>';

}