<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
	}

	public function index()
	{
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_future_list");
		$this->load->view("temp/v_foot");
	}

	function tabel_member_list()
	{
		$this->load->model('M_member');
		/* $nama = $_SESSION['nama'];*/
		$query = $this->M_member->tabel_member_list();
		$data = array();
		$no = 0;
		// $status = '';
		foreach ($query->result() as $row) {
			if ($row->status_verifikasi == 0) {
				$status = '<button type="button" class="btn btn-warning btn-round">Pending</button>';
			} else if ($row->status_verifikasi == 1) {
				$status = '<button type="button" class="btn btn-success btn-round">Sukses</button>';
			} else if ($row->status_verifikasi == 2) {
				$status = '<button type="button" class="btn btn-danger btn-round">Reject</button>';
			} else {
				$status = '<button type="button" class="btn btn-info btn-round" id="mod_properti_konfirm" data-id="' . $row->id_toko_promo . '">Konfirmasi</button>';
			}
			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_toko;
			$data[$no][2] = $row->nama_properti;
			$data[$no][3] = $row->tipe_properti;
			$data[$no][4] = $row->jenis_properti;
			$data[$no][5] = "Rp " . number_format($row->harga, 2, ',', '.');
			$data[$no][6] = $status;
			$no++;
		}
		// print_r($data);
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function konfirm_listing_member()
	{
		$this->load->model('M_member');
		// $id_member = $_SESSION['iduser'];
		$id_toko_promo = $this->input->post("id_toko_promo");
		$data = array();

		$data = array(
			"waktu_konfirmasi" => date("Y-m-d H:i:s"),
			"status_verifikasi" => 1,
			"update_at" => date("Y-m-d H:i:s")
		);
		/* print_r($id_toko_promo);
		return false; */

		$query = $this->M_member->update_future_list($id_toko_promo, $data);
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
