<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
   
require_once('connect.php');
 
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
 
    $sup_name = $_POST["sup_name"];
    $sup_last = $_POST["sup_last"];
	$sup_add = $_POST["sup_add"];
	$sup_phone = $_POST["sup_phone"];
	$sup_qty = $_POST["sup_qty"];
	$sup_date = $_POST["sup_date"];
	$sup_total = $_POST["sup_total"];
	$sup_dttm = Date("Y-m-d G:i:s");
 
 
 //บันทึกการสั่งซื้อลงใน order_detail
 mysqli_query($conn, "BEGIN"); 
 $sql1 = "insert into supplies_1 values(null, '$sup_dttm', '$sup_name', '$sup_last' , '$sup_add' , '$sup_phone', '$sup_date' , '$sup_qty', '$sup_total')";
 
 $query1 = mysqli_query($conn, $sql1);
 
  
 
 
 $sql2 = "select max(sup_id) as sup_id from supplies_1 where sup_name='$sup_name'  and sup_dttm='$sup_dttm'";
 $query2 = mysqli_query($conn, $sql2);
 $row = mysqli_fetch_array($query2);
 $sup_id = $row['sup_id'];
 
 
 foreach($_SESSION['cart'] as $product_id=>$stock_qty)
  
 {
  echo $product_id;
  $sql3 = "SELECT * FROM product where product_id= '$product_id'";
  $query3 = mysqli_query($conn, $sql3);
  $row3 = mysqli_fetch_array($query3);
  $stock_total=$row3['product_price']*$stock_qty;
  $count=mysqli_num_rows($query3);

 
  $sql4 = "INSERT INTO  stock_1  values(null, '$sup_id', '$product_id', '$stock_qty', '$stock_total')";
  $query4 = mysqli_query($conn, $sql4);
  
  
  //ตัดสต๊อก
  for($i=0; $i<$count; $i++){
  $have =  $row3['product_net'];
  
  $stc = $have - $stock_qty;
  
  $sql9 = "UPDATE product SET  product_net=$stc WHERE  product_id= '$product_id' ";
  $query9 = mysqli_query($conn, $sql9);  
  }
    
  /*   stock  */
 }
 if($query1 && $query4){
  mysqli_query($conn, "COMMIT");
  $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
  foreach($_SESSION['cart'] as $product_id)
  { 
   unset($_SESSION['cart']);
  }
 }
 else{
  mysqli_query($conn, "ROLLBACK");  
  $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ "; 
 }
 
 mysqli_close($conn);

// print_r($sql1);
// print_r($sql2);
// print_r($sql3);
// print_r($sql4);
// print_r($sql9);
// exit;
?>
 
 
<script type="text/javascript">
 alert("<?php echo $msg;?>");
 window.location ='?page=stock';
</script>
 
 
 
</body>
</html>