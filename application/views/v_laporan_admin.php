<?php
defined('BASEPATH') or exit('No direct script access allowed');
//echo $id_proyek;
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
							<input type="hidden" id="kode_permintaan" name="kode_permintaan" value="<?php echo $rm ?>">
							<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Barang</th>
										<th>Jumlah Permintaan</th>
										<th>Disetujui</th>
										<th>Satuan</th>
										<th>Catatan</th>
									</tr>
								</thead>
								<tbody id="isi_tabel">
								</tbody>
							</table>
							<!-- <div style="margin-top: 20px;">
								<button type="submit" class="btn btn-primary btn-lg btn-block" id="btn_submit">Submit Laporan</button>
							</div> -->
						</form>
						<?php if ($stat == 'ver1') { ?>
							<div style="margin-top: 20px;">
								<button type="button" class="btn btn-primary btn-lg btn-block" id="btn_simpan">Simpan</button>
							</div>
						<?php } ?>
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
		detail_tabel_admin();
		tampil_pic();
	});

	function detail_tabel_admin() {
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
			data:{rm: '<?php echo $rm ?>'},
			success: function(hasil) {
				console.log(hasil);
				$.each(hasil, function(index, value) {
					$("#pic_ambil").append('- PIC Ambil : <b>'+value.pic_ambil+'</b>');
					$("#tgl_ambil").append('- Tanggal ambil : <b>'+value.tgl_ambil+'</b> ');
				});
			},
			error: function() {
				alert("Error");
			}
		});
	}

	// SIMPAN PERMINTAAN USER
	$(document).on('click', '#btn_simpan', function() {
		// e.preventDefault();
		var btn = $(this);
		var formnya = $("#f_laporan")[0];
		var Data_tambah = new FormData(formnya);

		$.ajax({
			url: ip_server + "laporan/submit_admin",
			type: "POST",
			data: Data_tambah,
			dataType: "json",
			contentType: false,
			cache: false,
			processData: false,
			success: function(out) {
				if (out.sts == "ok") {
					toastr.success("Berhasil", 'INFO');
					setTimeout(function() {
						window.location = ip_server + "permintaan";
					}, 1000);
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

	// SIMPAN PERMINTAAN USER LAMA
	/* $(document).on('click', '#btn_simpan', function(e) {
		// e.preventDefault();
		var btn = $(this);

		var kode_permintaan = '<?php echo $rm ?>';
		// alert(kode_permintaan);return false;
		// var cek = [];
		var pbarang = [];
		var input_jum = [];
		var satuan = [];

		$("input[name='id_pbarang[]']").each(function() {
			var val_idbarang = $(this).val();
			if (val_idbarang) {
				pbarang.push(val_idbarang);
			}
		});
		// alert(pbarang);return false;
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
				pbarang: pbarang,
				input_jum: input_jum,
				jenis_satuan: satuan
			},
			url: ip_server + "laporan/submit_admin",
			dataType: "JSON",
			success: function(out) {
				if (out.sts == "ok") {
					toastr.success("Berhasil", 'INFO');
					setTimeout(function() {
						window.location = ip_server + "permintaan";
					}, 1000);
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
	}); */

	/* $('#f_laporan').on('submit', function(e) {
		e.preventDefault();
		var hak = '<?php echo $_SESSION['hak']; ?>';
		// alert(hak);
		if (hak == 'admin') {
			alert('Sudah diverifikasi admin');
			console.log($(this).serialize());
		} else {
			alert('Menunggu Verifikasi Admin');
		}

		// window.location = "proyek/set_proyek";
	}); */
</script>