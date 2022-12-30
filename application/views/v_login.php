<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>Propertyku</title>
	<!-- Favicon -->
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/brand/logo.png" type="image/png">
	<!-- Bootsrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" type="text/css">
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css" type="text/css"> -->
	<link href="<?php echo base_url(); ?>assets/css/toastr.min.css" rel="stylesheet">

	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet"> -->

	<!-- <link rel="stylesheet" href="fonts/icomoon/style.css"> -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">

	<!-- Bootstrap CSS -->
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css"> -->

	<!-- Style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>

<body>
	<div class="half">
		<div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url() ?>assets/img/brand/logo_property.jpg');"></div>
		<div class="contents order-2 order-md-1">

			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-md-6">
						<div class="form-block">
							<div class="text-center mb-5">
								<h3>Login to <strong>Propertyku</strong></h3>
								<!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
							</div>
							<form id="f_login">
								<div class="form-group first">
									<label for="username">Email</label>
									<input type="text" class="form-control" placeholder="email@propertyku.com" id="user" name="user">
								</div>
								<div class="form-group last mb-3">
									<label for="password">Password</label>
									<input type="password" class="form-control" placeholder="Your Password" id="pass" name="pass">
								</div>

								<!-- <div class="d-sm-flex mb-5 align-items-center">
									<label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
										<input type="checkbox" checked="checked" />
										<div class="control__indicator"></div>
									</label>
									<span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
								</div> -->
								<button type="button" class="btn btn-block btn-primary" id="login" style="color: #fff;border-color: #49ed50;background-color: #49ed50;
">Login</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <script src="js/jquery-3.3.1.min.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
	<!-- <script src="<?php echo base_url(); ?>assets/js/main.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/toastr.min.js"></script>
	<script type="text/javascript">
		var ip_server = "<?php echo base_url(); ?>";
		$(document).ready(function() {
			toastr.options.closeMethod = 'fadeOut';
			toastr.options.closeDuration = 300;
			toastr.options.progressBar = true;

			$("[name=pass]").on('keyup', function(e) {
				if (e.keyCode == 13) {
					$("#login").trigger("click");
				}
			});

			$("#login").click(function() {
				var btn = $(this);
				btn.button('loading');
				var user = $.trim($("[name=user]").val());
				var password = $.trim($("[name=pass]").val());
				/* alert(user + '-' + password);
				return false; */
				if (user == "" || password == "") {
					toastr.error('Username / Password Salah', 'INFO');
					btn.button('reset');
				} else {
					var formnya = $("#f_login")[0];
					var Data_tambah = new FormData(formnya);

					$.ajax({
						url: ip_server + "login/cek",
						type: "POST",
						data: Data_tambah,
						dataType: "json",
						contentType: false,
						cache: false,
						processData: false,
						success: function(out) {
							if (out.sts == "ok") {
								toastr.success("Berhasil Masuk Sistem", 'INFO');
								window.location = "home";
							} else {
								toastr.error(out.sts, 'INFO');
							}
							btn.button('reset');
						},
						error: function() {
							toastr.error('Tolong cek koneksi internet Anda', 'ERROR');
							btn.button('reset');
						}
					});
				}
			});
		});
	</script>
</body>

</html>
