<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Detail</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="600" border="0" align="center" class="square">
  <tr><td colspan="3" bgcolor="#CCCCCC"><b>Product</b></td></tr>
  
<?php
//connect db
    include("./connect.php");
	if(isset($_GET)){
	$product_id = $_GET['product_id']; //สร้างตัวแปร product_id เพื่อรับค่า
	
	$sql = "SELECT * FROM product WHERE product_id= '$product_id' ";  //รับค่าตัวแปร product_id ที่ส่งมา
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	//แสดงรายละเอียด
	echo "<tr>";
  	echo "<td width='85' valign='top'><b>Title</b></td>";
    echo "<td width='279'>" . $row["product_name"] . "</td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'><b>Detail</b></td>";
    echo "<td>" . $row["product_detail"] . "</td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'><b>Price</b></td>";
    echo "<td>" .number_format($row["product_price"],2) . "</td>";
  	echo "</tr>"; 
  	echo "<tr>";
    echo "<td colspan='2' align='center'>";
    echo "<a href='cart.php?product_id=$row[product_id]&act=add'> เพิ่มลงตะกร้าสินค้า </a></td>";
    echo "</tr>";
	print_r($row);
	}
?>
</table>

<p><center><a href="product.php">กลับไปหน้ารายการสินค้า</a></center>
</body>
</html>