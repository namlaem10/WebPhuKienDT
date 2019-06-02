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
	$sql_idlpk="select * from sanpham where sanpham.idlpk= ".$_GET['idlpk']." limit $trang1,9";
	$id_lpk=mysqli_query($con,$sql_idlpk);
	$count=mysqli_num_rows($id_lpk);
?>
<?php
	$sql_tenlpk="select * from loaiphukien where idlpk=".$_GET['idlpk']."";
	$row=mysqli_query($con,$sql_tenlpk);
	$col=mysqli_fetch_array($row);
?>
<div>
    <div class="tieude"><?php echo $col['tenlpk'] ?></div>
        <ul class="product">
            <?php
            if($count>0)
            {
                while($dong_loaisp=mysqli_fetch_array($id_lpk))
                {
				$idlpk=$dong_loaisp['idlpk'];
				$id=$dong_loaisp['idsp'];
            ?>
                <li><a href="?action=chitietsp&idlpk=<?php echo $idlpk ?>&id=<?php echo $id ?>">
                <div style="margin-top:2px"><img src="../abc/<?php echo $dong_loaisp['hinhanh'] ?>" width="150" height="150" /></div>
                <p style="color:#0CC"><?php echo $dong_loaisp['tensp'] ?></p>
                <p style="color:#F00">Giá: <?php echo number_format($dong_loaisp['giasp']) ?> VNĐ</p>
                <p style="color:#0CC">Chi tiết</p>
                </a></li>
            <?php
                }
            }
            else
            {
                echo 'Hiện chưa có sản phẩm...';
            }
            ?>
        </ul>
</div>
<div class="clear"></div>
<div class="trang">
	Trang :
    <?php
	$sql_trang=mysqli_query($con,"select * from sanpham where idlpk=".$_GET['idlpk']."");
	$count_trang=mysqli_num_rows($sql_trang);
	$a=ceil($count_trang/9);
	for($b=1;$b<=$a;$b++)
	{
		if($trang==$b)
		{
			echo "<a href='?action=loaiphukien&idlpk=".$idlpk."&trang=".$b."' style='text-decoration:none;color:#000;'>".$b." " ."</a>";
        }
		else
		{
			echo "<a href='?action=loaiphukien&idlpk=".$idlpk."&trang=".$b."' style='text-decoration:none;color:#FFF;'>".$b." " ."</a>";
		}
	}
	?>
</div>
