<?php
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $user_name = $_POST['user_name'];
    $user_last = $_POST['user_last'];
    $user_phone = $_POST['user_phone'];
    $user_add = $_POST['user_add'];
    $user_date = $_POST['user_date'];
    $sql = "UPDATE user SET user_name='$user_name',user_last='$user_last',user_phone='$user_phone',
    user_add = '$user_add' , user_date = '$user_date'  WHERE user_id = '$user_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=user";';
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
            <h4 class="card-title">แบบฟอร์มผู้ใช้งานระบบ</h4>
            <form action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">ชื่อผู้ใช้งานระบบ</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="user_name" value="<?= $result['user_name'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">นามสกุุลของผู้ใช้งานระบบ</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="user_last" value="<?= $result['user_last'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">เบอร์โทรศัพท์ของผู้ใช้งานระบบ</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="user_phone" value="<?= $result['user_phone'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">ที่อยู่ของผู้ใช้งานระบบ</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="user_add" value="<?= $result['user_add'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">วันเดือนปีเกิดของผู้ใช้งานระบบ</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="user_date" value="<?= $result['user_date'] ?>" />
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>