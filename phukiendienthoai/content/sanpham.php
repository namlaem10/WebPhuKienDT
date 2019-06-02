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
	.trang{
		width:auto;
		height:30px;
		min-height:30px;
		font-size:25px;
		padding-left:300px;
		color:#FFF;
		background-color:#3E454C;
	}
	.clear{
		clear:both;
	}
</style>
<?php
	if(isset($_GET['trang']))
	{
		$trang=$_GET['trang'];
	}
	else
	{
		$trang='';
	}
	if($trang =='' || $trang =='1')
	{
		$trang1=0;
	}
	else
	{
		$trang1=($trang*9)-9;
	}
?>
<?php
	$sql_sanpham="select * from sanpham order by idsp desc limit $trang1,9";
	$row_sanpham=mysqli_query($con,$sql_sanpham);
?>
<div class="tieude">TẤT CẢ SẢN PHẨM</div>
                	<ul class="product">
                    <?php
					while($col_sanpham=mysqli_fetch_array($row_sanpham)){
					?>
                    	<li><a href="?action=chitietsp&idlpk=<?php echo $col_sanpham['idlpk'] ?>&id=<?php echo $col_sanpham['idsp'] ?>">
                        	<div style="margin-top:3px"><img src="../abc/<?php echo $col_sanpham['hinhanh'] ?>" width="150" height="150" /></div>
                            <p style="color:#0CC"><?php echo $col_sanpham['tensp'] ?></p>
                            <p style="color:#F00"><?php echo number_format($col_sanpham['giasp']).' '.'VNĐ'?></p>
                            
                        	<p style="color:#0CC">Chi tiết</p>
                        </a></li>
                      <?php
					}
					  ?>
                    </ul>
<div class="clear"></div>
<div class="trang">
	Trang :
    <?php
	$sql_trang=mysqli_query($con,"select * from sanpham");
	$count_trang=mysqli_num_rows($sql_trang);
	$a=ceil($count_trang/9);
	for($b=1;$b<=$a;$b++)
	{
		if($trang==$b)
		{
			echo '<a href="?action=sanpham&trang='.$b.'" style="text-decoration:none;color:#000;">'.$b.' ' .'</a>';
        }
		else
		{
			echo '<a href="?action=sanpham&trang='.$b.'" style="text-decoration:none;color:#FFF;">'.$b.' ' .'</a>';
		}
	}
	?>
</div>