<?php
    include("connect.php");  
?>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
	$sup_name = $_POST["sup_name"];
    $sup_last = $_POST["sup_last"];
	$sup_add = $_POST["sup_add"];
	$sup_phone = $_POST["sup_phone"];
	$sup_qty = $_POST["sup_qty"];
	$sup_date = $_POST["sup_date"];
	$sup_total = $_POST["sup_total"];
	$sup_dttm = Date("Y-m-d G:i:s");
	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($conn, "BEGIN"); 
	$sql1	= "insert into supplies_1 values(null, '$sup_dttm', '$sup_name', '$sup_last' , '$sup_add' , '$sup_phone', '$sup_date' , '$sup_qty', '$sup_total')";
	$query1	= mysqli_query($conn, $sql1);
	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "select max(sup_id) as sup_id from supplies_1 where sup_name='$sup_name'  and sup_dttm='$sup_dttm' ";
	$query2	= mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($query2);
	$sup_id = $row["sup_id"];
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $product_id=>$stock_qty)
	{
		$sql3	= "select * from product where product_id = '$product_id' ";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$stock_total	= $row3['product_price']*$stock_qty;
		print_r($sql3);
		exit;
		
		$sql4	= "insert into stock_1 values(null, '$sup_id', '$product_id', '$stock_qty', '$stock_total')";
		$query4	= mysqli_query($conn, $sql4);
	}
	
	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $product_id)
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='?page=stock';
</script>
