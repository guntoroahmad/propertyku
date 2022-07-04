<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Form Properti</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Properti</li>
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
							<h2 class="mb-0">Properti</h2>
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
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_properti">
										Tambah Properti
										<i class="ni ni-fat-add"></i>
									</button>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="card">
									<div class="card-header">
										<h3 class="title">List Properti</h3>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Toko</th>
														<th>Nama Properti</th>
														<th>Kota/Kab</th>
														<th>Tipe</th>
														<th>Jenis</th>
														<!-- <th>Sertifikat</th> -->
														<th>Harga</th>
														<th>Gambar</th>
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

		<!-- Modal Tambah Properti-->
		<div class="modal fade" id="mod_tambah_properti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Properti</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tambah_properti" method="post">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Nama Properti</label>
										<input type="text" id="nama_properti" name="nama_properti" class="form-control" placeholder="Nama properti">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Alamat Lengkap</label>
										<textarea rows="4" cols="80" class="form-control" placeholder="Isi alamat lengkap .." id="alamat" name="alamat" autocomplete="off"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Latitude</label>
										<input type="tel" class="form-control" placeholder="ex: -7.315850544192772" id="map_lat" name="map_lat" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Longitude</label>
										<input type="tel" class="form-control" placeholder="ex: 112.73069074995117" id="map_long" name="map_long" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Provinsi</label>
										<select class="form-control" aria-label="Default select example" id="nama_provinsi" name="nama_provinsi">
											<option selected>Pilih provinsi</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Kota/Kab.</label>
										<select class="form-control" aria-label="Default select example" id="nama_kotakab" name="nama_kotakab">
											<option selected>Pilih kota/kab</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Kecamatan</label>
										<select class="form-control" aria-label="Default select example" id="nama_kecamatan" name="nama_kecamatan">
											<option selected>Pilih kecamatan</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Kelurahan</label>
										<select class="form-control" aria-label="Default select example" id="nama_kelurahan" name="nama_kelurahan">
											<option selected>Pilih kelurahan</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Tipe</label>
										<select class="form-control" aria-label="Default select example" id="tipe_properti" name="tipe_properti">
											<option selected>Pilih tipe properti</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Luas Tanah (m2)</label>
										<input type="number" id="luas_tanah" name="luas_tanah" class="form-control" placeholder="ex: 1000 m2">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Luas Bangunan (m2)</label>
										<input type="number" id="luas_bangunan" name="luas_bangunan" class="form-control" placeholder="ex: 975 m2">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Jenis</label>
										<select class="form-control" aria-label="Default select example" id="jenis_properti" name="jenis_properti">
											<option selected>Pilih jenis properti</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Tahun</label>
										<input type="text" id="tahun" name="tahun" class="form-control" placeholder="Tahun">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Sertifikat</label>
										<select class="form-control" aria-label="Default select example" id="jenis_sertifikat" name="jenis_sertifikat">
											<option selected>Pilih jenis sertifikat</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Kamar Tidur</label>
										<input type="text" id="jumlah_kt" name="jumlah_kt" class="form-control" placeholder="Jumlah kamar tidur">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Kamar Mandi</label>
										<input type="text" id="jumlah_km" name="jumlah_km" class="form-control" placeholder="Jumlah kamar mandi">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Harga</label>
										<input type="text" id="harga" name="harga" class="form-control angka" min="0" value="0">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Deskripsi</label>
										<textarea rows="4" cols="80" class="form-control" placeholder="Isi deksripsi tentang properti .." id="deskripsi" name="deskripsi" autocomplete="off"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="file" id="gambar" accept="image/*">
									<br /><br>
									<div style="max-height: 300px;">
										<img id="image" class="gambarku" src="<?php echo base_url(); ?>assets/img/brand/logo_property.jpg" style="width: 100%;">
									</div>
									<br />
									<button type="button" id="b_tambah_gambar" class="btn btn-warning">Add Photo</button>
								</div>
							</div><br />
							<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Photo Property</label>
								<div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12" id="div_foto_bantuan" class="div_foto_bantuan">
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

		<!-- Modal Edit Properti-->
		<div class="modal fade mod_edit_properti" id="mod_edit_properti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Properti</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_edit_properti" method="post">
							<input type="hidden" name="id_edit" class="edit">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Nama Properti</label>
										<input type="text" id="ed_nama_properti" name="ed_nama_properti" class="form-control" placeholder="Nama properti">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Alamat Lengkap</label>
										<textarea rows="4" cols="80" class="form-control" placeholder="Isi alamat lengkap .." id="ed_alamat" name="ed_alamat" autocomplete="off"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Latitude</label>
										<input type="tel" class="form-control" placeholder="ex: -7.315850544192772" id="ed_map_lat" name="ed_map_lat" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Longitude</label>
										<input type="tel" class="form-control" placeholder="ex: 112.73069074995117" id="ed_map_long" name="ed_map_long" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Provinsi</label>
										<select class="form-control" aria-label="Default select example" id="ed_nama_provinsi" name="ed_nama_provinsi">
											<option selected>Pilih provinsi</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Kota/Kab.</label>
										<select class="form-control" aria-label="Default select example" id="ed_nama_kotakab" name="ed_nama_kotakab">
											<option selected>Pilih kota/kab</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Kecamatan</label>
										<select class="form-control" aria-label="Default select example" id="ed_nama_kecamatan" name="ed_nama_kecamatan">
											<option selected>Pilih kecamatan</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Kelurahan</label>
										<select class="form-control" aria-label="Default select example" id="ed_nama_kelurahan" name="ed_nama_kelurahan">
											<option selected>Pilih kelurahan</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Tipe</label>
										<select class="form-control" aria-label="Default select example" id="ed_tipe_properti" name="ed_tipe_properti">
											<option selected>Pilih tipe properti</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Luas Tanah (m2)</label>
										<input type="number" id="ed_luas_tanah" name="ed_luas_tanah" class="form-control" placeholder="ex: 1000 m2">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Luas Bangunan (m2)</label>
										<input type="number" id="ed_luas_bangunan" name="ed_luas_bangunan" class="form-control" placeholder="ex: 975 m2">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Jenis</label>
										<select class="form-control" aria-label="Default select example" id="ed_jenis_properti" name="ed_jenis_properti">
											<option selected>Pilih jenis properti</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Tahun</label>
										<input type="text" id="ed_tahun" name="ed_tahun" class="form-control" placeholder="Tahun">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-first-name">Sertifikat</label>
										<select class="form-control" aria-label="Default select example" id="ed_jenis_sertifikat" name="ed_jenis_sertifikat">
											<option selected>Pilih jenis sertifikat</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Kamar Tidur</label>
										<input type="text" id="ed_jumlah_kt" name="ed_jumlah_kt" class="form-control" placeholder="Jumlah kamar tidur">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Kamar Mandi</label>
										<input type="text" id="ed_jumlah_km" name="ed_jumlah_km" class="form-control" placeholder="Jumlah kamar mandi">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Harga</label>
										<input type="text" id="ed_harga" name="ed_harga" class="form-control" placeholder="Harga (dalam rupiah) ..">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username">Deskripsi</label>
										<textarea rows="4" cols="80" class="form-control" placeholder="Isi deksripsi tentang properti .." id="ed_deskripsi" name="ed_deskripsi" autocomplete="off"></textarea>
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

		<!--Modal Edit Foto Properti-->
		<div class="modal fade m_edit_foto_properti" tabindex="-1" role="dialog" aria-hidden="true">
			<!--<div class="vertical-alignment-helper">-->
			<div class="modal-dialog modal-dialog-centered modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalLabel2">Ubah Foto Bantuan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_edit_foto_properti" class="form-horizontal">
							<input type="hidden" name="id_edit" class="edit">
							<input type="hidden" name="id_properti2" id="id_properti2" class="edit">
							<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="file" id="gambar_penerima2" accept="image/*">
									<br /><br>
									<div style="max-height: 300px;">
										<img id="image_penerima2" class="gambarku" src="<?php echo base_url(); ?>assets/img/brand/logo_property.jpg" style="width: 100%;">
									</div>
									<br />
									<button type="button" id="b_tambah_gambar_penerima2" class="btn btn-warning">Add Photo</button>
								</div>
							</div><br />
							<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Photo Product</label>
								<!--<div class="form-group">-->
								<!--<div class="col-md-9 col-sm-9 col-xs-12" id="div_edit_foto_produk">-->
								<div class="card-deck div_edit_foto_properti" id="div_edit_foto_properti">
								</div>
								<!--</div>-->
							</div>
						</form>
					</div><br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-danger" id="b_edit_foto_properti" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Proses...">Simpan</button>
					</div>
				</div>
			</div>
			<!--</div>-->
		</div>

		<!-- Modal Hapus Properti -->
		<div class="modal fade mod_hapus_properti" id="mod_hapus_properti" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
				<div class="modal-content bg-gradient-danger">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-notification">Hapus Properti</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="py-3 text-center">
							<i class="ni ni-bell-55 ni-3x"></i>
							<h4 class="heading mt-4">Anda yakin menghapus properti ini ?</h4>
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

		<!-- Modal Konfirmasi Properti Listing -->
		<div class="modal fade mod_konfirm_properti" id="mod_konfirm_properti" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
				<div class="modal-content bg-gradient-default">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-notification">Konfirmasi Future Listing</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_set_paket" method="post">
							<input type="hidden" name="id_toko_produk_member" id="id_toko_produk_member">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username" style="color: white;">Paket Promo</label>
										<select class="form-control" aria-label="Default select example" id="paket_promo" name="paket_promo">
											<option selected value="">Pilih Paket Promo</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username" style="color: white;">Waktu Aktif Promo</label>
										<input type="date" id="waktu_aktif" name="waktu_aktif" class="form-control" placeholder="Waktu Atif Promo">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-username" style="color: white;">Qty Paket</label>
										<input type="int" id="qty_paket" name="qty_paket" class="form-control" placeholder="Qty Paket">
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-white" id="btn_konfirmasi">Ya, Konfirmasi !</button>
						<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var dt_table = $("#datatable-responsive").DataTable();
		$(document).ready(function() {
			tampil_properti();
			tampil_daerah();
			tampil_pilihan();

			$('.angka').maskNumber({
				integer: true,
				thousands: '.'
				// decimal:','
			});

			var $image = $('#image');
			$image.cropper({
				/* aspectRatio: 1,*/
				responsive: true,
				viewMode: 1,
				minContainerWidth: 250,
				minContainerHeight: 250
			});

			var cropper = $image.data('cropper');
			$('#gambar').change(function(event) {
				cropper.replace(URL.createObjectURL(event.target.files[0]));
			});

			var $image_penerima2 = $('#image_penerima2');
			$image_penerima2.cropper({
				/* aspectRatio: 1,*/
				responsive: true,
				viewMode: 1,
				minContainerWidth: 250,
				minContainerHeight: 250
			});

			var cropper_penerima2 = $image_penerima2.data('cropper');
			$('#gambar_penerima2').change(function(event) {
				cropper_penerima2.replace(URL.createObjectURL(event.target.files[0]));
			});

			$("#b_tambah_gambar").click(function() {
				//            alert($(".kartu").length);
				var foto = cropper.getCroppedCanvas().toDataURL('image/jpeg');
				var isi = '<div class="card kartu" style="height: 250px;width: 170px;margin-bottom: 5px;">\
                        <div class="image view view-first"><input type="hidden" name="foto[]" value="' + foto + '">\
                            <img style="display: block;max-width: 100%;" src="' + foto + '" alt="image">\
                        </div>\
                        <p>Hapus Foto</p>\
                        <div class="tools tools-bottom b_hapus_foto"><i class="fa fa-times"></i>Hapus</div>\
                    </div>';
				$("#div_foto_bantuan").append(isi);
				// $('#b_tambah_gambar').css('display', 'none');
			});

			$("#b_tambah_gambar_penerima2").click(function() {
				//            alert('aa');
				var foto = cropper_penerima2.getCroppedCanvas().toDataURL('image/jpeg');
				var isi = '<div class="card kartu" style="height: 250px;width: 170px;margin-bottom: 5px;">\
                        <div class="image view view-first"><input type="hidden" name="foto2[]" value="' + foto + '">\
                            <img style="display: block;max-width: 100%;" src="' + foto + '" alt="image">\
                        </div>\
                        <p>Hapus Foto</p>\
                        <div class="tools tools-bottom b_hapus_foto2"><i class="fa fa-times"></i>Hapus</div>\
                    </div>';
				$("#div_edit_foto_properti").append(isi);
			});

			$(document).on("click", ".b_hapus_foto", function() {
				$(this).parents(".kartu").remove();
			});

			$(document).on("click", ".b_hapus_foto2", function() {
				$(this).parents(".kartu").remove();
			});
		});

		// TAMPIL DAERAH
		function tampil_daerah() {
			$.ajax({
				url: ip_server + "properti/list_provinsi",
				type: "POST",
				dataType: "JSON",
				success: function(hasil) {
					$.each(hasil, function(index, value) {
						$("#nama_provinsi").append('<option value="' + value.id_prov + '">' + value.nama_prov + '</option>');
						$("#ed_nama_provinsi").append('<option value="' + value.id_prov + '">' + value.nama_prov + '</option>');
					});
				},
				error: function() {
					alert("Error");
				}
			});

			$("#nama_provinsi").change(function() {
				var id_prov = $("#nama_provinsi").val();
				/* alert(id_prov);
				return false; */
				if (id_prov != '') {
					$("#nama_kotakab").empty();
					$("#nama_kotakab").append('<option value="">Pilih kota/kab</option>');

					$.ajax({
						url: ip_server + "properti/list_kotakab",
						type: "POST",
						data: {
							id_prov: id_prov
						},
						dataType: "JSON",
						success: function(hasil) {
							$.each(hasil, function(index, value) {
								$("#nama_kotakab").append('<option value="' + value.id_kotakab + '">' + value.nama_kotakab + '</option>');
							});
						},
						error: function() {
							alert("Error");
						}
					});
				} else {
					$("#nama_kotakab").empty();
					$("#nama_kotakab").append('<option value="">Pilih kota/kab</option>');
				}
			});

			$("#ed_nama_provinsi").change(function() {
				var id_prov = $("#ed_nama_provinsi").val();
				/* alert(id_prov);
				return false; */
				if (id_prov != '') {
					$("#ed_nama_kotakab").empty();
					$("#ed_nama_kecamatan").empty();
					$("#ed_nama_kelurahan").empty();
					$("#ed_nama_kotakab").append('<option value="">Pilih kota/kab</option>');
					$("#ed_nama_kecamatan").append('<option value="">Pilih kecamatan</option>');
					$("#ed_nama_kelurahan").append('<option value="">Pilih kelurahan</option>');

					$.ajax({
						url: ip_server + "properti/list_kotakab",
						type: "POST",
						data: {
							id_prov: id_prov
						},
						dataType: "JSON",
						success: function(hasil) {
							$.each(hasil, function(index, value) {
								$("#ed_nama_kotakab").append('<option value="' + value.id_kotakab + '">' + value.nama_kotakab + '</option>');
							});
						},
						error: function() {
							alert("Error");
						}
					});
				} else {
					$("#ed_nama_kotakab").empty();
					$("#ed_nama_kotakab").append('<option value="">Pilih kota/kab</option>');
				}
			});

			$("#nama_kotakab").change(function() {
				var id_kotakab = $("#nama_kotakab").val();
				//            alert(list_kategori);return false;
				if (id_kotakab != '') {
					$("#nama_kecamatan").empty();
					$("#nama_kecamatan").append('<option value="">Pilih kecamatan</option>');

					$.ajax({
						url: ip_server + "properti/list_kecamatan",
						type: "POST",
						data: {
							id_kotakab: id_kotakab
						},
						dataType: "JSON",
						success: function(hasil) {
							$.each(hasil, function(index, value) {
								$("#nama_kecamatan").append('<option value="' + value.id_kecamatan + '">' + value.nama_kecamatan + '</option>');
							});
						},
						error: function() {
							alert("Error");
						}
					});
				} else {
					$("#nama_kecamatan").empty();
					$("#nama_kecamatan").append('<option value="">Pilih kecamatan</option>');
				}
			});

			$("#ed_nama_kotakab").change(function() {
				var id_kotakab = $("#ed_nama_kotakab").val();
				//            alert(list_kategori);return false;
				if (id_kotakab != '') {
					$("#ed_nama_kecamatan").empty();
					$("#ed_nama_kelurahan").empty();
					$("#ed_nama_kecamatan").append('<option value="">Pilih kecamatan</option>');
					$("#ed_nama_kelurahan").append('<option value="">Pilih kelurahan</option>');

					$.ajax({
						url: ip_server + "properti/list_kecamatan",
						type: "POST",
						data: {
							id_kotakab: id_kotakab
						},
						dataType: "JSON",
						success: function(hasil) {
							$.each(hasil, function(index, value) {
								$("#ed_nama_kecamatan").append('<option value="' + value.id_kecamatan + '">' + value.nama_kecamatan + '</option>');
							});
						},
						error: function() {
							alert("Error");
						}
					});
				} else {
					$("#ed_nama_kecamatan").empty();
					$("#ed_nama_kecamatan").append('<option value="">Pilih kecamatan</option>');
				}
			});

			$("#nama_kecamatan").change(function() {
				var id_kecamatan = $("#nama_kecamatan").val();
				//            alert(list_kategori);return false;
				if (id_kecamatan != '') {
					$("#nama_kelurahan").empty();
					$("#nama_kelurahan").append('<option value="">Pilih kelurahan</option>');

					$.ajax({
						url: ip_server + "properti/list_kelurahan",
						type: "POST",
						data: {
							id_kecamatan: id_kecamatan
						},
						dataType: "JSON",
						success: function(hasil) {
							$.each(hasil, function(index, value) {
								$("#nama_kelurahan").append('<option value="' + value.id_kelurahan + '">' + value.nama_kelurahan + '</option>');
							});
						},
						error: function() {
							alert("Error");
						}
					});
				} else {
					$("#nama_kelurahan").empty();
					$("#nama_kelurahan").append('<option value="">Pilih kelurahan</option>');
				}
			});

			$("#ed_nama_kecamatan").change(function() {
				var id_kecamatan = $("#ed_nama_kecamatan").val();
				//            alert(list_kategori);return false;
				if (id_kecamatan != '') {
					$("#ed_nama_kelurahan").empty();
					$("#ed_nama_kelurahan").append('<option value="">Pilih kelurahan</option>');

					$.ajax({
						url: ip_server + "properti/list_kelurahan",
						type: "POST",
						data: {
							id_kecamatan: id_kecamatan
						},
						dataType: "JSON",
						success: function(hasil) {
							$.each(hasil, function(index, value) {
								$("#ed_nama_kelurahan").append('<option value="' + value.id_kelurahan + '">' + value.nama_kelurahan + '</option>');
							});
						},
						error: function() {
							alert("Error");
						}
					});
				} else {
					$("#ed_nama_kelurahan").empty();
					$("#ed_nama_kelurahan").append('<option value="">Pilih kelurahan</option>');
				}
			});
		}

		// TAMPIL PILIHAN
		function tampil_pilihan() {
			$.ajax({
				url: ip_server + "properti/list_tipe_properti",
				type: "POST",
				dataType: "JSON",
				success: function(hasil) {
					$.each(hasil, function(index, value) {
						$("#tipe_properti").append('<option value="' + value.id_tipe_properti + '">' + value.nama_properti + '</option>');
						$("#ed_tipe_properti").append('<option value="' + value.id_tipe_properti + '">' + value.nama_properti + '</option>');
					});
				},
				error: function() {
					alert("Error");
				}
			});

			$.ajax({
				url: ip_server + "properti/list_jenis_properti",
				type: "POST",
				dataType: "JSON",
				success: function(hasil) {
					$.each(hasil, function(index, value) {
						$("#jenis_properti").append('<option value="' + value.id_jenis_properti + '">' + value.jenis_properti + '</option>');
						$("#ed_jenis_properti").append('<option value="' + value.id_jenis_properti + '">' + value.jenis_properti + '</option>');
					});
				},
				error: function() {
					alert("Error");
				}
			});

			$.ajax({
				url: ip_server + "properti/list_sertifikat",
				type: "POST",
				dataType: "JSON",
				success: function(hasil) {
					$.each(hasil, function(index, value) {
						$("#jenis_sertifikat").append('<option value="' + value.id_sertifikat + '">' + value.nama_sertifikat + '</option>');
						$("#ed_jenis_sertifikat").append('<option value="' + value.id_sertifikat + '">' + value.nama_sertifikat + '</option>');
					});
				},
				error: function() {
					alert("Error");
				}
			});
		}

		// TAMPIL PROPERTI
		function tampil_properti() {
			dt_table.destroy();
			dt_table = $("#datatable-responsive").DataTable({
				ajax: {
					url: ip_server + "properti/tabel_properti",
					type: "post",
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
					null,
					null,
					null
				],
				processing: true,
				responsive: true,
				fixedHeader: true
			});
		}

		// TAMPIL EDIT PROPERTI
		$('#datatable-responsive').on("click", "#mod_properti_edit", function() {
			var id = $(this).data("id");
			// alert(id);return false;
			var mdl = $(".mod_edit_properti");
			var btn = $(this);
			// mdl.modal("show");
			$("#f_edit_properti")[0].reset();
			btn.button('loading');
			mdl.find(".edit").val(id);

			$.post(ip_server + "properti/baca_properti_edit", {
				id_edit: id
			}, function(out) {
				btn.button('reset');
				$("[name=ed_nama_properti]").val(out[1]);
				$("[name=ed_alamat]").val(out[2]);
				$("[name=ed_map_lat]").val(out[3]);
				$("[name=ed_map_long]").val(out[4]);
				$("[name=ed_nama_provinsi]").val(out[5]);
				$("[name=ed_tipe_properti]").val(out[9]);
				$("[name=ed_jenis_properti]").val(out[10]);
				$("[name=ed_jenis_sertifikat]").val(out[11]);
				$("[name=ed_luas_tanah]").val(out[12]);
				$("[name=ed_luas_bangunan]").val(out[13]);
				$("[name=ed_tahun]").val(out[14]);
				$("[name=ed_harga]").val(out[15]);
				$("[name=ed_nama_developer]").val(out[16]);
				$("[name=ed_jumlah_kt]").val(out[17]);
				$("[name=ed_jumlah_km]").val(out[18]);
				$("[name=ed_deskripsi]").val(out[19]);

				$.ajax({
					url: ip_server + "properti/list_kotakab",
					type: "POST",
					data: {
						id_prov: out[5]
					},
					dataType: "JSON",
					success: function(hasil) {
						$("#ed_nama_kotakab").empty();
						$("#ed_nama_kotakab").append('<option value="">Pilih kota/kab</option>');
						$.each(hasil, function(index, value) {
							$("#ed_nama_kotakab").append('<option value="' + value.id_kotakab + '">' + value.nama_kotakab + '</option>');
						});
						$("[name=ed_nama_kotakab]").val(out[6]);
					},
					error: function() {
						alert("Error");
					}
				});

				$.ajax({
					url: ip_server + "properti/list_kecamatan",
					type: "POST",
					data: {
						id_kotakab: out[6]
					},
					dataType: "JSON",
					success: function(hasil) {
						$("#ed_nama_kecamatan").empty();
						$("#ed_nama_kecamatan").append('<option value="">Pilih kecamatan</option>');
						$.each(hasil, function(index, value) {
							$("#ed_nama_kecamatan").append('<option value="' + value.id_kecamatan + '">' + value.nama_kecamatan + '</option>');
						});
						$("[name=ed_nama_kecamatan]").val(out[7]);
					},
					error: function() {
						alert("Error");
					}
				});

				$.ajax({
					url: ip_server + "properti/list_kelurahan",
					type: "POST",
					data: {
						id_kecamatan: out[7]
					},
					dataType: "JSON",
					success: function(hasil) {
						$("#ed_nama_kelurahan").empty();
						$("#ed_nama_kelurahan").append('<option value="">Pilih kecamatan</option>');
						$.each(hasil, function(index, value) {
							$("#ed_nama_kelurahan").append('<option value="' + value.id_kelurahan + '">' + value.nama_kelurahan + '</option>');
						});
						$("[name=ed_nama_kelurahan]").val(out[8]);
					},
					error: function() {
						alert("Error");
					}
				});
				mdl.modal("show");
			}, "json");
		});

		// TAMPIL EDIT GAMBAR
		$(document).on("click", ".p_detail_gambar", function() {
			var id = $(this).data("id");
			var mdl = $(".m_edit_foto_properti");
			var btn = $(this);
			btn.button('loading');
			mdl.find(".edit").val(id);
			$.post(ip_server + "properti/baca_menu_edit_gambar", {
				id_edit: id
			}, function(out) {
				btn.button('reset');
				var isi = "";
				for (var i = 0; i < out.length; i++) {
					isi += '<div class="card kartu" style="height: 250px;width: 170px;margin-bottom: 5px;">\
                        <div class="image view view-first"><input type="hidden" name="foto2[]" value="' + out[i][1] + '">\
                            <img style="display: block;max-width: 100%;" src="' + out[i][1] + '" alt="image">\
                        </div>\
                        <p>Hapus Foto</p>\
                        <div class="tools tools-bottom b_hapus_foto2"><i class="fa fa-times"></i>Hapus</div>\
                    </div>';

					$("#id_properti2").val(out[i][0]);
				}
				$("#div_edit_foto_properti").html(isi);
				mdl.modal("show");
			}, "json");
		});

		// SIMPAN PROPERTI
		$('#btn_simpan').on('click', function() {
			var btn = $(this);

			if ($("#nama_properti").val() == "") {
				toastr.error("Nama Properti belum di isi", 'INFO');
				return false;
			};

			if ($("#alamat").val() == "") {
				toastr.error("Alamat belum di isi", 'INFO');
				return false;
			};

			if ($("#map_lat").val() == "") {
				toastr.error("Lattitude belum di isi", 'INFO');
				return false;
			};

			if ($("#map_long").val() == "") {
				toastr.error("Longitude belum di isi", 'INFO');
				return false;
			};

			if ($("#nama_provinsi").val() == "") {
				toastr.error("Nama Provinsi belum di isi", 'INFO');
				return false;
			};

			if ($("#nama_kotakab").val() == "") {
				toastr.error("Nama Kota / Kabupaten belum di isi", 'INFO');
				return false;
			};

			if ($("#nama_kecamatan").val() == "") {
				toastr.error("Nama Kecamatan belum di isi", 'INFO');
				return false;
			};

			if ($("#nama_kelurahan").val() == "") {
				toastr.error("Nama Kelurahan belum di isi", 'INFO');
				return false;
			};

			if ($("#tipe_properti").val() == "") {
				toastr.error("Tipe Properti belum di isi", 'INFO');
				return false;
			};

			if ($("#luas_tanah").val() == "") {
				toastr.error("Luas Tanah belum di isi", 'INFO');
				return false;
			};

			if ($("#luas_bangunan").val() == "") {
				toastr.error("Luas Bangunan belum di isi", 'INFO');
				return false;
			};

			if ($("#jenis_properti").val() == "") {
				toastr.error("Jenis Properti belum di isi", 'INFO');
				return false;
			};

			if ($("#tahun").val() == "") {
				toastr.error("Tahun Properti belum di isi", 'INFO');
				return false;
			};

			if ($("#jenis_sertifikat").val() == "") {
				toastr.error("Jenis Sertifikat belum di isi", 'INFO');
				return false;
			};

			if ($("#jumlah_kt").val() == "") {
				toastr.error("Jumlah Kamar Tidur belum di isi", 'INFO');
				return false;
			};

			if ($("#jumlah_km").val() == "") {
				toastr.error("Jumlah Kamar Mandi belum di isi", 'INFO');
				return false;
			};

			if ($("#harga").val() == "") {
				toastr.error("Harga belum di isi", 'INFO');
				return false;
			};

			if ($("#deskripsi").val() == "") {
				toastr.error("Deskripsi belum di isi", 'INFO');
				return false;
			};

			if ($.trim($("#div_foto_bantuan").text()) == "") {
				toastr.error("Foto belum dipilih", 'INFO');
				return false;
			}

			var formnya = $("#f_tambah_properti")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');

			$.ajax({
				url: ip_server + "properti/simpan_properti",
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
						$('#mod_tambah_properti').modal('hide');
						$("#nama_properti").val("");
						$("#alamat").val("");
						$("#map_lat").val("");
						$("#map_long").val("");
						$("#nama_provinsi").val("");
						$("#nama_kotakab").val("");
						$("#nama_kecamatan").val("");
						$("#nama_kelurahan").val("");
						$("#tipe_properti").val("");
						$("#luas_tanah").val("");
						$("#luas_bangunan").val("");
						$("#jenis_properti").val("");
						$("#tahun").val("");
						$("#jenis_sertifikat").val("");
						$("#jumlah_kt").val("");
						$("#jumlah_km").val("");
						$("#harga").val("");
						$("#deskripsi").val("");
						$("#div_foto_bantuan").html("");
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

		// SIMPAN EDIT PROPERTI
		$('#btn_simpan_edit').on('click', function() {
			var btn = $(this);

			if ($("#ed_nama_properti").val() == "") {
				toastr.error("Nama Properti belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_alamat").val() == "") {
				toastr.error("Alamat belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_map_lat").val() == "") {
				toastr.error("Lattitude belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_map_long").val() == "") {
				toastr.error("Longitude belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_nama_provinsi").val() == "") {
				toastr.error("Nama Provinsi belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_nama_kotakab").val() == "") {
				toastr.error("Nama Kota / Kabupaten belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_nama_kecamatan").val() == "") {
				toastr.error("Nama Kecamatan belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_nama_kelurahan").val() == "") {
				toastr.error("Nama Kelurahan belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_tipe_properti").val() == "") {
				toastr.error("Tipe Properti belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_luas_tanah").val() == "") {
				toastr.error("Luas Tanah belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_luas_bangunan").val() == "") {
				toastr.error("Luas Bangunan belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_jenis_properti").val() == "") {
				toastr.error("Jenis Properti belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_tahun").val() == "") {
				toastr.error("Tahun Properti belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_jenis_sertifikat").val() == "") {
				toastr.error("Jenis Sertifikat belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_jumlah_kt").val() == "") {
				toastr.error("Jumlah Kamar Tidur belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_jumlah_km").val() == "") {
				toastr.error("Jumlah Kamar Mandi belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_harga").val() == "") {
				toastr.error("Harga belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_deskripsi").val() == "") {
				toastr.error("Deskripsi belum di isi", 'INFO');
				return false;
			};

			var formnya = $("#f_edit_properti")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');

			$.ajax({
				url: ip_server + "properti/simpan_properti_edit",
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
						$('#mod_edit_properti').modal('hide');
						$("#ed_nama_properti").val("");
						$("#ed_alamat").val("");
						$("#ed_map_lat").val("");
						$("#ed_map_long").val("");
						$("#ed_nama_provinsi").val("");
						$("#ed_nama_kotakab").val("");
						$("#ed_nama_kecamatan").val("");
						$("#ed_nama_kelurahan").val("");
						$("#ed_tipe_properti").val("");
						$("#ed_luas_tanah").val("");
						$("#ed_luas_bangunan").val("");
						$("#ed_jenis_properti").val("");
						$("#ed_tahun").val("");
						$("#ed_jenis_sertifikat").val("");
						$("#ed_jumlah_kt").val("");
						$("#ed_jumlah_km").val("");
						$("#ed_harga").val("");
						$("#ed_deskripsi").val("");
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

		// SIMPAN EDIT FOTO
		$(document).on("click", "#b_edit_foto_properti", function() {
			var btn = $(this);
			var formnya = $("#f_edit_foto_properti")[0];
			var Data_tambah = new FormData(formnya);
			if ($.trim($(".div_edit_foto_properti").text()) == "") {
				toastr.error("Foto belum dipilih", 'INFO');
				return false();
			}
			btn.button('loading');
			$.ajax({
				url: ip_server + "properti/ubah_foto",
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
						$(".m_edit_foto_properti").modal("hide");
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

		// DELETE PROPERTI
		$('#datatable-responsive').on("click", "#mod_properti_del", function() {
			var id = $(this).data("id");
			var mdl = $(".mod_hapus_properti");
			mdl.modal("show");
			mdl.find(".btn-danger").data("id", id);

			$('#btn_hapus').on('click', function() {
				var btn = $(this);
				btn.button('loading');

				$.ajax({
					url: ip_server + "properti/hapus_properti",
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

		// SIMPAN KONFIRMASI
		$('#datatable-responsive').on("click", "#mod_properti_konfirm", function() {
			var id = $(this).data("id");
			// alert(id);return false;
			$('#id_toko_produk_member').val(id);
			var mdl = $(".mod_konfirm_properti");
			var opt = '';
			mdl.modal("show");

			$('#paket_promo').children().remove();
			$.ajax({
				url: ip_server + "properti/list_paket",
				type: "POST",
				dataType: "JSON",
				success: function(hasil) {
					opt += '<option selected value="">Pilih Paket Promo</option>';
					$.each(hasil, function(index, value) {
						opt += '<option value="' + value.id_paket_promo + '">' + value.nama_paket + '</option>';
					});
					$("#paket_promo").append(opt);
				},
				error: function() {
					alert("Error");
				}
			});

			$('#btn_konfirmasi').on('click', function() {
				var btn = $(this);

				if ($("#paket_promo").val() == "") {
					toastr.error("Paket Promo belum di pilih", 'INFO');
					return false;
				};

				if ($("#waktu_aktif").val() == "") {
					toastr.error("Waktu aktif paket belum di isi", 'INFO');
					return false;
				};

				if ($("#qty_paket").val() == "") {
					toastr.error("Qty paket belum di isi", 'INFO');
					return false;
				};

				var formnya = $("#f_set_paket")[0];
				var Data_tambah = new FormData(formnya);
				btn.button('loading');

				$.ajax({
					url: ip_server + "properti/konfirm_properti",
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
							$('#mod_konfirm_properti').modal('hide');
							$("#paket_promo").val("");
							$("#waktu_aktif").val("");
							$("#qty_paket").val("");
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
		});
	</script>
