<?php $sql="select * from product";
$query = mysqli_query($connection , $sql);
?>

  <div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">รายการสินค้าที่เก็บไว้</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <form method="post">
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>ชื่อ</th>
                                  <th>ดูรายละเอียด</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php while ($row = mysqli_fetch_array($query)) : ?>
                              <tr>
                                  <td> <?php echo $row['product_name'] ?></td>
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
  