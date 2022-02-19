<?php
if (isset($_GET['type_id']) && !empty($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    $sql = "SELECT * FROM type WHERE type_id = '$type_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $type_name = $_POST["type_name"];
    $sql = "UPDATE type SET type_name='$type_name'  WHERE type_id = '$type_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=type";';
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
            <h4 class="card-title">แบบฟอร์มประเภทสินค้า</h4>
            <form action="" method="post" enctype=multipart/form-data>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">ชื่อประเภทสินค้า</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="type_name" value="<?= $result['type_name'] ?>" />
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>