<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
	if(isset($_GET['trang'])){
		$trang=$_GET['trang'];
	}else{
		$trang='';
	}
	if($trang ==0 || $trang ==1){
		$trang1=0;
	}else{
		$trang1=($trang*10)-10;
	}
	$sql_lietkehoadon="select * from donhang limit $trang1,10 ";
	$row_lietkehoadon=mysqli_query($con,$sql_lietkehoadon);
	
?>
<div class="button_themsp">
<a href="index.php?quanly=hoadon&ac=them">Thêm Mới</a> 
</div>

<table width="100%" border="1">
  <tr>
    <td>ID Đơn Hàng</td>
    <td>ID User</td>
    <td>OrderDate</td>
    <td>Total</td>  
    <td>Trạng Thái</td>
    <td>Chi tiết</td>
    <td colspan="2"></td>
  </tr>
  <?php
  while($col=mysqli_fetch_array($row_lietkehoadon)){
  ?>
  <tr>
    <td><?php  echo $col['iddh']?></td>
    <td><?php echo $col['iduser'] ?></td>
    <td><?php echo $col['ngaydathang'] ?></td>
    <td><?php echo number_format($col['tongtien']) ?></td>
    <td><?php echo $col['trangthai'] ?></td>
    <td><a href="modules/quanlyhoadon/chitietdonhang.php?id=<?php echo $col['iddh']?>">Chi tiết</a></td>
    <td><a href="modules/quanlyhoadon/xuly.php?id=<?php echo $col['iddh']?>&ac=xoa" a class="delete_link"><center><img src="./../../abc/delete.png" width="30" height="30" /></center></a></td>
  </tr>
  <?php
  }
  ?>
</table>
<div class="trang">
	Trang :
    <?php
	$sql_trang=mysqli_query($con,"select * from chitietdonhang");
	$count_trang=mysqli_num_rows($sql_trang);
	$a=ceil($count_trang/10);
	for($b=1;$b<=$a;$b++){		
		if($trang==$b){
		echo '<a href="index.php?quanly=hoadon&ac=lietke&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';
        
	}else{
		echo '<a href="index.php?quanly=hoadon&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#000;">'.$b.' ' .'</a>';
	}
	}
	?>
<style>
.button_themsp{
	width:100px;
	height:40px;
	border:1px solid #000;
	text-align:center;
	background:#069;
	line-height:40px;
	color:#fff;
	float:right;
}
.trang{
	width:auto;
	height:30px;
	
	font-size:25px;
	padding-left:10px;
	color:#000;
	margin-top:2px;
	background:#F90;
}
</style>
