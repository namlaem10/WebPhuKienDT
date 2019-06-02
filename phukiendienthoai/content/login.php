             <?php 		
				if(isset($_POST["user"]))
				{				
					
					$username=$_POST["user"];
					$password=$_POST["pass"];
					$sql="select * from user where username='$username' and password='$password'";
					$result=mysqli_query($con,$sql);
					mysqli_query($con,"SET NAMES 'utf8'");
					$count=mysqli_num_rows($result);
					$row=mysqli_query($con,$sql);
					$col=mysqli_fetch_array($row);
					if($count==0)
					{
						echo "<script> alert ('Bạn nhập sai tên tài khoản hoặc mật khẩu') </script>";
					}
					else	
					{

						$_SESSION['username'] = $username;
						$_SESSION['level']=$col['level'];
						$level=$_SESSION['level'];
						header('location:index.php');
					}
				}
			?>
            <div id="divlogin">
                <table id="tableloginmini">
                    <tr>
                        <td class="lablelogin">Tên Đăng Nhập</td>
                        <td class="lablelogin">Mật Khẩu</td>
                    </tr>
                    <form id="tableloginmini" method="post">
                    <tr>
                        <td>
                            <input type="text" class="inputtext" name="user" />
                        </td>
                        <td>
                            <input type="password" class="inputtext" name="pass" />
                        </td>
                        <td>
                            <input type="submit" class="submit" value="Đăng nhập" />
                        </td>
                    </tr>
                    </form>
                    <tr>
                        <td class="labelforget"><a href="index.php?action=register">Chưa có tài khoản? Đăng ký!</a></td>
                    </tr>
                </table>
        	</div>