<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
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
		// $this->load->view('welcome_message');
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_berita");
		$this->load->view("temp/v_foot");
	}

	function tabel_berita()
	{
		$this->load->model('M_berita');
		$query = $this->M_berita->tabel_berita();
		$data = array();
		$no = 0;
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->judul;
			$data[$no][2] = $row->penulis;
			$data[$no][3] = $row->status;
			$data[$no][4] = '<button class="btn btn-success p_detail_gambar" data-id="' . $row->id_berita . '" type="button" data-toggle="tooltip" title="Gambar Produk"><i class="fa fa-file-image"></i></button>';
			if ($row->status == 'draft') {
				$data[$no][5] = '<button type="button" class="btn btn-warning btn-round" id="berita_edit" data-id="' . $row->id_berita . '">Ubah</button>
				<button type="button" class="btn btn-danger btn-round" id="berita_del" data-id="' . $row->id_berita . '">Hapus</button>';
			} else {
				$data[$no][5] = '<button type="button" class="btn btn-warning btn-round" id="berita_edit" data-id="' . $row->id_berita . '">Ubah</button>';
			}
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function simpan_berita()
	{
		$this->load->model('m_berita');
		$judul_berita = $this->input->post('judul_berita');
		$nama_penulis = $this->input->post('nama_penulis');
		$status_publish = $this->input->post('status_publish');
		$isi_berita = $this->input->post('isi_berita');
		$tgl_publish = $this->input->post('tgl_publish');
		$foto = isset($_POST["foto"]) ? $_POST["foto"] : "";

		$lebar = 500;
		$tinggi = 500;
		$sts = "";
		$data = array();

		$this->db->trans_start();
		$data = array(
			"judul" => $judul_berita,
			"isi" => $isi_berita,
			"penulis" => $nama_penulis,
			"status" => $status_publish,
			"publish_at" => $tgl_publish
		);
		// print_r($data);exit();
		$id_berita = $this->m_berita->simpan_berita($data);

		for ($i = 0; $i < count($foto); $i++) {
			//img
			$base64_gambar = base64_decode(str_replace("data:image/jpeg;base64,", "", $foto[$i]));
			$im = imagecreatefromstring($base64_gambar);
			$img = $this->my_wanto->resize_image($im, $lebar, $tinggi);
			//end compress
			// LIVE FILE UPLOAD
			/* $lokasi = "fileapp/propertyku/berita/" . "cover-$id_berita.$i-" . date('U') . ".jpg";
			$lokasi_real = "../" . $lokasi;
			imagejpeg($img, $lokasi_real, 90); */
			// LOCAL FILE UPLOAD
			$lokasi = "file/berita/" . "cover_$id_berita-" . date('U') . ".jpg";
			imagejpeg($img, $lokasi, 90);
			$sts = "";
			$data_det = array(
				"id_berita" => $id_berita,
				"file_url" => $lokasi,
				"create_at" => date("Y-m-d H:i:s")
			);
			//                print_r($data_det);
			$query_det = $this->m_berita->simpan_berita_img($data_det);
		}
		//            exit();
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

	function baca_berita_edit()
	{
		$this->load->model('M_berita');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_berita->get_berita_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_berita;
			$data[1] = $row->judul;
			$data[2] = $row->isi;
			$data[3] = $row->penulis;
			$data[4] = $row->status;
			$data[5] = date('Y-m-d', strtotime($row->publish_at));
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function baca_menu_edit_gambar()
	{
		$this->load->model('M_gambar_properti');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_gambar_properti->get_cover_edit($id_edit);
		$data = array();
		foreach ($query->result() as $key => $row) {
			$data[$key][0] = $row->id;
			$data[$key][1] = "data:image/jpeg;base64," . @base64_encode(file_get_contents($row->file_url));
			// $data[$key][1] = "data:image/jpeg;base64," .  @base64_encode(file_get_contents("https://propertyku.co/" . $row->file_url));
		}
		$this->output->set_content_type('application/json')
			->set_output(json_encode($data));
	}

	function simpan_berita_edit()
	{
		$this->load->model('M_berita');
		// $iduser = $_SESSION['iduser'];
		$id_edit = $this->input->post("id_edit");
		$judul_berita = $this->input->post('ed_judul_berita');
		$nama_penulis = $this->input->post('ed_nama_penulis');
		$status_publish = $this->input->post('ed_status_publish');
		$isi_berita = $this->input->post('ed_isi_berita');
		$tgl_publish = $this->input->post('ed_tgl_publish');
		$sts = "";
		/* print_r($id_edit);
		exit(); */
		$cek_berita = $this->M_berita->cek_berita_edit(addslashes($judul_berita), $id_edit);
		if ($cek_berita->num_rows() > 0) {
			$sts = "Judul berita sudah ada";
		} else {
			$data = array(
				"judul" => $judul_berita,
				"isi" => $isi_berita,
				"penulis" => $nama_penulis,
				"status" => $status_publish,
				"publish_at" => $tgl_publish
			);

			// print_r($data);exit();
			$query = $this->M_berita->update_berita($id_edit, $data);
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
		$id_edit_berita = $this->input->post("id_edit");
		$id = $this->input->post("id_properti2");
		/* print_r($id_edit_properti . '- ' . $id_properti);
		return false; */
		$foto = isset($_POST["foto2"]) ? $_POST["foto2"] : "";
		$lebar = 500;
		$tinggi = 500;
		$sts = "";
		//    print_r($foto);
		$this->db->trans_start();
		$this->hapus_foto($id_edit_berita, $id);
		for ($i = 0; $i < count($foto); $i++) {
			//img
			$base64_gambar = base64_decode(str_replace("data:image/jpeg;base64,", "", $foto[$i]));
			$im = imagecreatefromstring($base64_gambar);
			$img = $this->my_wanto->resize_image($im, $lebar, $tinggi);
			// LIVE FILE UPLOAD
			$lokasi = "fileapp/propertyku/berita/cover_edit_" . $i . "-" . date('U') . ".jpg";
			$lokasi_real = "../" . $lokasi;
			imagejpeg($img, $lokasi_real, 90);
			// LOCAL FILE UPLOAD
			/* $lokasi = "file/berita/cover_edit_" . $id_edit_berita . "-" . date('U') . ".jpg";
			imagejpeg($img, $lokasi, 90); */
			$sts = "";
			$data_det = array(
				"id_berita" => $id_edit_berita,
				"file_url" => $lokasi,
				"create_at" => date("Y-m-d H:i:s")
			);
			//            print_r($data_det);
			$this->M_gambar_properti->set_cover_data($data_det);
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

	function hapus_foto($id_edit_berita, $id)
	{
		$this->load->model("M_gambar_properti");
		$query = $this->M_gambar_properti->get_cover_edit($id_edit_berita);
		foreach ($query->result() as $row) {
			@unlink($row->file_url);
		}
		$hapus = $this->M_gambar_properti->delete_cover_data($id);
		return $hapus;
	}

	/* public function hapus_berita()
	{
		$this->load->model('M_berita');
		$id_hapus = $this->input->post("id_hapus");
		$data = array(
			"status" => 'unpublish',
			// "publish_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_berita->hapus_berita($id_hapus, $data);
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
	} */

	public function hapus_berita()
	{
		$this->load->model('M_berita');
		$this->load->model("M_gambar_properti");
		$id_hapus = $this->input->post("id_hapus");
		$query = $this->M_berita->hapus_berita($id_hapus);
		$sts = "";
		if ($query) {
			$sts = "ok";
			$query2 = $this->M_gambar_properti->get_cover_edit($id_hapus);
			foreach ($query2->result() as $row) {
				@unlink($row->file_url);
			}
		} else {
			$sts = "Gagal hapus data";
		}
		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}
}
