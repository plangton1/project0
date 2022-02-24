<?php include './stock/button.php'; ?>
<?php include './stock/modal.php'; ?>
<?php
@$product_id = $_GET['product_id'];
@$act = $_GET['act'];

if ($act == 'add' && !empty($product_id)) {
	if (isset($_SESSION['cart'][$product_id])) {
		$_SESSION['cart'][$product_id]++;
	} else {
		$_SESSION['cart'][$product_id] = 1;
	}
}

if ($act == 'remove' && !empty($product_id))  //ยกเลิกการสั่งซื้อ
{
	unset($_SESSION['cart'][$product_id]);
}

if ($act == 'update') {
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $product_id => $amount) {
		$_SESSION['cart'][$product_id] = $amount;
	}
}
?>


<form id="frmcart" name="frmcart" method="post" action="?page=stock&function=stock&act=update">
	<table class="table table-hover table-bordered text-center">
		<tr>
			<td>สินค้า</td>
			<td>ราคา</td>
			<td>จำนวน</td>
			<td>รวม(บาท)</td>
			<td>ลบ</td>
		</tr>
		<?php
		$total = 0;
		if (!empty($_SESSION['cart'])) {
			include("connect.php");
			foreach ($_SESSION['cart'] as $product_id => $qty) {
				$sql = "select * from product where product_id='$product_id'";
				$query = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($query);
				$sum = $row['product_price'] * $qty;
				$total += $sum;
				echo "<tr>";
				echo "<td >" . $row["product_name"] . "</td>";
				echo "<td >" . number_format($row["product_price"], 2) . "</td>";
				echo "<td >";
				echo "<input type='text' class='control-form' name='amount[$product_id]' value='$qty' size='2'/></td>";
				echo "<td>" . number_format($sum, 2) . "</td>";
				//remove product
				echo "<td><a href='?page=stock&function=stock&product_id=$product_id&act=remove' class='btn btn-danger'>ไม่เลือกรายการนี้</a></td>";
				echo "</tr>";
			}
			echo "<tr>";
			echo "<td colspan='3'><b>ราคารวม</b></td>";
			echo "<td>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
			echo "<td ></td>";
			echo "</tr>";
	}
		?>
	</table>
	<hr>
	<div class="row">
		<div class="col-md-6 col-lg-2 col-xlg-3">
			<div class="card card-hover">
				<div class="box bg-warning text-center">
					<h1 class="font-light text-white">
						<i class="mdi mdi-alert"></i>
					</h1>
					<input class="btn btn-warning text-white" type="submit" value="ปรับปรุง" />
				</div>
			</div>
		</div>
	</div>
</form>