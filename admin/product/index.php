
<?php
include "src/BarcodeGenerator.php";
include "src/BarcodeGeneratorHTML.php";
function barcode($code)
{

    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    $border = 2; //กำหนดความหน้าของเส้น Barcode
    $height = 40; //กำหนดความสูงของ Barcode

    return $generator->getBarcode($code, $generator::TYPE_CODE_128, $border, $height);
} ?>
<?php
$query = "SELECT * , a.product_type,b.type_id,b.type_name AS name_type  FROM product a inner join type b ON a.product_type =  b.type_id ORDER BY product_id DESC";
$result = mysqli_query($connection, $query);

$query1 = "SELECT * FROM type ";
$result1 = mysqli_query($connection, $query1);
?>

<div class="from-group">
  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ตารางสินค้า</h5>
                    <div class="table-responsive">
                        <br />
                        <div id="employee_table">
                            <table class="table" id="tableall">
                                <thead>
                                    <tr>
                                        <th width="10%">รหัสสินค้า</th>
                                        <th width="10%">ชื่อสินค้า</th>
                                        <th width="10%">คงเหลือ</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาทุน</th>
                                        <th width="10%">ราคาขาย</th>
                                        <th width="10%">ประเภทสินค้า</th>
                                        <!-- <th width="10%">แก้ไขข้อมูลสินค้า</th> -->
                                        <!-- <th width="10%">ลบสินค้า</th> -->
                                        <th width="10%" class="text-center">ดูรายละเอียด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                   
                                        <tr>
                                            <td width="20%" class="bg-warning"><?php echo barcode($row["product_id"]); ?><p><?php echo $row['product_id']; ?></p>
                                            </td>
                                            <td width="10%"><?php echo $row["product_name"] ?></td>
                                            <td width="10%"><?php echo $row["product_net"] ?></td>
                                            <td width="10%"><?php echo $row["product_unit"] ?></td>
                                            <td width="10%"><?php echo $row["product_price"] ?></td>
                                            <td width="10%"><?php echo $row["product_sale"] ?></td>
                                            <td width="10%"><?php echo $row["name_type"] ?></td>
                                            <!-- <td><a href="?page=<?= $_GET['page'] ?>&function=update&product_id=<?= $row['product_id'] ?>" class="btn btn-sm btn-info">แก้ไขข้อมูล</a></td> -->
                                            <!-- <td><a href="?page=<?= $_GET['page'] ?>&function=delete&product_id=<?= $row['product_id'] ?>" onclick="return confirm('คุณต้องการลบสินค้านี้ : <?= $row['product_name'] ?> หรือไม่ ??')" class="btn btn-sm btn-danger">ลบสินค้า</a></td> -->
                                            <td class="text-center"><input type="button" name="view" value="ดูรายละเอียด" id="<?php echo $row["product_id"]; ?>" class="btn btn-success view_data" /></td>

                                        </tr>
                                    
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include './product/modal.php'; ?>
<?php include './product/script.php'; ?>