<?php @session_start();?>
<?php include('./connection.php');?>
<?php
if (isset($_POST) && !empty($_POST)) {
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
	$username = $_POST['username'];
	//$Password = md5($_POST['Password']);
    $password = $_POST['password'];
	// $Password = sha1(md5($_POST['Password']));	
	// exit();
	$sql = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'";
	$query = mysqli_query($connection, $sql);
	$row = mysqli_num_rows($query);
    
    if ($row == 1) {
        $result = mysqli_fetch_assoc($query);
        $_SESSION['user_login'] = $result['username'];
        $_SESSION['role_login'] = $result['role'];
        $_SESSION['image_login'] = $result['user_img'];

        
        if ($_SESSION['role_login']  == 'ผู้ดูแลระบบ') {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("WELCOME ผู้ดูแลระบบ");';
            $alert .= 'window.location.href = "../admin/index.php";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else if ($_SESSION['role_login'] == 'เภสัชกร') {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("WELCOME เภสัชกร");';
            $alert .= 'window.location.href = "../user/index.php";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } elseif ($_SESSION['role_login'] == 'เจ้าของกิจการ') {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("WELCOME เจ้าของกิจการ");';
            $alert .= 'window.location.href = "../owner/index.php";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
    }   else {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Username and Password ไม่ถูกต้อง !!");';
        $alert .= 'window.location.href = "";';
        $alert .= '</script>';
        echo $alert;
        exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						เข้าสู่ระบบ
					</span>
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>