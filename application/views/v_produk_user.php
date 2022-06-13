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
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Barang</li>
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
							<h3 class="mb-0">Barang</h3>
						</div>
						<!-- <div class="col-4 text-right">
							<a href="#!" class="btn btn-sm btn-primary">Settings</a>
						</div> -->
					</div>
				</div>
				<div class="card-body">
					<form id="f_tabel" method="POST">
						<!-- <div class="row">
							<div class="col-md-12">
								<p>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_produk">
										Tambah Produk
										<i class="ni ni-fat-add"></i>
									</button>
								</p>
							</div>
						</div> -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="card">
									<div class="card-header">
										<h5 class="title">List Barang</h5>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th></th>
														<th>Nama Barang</th>
														<th>Stok</th>
														<th>Satuan</th>
														<th>Kebutuhan</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Form Implementasi</td>
														<td>3</td>
														<td>Rim</td>
														<td>
															<div class="form-row">
																<div class="form-group col-md-4">
																	<input type="text" class="form-control input_jum" id="input_jum" placeholder="Jumlah">
																</div>
																<div class="form-group col-md-3">
																	<select id="inputState" class="form-control">
																		<option selected>Jenis Satuan</option>
																		<option value="1">Rim</option>
																		<option value="2">Pack</option>
																		<option value="3">Lembar</option>
																	</select>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>LPO Khusus</td>
														<td>3</td>
														<td>Pack</td>
														<td>
															<div class="form-row">
																<div class="form-group col-md-4">
																	<input type="text" class="form-control input_jum" id="input_jum" placeholder="Jumlah">
																</div>
																<div class="form-group col-md-3">
																	<select id="inputState" class="form-control">
																		<option selected>Jenis Satuan</option>
																		<option value="1">Rim</option>
																		<option value="2">Pack</option>
																		<option value="3">Lembar</option>
																	</select>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>

						<p><button type="submit" class="btn btn-primary" id="btn_simpan" style="float: right;">Simpan</button></p>

						<!-- <p><b>Jumlah data:</b></p>
						<pre id="example-console-rows"></pre> -->
					</form>
					<!-- <button type="button" class="btn btn-primary" id="btn_simpan" style="float: right;">Simpan</button> -->
				</div>
			</div>
		</div>

		<!-- Modal Tambah Produk-->
		<div class="modal fade" id="mod_tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="input-username">Nama Produk</label>
									<input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Nama Produk">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="input-first-name">Jumlah</label>
									<input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
								</div>
							</div>
							<div class="col-lg-4 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="input-last-name">Jenis</label>
									<select class="form-control" aria-label="Default select example" id="jenis_satuan" name="jenis_satuan">
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
						<h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<label class="form-control-label" for="input-username">Nama Produk</label>
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
						<button type="button" class="btn btn-primary" id="btn_simpan">Simpan</button>
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
		// $("#datatable-responsive").DataTable();
		$(document).ready(function() {
			var table = $('#datatable-responsive').DataTable({
				// 'ajax': 'https://gyrocode.github.io/files/jquery-datatables/arrays_id.json',
				'columnDefs': [{
					'targets': 0,
					'checkboxes': {
						'selectRow': true
					}
				}],
				'select': {
					'style': 'multi'
				},
				'order': [
					[1, 'asc']
				]
			});

			$('#f_tabel').on('submit', function(e) {
				e.preventDefault();
				var form = this;
				var rows_selected = table.column(0).checkboxes.selected();

				// Iterate over all selected checkboxes
				$.each(rows_selected, function(index, rowId) {
					// Create a hidden element
					$(form).append(
						$('<input>').attr('type', 'hidden').attr('name', 'id[]').val(rowId)
					);
					// alert(rowId);
				});
				alert(rows_selected.join(","));
				window.location = "produk/laporan";
				// $('#example-console-rows').text(rows_selected.join(","));
				// $('#example-console-form').text($(form).serialize());
				// $('input[name="id\[\]"]', form).remove();

			});
		});

	</script>