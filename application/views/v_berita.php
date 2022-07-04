<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Berita</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home"><i class="fas fa-home"></i></a></li>
							<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Berita</li>
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
							<h2 class="mb-0">List Berita</h2>
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
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod_tambah_berita">
										Tambah Berita
										<i class="ni ni-fat-add"></i>
									</button>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="card">
									<div class="card-header">
										<h3 class="title">List Berita</h3>
									</div>
									<div class="card-body">
										<div>
											<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Judul Berita</th>
														<th>Penulis</th>
														<th>Status</th>
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

		<!-- Modal Tambah Berita-->
		<div class="modal fade" id="mod_tambah_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_tambah_berita" method="post">
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Judul Berita</label>
										<input type="text" id="judul_berita" name="judul_berita" class="form-control" placeholder="Judul Berita" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Penulis</label>
										<input type="text" id="nama_penulis" name="nama_penulis" class="form-control" placeholder="Penulis" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Status Publish</label>
										<select class="form-control" aria-label="Default select example" id="status_publish" name="status_publish">
											<option value="" selected>Pilih status</option>
											<option value="draft">Draft</option>
											<option value="publish">Publish</option>
											<option value="unpublish">Unpublish</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Tanggal Publish</label>
										<input type="date" id="tgl_publish" name="tgl_publish" class="form-control" placeholder="Penulis" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label">Isi Berita</label>
										<textarea id="isi_berita" name="isi_berita"></textarea>
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

		<!-- Modal Edit berita-->
		<div class="modal fade mod_edit_berita" id="mod_edit_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="f_edit_berita" method="post">
							<input type="hidden" name="id_edit" class="edit">
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Judul Berita</label>
										<input type="text" id="ed_judul_berita" name="ed_judul_berita" class="form-control" placeholder="Judul Berita" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-bankname">Penulis</label>
										<input type="text" id="ed_nama_penulis" name="ed_nama_penulis" class="form-control" placeholder="Penulis" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Status Publish</label>
										<select class="form-control" aria-label="Default select example" id="ed_status_publish" name="ed_status_publish">
											<option value="" selected>Pilih status</option>
											<option value="draft">Draft</option>
											<option value="publish">Publish</option>
											<option value="unpublish">Unpublish</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="input-last-name">Tanggal Publish</label>
										<input type="date" id="ed_tgl_publish" name="ed_tgl_publish" class="form-control" placeholder="Penulis" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-control-label">Isi Berita</label>
										<textarea id="ed_isi_berita" name="ed_isi_berita" class="ed_isi_berita"></textarea>
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

		<!-- Modal Hapus berita -->
		<div class="modal fade mod_hapus_berita" id="mod_hapus_berita" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
				<div class="modal-content bg-gradient-danger">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-notification">Hapus Berita</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="py-3 text-center">
							<i class="ni ni-bell-55 ni-3x"></i>
							<h4 class="heading mt-4">Anda yakin menghapus berita ini ?</h4>
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
			tampil_berita();

			tinymce.init({
				selector: 'textarea#isi_berita',
				plugins: 'image code',
				// menubar: false,
				toolbar: 'undo redo | link image  | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
				/* enable title field in the Image dialog*/
				image_title: true,
				/* enable automatic uploads of images represented by blob or data URIs*/
				automatic_uploads: true,
				/*
				  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
				  images_upload_url: 'postAcceptor.php',
				  here we add custom filepicker only to Image dialog
				*/
				file_picker_types: 'image',
				/* and here's our custom image picker*/
				file_picker_callback: function(cb, value, meta) {
					var input = document.createElement('input');
					input.setAttribute('type', 'file');
					input.setAttribute('accept', 'image/*');
					input.onchange = function() {
						var file = this.files[0];

						var reader = new FileReader();
						reader.onload = function() {
							var id = 'blobid' + (new Date()).getTime();
							var blobCache = tinymce.activeEditor.editorUpload.blobCache;
							var base64 = reader.result.split(',')[1];
							var blobInfo = blobCache.create(id, file, base64);
							blobCache.add(blobInfo);
							cb(blobInfo.blobUri(), {
								title: file.name
							});
						};
						reader.readAsDataURL(file);
					};

					input.click();
				},
				content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
			});

		});

		// TAMPIL TABEL BERITA
		function tampil_berita() {
			dt_table.destroy();
			dt_table = $("#datatable-responsive").DataTable({
				ajax: {
					url: ip_server + "berita/tabel_berita",
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

		// SIMPAN BERITA
		$(document).on('click', '#btn_simpan', function() {
			tinyMCE.triggerSave();
			var btn = $(this);

			if ($("#judul_berita").val() == "") {
				toastr.error("Judul berita belum di isi", 'INFO');
				return false;
			};

			if ($("#nama_penulis").val() == "") {
				toastr.error("Nama penulis belum di isi", 'INFO');
				return false;
			};

			if ($("#status_publish").val() == "") {
				toastr.error("Status publish belum di isi", 'INFO');
				return false;
			};

			if ($("#tgl_publish").val() == "") {
				toastr.error("Tanggal publish belum di isi", 'INFO');
				return false;
			};

			if ($("#isi_berita").val() == "") {
				toastr.error("Isi berita belum di isi", 'INFO');
				return false;
			};

			var formnya = $("#f_tambah_berita")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');

			$.ajax({
				url: ip_server + "berita/simpan_berita",
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
						/* dt_table.ajax.reload(null, false);
						$('#mod_tambah_berita').modal('hide');
						$("#judul_berita").val("");
						$("#nama_penulis").val("");
						$("#status_publish").val("");
						$("#isi_berita").val("");
						tinyMCE.activeEditor.setContent("");
						$("#tgl_publish").val(""); */
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

		// TAMPIL EDIT BERITA
		$('#datatable-responsive').on("click", "#berita_edit", function() {
			var id = $(this).data("id");
			// alert(id);return false;
			var mdl = $(".mod_edit_berita");
			var btn = $(this);
			// mdl.modal("show");
			$("#f_edit_berita")[0].reset();
			btn.button('loading');
			mdl.find(".edit").val(id);

			$.post(ip_server + "berita/baca_berita_edit", {
				id_edit: id
			}, function(out) {
				btn.button('reset');
				tinymce.init({
					selector: 'textarea#ed_isi_berita',
					plugins: 'image code',
					// menubar: false,
					toolbar: 'undo redo | link image  | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
					/* enable title field in the Image dialog*/
					image_title: true,
					/* enable automatic uploads of images represented by blob or data URIs*/
					automatic_uploads: true,
					/*
					  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
					  images_upload_url: 'postAcceptor.php',
					  here we add custom filepicker only to Image dialog
					*/
					file_picker_types: 'image',
					/* and here's our custom image picker*/
					file_picker_callback: function(cb, value, meta) {
						var input = document.createElement('input');
						input.setAttribute('type', 'file');
						input.setAttribute('accept', 'image/*');
						input.onchange = function() {
							var file = this.files[0];

							var reader = new FileReader();
							reader.onload = function() {
								var id = 'blobid' + (new Date()).getTime();
								var blobCache = tinymce.activeEditor.editorUpload.blobCache;
								var base64 = reader.result.split(',')[1];
								var blobInfo = blobCache.create(id, file, base64);
								blobCache.add(blobInfo);
								cb(blobInfo.blobUri(), {
									title: file.name
								});
							};
							reader.readAsDataURL(file);
						};

						input.click();
					},
					content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
				});

				tinyMCE.activeEditor.setContent(out[2]);
				$("[name=id_edit]").val(out[0]);
				$("[name=ed_judul_berita]").val(out[1]);
				$("[name=ed_isi_berita]").val(out[2]);
				$("[name=ed_nama_penulis]").val(out[3]);
				$("[name=ed_status_publish]").val(out[4]);
				$("[name=ed_tgl_publish]").val(out[5]);
				mdl.modal("show");
			}, "json");
		});

		// SIMPAN EDIT BERITA
		$('#btn_simpan_edit').on("click", function() {
			tinyMCE.triggerSave();
			var btn = $(this);

			if ($("#ed_judul_berita").val() == "") {
				toastr.error("Judul berita belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_nama_penulis").val() == "") {
				toastr.error("Nama penulis belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_status_publish").val() == "") {
				toastr.error("Status publish belum di pilih", 'INFO');
				return false;
			};

			if ($("#ed_tgl_publish").val() == "") {
				toastr.error("Tanggal publish belum di isi", 'INFO');
				return false;
			};

			if ($("#ed_isi_berita").val() == "") {
				toastr.error("Isi berita belum di isi", 'INFO');
				return false;
			};

			var formnya = $("#f_edit_berita")[0];
			var Data_tambah = new FormData(formnya);
			btn.button('loading');
			$.ajax({
				url: ip_server + "berita/simpan_berita_edit",
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
						$(".mod_edit_berita").modal("hide");
						$("#ed_judul_berita").val("");
						$("#ed_nama_penulis").val("");
						$("#ed_status_publish").val("");
						$("#ed_isi_berita").val("");
						tinyMCE.activeEditor.setContent("");
						$("#ed_tgl_publish").val("");
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

		// DELETE BERITA
		$('#datatable-responsive').on("click", "#berita_del", function() {
			var id = $(this).data("id");
			var mdl = $(".mod_hapus_berita");

			mdl.modal("show");
			mdl.find(".btn-danger").data("id", id);

			$('#btn_hapus').on('click', function() {
				var btn = $(this);
				btn.button('loading');

				$.ajax({
					url: ip_server + "berita/hapus_berita",
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
							$(".mod_hapus_berita").modal("hide");
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
