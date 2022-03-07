<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php include './include/head.php' ?>
<?php if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])):?>
 <?php include './connection.php'; ?> 
<body>
  <?php include './include/wrapper.php' ?>
  <?php include './include/topbar.php' ?>
  <?php include './include/sidebar.php' ?>
 
  <div class="page-wrapper">

    <div class="container-fluid">
    <?php
      if (!isset($_GET['page']) && empty($_GET['page'])) {
        include('user/index.php');
      } elseif (isset($_GET['page']) && $_GET['page'] == 'user') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
          include('user/update.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
          include('user/delete.php');
        } else {
          include('user/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'supplies') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
          include('supplies/update.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
          include('supplies/insert.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
          include('supplies/delete.php');
        } else {
          include('supplies/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'type') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
          include('type/update.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
          include('type/insert.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
          include('type/delete.php');
        } else {
          include('type/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'product') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
          include('product/update.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
          include('product/insert.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
          include('product/delete.php');
        } else {
          include('product/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'stock') {
        if (isset($_GET['function']) && $_GET['function'] == 'detail') {
          include('stock/product_detail.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
          include('stock/insert.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
          include('stock/delete.php');
        } else {
          include('stock/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'sale') {
        if (isset($_GET['function']) && $_GET['function'] == 'detail') {
          include('sale/product_detail.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
          include('sale/insert.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
          include('sale/delete.php');
        } else {
          include('sale/index.php');
        }
      }elseif (isset($_GET['page']) && $_GET['page'] == 'profile') {
        include('profile.php');
      }elseif (isset($_GET['page']) && $_GET['page'] == 'confirm') {
        include('stock/confirm.php');
      }elseif (isset($_GET['page']) && $_GET['page'] == 'savestock') {
        include('stock/savestock.php');
      }elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
      include('logout/index.php');
        }
      ?>
          </div>
  </div>
  <?php include './include/script.php' ?>
  <!-- <script src="extend/jquery-3.6.0.min.js"></script> -->
</body>
<?php else : ?>
<?php include('../login/index.php') ?>
<?php endif; ?>
</html>