<?php
include 'conn.php'; // MySQL Connection
if (isset($_POST) && !empty($_POST)) {
     $output = '';
     $message = '';
     $type_name = $_POST["type_name"];
     $created_at = '';
     if ($_POST["type_id"] != '') {
          $query = "  ";
     } else {
          $query = "  
           INSERT INTO type(type_name)  
           VALUES('$type_name');  
           ";
          $message = 'เพิ่มข้อมูลเรียบร้อยแล้ว';
     }
     if (mysqli_query($connect, $query)) {
          $output .= '<label class="text-success">' . $message . '</label>';
          $select_query = "SELECT * FROM type ORDER BY type_id DESC";
          if (mysqli_query($connect, $select_query)) {
               $alert = '<script type="text/javascript">';
               $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
               $alert .= 'window.location.href = "?page=type";';
               $alert .= '</script>';
               echo $alert;
               exit();
          } else {
               echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);
     }
}
