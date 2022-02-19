<?php
include 'conn.php'; // MySQL Connection
if (isset($_POST) && !empty($_POST)) {
     $output = '';
     $message = '';
     $product_name = $_POST["product_name"];
     $product_price = $_POST["product_price"];
     $product_net = $_POST["product_net"];
     $product_type = $_POST["product_type"];
     $product_detail = $_POST["product_detail"];
     $created_at = '';
     if ($_POST["product_id"] != '') {
          $query = "  ";
     } else {
          $query = "  
           INSERT INTO product(product_name,product_price,product_net,product_type,product_detail)  
           VALUES('$product_name','$product_price','$product_net','$product_type','$product_detail');  
           ";
          $message = 'เพิ่มข้อมูลเรียบร้อยแล้ว';
     }
     if (mysqli_query($connect, $query)) {
          $output .= '<label class="text-success">' . $message . '</label>';
          $select_query = "SELECT * FROM product ORDER BY product_id DESC";
          if (mysqli_query($connect, $select_query)) {
               $alert = '<script type="text/javascript">';
               $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
               $alert .= 'window.location.href = "?page=product";';
               $alert .= '</script>';
               echo $alert;
               exit();
          } else {
               echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
          }
          mysqli_close($conn);
     }
}
