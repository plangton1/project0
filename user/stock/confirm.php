<?php
include("connect.php");
?>

<form id="frmcart" name="frmcart" method="post" action="?page=savestock">
  <table class="table table-bordered">
    <tr>
      <td width="1558" colspan="4">
        <strong>รายการสินค้าที่ต้องการลงคลัง</strong>
      </td>
    </tr>
    <tr>
      <td>สินค้า</td>
      <td>ราคา</td>
      <td>จำนวน</td>
      <td>รวม/รายการ</td>
    </tr>
    <?php
    $stock_total = 0;
    foreach ($_SESSION['cart'] as $product_id => $stock_qty) {
      $sql  = "select * from product where product_id= '$product_id'";
      $query  = mysqli_query($conn, $sql);
      $row  = mysqli_fetch_array($query);
      $sum  = $row['product_price'] * $stock_qty;
      $stock_total  += $sum;
      echo "<tr>";
      echo "<td>" . $row["product_name"] . "</td>";
      echo "<td align='right'>" . number_format($row['product_price'], 2) . "</td>";
      echo "<td align='right'>$stock_qty</td>";
      echo "<td align='right'>" . number_format($sum, 2) . "</td>";
      echo "</tr>";
    }
    echo "<tr>";
    echo "<td  align='right' colspan='3'><b>รวม</b></td>";
    echo "<td align='right'>" . "<b>" . number_format($stock_total, 2) . "</b>" . "</td>";
    echo "</tr>";
    ?>
  </table>

  <div class="row">
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <td colspan="2">เพิ่มซัพพลายเออร์</td>
        </tr>
        <tr>
          <td>ชื่อ</td>
          <td><input name="sup_name" type="text" id="sup_name" required /></td>
        </tr>
        <tr>
          <td>นามสกุล</td>
          <td><input name="sup_last" type="text" id="sup_last" required /></td>
        </tr>
        <tr>
          <td width="22%">ที่อยู่</td>
          <td width="78%">
            <textarea name="sup_add" cols="35" rows="5" id="sup_add" required></textarea>
          </td>
        </tr>
        <tr>
          <td>วันเดือนปีเกิด</td>
          <td><input name="sup_date" type="date" id="sup_date" required /></td>
        </tr>
        <tr>
          <td>เบอร์ติดต่อ</td>
          <td><input name="sup_phone" type="text" id="sup_phone" required /></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="Submit2" class="btn btn-primary" value="เพิ่มลงคลังสินค้า" />
          </td>
        </tr>
      </table>
    </div>


    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <td colspan="2">เลือกซัพพลายเออร์จากรายการที่มีอยู่</td>
        </tr>
      </table>
    </div>
  </div>
</form>