<?php
	session_start();
?>
<div class="button_themsp">
<a href="index.php?quanly=user&ac=lietke">Liệt kê User</a></div>
<form action="modules/quanlyuser/xuly.php" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="600" border="1">
  <tr>
    <td colspan="2"  style="text-align:center;font-size:25px;">Thêm User</td>
  </tr>
  <tr>
    <td width="97">FullName</td>
    <td width="87"><input type="text" name="fullname"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email"></td>
  </tr>
    <tr>
    <td>Phone</td>
    <td><input type="text" name="phone"></td>
  </tr>
    <tr>
    <td>Address</td>
    <td><input type="text" name="address"></td>
  </tr>
  <tr>
    <td>User Name</td>
    <td><input type="text" name="username" /></td>
  </tr>
  <tr>
    <td>PassWord</td>
    <td><input type="password" name="password" cols="40" rows="10"></td>
  </tr>
  <?php
  	$level = $_SESSION['level'];
	if($level==2)
  	echo '<tr><td>Level</td> <td><input type="text" name="level"></td></tr>';
	if($level==1)
	echo '<tr><td>Level</td> <td>0</td></tr>';
  ?>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="Thêm User">
    </div></td>
  </tr>
</table>
</form>


