<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<link rel="stylesheet" type="text/css" href="style/css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
 <div class="content" >
    	<div class="box_contains" id="content">
        	<?php
				if(isset($_GET['quanly'])&&$_GET['ac']){
					$tam=$_GET['quanly'];
					$tam1=$_GET['ac'];
					}else{
						$tam='';
					}if(($tam == 'sanpham')&&($tam1 == 'them')){
						
						include('modules/quanlysanpham/them.php');
					}elseif(($tam == 'sanpham')&&($tam1 == 'lietke')){
						
						include('modules/quanlysanpham/lietke.php');
					}elseif(($tam == 'sanpham')&&($tam1 == 'sua')){
						
						include('modules/quanlysanpham/sua.php');
					}elseif(($tam == 'user')&&($tam1 == 'them')){
						
						include('modules/quanlyuser/them.php');
					}elseif(($tam == 'user')&&($tam1 == 'lietke')){
						
						include('modules/quanlyuser/lietke.php');
					}elseif(($tam == 'user')&&($tam1 == 'sua')){
						
						include('modules/quanlyuser/sua.php');
					}elseif(($tam == 'timkiem')&&($tam1 == 'sp')){
						
						include('modules/timkiem/timkiem.php');
					}elseif(($tam == 'gallery')&&($tam1 == 'them')){
						include('modules/gallery/them.php');
					}elseif(($tam == 'gallery')&&($tam1 == 'lietke')){
						include('modules/gallery/lietke.php');
					}elseif(($tam == 'gallery')&&($tam1 == 'sua')){
						include('modules/gallery/sua.php');
					}
					elseif(($tam == 'hoadon')&&($tam1 == 'lietke')){
						
						include('modules/quanlyhoadon/lietke.php');
					}elseif(($tam == 'user')&&($tam1 == 'sua')){
						
						include('modules/quanlyhoadon/sua.php');
					}elseif(($tam == 'timkiem')&&($tam1 == 'sp')){
						
						include('modules/timkiem/timkiem.php');
					}else{
						include('modules/quanlysanpham/lietke.php');
					}
			?>
        
        </div>
    </div>
    <div class="clear"></div>
<style>
.content{
	width:100%;
	height:auto;
	margin-top:2px;
	
}
.box_contains{
	width:90%;
	height:auto;	
	margin:auto;
	background:#FFF;
}
.clear{
	clear:both;
}
</style>