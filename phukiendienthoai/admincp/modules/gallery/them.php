<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	$id=$_GET['id'];
?>
<h3>Thêm hình ảnh sản phẩm</h3>
<form action="modules/gallery/xuly.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
<center><p style="margin-top:100px;margin-bottom:5px;"><input type="file" name="file[]" multiple ></p></center>
<center><p><input type="submit" name="upload" value="Uploads" ></p></center>
</form>