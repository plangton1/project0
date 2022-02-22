<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Detail</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<?php
//connect db
    include("connect.php");
	if(isset($_GET)){
	$product_id = $_GET['product_id']; //สร้างตัวแปร product_id เพื่อรับค่า
	
	$sql = "SELECT * FROM product WHERE product_id= '$product_id' ";  //รับค่าตัวแปร product_id ที่ส่งมา
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	}?>
	<table class="table table-boredered">
<thead>
	<tr>
		<td>ชื่อ</td>
		<td>สถานะ</td>
	</tr>
</thead>
<tbody>
	<tr>
		<th><?php echo $row['product_name'] ; ?></th>
		<th><a href='?page=<?= $_GET['page'] ?>&function=stock&product_id=<?php echo $row['product_id'] ; ?>&act=add'> เพิ่มลงตะกร้าสินค้า </a></th>
	</tr>
</tbody>
	</table>

<p><center><a href="?page=stock">กลับไปหน้ารายการสินค้า</a></center>
</body>
</html>