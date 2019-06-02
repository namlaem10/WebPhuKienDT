<?php
	session_start();
?>
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
	$sql_lietkeuser="select * from user limit $trang1,10 ";
	$row_lietkeuser=mysqli_query($con,$sql_lietkeuser);
?>
<div class="button_themsp">
<a href="index.php?quanly=user&ac=them">Thêm Mới</a> 
</div>

<table width="100%" border="1">
  <tr>
    <td>ID User</td>
    <td>FullName</td>
    <td>Email</td>
    <td>Phone</td>
    <td>Address</td>
    <td>UserName</td>
    <td>PassWord</td>
    <td colspan="2"></td>
  </tr>
  <?php
  $level = $_SESSION['level'];
  while($col=mysqli_fetch_array($row_lietkeuser)){
  ?>
  <tr>
    <td><?php  echo $col['iduser']?></td>
    <td><?php echo $col['fullname'] ?></td>
    <td><?php echo $col['email'] ?></td>
    <td><?php echo $col['phone'] ?></td>
    <td><?php echo $col['address'] ?></td>
    <td><?php echo $col['username'] ?></td>
    <td><?php if($level==2) echo $col['password'];if($level==1) echo 'Không có quyền xem'  ?></td>
    <?php
	if($level==2)
	{
   	 echo '<td><a href="index.php?quanly=user&ac=sua&id='.$col["iduser"].'" ><center><img src="../../../abc/edit.png" width="30" height="30" /></center></a></td>';
     echo '<td><a href="modules/quanlyuser/xuly.php?id=' .$col["iduser"].'" class="delete_link"><center><img src="./../../abc/delete.png" width="30" height="30"   /></center></a></td>';
	}
	if($level==1)
	{{ echo '<td width="150">Không có quyền sửa</td>';}}
	?>
  </tr>
  <?php
  }
  ?>
</table>
<div class="trang">
	Trang :
    <?php
	$sql_trang=mysqli_query($con,"select * from user");
	$count_trang=mysqli_num_rows($sql_trang);
	$a=ceil($count_trang/10);
	for($b=1;$b<=$a;$b++){		
		if($trang==$b){
		
		echo '<a href="index.php?quanly=user&ac=lietke&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';
        
	}else{
		echo '<a href="index.php?quanly=user&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#000;">'.$b.' ' .'</a>';
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
