<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); ?>
<head>
<script src="jquery-3.3.1.js" type="text/javascript" language="javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Phụ kiện điện thoại</title>
</head>
    <?php
		if(isset($_GET['action']) && $_GET['action']=='logout')
		{
			unset($_SESSION['username']);
			unset($_SESSION['cart']);
			unset($_SESSION['total']);
			header('location:index.php');
		}
	?>
<body bgcolor="#F5F6F6">
<style>
	*{
		margin:0;
		padding:0;
	}
	.wapper{
		width:1100px;
		height:auto;
		margin:auto;
		border:solid 1px #000;
	}
</style>
<div class="wapper" style="background-color:#FFF">
	<?php
		include('config.php');
		include('header.php');
		include('content.php');
		include('footer.php');
	?>
    <?php
		if(isset($_POST['register']))
		{
			$sql_register="INSERT INTO user(fullname,email,address,phone,username,password,level) VALUES('{$_POST['name']}','{$_POST['email']}','{$_POST['address']}','{$_POST['phone']}','{$_POST['username']}','{$_POST['password']}','0')";
			mysqli_query($con,"SET NAMES 'utf8'");
			mysqli_query($con,$sql_register);
			if($sql_register)
			{
				echo '<script>alert("Bạn đã đăng ký thành công");</script>';	
			}
		}
	?>
</div>
</body>
</html>