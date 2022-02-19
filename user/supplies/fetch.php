
<?php
include 'conn.php'; // MySQL
if (isset($_POST["employee_id"])) {
    $query  = "SELECT * FROM supplies WHERE sup_id = '" . $_POST["employee_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>