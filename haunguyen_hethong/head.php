<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<!-- Lien he 01652 494946 de mua bo code nay (chi sms) -->
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo isset($headtitle) ? ''.$headtitle.'' : 'Chưa có tiêu đề'; ?></title>
    <meta content= "cay kiem com shop, ban acc, acc game gia re, shop đột kích, shop cf, shop đột kích, shop dot kich, shop liên minh, shop lien minh, lien minh free, acc cf free, share acc cf"name="keywords">
  <meta content="chuyên bán các loại acc game giá rẻ, Mua acc game giá rẻ"
    name="description">
    <meta content="chuyên bán các loại acc game giá rẻ, Mua acc game giá rẻ"
    name="msvalidate.01">
    <meta content="1135903226465690" property="fb:app_id">
    <meta content="http://<?=$_SERVER['HTTP_HOST']?>" property="og:url">
    <meta content="vi_VN" property="og:locale">
    <meta content="article" property="og:type">
    <meta content="chuyên bán các loại acc game giá rẻ" property="og:title">
    <meta content="http://aclienminh24h.com/assets/img/maxresdefault.jpg" property="og:image">
    <meta content= "Chuyên bán các loại acc game giá rẻ, Mua acc game giá rẻ tại ACLIENMINH24H" property="og:description">
<!-- Web fonts -->
    <link href=
    "http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700"
    rel="stylesheet"><!-- Bootstrap -->
    <link href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/css/oneui.min-2.2.css" rel="stylesheet">
    <link href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/slick/slick.min.css" rel="stylesheet">
    <link href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/slick/slick-theme.min.css" rel="stylesheet">
    <link href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/css/core.css" rel="stylesheet">
    <link href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/favicon.ico" rel="shortcut icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
</head>
<body>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=683365208496924";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" class=
                "navbar-toggle collapsed" data-target="#navbar" data-toggle=
                "collapse" type="button"><span class="sr-only">Toggle
                navigation</span> <span class="icon-bar"></span> <span class=
                "icon-bar"></span> <span class="icon-bar"></span></button>
                <div class="animbrand">
                    <a class="navbar-brand animate" href="index.php" title="LOGO"><img alt="" src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/img/ckc.png"></a>
                </div>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                   
                </ul>
                <ul class="nav navbar-nav navbar-right">
<?php if (isset($_SESSION['FBID']) && $_SESSION['FBID']): ?>
 <li class="dropdown">
					   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					   <img class="avatar hidden-xs" src="https://graph.facebook.com/<?=$_SESSION['FBID']; ?>/picture?type=large" alt="Avatar"> Chào <strong><?=$_SESSION['FULLNAME']; ?></strong> 
					   <span class="caret"></span></a> <ul class="dropdown-menu"> <li class="dropdown-header">
					   <i class="si si-wallet pull-right"></i><strong class="text-primary"><?=vnd($_SESSION['FBID']);?> <sup class="text-muted">vnđ</sup></strong></li> 
					   <li><a href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/history.php"><i class="si si-list pull-right"></i>Lịch sử Giao dịch</a></li> 
					   <?php if(admin($_SESSION['FBID'])>'0') echo'<li><a href="http://'.$_SERVER['HTTP_HOST'].TPATH.'/dashboard.php?addnick"><i class="si si-pencil pull-right"></i>Thêm tài khoản</a></li>'; ?>
					  
					   <li><a href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/logout.php"><i class="si si-logout pull-right"></i>Thoát</a></li> </ul> </li>
<?php else: ?>
			<li>
                        <a href="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/login.php"><span aria-hidden="true" class="fa fa-facebook-square"></span> Đăng nhập</a>
                    </li>
<?php endif ?>                   
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thống kê</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row items-push">
                            <div class="col-md-3">
                                <div class="text-muted">
                                    <small><i class=
                                    "si si-game-controller"></i> Chưa bán</small>
                                </div>
                                <div class="font-w600">
                                    <span class="text-danger" data-to="<?=kiemtra('Danhsachacc',"`status` != '1'");?>"
                                    data-toggle="countTo"></span> tài khoản
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="text-muted">
                                    <small><i class="si si-wallet"></i> Đã bán</small>
                                </div>
                                <div class="font-w600">
                                    <span class="text-success" data-to="<?=kiemtra('Danhsachacc',"`status` = '1'");?>"
                                    data-toggle="countTo"></span> tài khoản
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="text-muted">
                                    <small><i class="si si-users"></i> Thành
                                    viên</small>
                                </div>
                                <div class="font-w600">
                                    <span class="text-danger" data-to="<?=kiemtra('Users',"`Fuid` != '0'");?>"
                                    data-toggle="countTo"></span> người
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nạp thẻ nhanh</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row text-center">
                            <form id="topup-card" name="topup-card">
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only">Số Seri</label>
                                        <input class="form-control input-sm"
                                        id="cardSerial" name="cardSerial" placeholder=
                                        "Mã serial" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only">Mã thẻ</label>
                                        <input class="form-control input-sm"
                                        id="cardPin" name="cardPin" placeholder=
                                        "Mã thẻ" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <select id="telcoCode" class=
                                        "form-control input-sm input-block"
                                        name="telcoCode">
                                            <option value="VTT">
                                                Thẻ Vietel
                                            </option>
                                            <option value="VMS">
                                                Thẻ Mobifone
                                            </option>
                                            <option value="VNP">
                                                Thẻ Vinaphone
                                            </option>
                                            <option value="MGC">
                                                Thẻ Megacard
                                            </option>
                                            <option value="FPT">
                                                Thẻ Gate
                                            </option>
                                            <option value="ZING">
                                                Thẻ ZING
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <button class=
                                        "btn btn-success btn-sm btn-block"
                                        data-loading-text="Đang xử lý..." id=
                                        "btn-topup" type="button">Nạp luôn</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>