<?php
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
?>
<table>
    <tr>
        <td><?php echo $result['product_name']; ?></td>
        <td><?php echo $result['product_price']; ?></td>
        <td><?php echo $result['product_net']; ?></td>
        <td><?php echo $result['product_sale']; ?></td>
        <a href="?page=<?= $_GET['page'] ?>&function=stock&product_id=<?= $result['product_id'] ?>&acther=add" class="btn btn-sm btn-info">เพิ่มลงคลังสินค้า</a>
    </tr>
</table>