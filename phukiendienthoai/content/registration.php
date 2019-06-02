<script src="../jquery-3.3.1.js"></script>
<script type="text/javascript">
	function ktra()
	{
		var CheckEmail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!CheckEmail.test(document.getElementById("email").value))
		{
			 alert("Nhập địa chỉ email chưa hợp lệ \n abc@gmail.com");
             document.getElementById("email").focus(); 
             return false; 
		}
		if(isNaN(document.getElementById("phone").value))
		{
			 alert("Nhập sai số điện thoại");
             document.getElementById("password").focus(); 
             return false;	
		}
		if(document.getElementById("phone").value.length!=10 && document.getElementById("phone").value.length!=11)
		{
			 alert("Nhập sai số điện thoại");
             document.getElementById("password").focus(); 
             return false;
		}
		if(document.getElementById("password").value != document.getElementById("confirmpassword").value)
		{
			 alert("Nhập lại mật khẩu không trùng khớp");
             document.getElementById("password").focus(); 
             return false;
		}
	}
</script>
<div align="center" style="margin-top:100px;">
	<form action="index.php" method="post" onsubmit="return ktra()">
        <table border="2">
            <tr>
                <td colspan="2"><div align="center" style="font-weight:900; font-size:30px">REGISTER</div></td>
            </tr>
            <tr>
                <td><div align="center" style="width:35px; height:25px"><img src="../abc/name.png" width="25" height="25"></div></td>
                <td><div><input type="text" required="required" value="" name="name" size="25px" placeholder="Enter your name" /></div></td>
            </tr>
            <tr>
                <td><div align="center" style="width:35px; height:25px"><img src="../abc/mail.png" width="25" height="25"></div></td>
                <td><div><input type="text" required="required" value="" id="email" name="email" size="25px" placeholder="Enter your email" /></div></td>
            </tr>
            <tr>
                <td><div align="center" style="width:35px; height:25px"><img src="../abc/address.png" width="25" height="25"></div></td>
                <td><div><input type="text" required="required" value="" name="address" size="25px" placeholder="Enter your address" /></div></td>
            </tr>
            <tr>
                <td><div align="center" style="width:35px; height:25px"><img src="../abc/phone.png" width="25" height="25"></div></td>
                <td><div><input type="text" required="required" value="" id="phone" name="phone" size="25px" placeholder="Enter your phone" /></div></td>
            </tr>
            <tr>
                <td><div align="center" style="width:35px; height:25px"><img src="../abc/user.png" width="25" height="25"></div></td>
                <td><div><input type="text" required="required" value="" id="username" name="username" size="25px" placeholder="Enter your username" /></div><div id="result">Check Username</div></td>
            </tr>
            <tr>
                <td><div align="center" style="width:35px; height:25px"><img src="../abc/password.png" width="25" height="25"></div></td>
                <td><div><input type="password" required="required" value="" id="password" name="password" size="25px" placeholder="Enter your password" /></div></td>
            </tr>
            <tr>
                <td><div align="center" style="width:35px; height:25px"><img src="../abc/password.png" width="25" height="25"></div></td>
                <td><div><input type="password" required="required" value="" id="confirmpassword" name="confirmpassword" size="25px" placeholder="Confirm your password" /></div></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><div><input type="submit" value="Register" name="register" style="color:#FFF; font-weight:bold; text-align:center; width:100px;; height:30px; font-size:14px; background-color:#999" /></div></td>
            </tr>
        </table>
	</form>
</div>
<script>
	$(document).ready(function(){
		$("#username").keyup(function(){
			$.post("content/xuly_dk.php",{username:$("input[name=username]").val()},function(html){
				$("#result").html(html);	
			})
		})	
	});
</script>


