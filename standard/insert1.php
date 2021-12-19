<?php include('insert_sql1.php'); ?>
<section class="items-grid section custom-padding">

        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">เพิ่มเอกสารที่ยื่นขอ มอก.</h2>
                </div>
            </div>
        </div>
  

    <div class="container card-regis ">
        <div class="container  font">
            <form action="" method="POST">

                <div class="form-group mb-2">
                    <label for="">วาระจากที่ประชุม สมอ. </label>
                    <input type="text" name="standard_meet" class="form-control">
                </div>

                <div class="form-group mb-2 f-red">
                    <label for="">เลขที่ มอก.*</label>
                    <input type="text" name="standard_number" class="form-control">
                </div>

                <div class="form-group mb-2">
                    <label for="">ชื่อมาตรฐาน</label>
                    <input type="text" name="standard_detail" class="form-control">
                </div>

                <div class="form-group mb-2">
                            <div class="form-group mb-2">
                                <label for="">มาตรฐานบังคับ</label>
                                <input type="text" name="standard_mandatory" class="form-control">
                            </div>
                </div>

                <div class="form-group mb-2">
                    <label for="">หมายเลข tracking</label>
                    <input type="text" name="standard_tacking" class="form-control">
                </div>

                <div class="form-group mb-2">
                    <label for="">หมายเหตุ</label>
                    <input type="text" name="standard_note" class="form-control">
                </div>



                <div class="form-group mb-2">
                    <label for="">ไฟล์แนบ</label>
                    <input type="file" name="file" class="form-control">
                </div>


                <!-- เพิ่มหลายฟรอ์ม -->
                <a href="javascript:void(0)" class="add-more-form btn btn-success mt-2">เพิ่มฟอร์ม</a>
                <div class="main-form mt-3 border-bottom">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="">กลุ่มผลิตภัณฑ์</label>
                                <input type="text" name="group_name[]" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="">หน่วยงานที่ขอ</label>
                                <input type="text" name="department_name[]" class="form-control">
                            </div>
                        </div> -->  
                        <div class="paste-new-forms"></div>
                    </div>
                </div>

                <button type="submit" name="save_multiple_data" class="btn btn-primary mt-2">บันทึกข้อมูล</button>
            </form>

        </div>
    </div>
</section>



    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.main-form').remove();
            });

            $(document).on('click', '.add-more-form', function() {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                                <div class="row">\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">กลุ่มผลิตภัณฑ์.</label>\
                                            <input type="text" name="group_name[]" class="form-control" >\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <br>\
                                            <button type="button" class="remove-btn btn btn-danger">ลบออก</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
            });

        });
    </script>



    </body>

    </html>