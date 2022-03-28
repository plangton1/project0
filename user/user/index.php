<?php
include './date.php' ;
include 'insert.php';
$sql = "SELECT * FROM user";
$query = mysqli_query($connection, $sql);
?>
<div class="from-group">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ตารางผู้ใช้งานระบบ</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableall">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูปผู้ใช้งานระบบ</th>
                                    <th>ชื่อผู้ใช้งานระบบ</th>
                                    <th>วันเดือนปีเกิด</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($query as $data) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><img src="./user/upload/user/<?=$data['user_img'];?>" width="100" height="100"></td>
                                        <td><?= $data['user_name'] . " " . $data['user_last'] ?></td>
                                        <td><?= datethai($data['user_date']) ; ?></td>
                                        <td><a href="?page=<?= $_GET['page'] ?>&function=update&user_id=<?= $data['user_id'] ?>" class="btn btn-sm btn-warning">แก้ไข</a></td>
                                        <td><a href="?page=<?= $_GET['page'] ?>&function=delete&user_id=<?= $data['user_id'] ?>" onclick="return confirm('คุณต้องการลบชื่อผู้ใช้ : <?= $data['user_name'] ?> หรือไม่ ??')" class="btn btn-sm btn-danger">ลบ</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <?php include 'role.php' ?> -->
        </div>
        <div class="col-md-5">
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="mode" value="insert_data">
                    <div class="card-body">
                        <h4 class="card-title">แบบฟอร์มผู้ใช้งานระบบ </h4>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <h5>Username</h5>
                                <input type="text" class="form-control" name="username" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-end control-label col-form-label">รูปภาพ</label>
                            <div class="col-sm-9 mb-3">
                                <img id="preview" width="150" height="150">
                                <input type="file" class="form-control" id="user_img" name="user_img" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-end control-label col-form-label">ชื่อผู้ใช้งานระบบ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="user_name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">นามสกุล</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="user_last" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">เบอร์โทรศัพท์</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="user_phone" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-end control-label col-form-label">ที่อยู่ของผู้ใช้งานระบบ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="user_add" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-end control-label col-form-label">วันเดือนปีเกิด</label>
                            <div class="col-sm-9">
                                <input type="text" id="date1" class="form-control" name="user_date" />
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">
                                บันทึกข้อมูล
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>


<script type="text/javascript">
    function ReadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#user_img").change(function() {
        ReadURL(this);
    });
</script>
<!-- date -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
<script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
<script>
    picker_date(document.getElementById("date1"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("date3"), {
        year_range: "-12:+10"
    });
</script>
<!-- date -->