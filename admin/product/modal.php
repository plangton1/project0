    <!-- Employee Details -->
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog" style="max-width: 80%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">รายละเอียดของสินค้า</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="product_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่างนี้</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Employee Details -->
    <!-- PHP Ajax Update MySQL Data Through Bootstrap Modal -->
    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">เพิ่มสินค้า</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <div class="modal-body">
                    <form id="insert_form" enctype="multipart/form-data">
<center>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-end control-label col-form-label">รูปภาพ</label>
                            <div class="col-sm-6 mb-3">
                                <img id="preview" width="150" height="150">
                                <hr>
                                <input type="file" class="form-control btn btn-info" id="product_img" name="product_img" />
                            </div>
                        </div>
</center>

                        <div class="input-group mb-3 ">
                            <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">ชื่อสินค้า</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" />
                        </div>


                        <div class="input-group mb-3 ">
                            <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">รายละเอียดของสินค้า</label>
                            <textarea type="text" class="form-control" name="product_detail" id="product_detail" row="3"></textarea>
                        </div>


                        <div class="row">
                            <div class="col">
                            <div class="input-group mb-3 ">
                                    <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">ประเภทสินค้า</label>
                                    <select class="form-control" name="product_type" id="product_type">
                                        <option value="" selected disabled>ประเภทสินค้า</option>
                                        <?php foreach ($result1 as $data) : ?>
                                            <option value="<?= $data['type_id'] ?>"><?= $data['type_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col">
                            <div class="input-group mb-3 ">
                                    <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">หน่วยนับ</label>
                                    <input type="text" class="form-control" name="product_unit" id="product_unit" />
                                </div>
                            </div>
                        </div>
                        
                         
                        <div class="row">
                            <div class="col">
                            <div class="input-group mb-3 ">
                                <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">ราคาต้นทุน</label>
                                <input type="text" class="form-control" name="product_price" id="product_price" />
                            </div>
                            </div>

                            <div class="col">
                            <div class="input-group mb-3 ">
                                    <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">ราคาขาย</label>
                                    <input type="text" class="form-control" name="product_sale" id="product_sale" />
                                </div>
                            </div>
                        </div>
                        
                                 
                        <div class="row">
                            <div class="col">
                            <div class="input-group mb-3 ">
                                <label for="fname" class="col-sm-4 text-center control-label col-form-label  btn btn-info">จำนวนสินค้า</label>
                                <input type="text" class="form-control" name="product_net" id="product_net" />
                            </div>
                            </div>
                        </div>
                        
                        

                            <input type="hidden" name="product_id" id="product_id" />
                            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่างนี้</button>
                </div>
            </div>
        </div>
    </div>
    <!-- / PHP Ajax Update MySQL Data Through Bootstrap Modal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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