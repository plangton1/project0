  <!-- /Employee Details -->
  <!-- PHP Ajax Update MySQL Data Through Bootstrap Modal -->
  <div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">เพิ่มประเภทสินค้า</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <form method="post" id="insert_form">
                      <div class="form-group row">
                          <label for="fname" class="col-sm-3 text-end control-label col-form-label">ชื่อประเภทสินค้า</label>
                          <div class="col-sm-6">
                              <input type="text" class="form-control" name="type_name" id="type_name" />
                          </div>
                      </div>
                      <br />
                      <input type="hidden" name="type_id" id="type_id" />
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
  <!-- datatable -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>