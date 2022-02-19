<?php
if (isset($_GET['sup_id']) && !empty($_GET['sup_id'])) {
    $sup_id = $_GET['sup_id'];
    $sql = "SELECT * FROM supplies WHERE sup_id = '$sup_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $sup_name = $_POST["sup_name"];
    $sup_last = $_POST["sup_last"];
    $sup_add = $_POST["sup_add"];
    $sup_phone = $_POST["sup_phone"];
    $sup_date = $_POST["sup_date"];
    $sql = "UPDATE supplies SET sup_name='$sup_name',sup_last='$sup_last',sup_phone='$sup_phone',
    sup_add = '$sup_add' , sup_date = '$sup_date'  WHERE sup_id = '$sup_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=supplies";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>
<div class="col-md-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">แบบฟอร์มซัพพลายเออร์</h4>
            <form action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">ชื่อซัพพลายเออร์</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="sup_name" value="<?= $result['sup_name'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">นามสกุุลของซัพพลายเออร์</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="sup_last" value="<?= $result['sup_last'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">เบอร์โทรศัพท์ของซัพพลายเออร์</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="sup_phone" value="<?= $result['sup_phone'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">ที่อยู่ของซัพพลายเออร์</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="sup_add" value="<?= $result['sup_add'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">วันเดือนปีเกิดของซัพพลายเออร์</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="sup_date" value="<?= $result['sup_date'] ?>" />
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>