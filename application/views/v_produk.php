<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Barang</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>permintaan"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Beranda</li>
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
							<h2 class="mb-0">Barang</h2>
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
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_produk">
										Tambah Barang
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
										<h3 class="title">List Barang</h3>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Barang</th>
														<th>Stok</th>
														<th>Satuan</th>
														<th>Status</th>
														<th>Aksi</th>
														<!--  <th>Laporan</th> -->
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

		<!-- Modal Tambah Produk-->
		<div class="modal fade" id="mod_tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tambah_barang" method="post">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Nama Barang</label>
										<input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Stok</label>
										<input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Jenis</label>
										<select class="form-control" aria-label="Default select example" id="jenis_satuan" name="jenis_satuan">
											<option value="" selected>Pilih Jenis Satuan</option>
											<option value="Lembar">Lembar</option>
											<option value="Buku">Buku</option>
											<option value="Map">Map</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Status</label>
										<select class="form-control" aria-label="Default select example" id="status_barang" name="status_barang">
											<option value="" selected>Pilih Status Barang</option>
											<option value="Sering">Sering</option>
											<option value="Jarang">Jarang</option>
										</select>
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

		<!-- Modal Edit Produk-->
		<div class="modal fade mod_edit_produk" id="mod_edit_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_edit_barang" method="post">
							<input type="hidden" name="id_edit" class="edit">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Nama Barang</label>
										<input type="text" id="ed_nama_barang" name="ed_nama_barang" class="form-control" placeholder="Nama Barang">
									</div>
								</div>
							</div>
							<div class="row">
								<!-- <div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Stok</label>
										<input type="text" id="ed_jumlah" name="ed_jumlah" class="form-control" placeholder="Jumlah">
									</div>
								</div> -->
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Jenis</label>
										<select class="form-control" aria-label="Default select example" id="ed_jenis_satuan" name="ed_jenis_satuan">
											<option value="" selected>Pilih Jenis Satuan</option>
											<option value="Lembar">Lembar</option>
											<option value="Buku">Buku</option>
											<option value="Map">Map</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Status</label>
										<select class="form-control" aria-label="Default select example" id="ed_status_barang" name="ed_status_barang">
											<option value="" selected>Pilih Status Barang</option>
											<option value="Sering">Sering</option>
											<option value="Jarang">Jarang</option>
										</select>
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
		<div class="modal fade mod_hapus_produk" id="mod_hapus_produk" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
				<div class="modal-content bg-gradient-danger">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-notification">Hapus Produk</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="py-3 text-center">
							<i class="ni ni-bell-55 ni-3x"></i>
							<h4 class="heading mt-4">Anda yakin menghapus produk ini ?</h4>
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

		<!-- Modal Tambah Stok-->
		<div class="modal fade mod_stok" id="mod_stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Stok Barang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tambah_stok" method="post">
							<input type="hidden" name="id_stok_barang" class="id_stok_barang">
							<input type="hidden" name="jum_stok_barang" class="jum_stok_barang">
							<input type="hidden" name="jenis_stok_barang" class="jenis_stok_barang">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Stok</label>
										<input type="text" id="jum_tambah_stok" name="jum_tambah_stok" class="form-control" placeholder="Jumlah">
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary" id="btn_simpan_stok">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var dt_table = $("#datatable-responsive").DataTable();
		$(document).ready(function() {
			tampil_barang();
			simpan_barang();
		});

		// TAMPIL TABEL BARANG
		function tampil_barang() {
			dt_table.destroy();
			dt_table = $("#datatable-responsive").DataTable({
				ajax: {
					url: ip_server + "produk/tabel_barang",
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
				responsive: true,
				processing: true,
				fixedHeader: true
			});
		}

		// SIMPAN BARANG
		function simpan_barang() {
			$('#btn_simpan').on('click', function() {
				var btn = $(this);

				if ($("#nama_barang").val() == "") {
					toastr.error("Nama Barang belum di isi", 'INFO');
					return false;
				};

				if ($("#jumlah").val() == "") {
					toastr.error("Jumlah belum di isi", 'INFO');
					return false;
				};

				if ($("#jenis_satuan").val() == "") {
					toastr.error("Jenis satuan belum di pilih", 'INFO');
					return false;
				};

				if ($("#status_barang").val() == "") {
					toastr.error("Status barang belum di pilih", 'INFO');
					return false;
				};

				var formnya = $("#f_tambah_barang")[0];
				var Data_tambah = new FormData(formnya);
				btn.button('loading');

				$.ajax({
					url: ip_server + "produk/simpan_barang",
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
							$('#mod_tambah_produk').modal('hide');
							$("#nama_barang").val("");
							$("#jumlah").val("");
							$("#jenis_satuan").val("");
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

		// TAMPIL MODAL TAMBAH STOK
		$('#datatable-responsive').on("click", "#mod_tambah_stok", function() {
			// var btn = $(this);
			var id = $(this).data("id");
			var jumlah = $(this).data("jumlah");
			var jenis = $(this).data("jenis");

			var id_stok_barang = $('.id_stok_barang').val(id);
			var jumlah_stok_barang = $('.jum_stok_barang').val(jumlah);
			var jenis_stok_barang = $('.jenis_stok_barang').val(jenis);
			// alert(id+' - '+jumlah+' - '+jenis);return false;
			var mdl = $("#mod_stok");
			mdl.modal("show");

			$('#btn_simpan_stok').on('click', function() {
				var formnya = $("#f_tambah_stok")[0];
				var Data_tambah = new FormData(formnya);
				// btn.button('loading');
				$.ajax({
					url: ip_server + "produk/simpan_stok_barang",
					type: "POST",
					data: Data_tambah,
					dataType: "json",
					contentType: false,
					cache: false,
					processData: false,
					success: function(out) {
						if (out.sts == "ok") {
							toastr.success("Ubah Stok Sukses", 'INFO');
							dt_table.ajax.reload(null, false);
							$(".mod_stok").modal("hide");
						} else {
							toastr.error(out.sts, 'INFO');
						}
						// btn.button('reset');
					},
					error: function() {
						toastr.error('Mohon, Cek koneksi internet', 'ERROR');
						// btn.button('reset');
					}
				});
			});
		});


		// TAMPIL EDIT BARANG
		$('#datatable-responsive').on("click", "#barang_edit", function() {
			var id = $(this).data("id");
			// alert(id);return false;
			var mdl = $(".mod_edit_produk");
			var btn = $(this);
			// mdl.modal("show");
			$("#f_edit_barang")[0].reset();
			btn.button('loading');
			mdl.find(".edit").val(id);

			$.post(ip_server + "produk/baca_barang_edit", {
				id_edit: id
			}, function(out) {
				btn.button('reset');
				$("[name=id_edit]").val(out[0]);
				$("[name=ed_nama_barang]").val(out[1]);
				// $("[name=ed_jumlah]").val(out[2]);
				$("[name=ed_jenis_satuan]").val(out[3]);
				$("[name=ed_status_barang]").val(out[4]);
				mdl.modal("show");
			}, "json");
		});

		// SIMPAN EDIT SUB KATEGORI
		$('#btn_simpan_edit').on("click", function() {
			var btn = $(this);

			if ($("#ed_nama_barang").val() == "") {
				toastr.error("Nama Barang belum di isi", 'INFO');
				return false;
			};

			/* if ($("#ed_jumlah").val() == "") {
				toastr.error("Jumlah belum di isi", 'INFO');
				return false;
			}; */

			if ($("#ed_jenis_satuan").val() == "") {
				toastr.error("Jenis satuan belum di pilih", 'INFO');
				return false;
			};

			if ($("#ed_status_barang").val() == "") {
				toastr.error("Status barang belum di pilih", 'INFO');
				return false;
			};

			var formnya = $("#f_edit_barang")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');
			$.ajax({
				url: ip_server + "produk/simpan_barang_edit",
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
						$(".mod_edit_produk").modal("hide");
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

		// DELETE BARANG
		$('#datatable-responsive').on("click", "#barang_del", function() {
			var id = $(this).data("id");
			var mdl = $(".mod_hapus_produk");
			mdl.modal("show");
			mdl.find(".btn-danger").data("id", id);

			$('#btn_hapus').on('click', function() {
				var btn = $(this);
				btn.button('loading');

				$.ajax({
					url: ip_server + "produk/hapus_barang",
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
							$(".mod_hapus_produk").modal("hide");
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
