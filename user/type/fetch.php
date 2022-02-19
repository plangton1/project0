
<?php
include 'conn.php'; // MySQL
if (isset($_POST["type_id"])) {
    $query  = "SELECT * FROM type WHERE type_id = '" . $_POST["type_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>