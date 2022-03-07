<?php
if (isset($_GET['sup_id']) && !empty($_GET['sup_id'])) {
    $sup_id = $_GET['sup_id'];
    $sql = "DELETE FROM supplies_1 WHERE sup_id = '$sup_id' "; 
            if (mysqli_query($connection, $sql)) {
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("ลบข้อมูลสำเร็จ !!");';
                $alert .= 'window.location.href = "?page=supplies";';
                $alert .= '</script>';
                echo $alert;
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
            mysqli_close($connection);
}