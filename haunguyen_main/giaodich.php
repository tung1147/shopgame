<?php
session_start();
ob_start();
?>
 <div class="container">
 <div class="block"> 
 <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
 <li class="active"> <a href="#taikhoan">Tài khoản đã mua</a> </li>
 							 </ul>
 <div class="tab-content">
 <div class="block tab-pane active" id="taikhoan"> 
 <div class="block-content">                             <table class="table table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Tài khoản</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Mật khẩu</th>
                                        <th>Giá</th>
                                        <th class="hidden-xs">Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
<?
$id_user = $_SESSION['FBID'];
$result = mysql_query("SELECT * FROM giaodich where `id_user`='{$id_user}' order by time DESC");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {	
?>							   
     <tr>
        <td>#<?=$row['id_acc']?></td>
        <td><?=$row['username']?></td>
        <td><?=$row['password']?></td>
        <td><?=number_format($row['vnd'])?> vnđ</td>
        <td><?=timeout($row['time'])?></td>
      </tr>

<?
}
?>                                 
                                 
                                </tbody>
                            </table>  </div> </div> 