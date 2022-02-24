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

<?php $sql="select * from product";
$query = mysqli_query($connection , $sql);
?>

  <div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog" style="max-width: 80%;">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">รายการสินค้าที่เก็บไว้</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <form method="post">
                      <table class="table table-bordered text-center" id="tableall">
                          <thead>
                              <tr>
                                  <th>รหัสสินค้า</th>
                                  <th>ชื่อสินค้า</th>
                                  <th>จำนวน</th>
                                  <th>หน่วยนับ</th>
                                  <th>ราคาต้นทุน(บาท)</th>
                                  <th>ราคาขาย(บาท)</th>
                                  <th>ดูรายละเอียด</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php while ($row = mysqli_fetch_array($query)) : ?>
                              <tr>
                                  <td class="float-center"> <?php echo barcode($row['product_id']) ?><p><?php echo $row['product_id'] ; ?></p></td>
                                  <td> <?php echo $row['product_name'] ?></td>
                                  <td> <?php echo $row['product_net'] ?></td>
                                  <td> <?php echo $row['product_unit'] ?></td>
                                  <td> <?php echo number_format($row['product_price'],2) ?></td>
                                  <td> <?php echo number_format($row['product_sale'],2) ?></td>
                                  <td><a href="?page=<?= $_GET['page'] ?>&function=detail&product_id=<?= $row['product_id'] ?>" class="btn btn-sm btn-warning">รายละเอียด</a></td>
                              </tr>
                              <?php endwhile ; ?>
                          </tbody>
                      </table>
                   
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่างนี้</button>
              </div>
          </div>
      </div>
  </div>
  