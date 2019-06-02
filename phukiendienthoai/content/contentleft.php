<div>
<strong><div style="height:50px; font-size:20px; background-color:#3E454C; color:#FFF; line-height:50px; padding-left:10px;">THƯƠNG HIỆU PHỤ KIỆN</div></strong>
<?php
	$sql_hieu="select * from 	hangphukien";
	mysqli_query($con,"SET NAMES 'utf8'");
	$result_hieu=mysqli_query($con,$sql_hieu);
	while($row=mysqli_fetch_array($result_hieu))
	{
		echo "<a href='?action=hangphukien&idhpk=".$row['idhpk']."&tt=".$row['thutuhpk']."'><div class='list'>".$row['tenhpk']."</div></a>";
	}
?>
<strong><div style="height:50px; font-size:20px; background-color:#3E454C; color:#FFF; line-height:50px; padding-left:10px;">LOẠI PHỤ KIỆN</div></strong>
<?php
	$sql_loai="select * from 	loaiphukien";
	mysqli_query($con,"SET NAMES 'utf8'");
	$result_loai=mysqli_query($con,$sql_loai);
	while($row=mysqli_fetch_array($result_loai))
	{
		echo "<a href='?action=loaiphukien&idlpk=".$row['idlpk']."&tt=".$row['thutulpk']."'><div class='list'>".$row['tenlpk']."</div></a>";
	}
?>
</div>
<div>
<strong><div style="height:50px; font-size:20px; background-color:#3E454C; color:#FFF; line-height:50px; padding-left:10px;">QUẢNG CÁO SẢN PHẨM</div></strong>
<img src="../abc/qc.jpg" width="100%" height="300" />
</div>