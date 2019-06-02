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
	mysqli_query($con,"SET NAMES 'utf8'");
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
	$sql_lietkesp="select * from sanpham,loaiphukien,hangphukien where loaiphukien.idlpk=sanpham.idlpk and sanpham.idhpk=hangphukien.idhpk order by sanpham.idsp limit $trang1,10 ";
	$row_lietkesp=mysqli_query($con,$sql_lietkesp);
	
?>
<div class="button_themsp">
<a href="index.php?quanly=sanpham&ac=them">Thêm Mới</a> 
</div>

<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>Tên sản phẩm</td>
    <td>Mã sp</td>
    <td>Hình ảnh</td>
    <td>Giá đề xuất</td>
    <td>Số lượng</td>
    <td>Số lượng mua</td>   
    <td colspan="2"></td>
  </tr>
  <?php
  while($col=mysqli_fetch_array($row_lietkesp)){
  ?>
  <tr>
    <td><?php  echo $col['idsp']?></td>
    <td><?php echo $col['tensp'] ?></td>
    <td><?php echo $col['masp'] ?></td>
    <td><img src="../../../abc/<?php echo $col['hinhanh'] ?>" width="80" height="80" /></td>
    <td><?php echo number_format($col['giasp']) ?></td>
    <td><?php echo $col['soluongsp'] ?></td>
    <td><?php echo $col['soluongmua'] ?></td>
    <td><?php echo $col['idsp'] ?></td>
    <td><a href="index.php?quanly=sanpham&ac=sua&id=<?php echo $col['idsp'] ?>" ><center><img src="../../../abc/edit.png" width="30" height="30" /></center></a></td>
    <td><a href="./xuly.php?id=<?php echo $col['idsp']?>" class="delete_link"><center><img src="./../../abc/delete.png" width="30" height="30"   /></center></a></td>
  </tr>
  <?php
  }
  ?>
</table>
<div class="trang">
	Trang :
    <?php
	$sql_trang=mysqli_query($con,"select * from sanpham");
	$count_trang=mysqli_num_rows($sql_trang);
	$a=ceil($count_trang/10);
	for($b=1;$b<=$a;$b++){		
		if($trang==$b){
		
		echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';
        
	}else{
		echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#000;">'.$b.' ' .'</a>';
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

