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
// ?act=update หมายถึง index.php?act=update ระบบทำงานถูกแล้วคับ
?>

<form id="frmcart" name="frmcart" method="post" action="?page=stock&function=stock&?act=update">
    <table class="table table-bordered">
        <tr>
            <td>รหัสสินค้า</td>
            <td>สินค้า</td>
            <td>ราคา</td>
            <td>จำนวน</td>
            <td>รวม(บาท)</td>
            <td>ลบ</td>
        </tr>
        <?php
        $total = 0;
        if (!empty($_SESSION['cart'])) {
            include("connect.php"); ?>
            <?php foreach ($_SESSION['cart'] as $product_id => $qty) { ?>
                <?php
                $sql = "SELECT * FROM product WHERE product_id='$product_id'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                $sum = $row['product_price'] * $qty;
                $total += $sum;
                ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo number_format($row['product_price'], 2) ?></td>
                    <td><input type="text" name="<?php $row['product_id'] ; ?>" value="<?php echo $qty ?> " size="3" /></td>
                    <td><?php echo number_format($sum, 2)  ?></td>
                    <td><a href='?page=<?= $_GET['page'] ?>&function=stock&product_id=<?php echo $row['product_id']; ?>&act=remove'>ลบ</a></td>
                </tr>
            <?php } ?>
                <tr>
                    <td colspan="4" align="right" >ราคารวม</td>
                    <td><?php echo number_format($total, 2) ; ?></td>
                    <td></td>
                </tr>
        <?php } ?>
        <tr>
            <td colspan="6" align="right">
                <input type="submit" name="button" id="button" value="ปรับปรุง" />
                <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
            </td>
        </tr>
    </table>
</form>