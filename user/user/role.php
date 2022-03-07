<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ตารางผู้ใช้งานระบบ <a class="text-danger">ตำแหน่งของ ผู้ดูแลระบบ</a></h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รูปผู้ใช้งานระบบ</th>
                                <th>ชื่อผู้ใช้งานระบบ</th>
                                <th>วันเดือนปีเกิด</th>
                                <th>รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($query as $data) : ?>
                                <tr>
                                    <?php if ($data['role'] == 'ผู้ดูแลระบบ') : ?>
                                        <td><?= $i++ ?></td>
                                        <td><img src="./user/upload/user/<?=$data['user_img'];?>" width="100" height="100"></td>
                                        <td><?= $data['user_name'] . " " . $data['user_last'] ?></td>
                                        <td><?= $data['user_date'] ?></td>
                                        <td class="text-center"><input type="button" name="view" value="ดูรายละเอียด" id="<?php echo $data["user_id"]; ?>" class="btn btn-success view_data" /></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ตารางผู้ใช้งานระบบ <a class="text-danger">ตำแหน่งของ เจ้าของกิจการ</a></h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รูปผู้ใช้งานระบบ</th>
                                <th>ชื่อผู้ใช้งานระบบ</th>
                                <th>วันเดือนปีเกิด</th>
                                <th>รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($query as $data) : ?>
                                <tr>
                                    <?php if ($data['role'] == 'เจ้าของกิจการ') : ?>
                                        <td><?= $i++ ?></td>
                                        <td><img src="./user/upload/user/<?=$data['user_img'];?>" width="100" height="100"></td>
                                        <td><?= $data['user_name'] . " " . $data['user_last'] ?></td>
                                        <td><?= $data['user_date'] ?></td>
                                        <td class="text-center"><input type="button" name="view" value="ดูรายละเอียด" id="<?php echo $data["user_id"]; ?>" class="btn btn-success view_data" /></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Employee Details -->
  <div id="dataModal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">รายละเอียดของซัพพลายเออร์</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" id="employee_detail">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่างนี้</button>
              </div>
          </div>
      </div>
  </div>
 <!-- / PHP Ajax Update MySQL Data Through Bootstrap Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.view_data', function() {
            var employee_id = $(this).attr("id");
            if (employee_id != '') {
                $.ajax({
                    url: "./user/show.php",
                    method: "POST",
                    data: {
                        employee_id: employee_id
                    },
                    success: function(data) {
                        $('#employee_detail').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            }
        });
    });
</script>