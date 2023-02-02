<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css" /> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style>
	.button-container {
		margin-bottom: 10px;
	}

	#my-select {
		width: 200px;
	}
</style>
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Push Notifikasi</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Push Notifikasi</li>
						</ol>
					</nav>
				</div>
				<!-- <div class="col-lg-6 col-5 text-right">
					<a href="#" class="btn btn-sm btn-neutral">New</a>
					<a href="#" class="btn btn-sm btn-neutral">Filters</a>
				</div> -->
			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col-xl-12 order-xl-1">
			<div class="card">
				<div class="card-header">
					<div class="row align-items-center">
						<div class="col-8">
							<h2 class="mb-0">Push Notifikasi</h2>
						</div>
						<!-- <div class="col-4 text-right">
							<a href="#!" class="btn btn-sm btn-primary">Settings</a>
						</div> -->
					</div>
				</div>
				<div class="card-body">
					<form id="f_push_notifikasi" method="post">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="input-first-name">Tipe User</label>
									<select class="form-control" aria-label="Default select example" id="tipe_user" name="tipe_user">
										<option value="" selected>Pilih Tipe User</option>
										<option value="member">Member</option>
										<option value="non_member">Non Member</option>
										<option value="all">All</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<label class="form-control-label" for="input-first-name">Nama User</label>
								<div class="button-container">
									<button class="btn btn-primary" type="button" onclick="selectAll()">Select All</button>
									<button class="btn btn-warning" type="button" onclick="deselectAll()">Deselect All</button>
								</div>
								<select id="nama_user" name="nama_user[]" multiple>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="input-bankname">Pesan</label>
									<textarea type="text" id="pesan_notifikasi" name="pesan_notifikasi" class="form-control" placeholder="Pesan" autocomplete="off" rows="3" cols="80"></textarea>
								</div>
							</div>
						</div>

					</form>
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="push_notifikasi">Push</button>
				</div>
			</div>
		</div>
	</div>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">
		var dt_table = $("#datatable-responsive").DataTable();
		$(document).ready(function() {
			$("#nama_user").select2({
				placeholder: "Pilih Nama User",
				allowClear: true
			});
		});

		function selectAll() {
			$("#nama_user > option").prop("selected", true);
			$("#nama_user").trigger("change");
		}

		function deselectAll() {
			$("#nama_user > option").prop("selected", false);
			$("#nama_user").trigger("change");
		}

		$(document).on('change', '#tipe_user', function() {
			var tipe = $('#tipe_user').val();
			$.ajax({
				url: ip_server + "admin/list_user",
				data: {
					tipe: tipe
				},
				type: "POST",
				dataType: "JSON",
				success: function(hasil) {
					$("#nama_user").html('');
					$.each(hasil, function(index, value) {
						$("#nama_user").append('<option value="' + value.apikey + '">' + value.nama + '</option>');
					});
				},
				error: function() {
					alert("Error");
				}
			});
		});

		$(document).on('click', '#push_notifikasi', function() {
			var formnya = $("#f_push_notifikasi")[0];
			var Data_tambah = new FormData(formnya);
			$.ajax({
				url: ip_server + "notifikasi/notif_to",
				type: "POST",
				data: Data_tambah,
				dataType: "json",
				processData: false,
				contentType: false,
				success: function(out) {
					// console.log(out);
					if (out.success > 0) {
						toastr.success("Berhasil mengirim notifikasi", 'INFO');
						$("#tipe_user").val('');
						$("#nama_user").html('');
						$("#pesan_notifikasi").val('');
					} else if (out.failure > 0) {
						toastr.error('Gaga kirim notif', 'ERROR');
						$("#tipe_user").val('');
						$("#nama_user").html('');
						$("#pesan_notifikasi").val('');
					} else {
						toastr.success("Berhasil mengirim notifikasi", 'INFO');
						$("#tipe_user").val('');
						$("#nama_user").html('');
						$("#pesan_notifikasi").val('');
					}
				},
				error: function() {
					toastr.error('Please, Check your connection', 'ERROR');
				}
			});
		})
	</script>
