<?php
include 'conn.php'; // MySQL Connection
$query = "SELECT * FROM supplies_1 ORDER BY sup_id DESC";
$result = mysqli_query($connect, $query);

?>

<div class="from-group">
    <?php include './supplies/button.php'; ?>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ตารางซัพพลายเออร์</h5>
                    <div class="table-responsive">
                        <br />
                        <div id="employee_table">
                            <table class="table table-striped" id="tableall">
                                <thead>
                                    <tr>
                                        <th width="10%">ลำดับ</th>
                                        <th width="10%">รูปซัพพลายเออร์</th>
                                        <th width="10%">ชื่อซัพพลายเออร์</th>
                                        <th width="10%">เบอร์โทรศัพท์ซัพพลายเออร์</th>
                                        <th width="10%" class="text-center">แก้ไขข้อมูล</th>
                                        <th width="10%" class="text-center">ดูรายละเอียดซัพพลายเออร์</th>
                                        <th width="10%" class="text-center">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>
                                            <td><?php echo $i++;  ?></td>
                                            <td><img src="./supplies/upload/supplies/<?=$row['sup_img'];?>" width="100" height="100"></td>
                                            <td><?php echo $row["sup_name"] . ' ' . $row["sup_last"]; ?></td>
                                            <td><?php echo $row["sup_phone"]; ?></td>
                                            <td><a href="?page=<?= $_GET['page'] ?>&function=update&sup_id=<?= $row['sup_id'] ?>" class="btn btn-sm btn-info">แก้ไขข้อมูล</a></td>
                                            <!-- <td class="text-center"><input type="button" name="edit" value="แก้ไข" id="<?php echo $row["sup_id"]; ?>" class="btn btn-info edit_data" /></td> -->
                                            <td class="text-center"><input type="button" name="view" value="ดูรายละเอียด" id="<?php echo $row["sup_id"]; ?>" class="btn btn-success view_data" /></td>
                                            <td><a href="?page=<?= $_GET['page'] ?>&function=delete&sup_id=<?= $row['sup_id'] ?>" onclick="return confirm('คุณต้องการลบชื่อซัพพลายเออร์ : <?= $row['sup_name'] ?> หรือไม่ ??')" class="btn btn-sm btn-danger">ลบ</a></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './supplies/modal.php'; ?>
<?php include './supplies/script.php'; ?>