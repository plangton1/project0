<?php
$n=10;
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    } 
    return $randomString;
}
?>
<?php
include 'conn.php'; // MySQL Connection
if (isset($_POST) && !empty($_POST)) {
     $output = '';
     $message = '';
     // print_r($_POST["product_name"]);
     // print_r($_FILES['product_img']['name']);
     $product_id = getName($n);
     $product_name = $_POST["product_name"];
     $product_price = $_POST["product_price"];
     $product_net = $_POST["product_net"];
     $product_type = $_POST["product_type"];
     $product_detail = $_POST["product_detail"];
     $created_at = '';
     if ($_POST["product_id"] == '') {
        if (isset($_FILES['product_img']['name']) && !empty($_FILES['product_img']['name'])) {
               $extension = array("jpeg", "jpg", "png");
               $target = './upload/product/';
               $filename = $_FILES['product_img']['name'];
               $filetmp = $_FILES['product_img']['tmp_name'];
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
          $query = "  
           INSERT INTO product(product_id,product_name,product_price,product_net,product_type,product_detail,product_img)  
           VALUES('$product_id' , '$product_name','$product_price','$product_net','$product_type','$product_detail','$filename');  
           ";
          $message = 'เพิ่มข้อมูลเรียบร้อยแล้ว';
     } else {
        $qeury = '';
     }
     // print_r($query);
     // print_r($_FILES);
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
