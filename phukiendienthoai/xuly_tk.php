<?php include('config.php'); ?>
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
	if($_GET)
	{
		$search=$_GET['timkiem'];
		$lpk=$_GET['lpk'];
		$hpk=$_GET['hpk'];
		$gia=$_GET['gia'];
		$sql="SELECT * FROM sanpham WHERE tensp LIKE '%$search%'";
		if($lpk!=0)
		{
			$sql.="AND idlpk='$lpk'";
			if($gia!=0)
			{
				if($gia==1)
					$sql.="AND giasp < '100000'";
				elseif($gia==2)
					$sql.="AND giasp <= '500000' AND giasp >= '100000'";
				elseif($gia==3)
					$sql.="AND giasp > '500000'";
			}
			if($hpk!=0)
				$sql.="AND idhpk='$hpk'";
		}
		if($hpk!=0)
		{
			$sql.="AND idhpk='$hpk'";
			if($gia!=0)
			{
				if($gia==1)
					$sql.="AND giasp < '100000'";
				elseif($gia==2)
					$sql.="AND giasp <= '500000' AND giasp >= '100000'";
				elseif($gia==3)
					$sql.="AND giasp > '500000'";
			}
			if($lpk!=0)
				$sql.="AND idlpk='$lpk'";
		}
		if($gia!=0)
		{
			if($gia==1)
				$sql.="AND giasp < '100000'";
			elseif($gia==2)
				$sql.="AND giasp <= '500000' AND giasp >= '100000'";
			elseif($gia==3)
				$sql.="AND giasp > '500000'";
			if($hpk!=0)
				$sql.="AND idhpk='$hpk'";
			if($lpk!=0)
				$sql.="AND idlpk='$lpk'";
		}
		$sql.=" limit $trang1,9";
		$result=mysqli_query($con,$sql);
		$count=mysqli_num_rows($result);
?>
<div>
    <div class="tieude"><?php echo "Kết quả trả về cho <b>$search</b>" ?></div>
        <ul class="product">
            <?php
            if($count>0)
            {
                while($dong_loaisp=mysqli_fetch_array($result))
                {
				$idlpk=$dong_loaisp['idlpk'];
				$id=$dong_loaisp['idsp'];
            ?>
                <li><a href="?action=chitietsp&idlpk=<?php echo $idlpk ?>&id=<?php echo $id ?>">
                <div style="margin-top:2px"><img src="../abc/<?php echo $dong_loaisp['hinhanh'] ?>" width="150" height="150" /></div>
                <p style="color:#0CC"><?php echo $dong_loaisp['tensp'] ?></p>
                <p style="color:#F00">Giá: <?php echo $dong_loaisp['giasp'] ?> VNĐ</p>
                <p style="color:#0CC">Chi tiết</p>
                </a></li>
            <?php
                }
            }
            else
            {
                echo 'Không tìm thấy sản phẩm...';
            }
            ?>
        </ul>
</div>
<div class="clear"></div>
<div class="trang">
	Trang :
    <?php
	$sql_trang="select * from sanpham where tensp LIKE '%$search%'";
	if($lpk!=0)
		{
			$sql_trang.="AND idlpk='$lpk'";
			if($gia!=0)
			{
				if($gia==1)
					$sql_trang.="AND giasp < '100000'";
				elseif($gia==2)
					$sql_trang.="AND giasp <= '500000' AND giasp >= '100000'";
				elseif($gia==3)
					$sql_trang.="AND giasp > '500000'";
			}
			if($hpk!=0)
				$sql_trang.="AND idhpk='$hpk'";
		}
		if($hpk!=0)
		{
			$sql_trang.="AND idhpk='$hpk'";
			if($gia!=0)
			{
				if($gia==1)
					$sql_trang.="AND giasp < '100000'";
				elseif($gia==2)
					$sql_trang.="AND giasp <= '500000' AND giasp >= '100000'";
				elseif($gia==3)
					$sql_trang.="AND giasp > '500000'";
			}
			if($lpk!=0)
				$sql_trang.="AND idlpk='$lpk'";
		}
		if($gia!=0)
		{
			if($gia==1)
				$sql_trang.="AND giasp < '100000'";
			elseif($gia==2)
				$sql_trang.="AND giasp <= '500000' AND giasp >= '100000'";
			elseif($gia==3)
				$sql_trang.="AND giasp > '500000'";
			if($hpk!=0)
				$sql_trang.="AND idhpk='$hpk'";
			if($lpk!=0)
				$sql_trang.="AND idlpk='$lpk'";
		}
	$rs_trang=mysqli_query($con,$sql_trang);
	$count_trang=mysqli_num_rows($rs_trang);
	$a=ceil($count_trang/9);
	for($b=1;$b<=$a;$b++)
	{
		if($trang==$b)
		{
			echo "<a href='?trang=".$b."&a=".$search."&idlpk=".$lpk."&idhpk=".$hpk."&gia=".$gia."' style='text-decoration:none;color:#000;' class='phantrang'>".$b." " ."</a>";
        }
		else
		{
			echo "<a href='?trang=".$b."&a=".$search."&idlpk=".$lpk."&idhpk=".$hpk."&gia=".$gia."' style='text-decoration:none;color:#FFF;' class='phantrang'>".$b." " ."</a>";
		}
	}
	?>
</div>
<?php
	}
?>


