<?php
	$sql = "select * from user where idhd='$_GET[id]' ";
	$row=mysqli_query($con,$sql);
	$col=mysqli_fetch_array($row);
 ?>
<div class="button_themsp">
<a href="index.php?quanly=user&ac=lietke">Liệt kê User</a> 
</div>
<form action="modules/quanlyuser/xuly.php?id=<?php echo $col['idhd'] ?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="600" border="1">
  <tr>
    <td colspan="2"  style="text-align:center;font-size:25px;">Sửa User</td>
  </tr>
  <tr>
    <td width="97">Tên User</td>
    <td width="87"><input type="text" name="fullname" value="<?php echo $col['fullname'] ?>"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input
     type="text" name="email" value="<?php echo $col['email'] ?>"></td>
  </tr>
    <tr>
    <td>Phone Number</td>
    <td><input type="text" name="phonenumber" value="<?php echo $col['phonenumber'] ?>"></td>
  </tr>
    <tr>
    <td>Address</td>
    <td><input type="text" name="address" value="<?php echo $col['address'] ?>"></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input type="text" name="username" value="<?php echo $col['username'] ?>" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="password" value="<?php echo $col['password'] ?>"></td>
  </tr>
 
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="Sửa Thông Tin User	">
    </div></td>
  </tr>
</table>
</form>


