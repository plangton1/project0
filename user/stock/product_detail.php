<?php
//connect db
include("connect.php");
if (isset($_GET)) {
	$product_id = $_GET['product_id']; //สร้างตัวแปร product_id เพื่อรับค่า

	$sql = "SELECT * FROM product WHERE product_id= '$product_id' ";  //รับค่าตัวแปร product_id ที่ส่งมา
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
} ?>
<div class="from-group text-center">
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">

					<div class="form-group row">
						<label for="fname" class="col-sm-3 text-end control-label col-form-label">รูปภาพ</label>
						<div class="col-sm-6 mb-3">
							<img id="preview" width="150" height="150">
							<hr>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="form-group row">
						<div class="col-sm-6 mb-3">
							<a class="btn btn-primary" href='?page=<?= $_GET['page'] ?>&function=stock&product_id=<?php echo $row['product_id']; ?>&act=add'> เพิ่มลงคลัง </a>
						</div>
						<div class="col-sm-6 mb-3">
						<a class="btn btn-danger" href="javascript:window.history.back(-1);">ย้อนกลับ</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">รหัสสินค้า</h5>
									<p class="card-text"><?php echo  $row['product_id']; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">ชื่อของสินค้า</h5>
									<p class="card-text"><?php echo  $row['product_name']; ?></p>
								</div>
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">ราคาต้นทุนของสินค้า</h5>
									<p class="card-text"><?php echo  $row['product_price']; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">ราคาขายของสินค้า</h5>
									<p class="card-text"><?php echo  $row['product_sale']; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">จำนวนสินค้าคงเหลือ</h5>
									<p class="card-text"><?php echo  $row['product_net']; ?></p>
								</div>
							</div>
						</div>

						<hr>
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">รายละเอียดของสินค้า</h5>
									<p class="card-text"><?php echo  $row['product_net']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- / PHP Ajax Update MySQL Data Through Bootstrap Modal -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- datatable -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<script type="text/javascript">
		function ReadURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#preview').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#product_img").change(function() {
			ReadURL(this);
		});
	</script>