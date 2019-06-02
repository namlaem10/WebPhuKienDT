<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../jquery-3.3.1.js" type="text/javascript" language="javascript"></script> 
   
<title>Trang quản lý website</title>

</head>
<?php
// session_start();
 //if(!isset($_SESSION['dangnhap'])){
	// header('location:login.php');
 //}
?>
<body>
<div class="wrapper">
	<?php
		include('modules/config.php');
		include('modules/header.php');
		include('modules/menu.php');
		include('modules/content.php');
		include('modules/footer.php');
	?>

<style>
.wrapper{
	width:1000px;
	height:auto;	
	margin:auto;
}
</style>
</div>
</body>
</html>