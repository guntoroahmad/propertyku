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
							<div>- Kode Permintaan : <b><?php echo $rm ?></b></div><br />
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
							<?php if ($stat == 'ver2') { ?>
								<div style="margin-top: 20px;">
									<button type="button" class="btn btn-primary btn-lg btn-block" id="btn_submit">Submit Laporan</button>
								</div>
							<?php } ?>
						</form>
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

	// SUBMIT KORDINATOR
	$(document).on('click', '#btn_submit', function() {
		var rm = '<?php echo $rm ?>';
		// alert(rm);return false;
		var btn = $(this);
		btn.button('loading');

		$.ajax({
			url: ip_server + "laporan/submit_kord",
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