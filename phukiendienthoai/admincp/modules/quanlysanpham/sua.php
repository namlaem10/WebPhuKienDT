
<?php
	$sql = "select * from sanpham where idsp='$_GET[id]' ";
	$row=mysqli_query($con,$sql);
	$col=mysqli_fetch_array($row);
 ?>
<div class="button_themsp">
<a href="index.php?quanly=sanpham&ac=lietke">Liệt kê sp</a> 
</div>
<form action="modules/quanlysanpham/xuly.php?id=<?php 	echo $col['idsp'] ?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="600" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Sửa sản phẩm</td>
  </tr>
  <tr>
    <td width="97">Tên sản phẫm</td>
    <td width="87"><input type="text" name="tensp" value="<?php echo $col['tensp'] ?>"></td>
  </tr>
  <tr>
    <td>Mã SP</td>
    <td><input type="text" name="masp" value="<?php echo $col['masp'] ?>"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" /></td>
  </tr>
  <tr>
    <td>Giá đề xuất</td>
    <td><input type="text" name="giasp" value="<?php echo $col['giasp'] ?>"></td>
  </tr>
  <tr>
    <td>Nội dung</td>	
    <td><textarea name="chitiet" cols="40" rows="10"><?php echo $col['chitiet'] ?></textarea></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong" value="<?php echo $col['soluongsp'] ?>"></td>
  </tr>
  <tr>
  <?php
  $sql_loaisp = "select * from loaiphukien";
  $row_loaisp=mysqli_query($con,$sql_loaisp);
  ?>
    <td>Loại sản phẩm</td>
    <td><select name="loaisp">
     <?php
	while($col_loaisp=mysqli_fetch_array($row_loaisp)){
		if($col['loaiphukien']==$col_loaisp['idlpk']){
	?>
    	<option selected="selected" value="<?php echo $col_loaisp['idlpk'] ?>"><?php echo $col_loaisp['tenlpk'] ?></option>
        <?php
	}else{
		?>
       <option value="<?php echo $col_loaisp['idlpk'] ?>"><?php echo $col_loaisp['tenlpk'] ?></option>
        <?php
	}
	}
		?>
    </select></td>
  </tr>
  <tr>
      <?php
  $sql_hieusp = "select * from hangphukien";
  $row_hieusp=mysqli_query($con,$sql_hieusp);
  ?>
    <td>Tên nhà sx</td>
    <td><select name="nhasx">
    <?php
	while($col_hieusp=mysqli_fetch_array($row_hieusp)){
		if($col['hangphukien']==$col_hieusp['idhpk']){
	?>
    	<option selected="selected" value="<?php echo $col_hieusp['idhpk'] ?>"><?php echo $col_hieusp['tenhpk'] ?></option>
        <?php
	}else{
		?>
        <option value="<?php echo $col_hieusp['idhpk'] ?>"><?php echo $col_hieusp['tenhpk'] ?></option>
        <?php
	}
	}
		?>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="Sửa sản phẩm">
    </div></td>
  </tr>
</table>
</form>


