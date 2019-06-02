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
	include('../config.php');
	$tensp=$_POST['tensp'];
	$masp=$_POST['masp'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	$giasp=$_POST['giasp'];
	$chitiet=$_POST['chitiet'];
	$soluongsp=$_POST['soluongsp'];
	$soluongmua=$_POST['soluongmua'];
	$idlpk=$_POST['idlpk'];
	$idhpk=$_POST['idhpk'];
	$trang=$_GET['trang'];
	if(isset($_POST['them'])){
		 $sql_them=("insert into sanpham (idlpk,idhpk,tensp,masp,hinhanh,giasp,chitiet,soluongsp,soluongmua) value('$idlpk','$idhpk','$tensp','$masp','$hinhanh','$giasp','$chitiet','$soluongsp','$soluongmua')");
		mysqli_query($con,$sql_them);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
		if($hinhanh!=''){
	 	$sql_sua = "update sanpham set tensp='$tensp',masp='$masp',hinhanh='$hinhanh',giasp='$giasp',chitiet='$chitiet',soluongsp='$soluongsp' where idsp='$_GET[id]'";
		}else{
		$sql_sua="update sanpham set tensp='$tensp',masp='$masp',giasp='$giasp',chitiet='$chitiet',soluongsp='$soluongsp' where idsp='$_GET[id]'";
		}
		mysqli_query($con,$sql_sua);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}else{
		$sql_xoa = "delete from sanpham where idsp = $_GET[id]";
		mysqli_query($con,$sql_xoa);
		echo'<script>alert("Xóa Thành Công")</script>';
	}
?>

