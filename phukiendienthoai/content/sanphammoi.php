<style>
	.tieude{
		width:auto;
		height:40px;
		background:#3E454C;
		font-size:20px;
		text-align:center;
		font-weight:900;
		padding:5px;
		color:#FFF;
		line-height:40px;
	}
	.product{
		list-style:none;
		width:98%;
		height:auto;
		margin:auto;
		margin-top:8px;
	}
	.product li{
		width:32%;
		height:260px;
		text-align:center;
		padding-top:3px;
		float:left;
		margin:4.1px;
		border:1px solid #CCC;
	}
	.product a{
		text-decoration:none;
	}
	.product p{
		padding-top:5px;
		font-size:18px;
	}
	.clear{
		clear:both;
	}
</style>
<?php
	$sql_moinhat="select * from sanpham order by idsp desc limit 0,6";
	$row_moinhat=mysqli_query($con,$sql_moinhat);
	
?>
	<div class="tieude">SẢN PHẨM MỚI NHẤT</div>
                	<ul class="product">
                    <?php
					while($dong_moinhat=mysqli_fetch_array($row_moinhat)){
					?>
                    	<li><a href="?action=chitietsp&idlpk=<?php echo $dong_moinhat['idlpk'] ?>&id=<?php echo $dong_moinhat['idsp'] ?>">
                        	<div style="margin-top:3px"><img src="../abc/<?php echo $dong_moinhat['hinhanh'] ?>" width="150" height="150" /></div>
                            <p style="color:#0CC"><?php echo $dong_moinhat['tensp'] ?></p>
                            <p style="color:#F00"><?php echo number_format($dong_moinhat['giasp']).' '.'VNĐ'?></p>
                            
                        	<p style="color:#0CC">Chi tiết</p>
                        </a></li>
                      <?php
					}
					  ?>
                    </ul>
                 <div class="clear"></div>
<?php
	$sql_banchay="select * from sanpham order by soluongmua desc limit 0,6";
	$row_banchay=mysqli_query($con,$sql_banchay);
	
?>
	<div class="tieude" style="margin-top:6px">SẢN PHẨM BÁN CHẠY NHẤT</div>
                	<ul class="product">
                    <?php
					while($dong_banchay=mysqli_fetch_array($row_banchay)){
					?>
                    	<li><a href="?action=chitietsp&idlpk=<?php echo $dong_banchay['idlpk'] ?>&id=<?php echo $dong_banchay['idsp'] ?>">
                        	<div style="margin-top:2px"><img src="../abc/<?php echo $dong_banchay['hinhanh'] ?>" width="150" height="150" /></div>
                            <p style="color:#0CC"><?php echo $dong_banchay['tensp'] ?></p>
                            <p style="color:#F00"><?php echo number_format($dong_banchay['giasp']).' '.'VNĐ'?></p>
                            
                        	<p style="color:#0CC">Chi tiết</p>
                        </a></li>
                      <?php
					}
					  ?>
                    </ul>
                 