<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8mb4" />
<title>Untitled Document</title>
</head>
<?php
	if(isset($_POST['logout'])){
		unset($_SESSION['dangnhap']);
		header('location:../index.php');
	}
?>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<div align="center">
<div class="menu">
    	<ul>
            <li><a href="index.php?quanly=sanpham&ac=lietke">Quản lý sản phẩm</a></li>
            <li><a href="index.php?quanly=user&ac=lietke">Quản lý user</a></li>
            <li><a href="index.php?quanly=hoadon&ac=lietke">Quản lý hóa đơn</a></li>
        </ul>    
        <form action="" method="post" enctype="multipart/form-data">
            <input type="submit" name="logout" value="Quay về trang chủ" style="background:#0C0	;color:#fff;width:200px;height:40px;" />
        </form>  
</div>
</div>
 <form action="index.php?quanly=timkiem&ac=sp" method="post" enctype="multipart/form-data">
     <p><input type="text" name="masp" placeholder="Nhập mã sản phẩm..." id="tim" required="required" /></p>
 </form>
<script>
	$(document).ready(function() {
		$("#tim").keyup(function(){
			$.get("modules/timkiem/timkiem.php",{masp:$("input[name='masp']").val()},function(data){
			$("#content").html(data);
			})		
		})
    });
</script>
  <style>
  .menu{
	width:100%;
	height:40px;
	margin-top:2px;
	background:#333;
	}
	.menu ul{
	width:100%;
	list-style:none;
}
.menu ul li{
	width:150px;
	text-align:center;
	float:left;
	line-height:40px;
	
}
.menu ul li a{
	display:block;
	color:#FFF;
	text-decoration:none;
	font-size:18px;
}
.menu li:hover{
	background:#0C0;
	
}
#timkiem{
	width:50px;
	height:27px;
	border:1px solid #CCC;
	margin-top:2px;
}
#button_timkiem{
	width:100px;
	height:30px;
	background:blue;
	color:#fff	;
	font-size:15px;
}
.button_themsp{
	width:100px;
	height:40px;
	border:1px solid #000;
	text-align:center;
	background:#0C0;
	line-height:40px;
	color:#000;
	float:right;
}
.button_themsp a{
	color:#fff;
	display:block;
	text-decoration:none;
}
  </style>