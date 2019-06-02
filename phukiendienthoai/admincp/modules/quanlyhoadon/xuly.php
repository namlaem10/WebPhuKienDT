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
		$sql_xoa = "delete from donhang where iddh = $_GET[id]";
		mysqli_query($con,$sql_xoa);
		header('location:../../index.php?quanly=hoadon&ac=lietke');
?>
