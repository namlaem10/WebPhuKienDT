<?php
	if(isset($_GET['action'])&&($_GET['action'])!='')
	{
		$tam=$_GET['action'];	
	}
	else
	{
		$tam='';
	}
	if($tam == 'register')
	{
		include('content/registration.php');	
	}
	elseif($tam == 'hangphukien')
	{
		include('content/hangphukien.php');
	}
	elseif($tam == 'loaiphukien')
	{
		include('content/loaiphukien.php');
	}
	elseif($tam == 'chitietsp')
	{
		include('content/chitietsanpham.php');
	}
	elseif($tam == 'sanpham')
	{
		include('content/sanpham.php');
	}
	elseif($tam == 'giohang')
	{
		include('content/cart.php');
	}
	elseif($tam == 'themgiohang')
	{
		include('content/addtocart.php');
	}
	elseif($tam == 'thanhtoan')
	{
		include('content/thanhtoan.php');
	}
	else 
	{
		include('content/sanphammoi.php');
	}
?>
