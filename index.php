<!DOCTYPE html>
<html lang="en">
<?php require('./include/head.php'); ?>
<body>
<?php include('./include/header.php');?>
<?php include('./include/banner.php');?>
<?php include('./include/menu.php');?>
<?php include('./connection/connection.php');?>
<?php
    if (!isset($_GET['page']) && empty($_GET['page'])) {
        include('standard/status.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'insert2') {
        include('standard/insert2.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'status') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
            include('standard/status_edit.php');
        } else {
            include('standard/status.php');
        }
    } elseif (isset($_GET['page']) && $_GET['page'] == 'report') {
        include('standard/report.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'statusedit') {
        include('standard/status_edit.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'dash') {
        include('dashboard/index.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add') {
        include('standard/add.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add_type') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
            include('standard/add_update_type.php');
        }
        if (isset($_GET['function']) && $_GET['function'] == 'delete') {
            include('standard/add_delete_type.php');
        } else {
            include('standard/add_type.php');
        }
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add_group') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
            include('standard/add_update_group.php');
        }
        if (isset($_GET['function']) && $_GET['function'] == 'delete') {
            include('standard/add_delete_group.php');
        } else {
            include('standard/add_group.php');
        }
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add_agency') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
            include('standard/add_update_agency.php');
        }
        if (isset($_GET['function']) && $_GET['function'] == 'delete') {
            include('standard/add_delete_agency.php');
        } else {
            include('standard/add_agency.php');
        }
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_type') {
        include('standard/add_insert_type.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_group') {
        include('standard/add_insert_group.php');
    } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_agency') {
        include('standard/add_insert_agency.php');
    }
    ?>

<?php include('./include/script.php');?>
</body>
</html>
<script src="extend\jquery-3.6.0.min.js"></script>

<script>
        function add_element(mom,baby){
                var cloning = $("#" + baby).clone(true);

                cloning.css("display","");

                $("#" + mom).append(cloning);
        }
</script>