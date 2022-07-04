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
			if ($row->status == 'draft') {
				$data[$no][4] = '<button type="button" class="btn btn-warning btn-round" id="berita_edit" data-id="' . $row->id_berita . '">Ubah</button>
				<button type="button" class="btn btn-danger btn-round" id="berita_del" data-id="' . $row->id_berita . '">Hapus</button>';
			} else {
				$data[$no][4] = '<button type="button" class="btn btn-warning btn-round" id="berita_edit" data-id="' . $row->id_berita . '">Ubah</button>';
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
		$data = array();

		$data = array(
			"judul" => $judul_berita,
			"isi" => $isi_berita,
			"penulis" => $nama_penulis,
			"status" => $status_publish,
			"publish_at" => $tgl_publish
		);
		// print_r($data);exit();
		$query = $this->m_berita->simpan_berita($data);

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
		$id_hapus = $this->input->post("id_hapus");
		$query = $this->M_berita->hapus_berita($id_hapus);
		$sts = "";
		if ($query) {
			$sts = "ok";
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
