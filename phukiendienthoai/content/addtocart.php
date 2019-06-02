<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>
<style>
.tieude{
		width:auto;
		height:40px;
		background:#3E454C;
		font-size:20px;
		text-align:center;
		font-weight:900;
		padding:5px;
		color:#FFF;
		line-height:40px;
}
</style>
<div class="tieude">THÊM VÀO GIỎ HÀNG</div>
<?php 
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$cart=$_SESSION['cart'];
		$sql="select * from sanpham where idsp='".$id."'";	
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		if(!empty($_SESSION['cart']))
		{
			if(array_key_exists($id,$cart))
			{
				$cart[$id] = array(
				"soluong"=>(int)$cart[$id]["soluong"]+1,
				"tensp"=>$row['tensp'],
				"giasp"=>$row['giasp'],
				"hinhanh"=>$row['hinhanh']
				);
			}
			else // khong trùng id
			{
				$cart[$id] = array(
				"soluong"=>1,
				"tensp"=>$row['tensp'],
				"giasp"=>$row['giasp'],
				"hinhanh"=>$row['hinhanh']
				);	
			}	
		}
		else
		{
			$cart[$id]=array(
				"soluong"=>1,
				"tensp"=>$row['tensp'],
				"giasp"=>$row['giasp'],
				"hinhanh"=>$row['hinhanh']
			);	
		}
		$_SESSION['cart']=$cart;
	}
	echo "<div align='center' style='font-size:25px; margin-top:5px;'>Đã thêm vào giỏ hàng thành công</div>";
	echo "<a href='index.php?action=sanpham'><div align='center' style='color:red'>Tiếp tục mua hàng</div></a>";
	echo "<a href='index.php?action=giohang'><div align='center' style='color:red'>Đến trang giỏ hàng</div></a>";
?>