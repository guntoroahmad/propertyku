<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Bank</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Bank</li>
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
		<!-- <div class="col-xl-4 order-xl-2">
			<div class="card card-profile">
				<img src="<?php echo base_url(); ?>assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
				<div class="row justify-content-center">
					<div class="col-lg-3 order-lg-2">
						<div class="card-profile-image">
							<a href="#">
								<img src="<?php echo base_url(); ?>assets/img/theme/team-4.jpg" class="rounded-circle">
							</a>
						</div>
					</div>
				</div>
				<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
					<div class="d-flex justify-content-between">
						<a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
						<a href="#" class="btn btn-sm btn-default float-right">Message</a>
					</div>
				</div>
				<div class="card-body pt-0">
					<div class="row">
						<div class="col">
							<div class="card-profile-stats d-flex justify-content-center">
								<div>
									<span class="heading">22</span>
									<span class="description">Friends</span>
								</div>
								<div>
									<span class="heading">10</span>
									<span class="description">Photos</span>
								</div>
								<div>
									<span class="heading">89</span>
									<span class="description">Comments</span>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center">
						<h5 class="h3">
							Jessica Jones<span class="font-weight-light">, 27</span>
						</h5>
						<div class="h5 font-weight-300">
							<i class="ni location_pin mr-2"></i>Bucharest, Romania
						</div>
						<div class="h5 mt-4">
							<i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
						</div>
						<div>
							<i class="ni education_hat mr-2"></i>University of Computer Science
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<div class="col-xl-12 order-xl-1">
			<div class="card">
				<div class="card-header">
					<div class="row align-items-center">
						<div class="col-8">
							<h2 class="mb-0">List Bank</h2>
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
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_bank">
										Tambah Bank
										<i class="ni ni-fat-add"></i>
									</button>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="card">
									<div class="card-header">
										<h3 class="title">List Bank</h3>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Bank</th>
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

		<!-- Modal Tambah Bank-->
		<div class="modal fade" id="mod_tambah_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Bank</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tambah_bank" method="post">
							<div class="row">
								<div class="col-lg-12 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Nama Bank</label>
										<input type="text" id="nama_bank" name="nama_bank" class="form-control" placeholder="Nama Bank" autocomplete="off">
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

		<!-- Modal Edit bank-->
		<div class="modal fade mod_edit_bank" id="mod_edit_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Bank</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_edit_bank" method="post">
							<input type="hidden" name="id_edit" class="edit">
							<div class="row">
								<div class="col-lg-12 col-md-4 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Nama</label>
										<input type="text" id="ed_nama_bank" name="ed_nama_bank" class="form-control" placeholder="Nama Bank" autocomplete="off">
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

		<!-- Modal Hapus bank -->
		<div class="modal fade mod_hapus_bank" id="mod_hapus_bank" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
							<h4 class="heading mt-4">Anda yakin menghapus bank ini ?</h4>
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
			tampil_bank();
			// tampil_kordinator();
			simpan_bank();

			$('#hak_bank').on('change', function() {
				var hak_bank = $('#hak_bank').val();
				// alert(hak_bank);
				if (hak_bank == 'bank') {
					$('#set_kord').css('display', '');
				} else {
					$('#set_kord').css('display', 'none');
				}
			});
		});

		// TAMPIL NAMA BARANG
		function tampil_kordinator() {
			$.ajax({
				url: ip_server + "admin/tampil_kordinator",
				type: "POST",
				dataType: "JSON",
				success: function(hasil) {
					$.each(hasil, function(index, value) {
						$("#kord_bank").append('<option value="' + value.bankNAME + '">' + value.bankNAME + '</option>');
						$("#ed_kord_bank").append('<option value="' + value.bankNAME + '">' + value.bankNAME + '</option>');
					});
				},
				error: function() {
					alert("Error");
				}
			});
		}

		// TAMPIL TABEL BANK
		function tampil_bank() {
			dt_table.destroy();
			dt_table = $("#datatable-responsive").DataTable({
				ajax: {
					url: ip_server + "admin/tabel_bank",
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
					/* {
						"width": "250px"
					} */
				],
				processing: true,
				responsive: true,
				fixedHeader: true
			});
		}

		// SIMPAN bank
		function simpan_bank() {
			$('#btn_simpan').on('click', function() {
				var btn = $(this);

				if ($("#nama_bank").val() == "") {
					toastr.error("Nama bank belum di isi", 'INFO');
					return false;
				};

				var formnya = $("#f_tambah_bank")[0];
				var Data_tambah = new FormData(formnya);
				btn.button('loading');

				$.ajax({
					url: ip_server + "admin/simpan_bank",
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
							$('#mod_tambah_bank').modal('hide');
							$("#nama_bank").val("");
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

		// TAMPIL EDIT BANK
		$('#datatable-responsive').on("click", "#bank_edit", function() {
			var id = $(this).data("id");
			// alert(id);return false;
			var mdl = $(".mod_edit_bank");
			var btn = $(this);
			// mdl.modal("show");
			$("#f_edit_bank")[0].reset();
			btn.button('loading');
			mdl.find(".edit").val(id);

			$.post(ip_server + "admin/baca_bank_edit", {
				id_edit: id
			}, function(out) {
				/* if (out[2] == 'bank') {
					$('#ed_set_kord').css('display', '');
				} else {
					$('#ed_set_kord').css('display', 'none');
				}

				$('#ed_hak_bank').on('change', function() {
					var hak_bank = $('#ed_hak_bank').val();
					// alert(hak_bank);
					if (hak_bank == 'bank') {
						$('#ed_set_kord').css('display', '');
						$("[name=ed_kord_bank]").val(out[3]);
					} else {
						$('#ed_set_kord').css('display', 'none');
						$("[name=ed_kord_bank]").val('');
					}
				}); */

				btn.button('reset');
				$("[name=id_edit]").val(out[0]);
				$("[name=ed_nama_bank]").val(out[1]);
				mdl.modal("show");

			}, "json");
		});

		// SIMPAN EDIT BANK
		$('#btn_simpan_edit').on("click", function() {
			var btn = $(this);

			if ($("#ed_nama_bank").val() == "") {
				toastr.error("Nama bank belum di isi", 'INFO');
				return false;
			};

			var formnya = $("#f_edit_bank")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');
			$.ajax({
				url: ip_server + "admin/simpan_bank_edit",
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
						$(".mod_edit_bank").modal("hide");
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

		// DELETE bank
		$('#datatable-responsive').on("click", "#bank_del", function() {
			var id = $(this).data("id");
			var mdl = $(".mod_hapus_bank");
			mdl.modal("show");
			mdl.find(".btn-danger").data("id", id);

			$('#btn_hapus').on('click', function() {
				var btn = $(this);
				btn.button('loading');

				$.ajax({
					url: ip_server + "admin/hapus_bank",
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
							$(".mod_hapus_bank").modal("hide");
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
