<?php
require('connection/connection.php');
if(isset($_POST['save_multiple_data']))
{
    $group_name = $_POST['group_name'];
    $standard_meet = $_POST['standard_meet'];
    $standard_number = $_POST['standard_number'];
    $standard_detail = $_POST['standard_detail'];
    $standard_tacking = $_POST['standard_tacking'];
    $standard_note = $_POST['standard_note'];
    $standard_mandatory = $_POST['standard_mandatory'];

    foreach($group_name as $index => $group_name)
    {
        $group_name = $group_name;
        $standard_meet = $standard_meet;
        $standard_number = $standard_number;
        $standard_detail = $standard_detail;
        $standard_tacking = $standard_tacking;
        $standard_note = $standard_note;
        $standard_mandatory = $standard_mandatory;
        
        $sql = "INSERT INTO standard_tb (standard_mandatory,group_name,standard_meet,standard_tacking,standard_number,standard_detail,standard_note) VALUES (?,?,?,?,?,?,?)";
        $params = array($standard_mandatory,$group_name,$standard_meet,$standard_tacking,$standard_number,$standard_detail,$standard_note);
    }
    if (sqlsrv_query($conn, $sql, $params)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=status";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
?>