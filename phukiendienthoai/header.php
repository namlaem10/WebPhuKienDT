
<style>
.header{
	width:100%;
	height:217px;
}
.top{
	width:100%;
	height:120px;
	border-bottom:solid 1px #000;
	background-color:#396;
}
.menu{
	width:100%;
	height:50px;
	background-color:#54BF83;
	border-bottom:solid 1px #000;
}
.menu ul{
	width:100%;
	height:50px;
	list-style-type:none;
}
.menu ul .sub{
	float:left;
	width:136.4px;
	height:50px;
	line-height:50px;
	text-align:center;
	border-right:1px solid #CCC;
}
.menu ul .sub a{
	text-decoration:none;
	color:#FFF;
	font-weight:bold;
	display:block;
	font-size:24px;
}
.menu ul .sub a:hover{
	color:#000;
	background-color:#FFF;
}
.menu ul .sub1{
	float:left;
	width:136.4px;
	height:50px;
	line-height:50px;
	text-align:center;
	border-right:1px solid #CCC;
}
.menu ul .sub1 a{
	font-size:16px;
}
.search{
	width:100%;
	height:46px;
	border-bottom:solid 1px #000;
}
.filter{
	float:left;
	font-size:15px;
	overflow:hidden;
	clear:both;
	margin-left:2px;
	color:#333;
}
.item{
	float:left;
	margin-left:6px;
	font-weight:bold;
	line-height:46px;
	height:46px;
	border-radius:3px;
	color:#333;
	font-size:16px;
	}
.item select{
	background:#FFF;
	border:1px solid #000;
	color:#000;
	padding:3px;
	height:25px;
	border-radius: 3px;
	}
.item select option {
	border:1px solid #333;
    line-height: 26px;
    font-size: 14px;
}
#keysearch{
	float:left;
}
.keyword{
	width:285px;
	height:40px;
	border: 1px solid #000;
	border-radius: 3px;
	float:left;
	margin-top:2px;
	padding: 0px 12px;		
	line-height:35px;
	font-size:12px;
	box-shadow: 0 1px 0 0 #666;
}
.welcome{
	font-size:24px;
	margin-top:45px;
	float:right;
	height:auto;
	width:350px;
	color:#FFF;
}
#divlogin{
	margin-top:15px;
	margin-right:30px;
	float:right;
	height:auto;
	width:450px;
}
.lablelogin{
	color:#FFF;
	padding-bottom:5px;
	font-size:20px;
}
.inputtext{
	margin-right:12px;
	height:30px;
	width:150px;
	margin-bottom:5px;
}
.submit {
  margin-left:10px;
  border: none;
  background: #2F2F2F;
  cursor: pointer;
  border-radius: 3px;
  width: 80px;
  height:30px;
  color:#FFF;
  transform: translateY(-3px);
  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
}
.submit:hover {
	  transform: translateY(-6px);
  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
}
.labelforget a{
	font-size:14px;
	color:#FFF;
}
.labelforget a:hover{
	font-style:oblique;
	text-decoration:underline;
}
</style>
<div class="header">
    	<div class="top">
        	<div style="margin-left:25px; float:left; margin-top:10px;"><img src="../abc/logo1.png" width="450" height="100" /></div>
 
	 <?php	 	
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			$sql = "SELECT * from user where username = '$username'";
			mysqli_query($con,"SET NAMES 'utf8'");
			$result=mysqli_query($con,$sql);
			$row=mysqli_query($con,$sql);
			$col=mysqli_fetch_array($row);
			$_SESSION['level']=$col['level'];
			$level = $_SESSION['level'];		
			if(mysqli_fetch_array($result)>0)
			{
				echo "<div class='welcome'>Xin chào <strong><em>".$_SESSION['username']."</em></strong><a href='?action=logout'><button type='button' value='logout' class='submit';>Đăng Xuất</button></a></div>";
			}	
		}	
		else
		{
			$level=0;
			include('content/login.php');
		}
	?>
        </div>
    	<div class="menu">
        	<ul>
            	<li class="sub"><a href="index.php">Trang chủ</a></li>
                <li class="sub"><a href="?action=sanpham">Sản phẩm</a></li>
                <li class="sub"><a href="#">Giới thiệu</a></li>
                <li class="sub"><a href="#">Bảo hành</a></li>
                <li class="sub"><a href="#">Khuyến mãi</a></li>
                <li class="sub"><a href="#">Liên hệ</a></li>
                <?php
						
					if($level >0)
					echo '<li class="sub"><a href="admincp/index.php">'."Quản Trị".'</a></li>';
				?>   
                <li class="sub1"><a href="?action=giohang"><img src="../abc/cart1.png" height="50" width="50" /></a></li>
            </ul>
        </div>
        <div class="search">
        	<form method="post" id="search">
                <div class="filter">
                <div align="center" id="keysearch">
                    <input class="keyword" type="text" autocomplete="off" name="search" placeholder="Nhập tên sản phẩm cần tìm..." />
                </div>
                <div class="item">
                    <span>Tìm theo hãng</span>
                    <select name="hpk" class="hpk">
                        <option value="0">--Tất cả--</option>
                    <?php
						$sql="SELECT * FROM hangphukien";
						$result=mysqli_query($con,$sql);
						// Đếm số đong trả về trong sql.
						$tong = mysqli_query($con,"select count(idhpk) as total from hangphukien");
						$sodong = mysqli_fetch_assoc($tong);
						$total_record = $sodong['total'];
						if ( $total_record >0 ) 
						{                
							while ($row = mysqli_fetch_assoc($result)){				
								?>  
								<option value="<?php echo $row['idhpk']?>"><?php echo $row['tenhpk'] ?> </option>
								<?php
							}}
					?>  
                    </select>
                </div>
                <div class="item">
                    <span>Tìm theo loại</span>
                    <select name="lpk" class="lpk">
                        <option value="0">--Tất cả--</option>
                        <?php
							$sql="SELECT * FROM loaiphukien";
							$result=mysqli_query($con,$sql);
							// Đếm số đong trả về trong sql.
							$tong = mysqli_query($con,"select count(idlpk) as total from loaiphukien");
							$sodong = mysqli_fetch_assoc($tong);
							$total_record = $sodong['total'];
							if ( $total_record >0 ) 
							{                
								while ($row = mysqli_fetch_assoc($result)){				
									?>  
									<option value="<?php echo $row['idlpk']?>"><?php echo $row['tenlpk'] ?> </option>
									<?php
								}}
						?> 
                    </select>
                </div>
                <div class="item">
                         <span> Giá sản phẩm </span>
                         <select name="gia" class="gia">
                            <option value="0">-Tất cả-</option>
                            <option value="1"> Dưới 100 nghìn</option>
                            <option value="2"> 100-500 nghìn</option>
                            <option value="3"> Trên 500 nghìn</option>
                         </select>
                </div>
                </div>
                <br />
            </form>
        </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function(){
            $(".keyword").keyup(function(){
				$.get("xuly_tk.php",{timkiem:$("input[name='search']").val(),hpk:$("select[name='hpk']").val(),lpk:$("select[name='lpk']").val(),gia:$("select[name='gia']").val()},function(data){
					$("#contentright").html(data);
				})
			})
        });
		$(document).ready(function(){
            $(".gia").change(function(){
				$.get("xuly_tk.php",{timkiem:$("input[name='search']").val(),hpk:$("select[name='hpk']").val(),lpk:$("select[name='lpk']").val(),gia:$("select[name='gia']").val()},function(data){
					$("#contentright").html(data);
				})
			})
        });
		$(document).ready(function(){
            $(".hpk").change(function(){
				$.get("xuly_tk.php",{timkiem:$("input[name='search']").val(),hpk:$("select[name='hpk']").val(),lpk:$("select[name='lpk']").val(),gia:$("select[name='gia']").val()},function(data){
					$("#contentright").html(data);
				})
			})
        });
		$(document).ready(function(){
            $(".lpk").change(function(){
				$.get("xuly_tk.php",{timkiem:$("input[name='search']").val(),hpk:$("select[name='hpk']").val(),lpk:$("select[name='lpk']").val(),gia:$("select[name='gia']").val()},function(data){
					$("#contentright").html(data);
				})
			})
        });
	</script>
			