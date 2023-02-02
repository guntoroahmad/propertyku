<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->library("my_wanto");
		//        $this->load->model("m_produk");
		//        $this->load->model("m_gambar_produk");
		// $this->my_wanto->cek_login();
	}

	public function index()
	{
		// $NIK = $_SESSION['ses_id'];
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_properti");
		$this->load->view("temp/v_foot");
	}

	public function tipe_properti()
	{
		// $hak = $_SESSION['hak'];
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_tipe_properti");
		$this->load->view("temp/v_foot");
	}

	public function jenis_properti()
	{
		// $NIK = $_SESSION['ses_id'];
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_jenis_properti");
		$this->load->view("temp/v_foot");
	}

	public function sertifikat()
	{
		// $NIK = $_SESSION['ses_id'];
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_sertifikat");
		$this->load->view("temp/v_foot");
	}

	public function sosial_media()
	{
		// $NIK = $_SESSION['ses_id'];
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_sosialmedia");
		$this->load->view("temp/v_foot");
	}

	function tabel_properti()
	{
		$this->load->model('M_properti');
		/* $nama = $_SESSION['nama'];*/
		$query = $this->M_properti->tabel_properti();
		$data = array();
		$no = 0;
		// $status = '';
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_toko;
			$data[$no][2] = $row->nama_properti;
			$data[$no][3] = $row->nama_kota_kab;
			// $data[$no][2] = date("d-m-Y", strtotime($row->DATE_CREATE));
			$data[$no][4] = $row->tipe_properti;
			$data[$no][5] = $row->jenis_properti;
			// $data[$no][5] = $row->nama_sertifikat;
			$data[$no][6] = "Rp " . number_format($row->harga, 2, ',', '.');
			$data[$no][7] = '<button class="btn btn-success p_detail_gambar" data-id="' . $row->id_toko_produk_member . '" type="button" data-toggle="tooltip" title="Gambar Produk"><i class="fa fa-file-image"></i></button>';
			$data[$no][8] = '<button type="button" class="btn btn-warning btn-round" id="mod_properti_edit" data-id="' . $row->id_toko_produk_member . '">Ubah</button>
			<button type="button" class="btn btn-danger btn-round" id="mod_properti_del" data-id="' . $row->id_toko_produk_member . '">Hapus</button>
			<button type="button" class="btn btn-info btn-round" id="mod_properti_konfirm" data-id="' . $row->id_toko_produk_member . '">Future List</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function tabel_tipe()
	{
		$this->load->model('M_properti');
		/* $nama = $_SESSION['nama'];*/
		$query = $this->M_properti->tabel_tipe();
		$data = array();
		$no = 0;
		// $status = '';
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_properti;
			$data[$no][2] = '<button type="button" class="btn btn-warning btn-round" id="mod_tipe_edit" data-id="' . $row->id_tipe_properti . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="mod_tipe_del" data-id="' . $row->id_tipe_properti . '">Hapus</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function tabel_jenis()
	{
		$this->load->model('M_properti');
		/* $nama = $_SESSION['nama'];*/
		$query = $this->M_properti->tabel_jenis();
		$data = array();
		$no = 0;
		// $status = '';
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->jenis_properti;
			$data[$no][2] = '<button type="button" class="btn btn-warning btn-round" id="mod_jenis_edit" data-id="' . $row->id_jenis_properti . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="mod_jenis_del" data-id="' . $row->id_jenis_properti . '">Hapus</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function tabel_sertifikat()
	{
		$this->load->model('M_properti');
		/* $nama = $_SESSION['nama'];*/
		$query = $this->M_properti->tabel_sertifikat();
		$data = array();
		$no = 0;
		// $status = '';
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_sertifikat;
			$data[$no][2] = '<button type="button" class="btn btn-warning btn-round" id="mod_sertifikat_edit" data-id="' . $row->id_sertifikat . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="mod_sertifikat_del" data-id="' . $row->id_sertifikat . '">Hapus</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function tabel_sosial_media()
	{
		$this->load->model('M_properti');
		/* $nama = $_SESSION['nama'];*/
		$query = $this->M_properti->tabel_sosial_media();
		$data = array();
		$no = 0;
		// $status = '';
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_sosmed;
			$data[$no][2] = $row->url_sosmed;
			$data[$no][3] = '<button type="button" class="btn btn-warning btn-round" id="mod_sosmed_edit" data-id="' . $row->id . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="mod_sosmed_del" data-id="' . $row->id . '">Hapus</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function list_provinsi()
	{
		$this->load->model('M_properti');
		$res = $this->M_properti->list_provinsi()->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'id_prov' => $dt['id'],
				'nama_prov' => $dt['name']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function list_kotakab()
	{
		$this->load->model('M_properti');
		$id_prov = $this->input->post('id_prov');
		$res = $this->M_properti->list_kotakab($id_prov)->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'id_kotakab' => $dt['id'],
				'nama_kotakab' => $dt['name']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function list_kecamatan()
	{
		$this->load->model('M_properti');
		$id_kotakab = $this->input->post('id_kotakab');
		$res = $this->M_properti->list_kecamatan($id_kotakab)->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'id_kecamatan' => $dt['id'],
				'nama_kecamatan' => $dt['name']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function list_kelurahan()
	{
		$this->load->model('M_properti');
		$id_kecamatan = $this->input->post('id_kecamatan');
		$res = $this->M_properti->list_kelurahan($id_kecamatan)->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'id_kelurahan' => $dt['id'],
				'nama_kelurahan' => $dt['name']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function list_tipe_properti()
	{
		$this->load->model('M_properti');
		$res = $this->M_properti->tabel_tipe()->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'id_tipe_properti' => $dt['id_tipe_properti'],
				'nama_properti' => $dt['nama_properti']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function list_jenis_properti()
	{
		$this->load->model('M_properti');
		$res = $this->M_properti->tabel_jenis()->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'id_jenis_properti' => $dt['id_jenis_properti'],
				'jenis_properti' => $dt['jenis_properti']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function list_sertifikat()
	{
		$this->load->model('M_properti');
		$res = $this->M_properti->tabel_sertifikat()->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'id_sertifikat' => $dt['id_sertifikat'],
				'nama_sertifikat' => $dt['nama_sertifikat']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function list_paket()
	{
		$this->load->model('M_properti');
		$res = $this->M_properti->list_paket()->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'id_paket_promo' => $dt['id_paket_promo'],
				'nama_paket' => $dt['nama_paket'],
				'masa_aktif' => $dt['masa_aktif'],
				'harga' => $dt['harga']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function simpan_properti()
	{
		$this->load->model('M_properti');
		$iduser = $_SESSION['iduser'];
		$nama_properti = $this->input->post("nama_properti");
		$alamat = $this->input->post("alamat");
		$map_lat = $this->input->post("map_lat");
		$map_long = $this->input->post("map_long");
		$nama_provinsi = $this->input->post("nama_provinsi");
		$nama_kotakab = $this->input->post("nama_kotakab");
		$nama_kecamatan = $this->input->post("nama_kecamatan");
		$nama_kelurahan = $this->input->post("nama_kelurahan");
		$tipe_properti = $this->input->post("tipe_properti");
		$luas_tanah = $this->input->post("luas_tanah");
		$luas_bangunan = $this->input->post("luas_bangunan");
		$jenis_properti = $this->input->post("jenis_properti");
		$tahun = $this->input->post("tahun");
		$jenis_sertifikat = $this->input->post("jenis_sertifikat");
		$jumlah_kt = $this->input->post("jumlah_kt");
		$jumlah_km = $this->input->post("jumlah_km");
		$harga = $this->input->post("harga");
		$deskripsi = $this->input->post("deskripsi");
		$foto = isset($_POST["foto"]) ? $_POST["foto"] : "";

		$lebar = 500;
		$tinggi = 500;
		$sts = "";
		//        print_r($foto);exit();
		$cek_properti = $this->M_properti->cek_data_properti($nama_properti);
		if ($cek_properti->num_rows() > 0) {
			$sts = "exist";
		} else {
			$this->db->trans_start();
			$q = "SELECT * FROM m_toko_member WHERE id_member = '{$iduser}';";
			$get_id = $this->db->query($q)->result_array();
			foreach ($get_id as $row) {
				$id_toko_member = $row['id_toko_member'];
			};

			$data = array(
				"id_toko_member" => $id_toko_member,
				"nama_properti" => $nama_properti,
				"alamat" => $alamat,
				"lokasi_lat" => $map_lat,
				"lokasi_lng" => $map_long,
				"id_provinces" => $nama_provinsi,
				"id_regencies" => $nama_kotakab,
				"id_districts" => $nama_kecamatan,
				"id_villages" => $nama_kelurahan,
				"id_tipe_properti" => $tipe_properti,
				"id_jenis_properti" => $jenis_properti,
				"id_sertifikat" => $jenis_sertifikat,
				"luas_tanah" => $luas_tanah,
				"luas_bangunan" => $luas_bangunan,
				"tahun" => $tahun,
				"harga" => preg_replace("/[^0-9]/", "", $harga),
				"jml_kt" => $jumlah_kt,
				"jml_km" => $jumlah_km,
				"deskripsi" => $deskripsi,
				"create_at" => date("Y-m-d H:i:s")
			);

			// print_r($data);exit();
			$id_properti = $this->M_properti->simpan_properti($data);

			for ($i = 0; $i < count($foto); $i++) {
				//img
				$base64_gambar = base64_decode(str_replace("data:image/jpeg;base64,", "", $foto[$i]));
				$im = imagecreatefromstring($base64_gambar);
				$img = $this->my_wanto->resize_image($im, $lebar, $tinggi);
				//end compress
				$lokasi = "fileapp/propertyku/produk/" . $nama_kelurahan . "-$tipe_properti.$i-" . date('U') . ".jpg";
				$lokasi_real = "../" . $lokasi;
				imagejpeg($img, $lokasi_real, 90);
				$sts = "";
				$data_det = array(
					"id_toko_produk_member" => $id_properti,
					"file_url" => $lokasi,
					"create_at" => date("Y-m-d H:i:s")
				);
				//                print_r($data_det);
				$query_det = $this->M_properti->simpan_properti_img($data_det);
			}
			//            exit();
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				$sts = "Gagal Simpan Data";
			} else {
				$sts = "ok";
			}
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function simpan_tipe()
	{
		$this->load->model('m_properti');
		$nama_tipe = $this->input->post('nama_tipe');
		$data = array();

		$data = array(
			"nama_properti" => $nama_tipe,
			"create_at" => date("Y-m-d H:i:s")
		);
		// print_r($data);exit();
		$query = $this->m_properti->simpan_tipe($data);

		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function simpan_jenis()
	{
		$this->load->model('m_properti');
		$nama_jenis = $this->input->post('nama_jenis');
		$data = array();

		$data = array(
			"jenis_properti" => $nama_jenis,
			"create_at" => date("Y-m-d H:i:s")
		);
		// print_r($data);exit();
		$query = $this->m_properti->simpan_jenis($data);

		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function simpan_sertifikat()
	{
		$this->load->model('m_properti');
		$nama_sertifikat = $this->input->post('nama_sertifikat');
		$data = array();

		$data = array(
			"nama_sertifikat" => $nama_sertifikat,
			"create_at" => date("Y-m-d H:i:s")
		);
		// print_r($data);exit();
		$query = $this->m_properti->simpan_sertifikat($data);

		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function simpan_sosmed()
	{
		$this->load->model('m_properti');
		$nama_sosmed = $this->input->post('nama_sosmed');
		$url_sosmed = $this->input->post('url_sosmed');
		$data = array();

		$data = array(
			"nama_sosmed" => $nama_sosmed,
			"url_sosmed" => $url_sosmed,
			"create_at" => date("Y-m-d H:i:s")
		);
		// print_r($data);exit();
		$query = $this->m_properti->simpan_sosmed($data);

		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function baca_properti_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_properti->get_properti_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_toko_produk_member;
			$data[1] = $row->nama_properti;
			$data[2] = $row->alamat;
			$data[3] = $row->lokasi_lat;
			$data[4] = $row->lokasi_lng;
			$data[5] = $row->id_provinces;
			$data[6] = $row->id_regencies;
			$data[7] = $row->id_districts;
			$data[8] = $row->id_villages;
			$data[9] = $row->id_tipe_properti;
			$data[10] = $row->id_jenis_properti;
			$data[11] = $row->id_sertifikat;
			$data[12] = $row->luas_tanah;
			$data[13] = $row->luas_bangunan;
			$data[14] = $row->tahun;
			$data[15] = $row->harga;
			// $data[16] = $row->nama_developer;
			$data[17] = $row->jml_kt;
			$data[18] = $row->jml_km;
			$data[19] = $row->deskripsi;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function baca_menu_edit_gambar()
	{
		$this->load->model('M_gambar_properti');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_gambar_properti->get_data_edit($id_edit);
		$data = array();
		foreach ($query->result() as $key => $row) {
			$data[$key][0] = $row->id_produk_foto;
			// $data[$key][1] = "data:image/jpeg;base64," . @base64_encode(file_get_contents($row->file_url));
			$data[$key][1] = "data:image/jpeg;base64," .  @base64_encode(file_get_contents("http://localhost/" . $row->file_url));
		}
		$this->output->set_content_type('application/json')
			->set_output(json_encode($data));
	}

	function baca_tipe_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_properti->get_tipe_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_tipe_properti;
			$data[1] = $row->nama_properti;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function baca_jenis_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_properti->get_jenis_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_jenis_properti;
			$data[1] = $row->jenis_properti;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function baca_sertifikat_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_properti->get_sertifikat_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_sertifikat;
			$data[1] = $row->nama_sertifikat;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function baca_sosmed_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_properti->get_sosmed_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id;
			$data[1] = $row->nama_sosmed;
			$data[2] = $row->url_sosmed;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function simpan_properti_edit()
	{
		$this->load->model('M_properti');
		// $iduser = $_SESSION['iduser'];
		$id_edit = $this->input->post("id_edit");
		$nama_properti = $this->input->post("ed_nama_properti");
		$alamat = $this->input->post("ed_alamat");
		$map_lat = $this->input->post("ed_map_lat");
		$map_long = $this->input->post("ed_map_long");
		$nama_provinsi = $this->input->post("ed_nama_provinsi");
		$nama_kotakab = $this->input->post("ed_nama_kotakab");
		$nama_kecamatan = $this->input->post("ed_nama_kecamatan");
		$nama_kelurahan = $this->input->post("ed_nama_kelurahan");
		$tipe_properti = $this->input->post("ed_tipe_properti");
		$luas_tanah = $this->input->post("ed_luas_tanah");
		$luas_bangunan = $this->input->post("ed_luas_bangunan");
		$jenis_properti = $this->input->post("ed_jenis_properti");
		$tahun = $this->input->post("ed_tahun");
		$jenis_sertifikat = $this->input->post("ed_jenis_sertifikat");
		$jumlah_kt = $this->input->post("ed_jumlah_kt");
		$jumlah_km = $this->input->post("ed_jumlah_km");
		$harga = $this->input->post("ed_harga");
		$deskripsi = $this->input->post("ed_deskripsi");
		$sts = "";
		//    print_r($id_edit);exit();
		$cek_properti = $this->M_properti->cek_properti_edit(addslashes($nama_properti), $id_edit);
		if ($cek_properti->num_rows() > 0) {
			$sts = "Nama Property sudah ada";
		} else {
			$data = array(
				"nama_properti" => $nama_properti,
				"alamat" => $alamat,
				"lokasi_lat" => $map_lat,
				"lokasi_lng" => $map_long,
				"id_provinces" => $nama_provinsi,
				"id_regencies" => $nama_kotakab,
				"id_districts" => $nama_kecamatan,
				"id_villages" => $nama_kelurahan,
				"id_tipe_properti" => $tipe_properti,
				"id_jenis_properti" => $jenis_properti,
				"id_sertifikat" => $jenis_sertifikat,
				"luas_tanah" => $luas_tanah,
				"luas_bangunan" => $luas_bangunan,
				"tahun" => $tahun,
				"harga" => preg_replace("/[^0-9]/", "", $harga),
				"jml_kt" => $jumlah_kt,
				"jml_km" => $jumlah_km,
				"deskripsi" => $deskripsi,
				"update_at" => date("Y-m-d H:i:s")
			);

			// print_r($data);exit();
			$query = $this->M_properti->update_properti($id_edit, $data);
			if ($query) {
				$sts = "ok";
			} else {
				$sts = "Gagal";
			}
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function ubah_foto()
	{
		$this->load->model('M_gambar_properti');
		$this->load->model('M_properti');
		$id_edit_properti = $this->input->post("id_edit");
		$id_properti = $this->input->post("id_properti2");
		// print_r($id_properti);return false;
		$foto = isset($_POST["foto2"]) ? $_POST["foto2"] : "";
		$lebar = 500;
		$tinggi = 500;
		$sts = "";
		//    print_r($foto);
		$this->db->trans_start();
		$this->hapus_foto($id_edit_properti);
		for ($i = 0; $i < count($foto); $i++) {
			//img
			$base64_gambar = base64_decode(str_replace("data:image/jpeg;base64,", "", $foto[$i]));
			$im = imagecreatefromstring($base64_gambar);
			$img = $this->my_wanto->resize_image($im, $lebar, $tinggi);
			// $lokasi = "file/property/property_edit_" . $i . "-" . date('U') . ".jpg";
			$lokasi = "fileapp/propertyku/produk/property_edit_" . $i . "-" . date('U') . ".jpg";
			$lokasi_real = "../" . $lokasi;
			imagejpeg($img, $lokasi_real, 90);
			// imagejpeg($img, $lokasi, 90);
			$sts = "";
			$data_det = array(
				"id_toko_produk_member" => $id_edit_properti,
				"file_url" => $lokasi,
				"create_at" => date("Y-m-d H:i:s")
			);
			//            print_r($data_det);
			$this->M_properti->simpan_properti_img($data_det);
			
		}
		//        exit();
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$sts = "Gagal Simpan Data";
		} else {
			$sts = "ok";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function simpan_tipe_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$nama_tipe = $this->input->post('ed_nama_tipe');
		$data = array();

		$data = array(
			"nama_properti" => $nama_tipe,
			"update_at" => date("Y-m-d H:i:s")
		);

		$cek = $this->M_properti->cek_tipe_edit(addslashes($nama_tipe), $id_edit)->num_rows();
		$sts = "Nama Tipe sudah ada";
		if ($cek == 0) {
			$query = $this->M_properti->update_tipe($id_edit, $data);
			if ($query) {
				$sts = "ok";
			} else {
				$sts = "Gagal Simpan Data";
			}
		}
		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function simpan_jenis_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$nama_jenis = $this->input->post('ed_nama_jenis');
		$data = array();

		$data = array(
			"jenis_properti" => $nama_jenis,
			"update_at" => date("Y-m-d H:i:s")
		);

		$cek = $this->M_properti->cek_jenis_edit(addslashes($nama_jenis), $id_edit)->num_rows();
		$sts = "Nama Jenis sudah ada";
		if ($cek == 0) {
			$query = $this->M_properti->update_jenis($id_edit, $data);
			if ($query) {
				$sts = "ok";
			} else {
				$sts = "Gagal Simpan Data";
			}
		}
		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function simpan_sertifikat_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$nama_sertifikat = $this->input->post('ed_nama_sertifikat');
		$data = array();

		$data = array(
			"nama_sertifikat" => $nama_sertifikat,
			"update_at" => date("Y-m-d H:i:s")
		);

		$cek = $this->M_properti->cek_sertifikat_edit(addslashes($nama_sertifikat), $id_edit)->num_rows();
		$sts = "Nama Sertifikat sudah ada";
		if ($cek == 0) {
			$query = $this->M_properti->update_sertifikat($id_edit, $data);
			if ($query) {
				$sts = "ok";
			} else {
				$sts = "Gagal Simpan Data";
			}
		}
		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function simpan_sosmed_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$url_sosmed = $this->input->post('ed_url_sosmed');
		$data = array();

		$data = array(
			"url_sosmed" => $url_sosmed,
			"update_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_properti->update_sosmed($id_edit, $data);
		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	function hapus_foto($id)
	{
		$this->load->model("M_gambar_properti");
		$query = $this->M_gambar_properti->get_data_edit($id);
		foreach ($query->result() as $row) {
			@unlink($row->file_url);
		}
		$hapus = $this->M_gambar_properti->delete_data($id);
		return $hapus;
	}

	public function hapus_tipe()
	{
		$this->load->model('M_properti');
		$id_hapus = $this->input->post("id_hapus");
		$data = array(
			"delete_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_properti->hapus_tipe($id_hapus, $data);
		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	public function hapus_jenis()
	{
		$this->load->model('M_properti');
		$id_hapus = $this->input->post("id_hapus");
		$data = array(
			"delete_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_properti->hapus_jenis($id_hapus, $data);
		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	public function hapus_sertifikat()
	{
		$this->load->model('M_properti');
		$id_hapus = $this->input->post("id_hapus");
		$data = array(
			"delete_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_properti->hapus_sertifikat($id_hapus, $data);
		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	public function hapus_sosmed()
	{
		$this->load->model('M_properti');
		$id_hapus = $this->input->post("id_hapus");
		$data = array(
			"delete_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_properti->hapus_sosmed($id_hapus, $data);
		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	public function hapus_properti()
	{
		$this->load->model('M_properti');
		$id_hapus = $this->input->post("id_hapus");
		$data = array(
			"delete_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_properti->hapus_properti($id_hapus, $data);
		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	public function konfirm_properti()
	{
		$this->load->model('M_properti');
		$id_toko_produk_member = $this->input->post("id_toko_produk_member");
		$paket_promo = $this->input->post("paket_promo");
		$waktu_aktif = $this->input->post("waktu_aktif");
		$qty_paket = $this->input->post("qty_paket");

		$q = "SELECT masa_aktif FROM m_paket_promo WHERE id_paket_promo = '{$paket_promo}';";
		$get_id = $this->db->query($q)->result_array();
		foreach ($get_id as $row) {
			$masa_aktif = $row['masa_aktif'];
		};

		$data = array(
			"id_paket_promo" => $paket_promo,
			"waktu_aktif_promo" => $waktu_aktif,
			"lama_masa_aktif_promo" => $masa_aktif * $qty_paket,
			"qty_paket" => $qty_paket,
			"waktu_konfirmasi" => date("Y-m-d H:i:s"),
			"status_verifikasi" => 1,
			"create_at" => date("Y-m-d H:i:s"),
			"id_member" => $_SESSION['iduser']
		);

		/* print_r($data);
		exit(); */
		$id_toko_promo = $this->M_properti->simpan_toko_produk($data);

		$data_iklan_slot = array(
			"id_toko_promo" => $id_toko_promo,
			"id_produk_toko_member" => $id_toko_produk_member,
			"create_at" => date("Y-m-d H:i:s"),
			"id_member_last" => $_SESSION['iduser'],
		);

		$query = $this->M_properti->simpan_iklan($data_iklan_slot);

		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}

		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}
}
