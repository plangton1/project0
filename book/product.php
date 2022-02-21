<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product List</title>

</head>

<body>
<table width="600" border="1" align="center" bordercolor="#666666">
  <tr>
    <td width="200" align="center" bgcolor="#CCCCCC"><strong>ชื่อหนังสือ</strong></td>
    <td width="44" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong>รายละเอียดสินค้า</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include('./connect.php');
  $sql = "select * from product order by product_id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
	echo "<td align='left'>" . $row["product_name"] . "</td>";
    echo "<td align='center'>" .number_format($row["product_price"],2). "</td>";
    echo "<td align='center'><a href='product_detail.php?product_id=$row[product_id]'>คลิก</a></td>";
	echo "</tr>";
  }
  ?>
</table>