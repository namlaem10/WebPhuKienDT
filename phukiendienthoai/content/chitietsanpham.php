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
	.box_chitietsp{
		width:auto;
		height:555px;
		border:1px solid #CCC;
		margin:2px;
	}
	.box_hinhanh{
		margin:10px;
		width:365px;
		height:300px;
		float:left;
		border:1px solid #E1E1E1;
	}
	.box_info{
		margin:10px;
		width:365px;
		height:300px;
		float:right;
		border:1px solid #E1E1E1;
	}
	.box_info div{
		margin:14px;
		font-size:25px;
		font-weight:900;
		text-decoration:underline;
		color:#F00;
	}
	.box_info p{
		margin:10px;
		font-size:18px;
	}
	.box_motasp{
		margin:10px;
		width:753px;
		height:auto;
		clear:both;
		border:1px solid #E1E1E1;
	}
	.box_motasp p{
		margin:10px;
		font-size:20px;
	}
	.clear{
		clear:both;
	}
</style>
<?php
	$id=$_GET['id'];
	$sql="select * from sanpham where idsp='$id'";
	$id=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($id);
?>
	<div class="tieude">CHI TIẾT SẢN PHẨM</div>
   	<div class="box_chitietsp">
        <div class="box_hinhanh">
        	<img src="../abc/<?php echo $row['hinhanh'] ?>" width="365" height="300" />
        </div>
        <form method="post">
        <div class="box_info">
            <div align="center">Thông tin sản phẩm</div>
            <p><strong>+ Tên sản phẩm: </strong><?php echo $row['tensp'] ?></p>
            <p><strong>+ Mã sản phẩm:</strong>  <?php echo $row['masp'] ?> </p> 
            <p><strong>+ Giá bán:</strong><span style="color:#F00;"> <?php echo number_format($row['giasp']).' '.'VNĐ'?></span></p> 
            <p><strong>+ Tình trạng:</strong> Còn hàng </p> 
            <p><strong>+ Số lượng:</strong><input type="text" id="soluong" name="soluong" size="3" value="1" /></p>
            <div align="center"><a href="?action=themgiohang&id=<?php echo $row['idsp'] ?>"><input type="button" name="addcart" value="Thêm vào giỏ hàng" style="margin:10px;width:200px;height:40px;background:#54BF83;color:#FFF;font-size:18px;border-radius:8px;" /></a></div>              
		</div>
        </form>
        <div class="box_motasp"><p style="margin-left:20px; font-size:25px; font-weight:900; text-decoration:underline; color:#F00;">Mô tả sản phẩm</p><p><?php echo $row['chitiet']; ?></p></div>
	</div>
    <div class="clear"></div>
    <script>
		function soluong(id)
		{
			
		}
	</script>
    