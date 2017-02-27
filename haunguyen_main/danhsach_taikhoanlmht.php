    <div class="container">
        <div class="block">
            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
			
                <li class="active">
                    <a href="#lmht">Shop Liên Minh</a>
                </li>
							
            </ul>
            <div class="tab-content">			 
		  <div class="block tab-pane active" id="lmht">
                    <div class="block-header remove-padding-b">
                        <div class="row">
													<div class="col-md-6"> <div class="input-group"> <div class="input-group-addon">Lọc theo Rank</div> <select class="js-rank-search form-control" id="filterbyrank" name="filterbyrank" size="1"> <option value="0">Tất cả</option> <option value="1">Chưa Rank</option> <option value="2">Đồng đoàn</option> <option value="3">Bạc đoàn</option> <option value="4">Vàng đoàn</option> <option value="5">Bạch Kim</option> <option value="6">Kim Cương</option> <option value="7">Cao Thủ</option> <option value="8">Thách Đấu</option> </select>  </div> </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Lọc theo Giá
                                    </div><select class=
                                    "js-price-search form-control" id=
                                    "filterbyprice" name="filterbyprice" size=
                                    "1">
                                        <option value="0">
                                            Tất cả
                                        </option>
                                        <option value="1">
                                            Từ 50k trở xuống
                                        </option>
                                        <option value="2">
                                            Từ 50k đến 100k
                                        </option>
                                        <option value="3">
                                            Từ 100k đến 500k
                                        </option>
                                        <option value="4">
                                            Từ 500k đến 1 Triệu
                                        </option>
                                        <option value="5">
                                            Từ 1 Triệu trở lên
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="js-lmht-list row items-push-2x text-center">


<?php
$result = mysql_query("SELECT * FROM Danhsachacc where `status`!='1' order by time DESC");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

echo'<div class="col-sm-4 col-md-3 remove-margin-b" data-filter-rank="'.$row['rank'].'" data-filter-price="'.$row['vnd'].'">
                                <div class="block clickitem" data-id="'.$row['id'].'">
                                    <div class=
                                    "block-content ribbon ribbon-bookmark ribbon-danger text-center bg-gray-lighter">
									                                    <div class="item item-2x bg-crystal-op">
                                        <img alt="" class="img-responsive push"
                                         src="http://'.$_SERVER['HTTP_HOST'].TPATH.'/assets/img/rank/base_icons/'.$row['rank'].'.png" ></div>
                                        <div class="h5 font-w600">
                                            Tài khoản LMHT #'.$row['id'].'                                       </div>
                                        <div class="font-s12">';

                                            echo empty($row['type']) ? 'Trắng thông tin' : ''.$row['type'].'';
 echo'</div>
																				<div class="font-s12">
                                            '.$row['skin'].' skin , '.$row['tuong'].' tướng                                        </div>
                                        <div class="text-danger font-w600">'.number_format($row['vnd']).' <sup class="text-muted">vnđ</sup>
                                        </div>
                                    </div>
                                </div>
                            </div>';

}

mysql_free_result($result);// giai phong bo nho
?>


					


								
                                              
                        </div>
                    </div>
                </div>

