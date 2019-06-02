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
	#formthanhtoan{
		width:60%;
		margin:30px 0px 5px 150px;
		border-radius:15px;
		border:solid #999;
		background:#F5F6F6;
	}
	h3{
		text-align:center;
		margin-top:25px;
		text-decoration:underline;
		color:#F00;
	}
	.group{
		margin:15px 5px 0px 100px;
	}
	.lable{
		font-size:18px;
		font-family:"Times New Roman", Times, serif;
	}
	.input input{
		font-size:18px;
		font-family:"Times New Roman", Times, serif;
		margin-top:3px;
	}
	.submitbt{
		margin-top:25px;
		margin-bottom:15px;
		height:40px;
		width:140px;
		line-height:40px;
		font-size:16px;
		background:#666;
		color:#FFF;
		text-align:center;
	}
	.submitbt:hover{
		color:#000;
		background:#099;
	}
</style>
<?php
	if(isset($_SESSION['username']))
	{
		$user=$_SESSION['username'];
		$sql="select * from user where username = '$user'";
		mysqli_query($con,"SET NAMES 'utf8'");
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);	
	}
?>
<div class="tieude">THANH TOÁN</div>
<form action="" method="post">
<div id="formthanhtoan">
	<h3>ĐIỀN ĐẦY ĐỦ THÔNG TIN VÀO ĐƠN HÀNG</h3>
	<div class="group">
    	<label for="name" class="lable">Họ và tên</label>
        <div class="input">
 			<input type="text" name="name" id="name" size="25" required="required" value="<?php if(isset($_SESSION['username'])) echo $row['fullname']; else echo ""; ?>" />
        </div>
    </div>
    <div class="group">
    	<label for="email" class="lable">Email</label>
        <div class="input">
        	<input type="text" name="email" id="email" size="25" required="required" value="<?php if(isset($_SESSION['username'])) echo $row['email']; else echo ""; ?>" />
        </div>
    </div>
    <div class="group">
    	<label for="address" class="lable">Địa chỉ</label>
        <div class="input">
        	<input type="text" name="address" id="address" size="25" required="required" value="<?php if(isset($_SESSION['username'])) echo $row['address']; else echo ""; ?>" />
        </div>
    </div>
    <div class="group">
    	<label for="phone" class="lable">Số điện thoại</label>
        <div class="input">
        	<input type="text" name="phone" id="phone" size="25" required="required" value="<?php if(isset($_SESSION['username'])) echo $row['phone']; else echo ""; ?>" />
        </div>
    </div>
    <div class="group">
    	<label for="note" class="lable">Ghi chú</label>
        <div class="input">
        	<textarea id="note" name="note" rows="5" cols="35"></textarea>
        </div>
    </div>	
    <div align="center"><input type="submit" value="THANH TOÁN" name="thanhtoan" class="submitbt" /></div>
</div>
</form>
<?php
//them vao don hang
	if(isset($_POST['thanhtoan']))
	{
		if(isset($_SESSION['username']))
		{
			$iduser=$row['iduser'];
			$sql_dh="INSERT INTO donhang(iduser,tongtien) VALUES ('{$iduser}','{$_SESSION['total']}')";
			mysqli_query($con,"SET NAMES 'utf8'");
			$result1=mysqli_query($con,$sql_dh);
		}
		else
		{
			$iduser='unknown';
			$sql_dh="insert into donhang(iduser,tongtien) values ('unknown','{$_SESSION['total']}')";
			mysqli_query($con,"SET NAMES 'utf8'");
			$result1=mysqli_query($con,$sql_dh);	
		}
		$last_iddh= mysqli_insert_id($con);
		foreach ($_SESSION["cart"] as $key => $value){
			$sql_ctdh="INSERT INTO chitietdonhang(iddh, iduser, fullname, email, address, phone, idsp, tensp, giasp, soluong, tongtien, ghichu) VALUES ('{$last_iddh}','{$iduser}','{$_POST['name']}','{$_POST['email']}','{$_POST['address']}','{$_POST['phone']}','{$key}','{$value['tensp']}','{$value['giasp']}','{$value['soluong']}','{$_SESSION['total']}','{$_POST['note']}')";
			mysqli_query($con,"SET NAMES 'utf8'");
			$result2=mysqli_query($con,$sql_ctdh);
		}
		if($sql_dh)
		{
			echo '<script>document.getElementById("formthanhtoan").innerHTML=`<center><a href="index.php" class="submit">Đặt Hàng Thành Công! Quay lại Trang Chủ</a></center>`;</script>';
			unset($_SESSION['cart']);
		}
	}
?>
