<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Jenis Sertifikat</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Jenis Sertifikat</li>
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
							<h2 class="mb-0">Jenis Sertifikat</h2>
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
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_sertifikat">
										Tambah Jenis Sertifikat
										<i class="ni ni-fat-add"></i>
									</button>
									<!-- <button type="button" class="btn btn-primary" id="push_stok">
										Push
										<i class="ni ni-fat-add"></i>
									</button> -->
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="card">
									<div class="card-header">
										<h3 class="title">List Jenis Sertifikat</h3>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Jenis Sertifikat</th>
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

		<!-- Modal Tambah Tipe-->
		<div class="modal fade" id="mod_tambah_sertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Sertifikat</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tambah_sertifikat" method="post">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Nama Sertifikat</label>
										<input type="text" id="nama_sertifikat" name="nama_sertifikat" class="form-control" placeholder="Nama Sertifikat">
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

		<!-- Modal Edit Tipe Properti-->
		<div class="modal fade mod_edit_sertifikat" id="mod_edit_sertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Tipe Properti</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_edit_sertifikat" method="post">
							<input type="hidden" name="id_edit" class="edit">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Nama Sertifikat</label>
										<input type="text" id="ed_nama_sertifikat" name="ed_nama_sertifikat" class="form-control" placeholder="Nama Tipe">
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

		<!-- Modal Hapus Produk -->
		<div class="modal fade mod_hapus_sertifikat" id="mod_hapus_sertifikat" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
				<div class="modal-content bg-gradient-danger">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-notification">Hapus Tipe Properti</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="py-3 text-center">
							<i class="ni ni-bell-55 ni-3x"></i>
							<h4 class="heading mt-4">Anda yakin menghapus sertifikat ini ?</h4>
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
			tampil_sertifikat_properti();
			tampil_modal_edit();
			simpan_sertifikat();
		});

		// TAMPIL TABEL JENIS PROPERTI
		function tampil_sertifikat_properti() {
			dt_table.destroy();
			dt_table = $("#datatable-responsive").DataTable({
				ajax: {
					url: ip_server + "properti/tabel_sertifikat",
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
					/*
					{
						"width": "250px"
					} */
				],
				responsive: true,
				processing: true,
				fixedHeader: true
			});
		}

		// SIMPAN TIPE
		function simpan_sertifikat() {
			$('#btn_simpan').on('click', function() {
				var btn = $(this);

				if ($("#nama_sertifikat").val() == "") {
					toastr.error("Nama Sertifikat belum di isi", 'INFO');
					return false;
				};

				var formnya = $("#f_tambah_sertifikat")[0];
				var Data_tambah = new FormData(formnya);
				btn.button('loading');

				$.ajax({
					url: ip_server + "properti/simpan_sertifikat",
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
							$('#mod_tambah_sertifikat').modal('hide');
							$("#nama_sertifikat").val("");
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

		// TAMPIL EDIT SERTIFIKAT
		function tampil_modal_edit() {
			$('#datatable-responsive').on("click", "#mod_sertifikat_edit", function() {
				var id = $(this).data("id");
				// alert(id);return false;
				var mdl = $(".mod_edit_sertifikat");
				var btn = $(this);
				// mdl.modal("show");
				$("#f_edit_sertifikat")[0].reset();
				btn.button('loading');
				mdl.find(".edit").val(id);

				$.post(ip_server + "properti/baca_sertifikat_edit", {
					id_edit: id
				}, function(out) {
					btn.button('reset');
					$("[name=id_edit]").val(out[0]);
					$("[name=ed_nama_sertifikat]").val(out[1]);
					mdl.modal("show");
				}, "json");
			});
		}

		// SIMPAN EDIT SERTIFIKAT PROPERTI
		$('#btn_simpan_edit').on("click", function() {
			var btn = $(this);

			if ($("#ed_nama_sertifikat").val() == "") {
				toastr.error("Nama Sertifikat belum di isi", 'INFO');
				return false;
			};

			var formnya = $("#f_edit_sertifikat")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');
			$.ajax({
				url: ip_server + "properti/simpan_sertifikat_edit",
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
						$(".mod_edit_sertifikat").modal("hide");
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

		// DELETE SERTIFIKAT
		$('#datatable-responsive').on("click", "#mod_sertifikat_del", function() {
			var id = $(this).data("id");
			var mdl = $(".mod_hapus_sertifikat");
			mdl.modal("show");
			mdl.find(".btn-danger").data("id", id);

			$('#btn_hapus').on('click', function() {
				var btn = $(this);
				btn.button('loading');

				$.ajax({
					url: ip_server + "properti/hapus_sertifikat",
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
							$(".mod_hapus_sertifikat").modal("hide");
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

		// PUSH STOK BARANG
		$(document).on('click', '#push_stok', function() {
			$.ajax({
				url: ip_server + "produk/push_stok_baru",
				type: "POST",
				dataType: "json",
				contentType: false,
				cache: false,
				processData: false,
				success: function(out) {
					if (out.sts == "ok") {
						toastr.success("Berhasil", 'INFO');
						location.reload();
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
		})
	</script>
