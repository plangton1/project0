<?php
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $product_name = $_POST["product_name"];
    $product_detail = $_POST["product_detail"];
    $product_unit = $_POST["product_unit"];
    $product_price = $_POST["product_price"];
    $product_sale = $_POST["product_sale"];
    $oldimage = $_POST["oldimage"];
    if (isset($_FILES['product_img']['name']) && !empty($_FILES['product_img']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = './product/upload/product/';
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
        $filename = $oldimage;
   }
    $sql = "UPDATE product SET product_name='$product_name',product_detail='$product_detail',product_price='$product_price', product_img= '$filename' , 
    product_unit = '$product_unit' , product_sale = '$product_sale'  WHERE product_id = '$product_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=product";';
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
            <h4 class="card-title">แก้ไขข้อมูลของสินค้า</h4>
            <form action="" method="post" enctype=multipart/form-data>


            

            <div class="modal-body">
                    <form id="insert_form" enctype="multipart/form-data">


                    <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">รูปภาพ</label>
                    <div class="col-sm-9 mb-3">
                        <img id="preview" width="250" height="250" src="./product/upload/product/<?= $result['product_img'] ?>">
                        <hr>
                    </div>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="product_img" id="product_img" required>
                        <input type="hidden" name="oldimage" value="<?= $result['product_img'] ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">ชื่อสินค้า</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="product_name" value="<?= $result['product_name'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">รายละเอียดของสินค้า</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="product_detail" value="<?= $result['product_detail'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">ราคาต้นทุนของสินค้า</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="product_price" value="<?= $result['product_price'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">หน่วยนับของสินค้า</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="product_unit" value="<?= $result['product_unit'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">ราคาขายสินค้า</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="product_sale" value="<?= $result['product_sale'] ?>" />
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
    $("#product_img").change(function() {
        ReadURL(this);
    });
</script>