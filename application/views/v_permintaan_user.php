<?php
defined('BASEPATH') or exit('No direct script access allowed');
// echo $kode;
?>

<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Permintaan Pengadaan</h6>
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
							<h2 class="mb-0">Permintaan</h2>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form>
						<?php if ($_SESSION['hak'] == 'user') { ?>
							<div class="row">
								<div class="col-md-12">
									<p>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_produk">
											Tambah Permintaan
											<i class="ni ni-fat-add"></i>
										</button>
									</p>
								</div>
							</div>
						<?php } ?>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="card">
									<div class="card-header">
										<h3 class="title">List Permintaan Pengadaan</h3>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Kode Permintaan</th>
														<th>Tanggal Permintaan</th>
														<th>PIC</th>
														<th>Status Form</th>
														<th>Status Barang</th>
														<th>Detail</th>
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
		<div class="modal fade" id="mod_tambah_produk" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Pilih Permintaan Barang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tabel" method="post" style="width: 100%;">
							<div class="row">
								<!-- <div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Kode Permintaan</label>
										<input type="text" id="kode_permintaan" name="kode_permintaan" class="form-control" value="<?php echo $kode ?>" readonly>
									</div>
								</div> -->
								<div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<button class="btn btn-dark" type="button" id="tambah_form_barang">Tambah
												<i class="ni ni-fat-add"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-lg-6 col-md-12 col-sm-12">
														<div class="form-group">
															<label class="form-control-label" for="input-last-name">Nama Barang</label>
															<!-- <select id="nama_barang" name="nama_barang[]" class="selectpicker form-control" data-live-search="true">
																<option value="" selected>Pilih Nama Barang</option>
															</select> -->
															<select class="form-control select2" id="nama_barang" name="nama_barang[]">
																<option></option>
															</select>
															<input type="hidden" class="form-control stok_barang" id="stok_barang1" name="stok_barang[]">
														</div>
													</div>
													<div class="col-lg-2 col-md-12 col-sm-12">
														<div class="form-group">
															<label class="form-control-label" for="input-first-name">Jumlah</label>
															<input type="text" class="form-control input_jum" id="input_jum" name="input_jum[]" placeholder="Jumlah" autocomplete="off">
														</div>
													</div>
													<div class="col-lg-4 col-md-12 col-sm-12">
														<div class="form-group">
															<label class="form-control-label" for="input-last-name">Jenis</label>
															<select class="form-control" aria-label="Default select example" id="jenis_satuan" name="jenis_satuan[]">
																<option value="" selected>Pilih Jenis Satuan</option>
																<option value="Lembar">Lembar</option>
																<option value="Buku">Buku</option>
																<option value="Map">Map</option>
															</select>
														</div>
													</div>
												</div>
												<div id="tampil_tambah"></div>
												<div style="float:right;">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
													<button type="button" class="btn btn-primary" id="btn_simpan">Simpan</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<div class="row">
							<h3 style="margin-left: 15px;">List Barang</h3>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<table id="datatable-responsive-modal" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
										<thead>
											<tr>
												<!-- <th></th> -->
												<th>Nama Barang</th>
												<th>Stok</th>
												<th>Stok Satuan</th>
												<!-- <th>Kebutuhan</th>
													<th>Kebutuhan Satuan</th> -->
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary" id="btn_simpan">Simpan</button>
					</div> -->
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
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="input-username">Nama Barang</label>
									<input type="text" id="ed_nama_produk" name="ed_nama_produk" class="form-control" placeholder="Nama Produk">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="input-first-name">Jumlah</label>
									<input type="text" id="ed_jumlah" name="ed_jumlah" class="form-control" placeholder="Jumlah">
								</div>
							</div>
							<div class="col-lg-4 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="input-last-name">Jenis</label>
									<select class="form-control" aria-label="Default select example" id="ed_jenis_satuan" name="ed_jenis_satuan">
										<option selected>Pilih jenis satuan</option>
										<option value="1">Pack</option>
										<option value="2">Rim</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary" id="ed_btn_simpan">Simpan</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Hapus Produk -->
		<div class="modal fade mod_hapus_produk" id="mod_edit_produk" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
	</div>
	<script type="text/javascript">
		var dt_table = $("#datatable-responsive").DataTable();
		var dt_table_modal = $("#datatable-responsive-modal").DataTable();

		$(document).ready(function() {
			$('.select2').select2({
				placeholder: "Pilih nama barang",
				allowClear: true
			});

			$("#tampil_tambah").children("select").select2();

			tampil_barang();
			tampil_permintaan();
			tampil_barang_user();
			add_form_barang();
			/* var table = $("#datatable-responsive-modal");
			var value_check = "";
			for (var i = 1; i < table.rows.length; i++) {
				if ($('#chkbx')[i].is(':checked')) {
					value_check += i + ": " + $('#chkbx')[i].val();
				}
			}
			alert(value_check); */
		});

		// TAMPIL NAMA BARANG
		function tampil_barang() {
			$.ajax({
				url: ip_server + "produk/list_barang",
				type: "POST",
				dataType: "JSON",
				success: function(hasil) {
					$.each(hasil, function(index, value) {
						$("#nama_barang").append('<option value="' + value.ID + '">' + value.NAMA_BARANG + '</option>');
					});
				},
				error: function() {
					alert("Error");
				}
			});

			$("#nama_barang").on('change', function() {
				var id = $('#nama_barang').val();
				$.post(ip_server + "produk/cek_stok_barang", {
					id: id
				}, function(out) {
					$("#stok_barang1").val(out[0]);
				}, "json");
			})
		}

		//TAMPIL ROW BERIKUTNYA
		function add_form_barang() {
			var tmbh = $('#tampil_tambah');
			var i = 1;
			var count = 1;

			$('#tambah_form_barang').on('click', function() {
				// alert();
				i++;
				$('#tampil_tambah').append('<div class="row">\
					<div class="col-lg-6 col-md-12 col-sm-12">\
						<div class="form-group">\
							<label class="form-control-label" for="input-last-name">Nama Barang</label>\
							<!-- <select id="nama_barang" name="nama_barang[]" class="selectpicker form-control" data-live-search="true">\
								<option value="" selected>Pilih Nama Barang</option>\
							</select> -->\
							<select class="form-control select2" id="nama_barang' + i + '" name="nama_barang[]">\
								<option></option>\
							</select>\
							<input type="hidden" class="form-control stok_barang" id="stok_barang' + i + '" name="stok_barang[]">\
						</div>\
					</div>\
					<div class="col-lg-2 col-md-12 col-sm-12">\
						<div class="form-group">\
							<label class="form-control-label" for="input-first-name">Jumlah</label>\
							<input type="text" class="form-control input_jum" id="input_jum' + i + '" name="input_jum[]" placeholder="Jumlah" autocomplete="off">\
						</div>\
					</div>\
					<div class="col-lg-3 col-md-12 col-sm-12">\
						<div class="form-group">\
							<label class="form-control-label" for="input-last-name">Jenis</label>\
							<select class="form-control" aria-label="Default select example" id="jenis_satuan' + i + '" name="jenis_satuan[]">\
								<option value="" selected>Pilih Jenis Satuan</option>\
								<option value="Lembar">Lembar</option>\
								<option value="Buku">Buku</option>\
								<option value="Map">Map</option>\
							</select>\
						</div>\
					</div>\
					<div class="col-lg-1 col-md-12 col-sm-12">\
						<div class="form-group" style="margin-top:30px;">\
							<button onclick="remove(this)" type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>\
						</div>\
					</div>\
				</div>');

				$('#tampil_tambah .select2').select2({
					placeholder: "Pilih nama barang",
					allowClear: true
				});

				$.ajax({
					url: ip_server + "produk/list_barang",
					type: "POST",
					dataType: "JSON",
					success: function(hasil) {
						$.each(hasil, function(index, value) {
							$("#nama_barang" + i).append('<option value="' + value.ID + '">' + value.NAMA_BARANG + '</option>');
						});
					},
					error: function() {
						alert("Error");
					}
				});

				$("#nama_barang" + i).on('change', function() {
					var id = $('#nama_barang' + i).val();
					// alert(id);return false;
					$.post(ip_server + "produk/cek_stok_barang", {
						id: id
					}, function(out) {
						$("#stok_barang" + i).val(out[0]);
					}, "json");
				})

				// $(tmbh).append(markup);

			});
		}

		function remove(menu3) {
			$(menu3).closest('.row').remove();
		}

		// TAMPIL PERMINTAAN
		function tampil_permintaan() {
			dt_table.destroy();
			dt_table = $("#datatable-responsive").DataTable({
				ajax: {
					url: ip_server + "permintaan/tabel_permintaan",
					type: "post",
					// data:{user:}
				},
				lengthMenu: [
					[10, 25, 50, 100, -1],
					[10, 25, 50, 100, "All"]
				],
				order: [
					[0, "asc"]
				],
				columns: [{
						"width": "5px"
					},
					null,
					null,
					null,
					null,
					null,
					null
				],
				processing: true,
				responsive: true,
				fixedHeader: true
			});
		}

		// TAMPIL TABEL BARANG
		function tampil_barang_user() {
			dt_table_modal.destroy();
			dt_table_modal = $("#datatable-responsive-modal").DataTable({
				ajax: {
					url: ip_server + "produk/tabel_barang_user",
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
						"width": "5px"
					},
					null,
					null,
					/* null,
					null,
					null */
				],
				processing: true,
				responsive: true,
				fixedHeader: true
			});
		}

		// SIMPAN PERMINTAAN USER
		$(document).on('click', '#btn_simpan', function(e) {
			var btn = $(this);

			var formnya = $("#f_tabel")[0];
			var Data_tambah = new FormData(formnya);
			$.ajax({
				url: ip_server + "permintaan/simpan_barang_user",
				type: "POST",
				data: Data_tambah,
				dataType: "json",
				contentType: false,
				cache: false,
				processData: false,
				success: function(out) {
					if (out.sts == "ok") {
						toastr.success("Berhasil", 'INFO');
						location.reload();
						// dt_table.ajax.reload(null, false);
						// dt_table_modal.ajax.reload(null, false);
						// $('#mod_tambah_produk').modal('hide');
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

		// SIMPAN PERMINTAAN USER YANG LAMA PAKE CHECKBOX
		$(document).on('click', '#btn_simpan_cek', function(e) {
			// e.preventDefault();
			var btn = $(this);

			var kode_permintaan = $('#kode_permintaan').val();
			var cek = [];
			var input_jum = [];
			var satuan = [];

			$('.row input:checked').each(function() {
				var id, name;
				id = $(this).closest('tr').find('.input_jum').val();
				name = $(this).closest('tr').find('.jenis_satuan').val();

				alert('ID: ' + id + " | Name: " + name);
			})

			/* if ($('.chkbx:checked').length > 0) {
				// console.log($(this).serialize());
				$(':checkbox:checked').each(function(i) {
					cek[i] = $(this).val();
				});
				// alert(cek);
				$("input[name='input_jum[]']").each(function() {
					var value = $(this).val();
					if (value) {
						input_jum.push(value);
					}
				});
				// alert(input_jum);
				$.each($(".jenis_satuan option:selected"), function() {
					var val_satuan = $(this).val();
					if (val_satuan) {
						satuan.push(val_satuan);
					}
				});
				// alert(satuan);return false;
				$.ajax({
					type: "POST",
					data: {
						kode_permintaan: kode_permintaan,
						cek: cek,
						input_jum: input_jum,
						jenis_satuan: satuan
					},
					url: ip_server + "permintaan/simpan_barang_user_cekbox",
					dataType: "JSON",
					success: function(out) {
						if (out.sts == "ok") {
							toastr.success("Berhasil", 'INFO');
							location.reload();
							// dt_table.ajax.reload(null, false);
							// dt_table_modal.ajax.reload(null, false);
							// $('#mod_tambah_produk').modal('hide');
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
			} else {
				alert('Centang salah satu barang terlebih dahulu');
			} */
		});

		// TAMPIL DETAIL
		$(document).on('click', '#tampil_detail', function() {
			var id = $(this).attr('data-id');
			var rm = $(this).attr('data-rm');
			var stat = $(this).attr('data-stat');
			var hak = '<?php echo $_SESSION['hak'] ?>';
			// alert(hak);return false;
			if (hak == 'user') {
				window.location = 'laporan/user/' + rm + '/' + stat + '';
			} else {
				window.location = 'laporan/kord/' + rm + '/' + stat + '';
			}

		});
	</script>