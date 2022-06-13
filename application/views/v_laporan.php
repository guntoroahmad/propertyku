<?php
defined('BASEPATH') or exit('No direct script access allowed');
// echo $stat;
?>

<body>
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-user">
					<div class="card-header" style="margin-top: 1%;">
						<h2 class="card-title" style="text-align: center;" id="nama_proyek">Laporan Permintaan Amprahan Barang Bahan Habis Pakai<br />(BBHP)</h2>
						<div class="row">
							<div class="col-md-6 text-left"><img src="<?php echo base_url(); ?>assets/img/brand/logo_pemkot_smd.png" style="width: 10%;margin-top: -15%;"></div>
							<div class="col-md-6 text-right"><img src="<?php echo base_url(); ?>assets/img/brand/moeis.png" style="width: 10%;margin-top: -15%;"></div>
						</div>
						<div class="row">
							<div class="col-md-12 text-right" id="tampil_dp">
							</div>
						</div>
					</div>
					<div class="card-body">
						<form id="f_laporan" method="POST" style="width: 100%;">
							<div>- Kode Permintaan : <b><?php echo $rm ?></b></div>
							<?php if ($stat == 'selesai') { ?>
								<div id="pic_ambil"></div>
								<div id="tgl_ambil"></div><br />
							<?php } ?>
							<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Barang</th>
										<th>Jumlah Permintaan</th>
										<th>Disetujui</th>
										<th>Satuan</th>
										<?php if ($_SESSION['hak'] != 'admin') { ?>
											<th>Aksi</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody id="isi_tabel">
								</tbody>
							</table>
							<?php if ($stat == 'baru') { ?>
								<div style="margin-top: 20px;">
									<button type="button" class="btn btn-primary btn-lg btn-block" id="btn_submit">Submit Laporan</button>
								</div>
							<?php } ?>
						</form>
					</div>
				</div>
			</div>


			<!-- Modal Edit Produk-->
			<div class="modal fade mod_edit_produk" id="mod_edit_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit Permintaan Barang</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="f_edit_barang" method="post">
								<input type="hidden" name="id_edit" class="edit">
								<input type="hidden" name="rm_edit" class="rm_edit">
								<input type="hidden" name="stok_edit" class="stok_edit">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="form-control-label" for="input-username">Nama Barang</label>
											<!-- <input type="text" id="ed_nama_barang" name="ed_nama_barang" class="form-control" placeholder="Nama Barang"> -->
											<select class="form-control" aria-label="Default select example" id="ed_nama_barang" name="ed_nama_barang">
												<option value="" selected>Pilih Nama Barang</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="form-control-label" for="input-first-name">Jumlah Permintaan</label>
											<input type="text" id="ed_jumlah" name="ed_jumlah" class="form-control" placeholder="Jumlah">
										</div>
									</div>
									<div class="col-lg-4 col-md-12 col-sm-12">
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
							<h6 class="modal-title" id="modal-title-notification">Hapus Permintaan Barang</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="py-3 text-center">
								<i class="ni ni-bell-55 ni-3x"></i>
								<h4 class="heading mt-4">Anda yakin menghapus permintaan barang ini ?</h4>
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
	</div>

</body>

</html>
<script type="text/javascript">
	var dt_table = $("#datatable-responsive").DataTable();
	$(document).ready(function() {
		// alert('<?php echo $stat ?>');
		detail_tabel_user();
		tampil_namabarang();
		tampil_pic();
	});

	function detail_tabel_user() {
		dt_table.destroy();
		dt_table = $("#datatable-responsive").DataTable({
			ajax: {
				url: ip_server + "laporan/tabel_laporan",
				type: "post",
				data: {
					rm: '<?php echo $rm ?>',
					stat: '<?php echo $stat ?>'
				}
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
				null
			],
			processing: true,
			responsive: true,
			fixedHeader: true
		});
	}

	// TAMPIL PIC
	function tampil_pic() {
		$.ajax({
			url: ip_server + "admin/tampil_pic",
			type: "POST",
			dataType: "JSON",
			data: {
				rm: '<?php echo $rm ?>'
			},
			success: function(hasil) {
				console.log(hasil);
				$.each(hasil, function(index, value) {
					$("#pic_ambil").append('- PIC Ambil : <b>' + value.pic_ambil + '</b>');
					$("#tgl_ambil").append('- Tanggal ambil : <b>' + value.tgl_ambil + '</b> ');
				});
			},
			error: function() {
				alert("Error");
			}
		});
	}
	
	// TAMPIL NAMA BARANG
	function tampil_namabarang() {
		$.ajax({
			url: ip_server + "laporan/list_barang",
			type: "POST",
			dataType: "JSON",
			success: function(hasil) {
				$.each(hasil, function(index, value) {
					$("#ed_nama_barang").append('<option value="' + value.ID + '">' + value.NAMA_BARANG + '</option>');
				});
			},
			error: function() {
				alert("Error");
			}
		});
	}

	// TAMPIL EDIT BARANG USER
	$('#datatable-responsive').on("click", "#edit_barang_user", function() {
		var id = $(this).data("id");
		var rm = '<?php echo $rm ?>';
		// alert(id);return false;
		var mdl = $(".mod_edit_produk");
		var btn = $(this);
		// mdl.modal("show");return false;
		$("#f_edit_barang")[0].reset();
		btn.button('loading');
		mdl.find(".edit").val(id);
		mdl.find(".rm_edit").val(rm);

		$.post(ip_server + "laporan/baca_barang_edit", {
			id_edit: id
		}, function(out) {
			btn.button('reset');
			$("[name=id_edit]").val(out[0]);
			$("[name=ed_nama_barang]").val(out[1]);
			$("[name=ed_jumlah]").val(out[2]);
			$("[name=ed_jenis_satuan]").val(out[3]);
			$("[name=stok_edit]").val(out[4]);
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

		if ($("#ed_jumlah").val() == "") {
			toastr.error("Jumlah belum di isi", 'INFO');
			return false;
		};

		if ($("#ed_jenis_satuan").val() == "") {
			toastr.error("Jenis satuan belum di pilih", 'INFO');
			return false;
		};

		var formnya = $("#f_edit_barang")[0];
		var Data_tambah = new FormData(formnya);
		btn.button('loading');
		$.ajax({
			url: ip_server + "laporan/simpan_barang_edit",
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

	// DELETE BARANG USER
	$('#datatable-responsive').on("click", "#hapus_barang_user", function() {
		var id = $(this).data("id");
		// alert(id);return false;
		var mdl = $(".mod_hapus_produk");
		mdl.modal("show");
		mdl.find(".btn-danger").data("id", id);

		$('#btn_hapus').on('click', function() {
			var btn = $(this);
			btn.button('loading');

			$.ajax({
				url: ip_server + "laporan/hapus_barang_user",
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

	// SUBMIT USER
	$(document).on('click', '#btn_submit', function() {
		var rm = '<?php echo $rm ?>';
		// alert(rm);
		var btn = $(this);
		btn.button('loading');

		$.ajax({
			url: ip_server + "laporan/submit_user",
			type: "POST",
			data: {
				rm: rm
			},
			dataType: "json",
			cache: false,
			success: function(out) {
				if (out.sts == "ok") {
					toastr.success("Submit berhasil", 'INFO');
					setTimeout(function() {
						window.location = ip_server + "permintaan";
					}, 1000);
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
</script>