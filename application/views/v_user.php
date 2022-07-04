<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">User</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">User</li>
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
							<h2 class="mb-0">List User</h2>
						</div>
						<!-- <div class="col-4 text-right">
							<a href="#!" class="btn btn-sm btn-primary">Settings</a>
						</div> -->
					</div>
				</div>
				<div class="card-body">
					<form>
						<div class="row">
							<div class="col-md-12">
								<p>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_user">
										Tambah User
										<i class="ni ni-fat-add"></i>
									</button>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="card">
									<div class="card-header">
										<h3 class="title">List User</h3>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama</th>
														<th>Email</th>
														<th>Hak</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Tambah User-->
		<div class="modal fade" id="mod_tambah_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tambah_user" method="post">
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Nama</label>
										<input type="text" id="nama_user" name="nama_user" class="form-control" placeholder="Nama User" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Password</label>
										<input type="text" id="password_user" name="password_user" class="form-control" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Hak</label>
										<select class="form-control" aria-label="Default select example" id="hak_user" name="hak_user">
											<option selected value="">Pilih Hak</option>
											<option value="admin">Admin</option>
											<option value="agen">Agen</option>
											<option value="member">Member</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Email</label>
										<input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off">
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary" id="btn_simpan">Simpan</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Edit User-->
		<div class="modal fade mod_edit_user" id="mod_edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_edit_user" method="post">
							<input type="hidden" name="id_edit" class="edit">
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Nama</label>
										<input type="text" id="ed_nama_user" name="ed_nama_user" class="form-control" placeholder="Nama User" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Password</label>
										<input type="text" id="ed_password_user" name="ed_password_user" class="form-control" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Hak</label>
										<select class="form-control" aria-label="Default select example" id="ed_hak_user" name="ed_hak_user">
											<option selected value="">Pilih Hak</option>
											<option value="admin">Admin</option>
											<option value="agen">Agen</option>
											<option value="member">Member</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Email</label>
										<input type="email" id="ed_email" name="ed_email" class="form-control" placeholder="Email" autocomplete="off">
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary" id="btn_simpan_edit">Simpan</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Hapus User -->
		<div class="modal fade mod_hapus_user" id="mod_hapus_user" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
				<div class="modal-content bg-gradient-danger">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-notification">Hapus User</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="py-3 text-center">
							<i class="ni ni-bell-55 ni-3x"></i>
							<h4 class="heading mt-4">Anda yakin menghapus user ini ?</h4>
							<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-white" id="btn_hapus">Hapus</button>
						<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var dt_table = $("#datatable-responsive").DataTable();
		$(document).ready(function() {
			tampil_user();
			// tampil_kordinator();
			simpan_user();
		});

		// TAMPIL TABEL USER
		function tampil_user() {
			dt_table.destroy();
			dt_table = $("#datatable-responsive").DataTable({
				ajax: {
					url: ip_server + "admin/tabel_user",
					type: "post"
				},
				lengthMenu: [
					[10, 25, 50, 100, -1],
					[10, 25, 50, 100, "All"]
				],
				order: [
					[0, "asc"]
				],
				columns: [{
						"width": "10px"
					},
					null,
					null,
					null,
					null
					/* {
						"width": "250px"
					} */
				],
				processing: true,
				responsive: true,
				fixedHeader: true
			});
		}

		// SIMPAN USER
		function simpan_user() {
			$('#btn_simpan').on('click', function() {
				var btn = $(this);

				if ($("#nama_user").val() == "") {
					toastr.error("Nama User belum di isi", 'INFO');
					return false;
				};

				if ($("#password_user").val() == "") {
					toastr.error("Password belum di isi", 'INFO');
					return false;
				};
				
				if ($("#hak_user").val() == "") {
					toastr.error("Hak belum di pilih", 'INFO');
					return false;
				};

				if ($("#email").val() == "") {
					toastr.error("Email belum di isi", 'INFO');
					return false;
				};

				var formnya = $("#f_tambah_user")[0];
				var Data_tambah = new FormData(formnya);
				btn.button('loading');

				$.ajax({
					url: ip_server + "admin/simpan_user",
					type: "POST",
					data: Data_tambah,
					dataType: "json",
					contentType: false,
					cache: false,
					processData: false,
					success: function(out) {
						if (out.sts == "ok") {
							toastr.success("Berhasil", 'INFO');
							dt_table.ajax.reload(null, false);
							$('#mod_tambah_user').modal('hide');
							$("#nama_user").val("");
							$("#hak_user").val("");
							$("#password_user").val("");
							$("#email").val("");
						} else {
							toastr.error(out.sts, 'INFO');
						}
						btn.button('reset');
					},
					error: function() {
						toastr.error('Please, Check your connection', 'ERROR');
						btn.button('reset');
					}
				});
			});
		}

		// TAMPIL EDIT USER
		$('#datatable-responsive').on("click", "#user_edit", function() {
			var id = $(this).data("id");
			// alert(id);return false;
			var mdl = $(".mod_edit_user");
			var btn = $(this);
			// mdl.modal("show");
			$("#f_edit_user")[0].reset();
			btn.button('loading');
			mdl.find(".edit").val(id);

			$.post(ip_server + "admin/baca_user_edit", {
				id_edit: id
			}, function(out) {
				/* if (out[2] == 'user') {
					$('#ed_set_kord').css('display', '');
				} else {
					$('#ed_set_kord').css('display', 'none');
				}

				$('#ed_hak_user').on('change', function() {
					var hak_user = $('#ed_hak_user').val();
					// alert(hak_user);
					if (hak_user == 'user') {
						$('#ed_set_kord').css('display', '');
						$("[name=ed_kord_user]").val(out[3]);
					} else {
						$('#ed_set_kord').css('display', 'none');
						$("[name=ed_kord_user]").val('');
					}
				}); */

				btn.button('reset');
				$("[name=id_edit]").val(out[0]);
				$("[name=ed_nama_user]").val(out[1]);
				$("[name=ed_password_user]").val('');
				$("[name=ed_email]").val(out[3]);
				$("[name=ed_hak_user]").val(out[4]);
				mdl.modal("show");

			}, "json");
		});

		// SIMPAN EDIT USER
		$('#btn_simpan_edit').on("click", function() {
			var btn = $(this);

			if ($("#ed_nama_user").val() == "") {
				toastr.error("Nama User belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_hak_user").val() == "") {
				toastr.error("Hak belum di pilih", 'INFO');
				return false;
			};

			if ($("#ed_email").val() == "") {
				toastr.error("Email belum di pilih", 'INFO');
				return false;
			};

			var formnya = $("#f_edit_user")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');
			$.ajax({
				url: ip_server + "admin/simpan_user_edit",
				type: "POST",
				data: Data_tambah,
				dataType: "json",
				contentType: false,
				cache: false,
				processData: false,
				success: function(out) {
					if (out.sts == "ok") {
						toastr.success("Ubah Sukses", 'INFO');
						dt_table.ajax.reload(null, false);
						$(".mod_edit_user").modal("hide");
					} else {
						toastr.error(out.sts, 'INFO');
					}
					btn.button('reset');
				},
				error: function() {
					toastr.error('Mohon, Cek koneksi internet', 'ERROR');
					btn.button('reset');
				}
			});
		});

		// DELETE USER
		$('#datatable-responsive').on("click", "#user_del", function() {
			var id = $(this).data("id");
			var mdl = $(".mod_hapus_user");
			mdl.modal("show");
			mdl.find(".btn-danger").data("id", id);

			$('#btn_hapus').on('click', function() {
				var btn = $(this);
				btn.button('loading');

				$.ajax({
					url: ip_server + "admin/hapus_user",
					type: "POST",
					data: {
						id_hapus: id
					},
					dataType: "json",
					cache: false,
					success: function(out) {
						if (out.sts == "ok") {
							toastr.success("Hapus Sukses", 'INFO');
							dt_table.ajax.reload(null, false);
							$(".mod_hapus_user").modal("hide");
						} else {
							toastr.error(out.sts, 'INFO');
						}
						btn.button('reset');
					},
					error: function() {
						toastr.error('Mohon, Cek koneksi internet', 'ERROR');
						btn.button('reset');
					}
				});

			});
		});
	</script>
