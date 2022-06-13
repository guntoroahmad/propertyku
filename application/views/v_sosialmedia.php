<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Sosial Media</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Sosial Media</li>
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
							<h2 class="mb-0">Sosial Media</h2>
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
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_sosmed">
										Tambah Sosial Media
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
										<h3 class="title">List Sosial Media</h3>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Sosial Media</th>
														<th>URL</th>
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
		<div class="modal fade" id="mod_tambah_sosmed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Sosial Media</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tambah_sosmed" method="post">
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Sosial Media</label>
										<input type="text" id="nama_sosmed" name="nama_sosmed" class="form-control" placeholder="Sosial Media">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">URL</label>
										<input type="text" id="url_sosmed" name="url_sosmed" class="form-control" placeholder="URL Sosial Media">
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
		<div class="modal fade mod_edit_sosmed" id="mod_edit_sosmed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Sosial Media</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_edit_sosmed" method="post">
							<input type="hidden" name="id_edit" class="edit">
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Sosial Media</label>
										<input type="text" id="ed_nama_sosmed" name="ed_nama_sosmed" class="form-control" placeholder="Sosial Media" readonly>
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">URL</label>
										<input type="text" id="ed_url_sosmed" name="ed_url_sosmed" class="form-control" placeholder="URL Sosial Media">
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
		<div class="modal fade mod_hapus_sosmed" id="mod_hapus_sosmed" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
				<div class="modal-content bg-gradient-danger">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-notification">Hapus Sosial Media</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="py-3 text-center">
							<i class="ni ni-bell-55 ni-3x"></i>
							<h4 class="heading mt-4">Anda yakin menghapus sosmed ini ?</h4>
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
			tampil_sosmed();
			tampil_modal_edit();
			simpan_sosmed();
		});

		// TAMPIL TABEL JENIS SOSMED
		function tampil_sosmed() {
			dt_table.destroy();
			dt_table = $("#datatable-responsive").DataTable({
				ajax: {
					url: ip_server + "properti/tabel_sosial_media",
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
					null
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

		// SIMPAN SOSMED
		function simpan_sosmed() {
			$('#btn_simpan').on('click', function() {
				var btn = $(this);

				if ($("#nama_sosmed").val() == "") {
					toastr.error("Nama Sosial Media belum di isi", 'INFO');
					return false;
				};

				if ($("#url_sosmed").val() == "") {
					toastr.error("URL belum di isi", 'INFO');
					return false;
				};

				var formnya = $("#f_tambah_sosmed")[0];
				var Data_tambah = new FormData(formnya);
				btn.button('loading');

				$.ajax({
					url: ip_server + "properti/simpan_sosmed",
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
							$('#mod_tambah_sosmed').modal('hide');
							$("#nama_sosmed").val("");
							$("#url_sosmed").val("");
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

		// TAMPIL EDIT SOSMED
		function tampil_modal_edit() {
			$('#datatable-responsive').on("click", "#mod_sosmed_edit", function() {
				var id = $(this).data("id");
				// alert(id);return false;
				var mdl = $(".mod_edit_sosmed");
				var btn = $(this);
				// mdl.modal("show");
				$("#f_edit_sosmed")[0].reset();
				btn.button('loading');
				mdl.find(".edit").val(id);

				$.post(ip_server + "properti/baca_sosmed_edit", {
					id_edit: id
				}, function(out) {
					btn.button('reset');
					$("[name=id_edit]").val(out[0]);
					$("[name=ed_nama_sosmed]").val(out[1]);
					$("[name=ed_url_sosmed]").val(out[2]);
					mdl.modal("show");
				}, "json");
			});
		}

		// SIMPAN EDIT SOSMED
		$('#btn_simpan_edit').on("click", function() {
			var btn = $(this);

			if ($("#ed_nama_sosmed").val() == "") {
				toastr.error("Nama Sosial Media belum di isi", 'INFO');
				return false;
			};

			var formnya = $("#f_edit_sosmed")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');
			$.ajax({
				url: ip_server + "properti/simpan_sosmed_edit",
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
						$(".mod_edit_sosmed").modal("hide");
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

		// DELETE SOSMED
		$('#datatable-responsive').on("click", "#mod_sosmed_del", function() {
			var id = $(this).data("id");
			var mdl = $(".mod_hapus_sosmed");
			mdl.modal("show");
			mdl.find(".btn-danger").data("id", id);

			$('#btn_hapus').on('click', function() {
				var btn = $(this);
				btn.button('loading');

				$.ajax({
					url: ip_server + "properti/hapus_sosmed",
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
							$(".mod_hapus_sosmed").modal("hide");
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
