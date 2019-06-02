<?php
	$con=mysqli_connect("localhost","root","","phukiendienthoai");
	if(isset($_POST['username']))
	{
		$username=$_POST['username'];
		$sql="select * from user where username ='$username'";
		mysqli_query($con,"SET NAMES 'utf8'");
		$result=mysqli_query($con,$sql);
		$row=mysqli_num_rows($result);
		if($row>0)
			echo "<div id='notsucess' style='color:red;'>Username Invalid <img src='../abc/not-available.png' width='15' height='15' /></div>";
		else
			echo "<div id='sucess' style='color:green;'>Username Available <img src='../abc/available.png' width='15' height='15' /></div>";
	}
?>



