<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
		// $NIK = $_SESSION['ses_id'];
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_produk");
		$this->load->view("temp/v_foot");
	}

	public function laporan()
	{
		$this->load->view("temp/v_head");
		$this->load->view('v_laporan');
	}

	function tabel_tipe()
	{
		$this->load->model('M_produk');
		$query = $this->M_produk->tabel_tipe();
		$data = array();
		$no = 0;
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->NAMA_BARANG;
			/* $data[$no][2] = '<a href="#" style="color:blue;" id="mod_tambah_stok" data-id=' . $row->ID . ' data-jumlah=' . $row->JUMLAH . ' data-jenis=' . $row->JENIS_SATUAN . '>' . $row->JUMLAH . '</a>';
			$data[$no][3] = $row->JENIS_SATUAN;
			$data[$no][4] = $row->STATUS_BARANG; */
			$data[$no][2] = '<button type="button" class="btn btn-warning btn-round" id="tipe_edit" data-id="' . $row->ID . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="tipe_del" data-id="' . $row->ID . '">Hapus</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function tabel_barang_user()
	{
		$this->load->model('M_produk');
		$query = $this->M_produk->tabel_barang();
		$data = array();
		$no = 0;
		foreach ($query->result() as $row) {

			/* $data[$no][0] = '<input type="checkbox" id="chkbx" class="chkbx" name="chkbx[]" value="' . $row->ID . '">';
			$data[$no][1] = $row->NAMA_BARANG;
			$data[$no][2] = $row->JUMLAH;
			$data[$no][3] = $row->JENIS_SATUAN;
			$data[$no][4] = '<div class="form-row">
								<div class="form-group">
									<input type="text" class="form-control input_jum" id="input_jum" name="input_jum[]" placeholder="Jumlah" autocomplete="off">
								</div>
							</div>';
			$data[$no][5] = '<div class="form-group">
								<select id="jenis_satuan" name="jenis_satuan[]" class="form-control jenis_satuan">
									<option value="" selected>Pilih Jenis Satuan</option>
									<option value="Lembar">Lembar</option>
									<option value="Buku">Buku</option>
									<option value="Map">Map</option>
								</select>
							</div>'; */

			$data[$no][0] = $row->NAMA_BARANG;
			$data[$no][1] = $row->JUMLAH;
			$data[$no][2] = $row->JENIS_SATUAN;

			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	public function simpan_stok_barang()
	{
		$this->load->model('M_produk');
		$id_user = $_SESSION['iduser'];
		// $id_user = 1;
		$id_stok_barang = $this->input->post("id_stok_barang");
		$jumlah = $this->input->post("jum_stok_barang");
		$jenis_satuan = $this->input->post("jenis_stok_barang");
		$jum_tambah_stok = $this->input->post("jum_tambah_stok");

		$this->db->trans_start();
		$data = array(
			"JUMLAH" => $jumlah + $jum_tambah_stok,
			"ID_USER" => $id_user
		);
		// print_r($data);
		$this->M_produk->upd_stok_barang($id_stok_barang, $data);
		
		$data_stok = array(
			"ID_BARANG" => $id_stok_barang,
			"JUMLAH_UPD" => $jum_tambah_stok,
			"STOK" => $jumlah + $jum_tambah_stok,
			"JENIS_SATUAN" => $jenis_satuan,
			"TIPE_BARANG" => 1,
			"TANGGAL_UPD" => date("Y-m-d H:i:s")
		);
		// print_r($data_stok);exit();
		$this->M_produk->set_stok_baru($data_stok);

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

	public function simpan_barang()
	{
		$this->load->model('M_produk');
		// $id_user = $_SESSION['ses_id'];
		$id_user = 1;
		$nama_barang = $this->input->post("nama_barang");
		$jumlah = $this->input->post("jumlah");
		$jenis_satuan = $this->input->post("jenis_satuan");
		$status_barang = $this->input->post("status_barang");

		$this->db->trans_start();
		$data = array(
			"NAMA_BARANG" => $nama_barang,
			"JUMLAH" => $jumlah,
			"JENIS_SATUAN" => $jenis_satuan,
			"STATUS_BARANG" => $status_barang,
			"ID_USER" => $id_user,
			"DATE_CREATE" => date("Y-m-d H:i:s")
		);
		$id_barang = $this->M_produk->set_barang_baru($data);

		$data_stok = array(
			"ID_BARANG" => $id_barang,
			"JUMLAH_UPD" => $jumlah,
			"STOK" => $jumlah,
			"JENIS_SATUAN" => $jenis_satuan,
			"TIPE_BARANG" => 2,
			"TANGGAL_UPD" => date("Y-m-d H:i:s")
		);
		// print_r($data_stok);exit();
		$this->M_produk->set_stok_baru($data_stok);

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

	function baca_barang_edit()
	{
		$this->load->model('M_produk');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_produk->get_barang_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->ID;
			$data[1] = $row->NAMA_BARANG;
			$data[2] = $row->JUMLAH;
			$data[3] = $row->JENIS_SATUAN;
			$data[4] = $row->STATUS_BARANG;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function simpan_barang_edit()
	{
		$this->load->model('M_produk');
		$id_edit = $this->input->post("id_edit");
		// $id_user = $_SESSION['ses_id'];
		$id_user = 1;
		$nama_barang = $this->input->post("ed_nama_barang");
		// $jumlah = $this->input->post("ed_jumlah");
		$jenis_satuan = $this->input->post("ed_jenis_satuan");
		$status_barang = $this->input->post("ed_status_barang");

		$data = array(
			"NAMA_BARANG" => $nama_barang,
			// "JUMLAH" => $jumlah,
			"JENIS_SATUAN" => $jenis_satuan,
			"STATUS_BARANG" => $status_barang,
			"ID_USER" => $id_user,
			"DATE_CREATE" => date("Y-m-d H:i:s")
		);
		//    print_r($data);exit();
		$cek = $this->M_produk->cek_barang_edit(addslashes($nama_barang), $id_edit)->num_rows();
		$sts = "Nama Barang sudah ada";
		if ($cek == 0) {
			$query = $this->M_produk->update_barang($id_edit, $data);
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

	public function hapus_barang()
	{
		$this->load->model('M_produk');
		$id_hapus = $this->input->post("id_hapus");
		$query = $this->M_produk->hapus_barang($id_hapus);
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

	public function push_stok_baru()
	{
		$this->load->model('M_produk');
		$query = $this->M_produk->push_stok_baru();
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

	function list_barang()
	{
		$this->load->model('M_produk');
		$res = $this->M_produk->tabel_barang()->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'ID' => $dt['ID'],
				'NAMA_BARANG' => $dt['NAMA_BARANG'],
				'JUMLAH' => $dt['JUMLAH']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function cek_stok_barang()
	{
		$this->load->model('M_produk');
		$id = $this->input->post("id");
		$query = $this->M_produk->cek_stok_barang($id);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->JUMLAH;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
