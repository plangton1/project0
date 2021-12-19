<?php
require '../connection/connection.php';

$mode = $_REQUEST["mode"];

if ($mode == "insert_data") {
    $standard_meet = $_REQUEST["standard_meet"];
    $standard_number = $_REQUEST["standard_number"];
    $standard_detail = $_REQUEST["standard_detail"];
    $standard_mandatory = $_REQUEST["standard_mandatory"];
    $standard_tacking = $_REQUEST["standard_tacking"];
    $standard_note = $_REQUEST["standard_note"];
    //$file = $_REQUEST["file"];
    $group_id = $_REQUEST["group_id"];
    $agency_id = $_REQUEST["agency_id"];
    $type_id = $_REQUEST["type_id"];
    $department_id = $_REQUEST["department_id"];

    $sql = "INSERT INTO main_std ( standard_mandatory , standard_meet , standard_tacking , standard_number , standard_detail , standard_note  ) 
      VALUES ('$standard_mandatory','$standard_meet','$standard_tacking','$standard_number','$standard_detail','$standard_note')";



    //$conn->query($sql);
    //sqlsrv_close($conn);

    $stmt = sqlsrv_query($conn, $sql);

    $sqlmaxid = "SELECT @@IDENTITY AS 'Maxid'";
    $querymax = sqlsrv_query($conn, $sqlmaxid);
    $resultMaxid = sqlsrv_fetch_array($querymax, SQLSRV_FETCH_ASSOC);

    $standard_idtb =  $resultMaxid['Maxid'];

    // if ($stmt == false) {
    //     die(print_r(sqlsrv_errors()));
    // } else {
    //     echo "บันทึกข้อมูลสำเร็จ";
    //     echo "<br>";

    // }

    //1

    $countgroup = count($group_id);

    //echo $test;


    for ($i = 0; $i < $countgroup; $i++) {
        $groupid =  $group_id[$i];

        //echo "<br>";
        if (trim($groupid) <> "") {

            $sql2 = "INSERT INTO dimension_group ( group_id , standard_idtb  ) 
            VALUES ('$groupid', '$standard_idtb')";

            $stmt2 = sqlsrv_query($conn, $sql2);
        }

        // if ($stmt2 == false) {
        //     die(print_r(sqlsrv_errors()));
        // } else {
        //     echo "บันทึกข้อมูลสำเร็จ1";
        // }


        //echo "<br>";
    }

    //2

    $countagency = count($agency_id);

    //echo $test;


    for ($i = 0; $i < $countagency; $i++) {
        $agencyid =  $agency_id[$i];

        //echo "<br>";

        if (trim($agencyid) <> "") {
            $sql3 = "INSERT INTO dimension_agency ( agency_id , standard_idtb  ) 
            VALUES ('$agencyid', '$standard_idtb')";

            $stmt3 = sqlsrv_query($conn, $sql3);
        }
        // if ($stmt3 == false) {
        //     die(print_r(sqlsrv_errors()));
        // } else {
        //     echo "บันทึกข้อมูลสำเร็จ2";
        // }


        //echo "<br>";
    }

    //3

    $counttype = count($type_id);

    //echo $test; สร้างตัวแปรต่อ ทำอีฟ


    for ($i = 0; $i < $counttype; $i++) {
        $typeid =  $type_id[$i];

        //echo "<br>";
        if (trim($typeid) <> "") {

        $sql3 = "INSERT INTO dimension_type ( type_id , standard_idtb  ) 
      VALUES ('$typeid', '$standard_idtb')";

        $stmt3 = sqlsrv_query($conn, $sql3);

        }
        // if ($stmt3 == false) {
        //     die(print_r(sqlsrv_errors()));
        // } else {
        //     echo "บันทึกข้อมูลสำเร็จ3";
        // }


        //echo "<br>";
    }

    $countboxdepartment = count($department_id);

    //echo $test;


    for ($i = 0; $i < $countboxdepartment; $i++) {
        $departmentid =  $department_id[$i];

        //echo "<br>";
        if (trim($departmentid) <> "") {

        $sql4 = "INSERT INTO dimension_department ( department_id , standard_idtb  ) 
      VALUES ('$departmentid', '$standard_idtb')";

        $stmt4 = sqlsrv_query($conn, $sql4);
        }

        // if ($stmt4 == false) {
        //     die(print_r(sqlsrv_errors()));
        // } else {
        //     echo "บันทึกข้อมูลสำเร็จ4";
        // }


        //echo "<br>";
    }
    // if (sqlsrv_query($conn, $sql4)) {
    //     $alert = '<script type="text/javascript">';
    //     $alert .= 'alert("เพิ่มข้อมูลสถานะสำเร็จ !!");';
    //     $alert .= 'window.location.href = "?page=status";';
    //     $alert .= '</script>';
    //     echo $alert;
    //     exit();;
    // } else {
    //     echo "Error: " . $sql0 . "<br>" . sqlsrv_errors($conn);
    // }
    // sqlsrv_close($conn);
    echo "ok save" ;

    //echo "<script>location.href='index.php?PG=1';</script>";
}
