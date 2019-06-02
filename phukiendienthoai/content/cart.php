<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>
	<?php
	if(isset($_GET["id"]) && isset($_GET["soluong"])){
	//update gio hang
		$sql = "SELECT * from sanpham where idsp =".$_GET["id"];
		mysqli_query($conn,"SET NAMES 'utf8'");
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		if($_GET["soluong"] > 0){
			if($_GET["soluong"] > 3){
				$_SESSION['cart'][$_GET['id']]=array(
				"soluong"=>3,
				"tensp"=>$row['tensp'],
				"giasp"=>$row['giasp'],
				"hinhanh"=>$row['hinhanh']
				);
			}
			else{
				$_SESSION["cart"][$_GET["id"]]=array(
				"soluong"=>$_GET["soluong"],
				"tensp"=>$row['tensp'],
				"giasp"=>$row['giasp'],
				"hinhanh"=>$row['hinhanh']
				);
			}
		}	
		else{
			$_SESSION["cart"][$_GET["id"]]=array(
			"soluong"=>1,
			"tensp"=>$row['tensp'],
			"giasp"=>$row['giasp'],
			"hinhanh"=>$row['hinhanh']
			);
		}	
	}
	if(isset($_GET["action2"]) && isset($_GET["id"]))
	{
		unset($_SESSION["cart"][$_GET["id"]]);
	}
	
?>

<div id="tablegiohang">
	<div class="tieude">GIỎ HÀNG</div>
    <table class="tablecart">
    	<tr>
        	<th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Image</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <th>Action</th>
        </tr>
        <?php
			if(!empty($_SESSION["cart"])){
				$i=0;
				$total=0;
				foreach ($_SESSION["cart"] as $key => $value)
				{
					$i++;
		?>
       	<tr>
        	<td><?php echo $i; ?></td>
            <td>
            	<?php echo $_SESSION["cart"][$key]["tensp"] ?>
            </td>
            <td>
           		<?php echo '<img src="../abc/'.$_SESSION["cart"][$key]["hinhanh"].'">' ?>
            </td>
            <td>
            	<?php echo $_SESSION["cart"][$key]["giasp"].' VNĐ' ?>
            </td>
            <td>
            	<input type="text" name="soluong_<?php echo $key ?>" id="soluong_<?php echo $key ?>" onkeyup="checksl(<?php echo $key ?>)" value="<?php echo $_SESSION["cart"][$key]["soluong"] ?>">
            </td>
            <td>
            	<?php
					echo ($_SESSION["cart"][$key]["soluong"])*($_SESSION["cart"][$key]["giasp"]).' VNĐ';
					$total += ($_SESSION["cart"][$key]["soluong"])*($_SESSION["cart"][$key]["giasp"]);
				?>
            </td>
            <td>
            	<a href="javascript:void(0)" onClick="updateitem(<?php echo $key ?>)">Update</a>
                <a href="javascript:void(0)" onClick="deleteitem(<?php echo $key ?>)">Delete</a>
            </td>
        </tr>
        <?php
				}
			}
		?>
        <tr>
        	<td colspan="5">Tổng Tiền</td>
            <td id="totalmoney" colspan="2">
            	<?php
					if($total==0)
						echo "Cart is empty !!!";
					else
						$_SESSION['total']=$total;
						echo $_SESSION['total'];
				?>
            </td>
        </tr>
    </table>
    <?php
		if(!empty($_SESSION["cart"])){
         	echo '<div align="center" class="button"><a href="index.php?action=thanhtoan"><button id="button">THANH TOÁN</button></a></div>';
		}
	?>
    <script>
		function updateitem(id){
			soluong = $("#soluong_"+id).val();
			$.get("index.php?action=giohang&id="+id+"&soluong="+soluong,function(data){
				location.reload();
			})
		}
		function deleteitem(id){
			$.get("index.php?action=giohang&id="+id+"&action2=del",function(data){
				location.reload();
			})
		}
		function checksl(id)
		{
			soluong=$("#soluong_"+id).val();
			if(soluong <0 || soluong >3)
			{
				alert('Số lượng không vượt quá 3 sản phẩm');
				document.getElementById("soluong_"+id).focus();
				return false;	
			}
			return true;	
		}
	</script>
</div>

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
table{
	margin-top:5px;
}
#totalmoney{
	font-size:25px;
	text-decoration:underline;
}
.tablecart {border-collapse:collapse;}
.tablecart, .tablecart th, .tablecart td {
	font-size:18px;
	border: 1px solid #000;
	color:#000;}
.tablecart th,.tablecart td{
	text-align:center;
	width:120px;
}
.tablecart td{
	height:86px;
}
.tablecart img{
	height:70px;
	width:100px;
}
.tablecart a{
	color:#000;
}
.tablecart a:hover{
	color:#F00;
}
#button{
	margin-top:8px;
	height:40px;
	width:140px;
	line-height:40px;
	font-size:18px;
	background:#666;
	color:#FFF;
}
.button a #button:hover{
	color:#000;
	background:#099;
}
</style>