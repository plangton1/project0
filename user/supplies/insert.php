<?php
include 'conn.php'; // MySQL Connection
if (isset($_POST) && !empty($_POST)) {
     $output = '';
     $message = '';
     $sup_name = $_POST["sup_name"];
     $sup_last = $_POST["sup_last"];
     $sup_add = $_POST["sup_add"];
     $sup_phone = $_POST["sup_phone"];
     $sup_date = $_POST["sup_date"];
     $created_at = '';
     if (isset($_FILES['sup_img']['name']) && !empty($_FILES['sup_img']['name'])) {
          $extension = array("jpeg", "jpg", "png");
          $target = './upload/supplies';
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
          $filename = '';
     }
     if ($_POST["employee_id"] != '') {
          $query = "  ";
     } else {
          $query = "  
           INSERT INTO supplies(sup_name,sup_last,sup_add,sup_phone,sup_date , created_at , sup_img)  
           VALUES('$sup_name','$sup_last','$sup_add','$sup_phone','$sup_date' , CURDATE() ,'$filename');  
           ";
          $message = 'เพิ่มข้อมูลเรียบร้อยแล้ว';
     }
     if (mysqli_query($connect, $query)) {
          $output .= '<label class="text-success">' . $message . '</label>';
          $select_query = "SELECT * FROM supplies ORDER BY sup_id DESC";
          if (mysqli_query($connect, $select_query)) {
               $alert = '<script type="text/javascript">';
               $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
               $alert .= 'window.location.href = "?page=supplies";';
               $alert .= '</script>';
               echo $alert;
               exit();
          } else {
               echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);
     }
}
