<?php
if (isset($_POST["product_id"])) {
     $output = '';
     include 'conn.php'; // MySQL Connection
     $query  = "SELECT * ,a.product_type,b.type_id,b.type_name AS name_type FROM product a INNER JOIN type b ON a.product_type = b.type_id WHERE a.product_id = '" . $_POST["product_id"] . "'";
     $result = mysqli_query($connect, $query);
     $output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';
     while ($row = mysqli_fetch_array($result)) {
          $output .= '  
          <div class="row">
          <div class="col-md-8">
          <div class="input-group mb-3 ">
          <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">รหัสสินค้า</label>
          <h2 class="form-control">' . $row["product_name"] . '</h2>
          </div>


          <div class="input-group mb-3 ">
          <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">ชื่อสินค้า</label>      
              <h2 class="form-control">' . $row["product_name"] . '</h2>
          </div>
          

          <div class="input-group mb-3 ">
          <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">รายละเอียดสินค้า</label>
              <h2 class="form-control">' . $row["product_detail"] . '</h2>
               </div>

               <div class="row">
               <div class="col">
               <div class="form-group row">
          <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">ประเภทสินค้า</label>
          <div class="col-sm-8">
              <h2 class="form-control">' . $row["name_type"] . '</h2>
          </div>
          </div>
          </div>  

               <div class="col">
               <div class="form-group row">
               <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">หน่วยนับ</label>
               <div class="col-sm-8">
                   <h2 class="form-control">' . $row["product_unit"] . '</h2>
                    </div>
               </div>
               </div>
               </div>

               <div class="form-group row">
               <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">จำนวนคงเหลือ</label>
               <div class="col-sm-8">
                   <h2 class="form-control">' . $row["product_net"] . '</h2>
                    </div>
               </div>

               <div class="row">
               <div class="col">
               <div class="form-group row">
               <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">ราคาทุน(บาท)</label>
               <div class="col-sm-8">
                   <h2 class="form-control">' . $row["product_price"] . '</h2>
                    </div>
               </div>
               </div>
               

               <div class="col">
               <div class="form-group row">
               <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">ราคาขาย(บาท)</label>
               <div class="col-sm-8">
                   <h2 class="form-control">' . $row["product_sale"] . '</h2>
                    </div>
               </div>
               </div>
               </div>
               </div>

               <div class="col-md-4">
          <div class="form-group row">
          <label for="fname" class="col-sm-3 text-end control-label col-form-label">รูปภาพ</label>
          <div class="col-sm-9 mb-3">
              <img id="preview" width="250" height="250" src="./product/upload/product/' . $row['product_img'] . ' ">
          </div>
          <div class="col-sm-5">
          </div>
      </div>
               </div>
           ';
     }
     $output .= '  
           </table>  
      </div>  
      ';
     echo $output;
}
?>


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

