<?php
@$mode = $_REQUEST["mode"];
if (($mode == "insert_data")) {
    $username = $_REQUEST['username'];
    $user_name = $_REQUEST['user_name'];
    $user_last = $_REQUEST['user_last'];
    $user_phone = $_REQUEST['user_phone'];
    $user_add = $_REQUEST['user_add'];
    $user_date = $_REQUEST['user_date'];
    $password = rand(0, 999999);
    $role = 'เจ้่าของกิจการ';
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
        $filename = '';
    }
    $sql = "INSERT INTO user (username , password , user_name, user_last, user_phone,user_add,user_date,role,user_img)
    VALUES ('$username' , '$password' , '$user_name', '$user_last', '$user_phone','$user_add','$user_date','$role','$filename')";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=user";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>