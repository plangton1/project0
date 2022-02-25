  <!-- Employee Details -->
  <div id="dataModal" class="modal fade">
      <div class="modal-dialog" style="max-width: 60%;">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">รายละเอียดของซัพพลายเออร์</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" id="employee_detail">
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
      <div class="modal-dialog" style="max-width: 40%;">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">เพิ่มข้อมูลซัพพลายเออร์</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <form method="post" id="insert_form" enctype="multipart/form-data">


                  <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-end control-label col-form-label">รูปภาพ</label>
                            <div class="col-sm-6 mb-3">
                                <img id="preview" width="250" height="250">
                                <hr>
                                <input type="file" class="form-control" id="sup_img" name="sup_img" />
                            </div>
                        </div>

                      <div class="form-group row">
                          <label for="fname" class="col-sm-3 text-end control-label col-form-label">ชื่อซัพพลายเออร์</label>
                          <div class="col-sm-6">
                              <input type="text" class="form-control" name="sup_name" id="sup_name" />
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="fname" class="col-sm-3 text-end control-label col-form-label">นามสกุล</label>
                          <div class="col-sm-6">
                              <input type="text" class="form-control" name="sup_last" id="sup_last" />
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="fname" class="col-sm-3 text-end control-label col-form-label">เบอร์โทรศัพท์</label>
                          <div class="col-sm-6">
                              <input type="text" class="form-control" name="sup_phone" id="sup_phone" />
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="fname" class="col-sm-3 text-end control-label col-form-label">ที่อยู่</label>
                          <div class="col-sm-6">
                              <input type="text" class="form-control" name="sup_add" id="sup_add" />
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="fname" class="col-sm-3 text-end control-label col-form-label">วันเดือนปีเกิด</label>
                          <div class="col-sm-6">
                              <input type="text" id="date1" class="form-control" name="sup_date" id="sup_date" />
                          </div>
                      </div>

                      <br />
                      <div class="form-group row">
                      <div class="col-sm-6">
                      <input type="hidden" name="employee_id" id="employee_id" />
                      <input type="submit" name="insert" id="insert" value="บันทึกข้อมูล" class="btn btn-success" />
                  </form>
              </div>
              <div class="col-sm-6">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่างนี้</button>
              </div>
              </div>
          </div>
      </div>
  </div>
  <!-- / PHP Ajax Update MySQL Data Through Bootstrap Modal -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- datatable -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
    $("#sup_img").change(function() {
        ReadURL(this);
    });
</script>
<!-- date -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
<script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
<script>
    picker_date(document.getElementById("date1"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("date3"), {
        year_range: "-12:+10"
    });
</script>
<!-- date -->