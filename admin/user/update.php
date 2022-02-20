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
    $oldimage = $_POST['oldimage']; 
    if (isset($_FILES['user_img']['name']) && !empty($_FILES['user_img']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = './user/upload/user/';
        $filename = $_FILES['user_img']['name'];
        $filetmp = $_FILES['user_img']['tmp_name'];
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
        $filename = $oldimage ;
    }
    $sql = "UPDATE user SET user_name='$user_name',user_last='$user_last',user_phone='$user_phone',user_img ='$filename' ,
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
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">รูปภาพ</label>
                    <div class="col-sm-9 mb-3">
                        <img id="preview" width="250" height="250" src="./user/upload/user/<?= $result['user_img']?>">
                        <hr>
                    </div>
                    <div class="col-sm-5">
                    <input type="file" class="form-control" name="user_img" id="user_img" required>
                        <input type="hidden" name="oldimage" value="<?=$result['user_img']?>" >
                </div>
                </div>
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