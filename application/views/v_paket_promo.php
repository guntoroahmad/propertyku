<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Paket Promo</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Paket Promo</li>
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
							<h2 class="mb-0">List Paket</h2>
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
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_paket">
										Tambah Paket
										<i class="ni ni-fat-add"></i>
									</button>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="card">
									<div class="card-header">
										<h3 class="title">List Promo</h3>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Paket</th>
														<th>Harga</th>
														<th>Masa Aktif</th>
														<th>Deskripsi</th>
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

		<!-- Modal Tambah Paket-->
		<div class="modal fade" id="mod_tambah_paket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tambah_paket" method="post">
							<div class="row">
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Nama Paket</label>
										<input type="text" id="nama_paket" name="nama_paket" class="form-control" placeholder="Nama Paket" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Harga</label>
										<input type="text" id="harga_paket" name="harga_paket" class="form-control angka" min="0" value="0">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Masa Aktif <span style="color: red;margin-left:2px;">*(dihitung perbulan)</span></label>
										<input type="number" id="masa_aktif" name="masa_aktif" class="form-control" placeholder="Masa aktif" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Deskripsi</label>
										<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi paket promo ..."></textarea>
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

		<!-- Modal Edit paket-->
		<div class="modal fade mod_edit_paket" id="mod_edit_paket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Bank</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_edit_paket" method="post">
							<input type="hidden" name="id_edit" class="edit">
							<div class="row">
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Nama Paket</label>
										<input type="text" id="ed_nama_paket" name="ed_nama_paket" class="form-control" placeholder="Nama Paket" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Harga</label>
										<input type="text" id="ed_harga_paket" name="ed_harga_paket" class="form-control" placeholder="Harga" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Masa Aktif <span style="color: red;margin-left:2px;">*(dihitung perbulan)</span></label>
										<input type="number" id="ed_masa_aktif" name="ed_masa_aktif" class="form-control" placeholder="Jumlah masa aktif" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Deskripsi</label>
										<textarea class="form-control" id="ed_deskripsi" name="ed_deskripsi" rows="3"></textarea>
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

		<!-- Modal Hapus paket -->
		<div class="modal fade mod_hapus_paket" id="mod_hapus_paket" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
				<div class="modal-content bg-gradient-danger">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-notification">Hapus Bank</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="py-3 text-center">
							<i class="ni ni-bell-55 ni-3x"></i>
							<h4 class="heading mt-4">Anda yakin menghapus paket ini ?</h4>
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
			tampil_paket();
			$('.angka').maskNumber({
				integer: true,
				thousands: '.'
			});
		});

		// TAMPIL TABEL PAKET
		function tampil_paket() {
			dt_table.destroy();
			dt_table = $("#datatable-responsive").DataTable({
				ajax: {
					url: ip_server + "admin/tabel_paket",
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

		// SIMPAN PAKET
		$(document).on('click', '#btn_simpan', function() {
			var btn = $(this);

			if ($("#nama_paket").val() == "") {
				toastr.error("Nama paket belum di isi", 'INFO');
				return false;
			};

			if ($("#harga_paket").val() == "") {
				toastr.error("Harga belum di isi", 'INFO');
				return false;
			};

			if ($("#masa_aktif").val() == "") {
				toastr.error("Masa aktif belum di isi", 'INFO');
				return false;
			};

			if ($("#satuan_aktif").val() == "") {
				toastr.error("Satuan masa aktif belum di pilih", 'INFO');
				return false;
			};

			if ($("#deskripsi").val() == "") {
				toastr.error("Deksripsi paket belum di isi", 'INFO');
				return false;
			};

			var formnya = $("#f_tambah_paket")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');

			$.ajax({
				url: ip_server + "admin/simpan_paket",
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
						$('#mod_tambah_paket').modal('hide');
						$("#nama_paket").val("");
						$("#harga_paket").val("");
						$("#masa_aktif").val("");
						$("#satuan_aktif").val("");
						$("#deskripsi").val("");
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

		// TAMPIL EDIT PAKET
		$('#datatable-responsive').on("click", "#paket_edit", function() {
			var id = $(this).data("id");
			// alert(id);return false;
			var mdl = $(".mod_edit_paket");
			var btn = $(this);
			// mdl.modal("show");
			$("#f_edit_paket")[0].reset();
			btn.button('loading');
			mdl.find(".edit").val(id);

			$.post(ip_server + "admin/baca_paket_edit", {
				id_edit: id
			}, function(out) {

				btn.button('reset');
				$("[name=id_edit]").val(out[0]);
				$("[name=ed_nama_paket]").val(out[1]);
				$("[name=ed_masa_aktif]").val(out[2]);
				$("[name=ed_harga_paket]").val(out[3]);
				$("[name=ed_deskripsi]").val(out[4]);
				mdl.modal("show");

			}, "json");
		});

		// SIMPAN EDIT PAKET
		$('#btn_simpan_edit').on("click", function() {
			var btn = $(this);

			if ($("#ed_nama_paket").val() == "") {
				toastr.error("Nama paket belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_harga_paket").val() == "") {
				toastr.error("Harga belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_masa_aktif").val() == "") {
				toastr.error("Masa aktif belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_deskripsi").val() == "") {
				toastr.error("Deksripsi paket belum di isi", 'INFO');
				return false;
			};

			var formnya = $("#f_edit_paket")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');
			$.ajax({
				url: ip_server + "admin/simpan_paket_edit",
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
						$(".mod_edit_paket").modal("hide");
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

		// DELETE PAKET
		$('#datatable-responsive').on("click", "#paket_del", function() {
			var id = $(this).data("id");
			var mdl = $(".mod_hapus_paket");
			mdl.modal("show");
			mdl.find(".btn-danger").data("id", id);

			$('#btn_hapus').on('click', function() {
				var btn = $(this);
				btn.button('loading');

				$.ajax({
					url: ip_server + "admin/hapus_paket",
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
							$(".mod_hapus_paket").modal("hide");
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
