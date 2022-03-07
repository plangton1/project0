<?php
include 'connect.php' ;
$sql = "SELECT * FROM stock_1";
$query = mysqli_query($conn , $sql);
?>
<table>
    <thead>
        <tr>
            <td>ลำดับ</td>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_array($query)) { ?>
    <tr>
        <td><?php  echo $row['sup_id'];?></td>
        <td><?php  echo $row['product_id'];?></td>
        <td><?php  echo $row['stock_qty'];?></td>
    </tr>
    <?php } ?>
</tbody>
</table>
