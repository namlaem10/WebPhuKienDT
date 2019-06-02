<?php
	if(isset($_GET['masp'])){
	$search=$_GET['masp'];
	$con=mysqli_connect('localhost','root','','phukiendienthoai') or die('Ko kết nối được');
	mysqli_query($con,"SET NAMES 'utf8'");
	echo 'Mã tìm kiếm :<strong>'.' '.$search.'</strong><br/>';
	$sql_timkiem="select * from sanpham,loaiphukien,hangphukien where sanpham.idlpk=loaiphukien.idlpk and sanpham.idhpk=hangphukien.idhpk and  masp like '%$search%'";
	$row_timkiem=mysqli_query($con,$sql_timkiem);
	$count=mysqli_num_rows($row_timkiem);	
?>
<h3>Kết quả tìm kiếm</h3>

<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>Tên sản phẩm</td>
    <td>Mã sp</td>
    <td>Hình ảnh</td>
    <td>Giá đề xuất</td>
    <td>Số lượng</td>
    <td>Số lượng mua</td>
    <td>Tình trạng</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  while($dong=mysqli_fetch_array($row_timkiem)){

  ?>
  <tr>
    <td><?php echo $dong['idsp'] ?></td>
    <td><?php echo $dong['tensp'] ?></td>
    <td><?php echo $dong['masp'] ?></td>
    <td><img src="modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="80" height="80" /></td>
    <td><?php echo $dong['giasp'] ?></td>
    <td><?php echo $dong['soluongsp'] ?></td>
    <td><?php echo $dong['soluongmua'] ?></td>
    <td><?php echo $dong['tinhtrang'] ?></td>
    <td><a href="index.php?quanly=sanpham&ac=sua&id=<?php echo $dong['idsp'] ?>"><center><img src="../imgs/edit.png" width="30" height="30" /></center></a></td>
    <td><a href="modules/quanlysanpham/xuly.php?id=<?php echo $dong['idsp']?>"><center><img src="../imgs/delete.png" width="30" height="30" /></center></a></td>
  </tr>
  <?php
  }
	}else{
	  echo 'Không tìm thấy kết quả';
  }
  ?>
</table>
