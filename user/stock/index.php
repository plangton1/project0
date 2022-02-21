
<?php	
	$product_id = $_GET['product_id']; 
	$act = $_GET['act'];

	if($act=='add' && !empty($product_id))
	{
		if(isset($_SESSION['cart'][$product_id]))
		{
			$_SESSION['cart'][$product_id]++;
		}
		else
		{
			$_SESSION['cart'][$product_id]=1;
		}
	}

	if($act=='remove' && !empty($product_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$product_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $product_id=>$amount)
		{
			$_SESSION['cart'][$product_id]=$amount;
		}
	}
?>

<div class="from-group">
	<div class="row">
		<div class="col-md-7">
			<div class="card">
				<div class="card-body">
					<div class="box bg-cyan text-center" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal">ดูข้อมูลรายการสินค้า</div>
					<body>
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $product_id=>$qty)
	{
		$sql = "select * from product where product_id='$product_id'";
		$query = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['product_price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["product_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["product_price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$product_id]' value='$qty' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='?product_id=$product_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>
<td><a href="?page=stock">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="ปรับปรุง" />
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
</body>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<?php include './stock/modal.php' ?>