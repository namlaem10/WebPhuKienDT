<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8mb4" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<div class="button_themsp">
<a href="index.php?quanly=sanpham&ac=lietke">Liệt kê sp</a> 
</div>
<form action="modules/quanlysanpham/xuly.php" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="600" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Thêm  sản phẩm</td>
  </tr>
  <tr>
    <td width="97">Tên sản phẫm</td>
    <td width="87"><input type="text" name="tensp"></td>
  </tr>
  <tr>
    <td>Mã SP</td>
    <td><input type="text" name="masp"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" /></td>
  </tr>
  <tr>
    <td>Giá đề xuất</td>
    <td><input type="text" name="giasp"></td>
  </tr>
  <tr>
    <td>Chi tiết</td>
    <td><textarea name="chitiet" cols="40" rows="10"></textarea></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluongsp"></td>
  </tr>
   <tr>
    <td>Số lượng mua</td>
    <td><input type="text" name="soluongmua"></td>
  </tr>
  <tr>
  <?php
  $sql_lpk = "select idlpk,tenlpk from loaiphukien";
  $row_lpk=mysqli_query($con,$sql_lpk);
  ?>
    <td>Loại sản phẩm</td>
    <td><select name="idlpk">
    <?php
	while($dong_lpk=mysqli_fetch_array($row_lpk)){
	?>
    	<option  value="<?php echo $dong_lpk['idlpk'] ?>"><?php echo $dong_lpk['tenlpk'] ?></option>
        <?php
	}
		?>
    </select></td>
  </tr>
  <tr>
      <?php
  $sql_hpk = "select * from hangphukien";
  $row_hpk=mysqli_query($con,$sql_hpk);
  ?>
    <td>Tên nhà sx</td>
    <td><select name="idhpk">
    <?php
	while($dong_hpk=mysqli_fetch_array($row_hpk)){
	?>
    	<option value="<?php echo $dong_hpk['idhpk'] ?>"><?php echo $dong_hpk['tenhpk'] ?></option>
        <?php
	}
		?>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="Thêm sản phẩm">
    </div></td>
  </tr>
</table>
<style>
.button_themsp a{
	color:#fff;
	display:block;
	text-decoration:none;
}
</style>
</form>


