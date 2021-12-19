<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script style="text/javascript">
    $(document).ready(function() {

        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.main-form').remove();
        });

        $(document).on('click', '.add-more-form', function() {
            $('.paste-new-forms').append('<div class="main-form mt-3">\
            <div class="row">\
                                        <div class="col-md-4">\
                                            <div class="form-group mb-2">\
                                            <label for="">กลุ่มผลิตภัณฑ์</label>\
                                                <select class="form-control" name="group_id[]" id="group_id" style="height: unset !important;">\ 
                                                    <?php 
                                                    $sql = "SELECT * FROM group_tb";
                                                    $query = sqlsrv_query($conn, $sql);
                                                    while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
                                                       <option value="<?php echo $result['group_id'];  ?>"><?php echo $result['group_name'];  ?></option>
                                                    <?php } ?>
                                                </select>
                                                </select>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <br>\
                                            <button type="button" class="remove-btn btn btn-danger">ลบ</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
        });

    });

    $(document).ready(function() {

        $(document).on('click', '.remove-btn1', function() {
            $(this).closest('.main-form1').remove();
        });

        $(document).on('click', '.add-more-form1', function() {
            $('.paste-new-forms1').append('<div class="main-form1 mt-3 ">\
                                <div class="row">\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">หน่วยงานที่สามารถทดสอบได้</label>\
                                            <input type="text" name="agency_name[]" class="form-control" required placeholder="กรอกหน่วยงานที่ต้องการทดสอบ">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <br>\
                                            <button type="button" class="remove-btn1 btn btn-danger">ลบ</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
        });



    });
    $(document).ready(function() {

        $(document).on('click', '.remove-btn2', function() {
            $(this).closest('.main-form2').remove();
        });

        $(document).on('click', '.add-more-form2', function() {
            $('.paste-new-forms2').append('<div class="main-form2 mt-3">\
                    <div class="row">\
                        <div class="col-md-4">\
                            <div class="form-group mb-2">\
                                <label for="">หน่วยงานที่ขอ</label>\
                                <input type="text" name="department_name[]" class="form-control" required placeholder="กรอกหน่วยงานที่ขอ">\
                            </div>\
                        </div>\
                        <div class="col-md-4">\
                            <div class="form-group mb-2">\
                                <br>\
                                <button type="button" class="remove-btn2 btn btn-danger">ลบ</button>\
                            </div>\
                        </div>\
                    </div>\
                </div>');
        });



    });
</script>