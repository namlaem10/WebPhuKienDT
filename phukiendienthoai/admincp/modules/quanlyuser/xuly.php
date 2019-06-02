<?php

	if(isset($_POST['them']))
	{
	include('../config.php');
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$level=$_POST['level'];
		//them
		$sql_them=("insert into user (fullname,email,address,phone,username,password,level) value('$fullname','$email','$address','$phone','$username','$password','$level')");
		mysqli_query($con,$sql_them);
		echo'<script>window.location="../../index.php?quanly=user&ac=lietke"</script>'		;
	}
	elseif(isset($_POST['sua']))
	{
	include('../config.php');
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$level=$_POST['level'];
		//sua
	  $sql_sua = "update user set fullname='$fullname',email='$email',phone='$phone',address='$address',username='$username',password='$password',level='$level' where iduser='$_GET[id]'";
		mysqli_query($con,$sql_sua);
		header('location:../../index.php?quanly=user&ac=lietke');
	}
	else
	{
		include('../config.php');
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$level=$_POST['level'];
		$sql_xoa = "delete from user where iduser = $_GET[id]";
		mysqli_query($con,$sql_xoa);
		echo'<script>window.location="../../index.php?quanly=user&ac=lietke"</script>';
	}

?>
