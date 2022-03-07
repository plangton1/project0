<?php
if (isset($_GET['sup_id']) && !empty($_GET['sup_id'])) {
    $sup_id = $_GET['sup_id'];
    $sql = "SELECT * FROM supplies_1 WHERE sup_id = '$sup_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $sup_name = $_POST["sup_name"];
    $sup_last = $_POST["sup_last"];
    $sup_add = $_POST["sup_add"];
    $sup_phone = $_POST["sup_phone"];
    $sup_date = $_POST["sup_date"];
    $oldimage = $_POST['oldimage'];
    if (isset($_FILES['sup_img']['name']) && !empty($_FILES['sup_img']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = './supplies/upload/';
        $filename = $_FILES['sup_img']['name'];
        $filetmp = $_FILES['sup_img']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {
            if (!file_exists($target . $filename)) {
                if (move_uploaded_file($filetmp, $target . $filename)) {
                    $filename = $filename;
                } else {
                    echo 'เพิ่มไม่สำเร็จ';
                }
            } else {
                $newfilename = time() . $filename;
                if (move_uploaded_file($filetmp, $target . $newfilename)) {
                    $filename = $newfilename;
                } else {
                    echo 'เพิ่มเข้าไม่ได้';
                }
            }
        } else {
            echo 'ประเภทไม่ถูกต้อง';
        }
    } else {
        $filename = $oldimage;
    }
    $sql = "UPDATE supplies_1 SET sup_name='$sup_name',sup_last='$sup_last',sup_phone='$sup_phone', sup_img ='$filename' ,
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
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">รูปภาพ</label>
                    <div class="col-sm-9 mb-3">
                        <img id="preview" width="250" height="250" src="./supplies/upload/<?= $result['sup_img'] ?>">
                        <hr>
                    </div>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="sup_img" id="sup_img" required>
                        <input type="hidden" name="oldimage" value="<?= $result['sup_img'] ?>">
                    </div>
                </div>

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
    $("#sup_img").change(function() {
        ReadURL(this);
    });
</script>