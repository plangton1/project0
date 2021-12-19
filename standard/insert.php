  <?php include('insert_sql.php'); ?>
  <section class="items-grid section custom-padding">
      <div class="">
          <div class="row">
              <div class="col-12">
                  <div class="section-title">
                      <h2 class="wow fadeInUp" data-wow-delay=".4s">เพิ่มเอกสารที่ยื่นขอ มอก.</h2>
                      <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                      <form method="post">
                          <script>
                              function add_row() {
                                  var table = document.getElementById("myTable");
                                  count_rows = table.getElementsByTagName("tr").length;

                                  var row = table.insertRow(count_rows);
                                  var cell1 = row.insertCell(0);
                                  var cell2 = row.insertCell(1);
                                  var cell3 = row.insertCell(2);
                                  var cell4 = row.insertCell(3);
                                  var cell5 = row.insertCell(4);
                                  var cell6 = row.insertCell(5);
                                  var cell7 = row.insertCell(6);
                                  var cell8 = row.insertCell(7);
                                  var cell9 = row.insertCell(8);
                                  var cell10 = row.insertCell(9);
                                  var cell11 = row.insertCell(10);
                                  var cell12 = row.insertCell(11);
                                  <?php $i = 2; ?>

                                  cell1.innerHTML = "<p " + count_rows + " '><?= $i++ ?></p>";
                                  cell2.innerHTML = "<input type='text' name='standard_meet'" + count_rows + " value>";
                                  cell3.innerHTML = "<input type='text' name='standard_number'" + count_rows + " value>";
                                  cell4.innerHTML = "<input type='text' name='txtB'" + count_rows + " value>";
                                  cell5.innerHTML = "<input type='text' name='txtB'" + count_rows + " value>";
                                  cell6.innerHTML = "<textarea type='text' name='standard_detail'" + count_rows + " value></textarea>";
                                  cell7.innerHTML = "<input type='text' name='txtB'" + count_rows + " value>";
                                  cell8.innerHTML = "<input type='text' name='standard_mandatory'" + count_rows + " value>";
                                  cell9.innerHTML = "<input type='text' name='txtB'" + count_rows + " value>";
                                  cell10.innerHTML = "<input type='text' name='standard_tracking'" + count_rows + " value>";
                                  cell11.innerHTML = "<input type='text' name='standard_note'" + count_rows + " value>";
                                  cell12.innerHTML = "<input type='file' name='txtB'" + count_rows + " value>";
                                  //$i++;
                              }


                              function del_row() {
                                  var table = document.getElementById("myTable");
                                  count_rows = table.getElementsByTagName("tr").length;
                                  document.getElementById("myTable").deleteRow(count_rows - 1);
                              }
                          </script>
                  </div>
              </div>
          </div>
      </div>

      <div class="container card-regis">
          <div class="container  font">
              <form method="post" action="">
                  <div class="mb-3">
                      <label> วาระจากที่ประชุม สมอ. </label>
                      <input type="text" name="standard_meet" class="form-control" autocomplete="off">
                  </div>
                  <div class="f-red mb-3">
                      <label> เลขที่ มอก.* </label>
                      <input type="text" name="standard_number" class="form-control" autocomplete="off" required>
                  </div>

                  <div class="f-red mb-3">
                      <label> ประเภทผลิตภัณฑ์* </label> 
                      <div class="grid">
                      <?php while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
                          <div><input type="checkbox" id="vehicle2" name="vehicle2 type_id" value="<?=$result['type_id']?>"> <label for="vehicle2"><?=$result['type_name']?></label></div>
                       <?php } ?>
                    </div>
                  </div>

                  <div class="mb-3">
                      <div class="input-group">
                          <label class="input-group-text"> กลุ่มผลิตภัณฑ์ </label>

                          <a id="btndelete3" class="input_add btn btn-outline-success  ">+</a>
                          <a id="btnadd3" class="input_del btn btn-outline-danger  ">-</a>
                      </div>
                      <input type="text" name="group_name[] " class="form-control group_name" id="group_name">
                  </div>
                  <div class="mb-3">
                      <label> ชื่อมาตรฐาน </label>
                      <input type="text" name="standard_detail" class="form-control" autocomplete="off">
                  </div>
                  <div class="mb-3">
                      <div class="input-group">
                          <label class="input-group-text"> หน่วยงานที่ทดสอบได้ </label>

                          <a id="btndelete2" class="input_add btn btn-outline-success  ">+</a>
                          <a id="btnadd2" class="input_del btn btn-outline-danger  ">-</a>
                      </div>
                      <input type="text" name="agency_name[] agency_name" class="form-control agency_name" id="agency_name">
                  </div>
                  <div class="mb-3">
                      <label> มาตรฐานบังคับ </label>
                      <input type="text" name="standard_mandatory" class="form-control" autocomplete="off">
                  </div>
                  <div class="mb-3">
                      <div class="input-group">
                          <label class="input-group-text"> หน่วยงานที่ขอ </label>

                          <a id="btndelete1" class="input_add btn btn-outline-success  ">+</a>
                          <a id="btnadd1" class="input_del btn btn-outline-danger  ">-</a>
                      </div>

                      <input type="text" name="department_name[]" class="form-control department_name" id="department_name">
                  </div>
                  <div class="mb-3">
                      <label> หมายเหตุเลข tracking </label>
                      <input type="text" name="standard_tacking" class="form-control" autocomplete="off">
                  </div>

                  <div class="mb-3">
                      <label> หมายเหตุ </label>
                      <input type="text" name="standard_note" class="form-control" autocomplete="off">
                  </div>
                  <div class="mb-3">
                      <div class="input-group">
                          <label class="input-group-text"> ไฟล์แนบ </label>

                          <a id="btndelete4" class="input_add btn btn-outline-success  ">+</a>
                          <a id="btnadd4" class="input_del btn btn-outline-danger  ">-</a>
                      </div>
                      <input type="file" id="filename" name="filename" class="form-control filename">

                  </div>

          </div>
          <hr>
          <!-- <div class="mb-3">
                        <div class="input-group ">
                            <label class="input-group-text">1. วัตถุประสงค์ </label>
                            <a id="btndeleteob" class="input_add btn btn-outline-info  ">+</a>
                            <a id="btnaddob" class="input_del btn btn-outline-danger  ">-</a>
                        </div>
                         <input type="text" name="QP_ob_details[]" class="form-control QP_ob_details" id="QP_ob_details"> 
                    </div> -->


          <center>
              <div class="bt">
                  <!-- <input type="checkbox" name="chkColor1" value="Red">กรุณายอมรับและเงื่อนไขสำหรับการสมัครสมาชิก -->

                  <!-- <button type="submit" class="btn btn-danger">รับรหัส otp</button> -->
                  <button type="submit" name="" class="btn btn-primary bt mg-t-bt">เพิ่มข้อมูล</button>
              </div>
          </center>
          </form>
      </div>
      </div>
      <!-- <a href=""><img src="https://www2.tistr.or.th/tistrservices/training/images/logo2.png" class="logo"></a> -->


  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <script>
      $(document).ready(function() {
          var ob = 0;

          $("#btnadd1").click(function() { //ตรวจสอบการคลิกปุ่ม
              var len = $(".department_name").length //นับจำนวนที่มีการประการ class='QP_ob_details'
              if (len != 1) { //ตรวจว่าไม่เท่ากับ1แถวไหม
                  ob--; //ลดค่าตัวแปรลง1
                  $(".department_name:last").remove(); //ลบคลาส  อันสุดท้าย
              }
          });

          $("#btndelete1").click(function() { //ตรวจสอบการคลิกปุ่ม
              ob++; //เพิ่มค่าค่าตัวแปรลง1
              $(".department_name:last").after('<input type="text" name="department_name[]" class="form-control department_name" id="department_name">'); //เพิมช่องกรอก หลังจาก คลาส fname อันสุดท้าย
          });

          $("#btnadd2").click(function() { //ตรวจสอบการคลิกปุ่ม
              var len = $(".agency_name").length //นับจำนวนที่มีการประการ class='QP_ob_details'
              if (len != 1) { //ตรวจว่าไม่เท่ากับ1แถวไหม
                  ob--; //ลดค่าตัวแปรลง1
                  $(".agency_name:last").remove(); //ลบคลาส  อันสุดท้าย
              }
          });

          $("#btndelete2").click(function() { //ตรวจสอบการคลิกปุ่ม
              ob++; //เพิ่มค่าค่าตัวแปรลง1
              $(".agency_name:last").after('<input type="text" name="agency_name[]" class="form-control agency_name" id="agency_name">'); //เพิมช่องกรอก หลังจาก คลาส fname อันสุดท้าย
          });

          $("#btnadd3").click(function() { //ตรวจสอบการคลิกปุ่ม
              var len = $(".group_name").length //นับจำนวนที่มีการประการ class='QP_ob_details'
              if (len != 1) { //ตรวจว่าไม่เท่ากับ1แถวไหม
                  ob--; //ลดค่าตัวแปรลง1
                  $(".group_name:last").remove(); //ลบคลาส  อันสุดท้าย
              }
          });

          $("#btndelete3").click(function() { //ตรวจสอบการคลิกปุ่ม
              ob++; //เพิ่มค่าค่าตัวแปรลง1
              $(".group_name:last").after('<input type="text" name="group_name[]" class="form-control group_name" id="group_name">'); //เพิมช่องกรอก หลังจาก คลาส fname อันสุดท้าย
          });

          $("#btnadd4").click(function() { //ตรวจสอบการคลิกปุ่ม
              var len = $(".filename").length //นับจำนวนที่มีการประการ class='QP_ob_details'
              if (len != 1) { //ตรวจว่าไม่เท่ากับ1แถวไหม
                  ob--; //ลดค่าตัวแปรลง1
                  $(".filename:last").remove(); //ลบคลาส  อันสุดท้าย
              }
          });

          $("#btndelete4").click(function() { //ตรวจสอบการคลิกปุ่ม
              ob++; //เพิ่มค่าค่าตัวแปรลง1
              $(".filename:last").after('<input type="file" id="filename" name="filename" class="form-control filename">'); //เพิมช่องกรอก หลังจาก คลาส fname อันสุดท้าย
          });
      });
  </script>
