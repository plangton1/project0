<?php
$query = "SELECT * FROM type ORDER BY type_id DESC";
$result = mysqli_query($connection, $query);
?>

<div class="from-group">
    <?php include './type/button.php'; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ตารางประเภทสินค้า</h5>
                    <div class="table-responsive">
                        <br />
                        <div id="employee_table">
                            <table class="table table-striped" id="tableall">
                                <thead>
                                    <tr>
                                        <th width="10%">ลำดับ</th>
                                        <th width="10%">ชื่อประเภทสินค้า</th>
                                        <th width="10%" class="text-center">แก้ไขข้อมูล</th>
                                        <th width="10%" class="text-center">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>
                                            <td width="10%"><?php echo $i++;  ?></td>
                                            <td width="10%"><?php echo $row["type_name"] ?></td>
                                            <td width="10%"><a href="?page=<?= $_GET['page'] ?>&function=update&type_id=<?= $row['type_id'] ?>" class="btn btn-sm btn-info">แก้ไขข้อมูล</a></td>
                                            <td width="10%"><a href="?page=<?= $_GET['page'] ?>&function=delete&type_id=<?= $row['type_id'] ?>" onclick="return confirm('คุณต้องการลบชื่อซัพพลายเออร์ : <?= $row['sup_name'] ?> หรือไม่ ??')" class="btn btn-sm btn-danger">ลบ</a></td>
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
<?php include './type/modal.php'; ?>
<?php include './type/script.php'; ?>