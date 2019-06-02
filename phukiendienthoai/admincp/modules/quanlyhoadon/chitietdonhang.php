<div class="header">
    	<h3>Welcome to admincp</h3>
 </div>

<div align="center">
<div class="menu1">
    	<ul>
            <li><a href="../../index.php?quanly=sanpham&ac=lietke">Quản lý sản phẩm</a></li>
            <li><a href="../..index.php?quanly=user&ac=lietke">Quản lý user</a></li>
            <li><a href="../..index.php?quanly=hoadon&ac=lietke">Quản lý hóa đơn</a></li>
        </ul>    
        <form action="" method="post" enctype="multipart/form-data">
            <a href="../../../index.php"><input type="button" value="Quay về trang chủ" style="background:#0C0	;color:#fff;width:200px;height:40px;" /></a>
        </form>  
</div>
</div>
<?php
if(isset($_GET["id"]))
{
	include("../config.php");
	$iddh=$_GET["id"];
	$sql="SELECT * from chitietdonhang,donhang,sanpham WHERE donhang.iddh=chitietdonhang.iddh AND chitietdonhang.idsp = sanpham.idsp AND donhang.iddh = $iddh";
	mysqli_query($con,"SET NAMES 'utf8'");
	$result = mysqli_query($con,$sql);
	$result1 = mysqli_query($con,$sql);
	$col = mysqli_fetch_array($result);
	if(!$result)
	{
		die("Error: ".mysqli_error());
	}
	else{
	echo '<h1 align="center">'."Chi tiết đơn hàng của khách hàng : ".$col["fullname"].'</h1>';
	echo '<table width="50%" align="center" border="2px"><tr height="80px" ><td>ID Chi Tiết Đơn Hàng</td><td>ID đơn hàng</td><td>Tên khách hàng</td><td>Địa chỉ</td><td>Tên sp</td><td>Giá Sản Phẩm</td><td>Số lượng</td><td>Ghi chú</td></tr>';
	while($col1=mysqli_fetch_array($result1))
	{
	echo '<tr><td>'.$col["idctdh"].'</td></td><td>'.$col1["iddh"].'</td><td>'.$col1["fullname"].'</td><td>'.$col1["address"].'</td><td>'.$col1["tensp"].'</td><td>'.$col1["giasp"].'</td><td>'.$col1["soluong"].'</td><td>'.$col1["ghichu"].'</td></tr>';
	}
	echo '<tr><td colspan="9" align="right"><h1>'."Tổng Giá : ".$col["tongtien"]."đ".'</h1></td></tr>';
	echo '</table>';
	echo '</div>';
}
}
?>
 <style>
  .menu1{
	width:50%;
	height:40px;
	margin-top:2px;
	background:#333;
	}
	.menu1 ul{
	width:100%;
	list-style:none;
}
.menu1 ul li{
	width:150px;
	text-align:center;
	float:left;
	line-height:40px;
	
}
.menu1 ul li a{
	display:block;
	color:#FFF;
	text-decoration:none;
	font-size:18px;
}
.menu1 li:hover{
	background:#0C0;
	
}
.header{
	width:100%;
	height:120px;
	text-align:center;
	line-height:120px;
	font-size:40px;
	color:#000;	
}
</style>