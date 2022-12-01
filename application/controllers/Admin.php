<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
	}

	public function user()
	{
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_user");
		$this->load->view("temp/v_foot");
	}

	public function bank()
	{
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_bank");
		$this->load->view("temp/v_foot");
	}

	public function paket()
	{
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_paket_promo");
		$this->load->view("temp/v_foot");
	}

	public function toko_member()
	{
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_toko_member");
		$this->load->view("temp/v_foot");
	}

	public function jasa(){
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view("v_jasa");
		$this->load->view("temp/v_foot");
	}

	function tabel_user()
	{
		$this->load->model('M_admin');
		$query = $this->M_admin->tabel_user();
		$data = array();
		$no = 0;
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama;
			$data[$no][2] = $row->email;
			$data[$no][3] = $row->hak;
			$data[$no][4] = '<button type="button" class="btn btn-warning btn-round" id="user_edit" data-id="' . $row->id_member . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="user_del" data-id="' . $row->id_member . '">Hapus</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function tabel_bank()
	{
		$this->load->model('M_admin');
		$query = $this->M_admin->tabel_bank();
		$data = array();
		$no = 0;
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_bank;
			$data[$no][2] = '<button type="button" class="btn btn-warning btn-round" id="bank_edit" data-id="' . $row->id_bank . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="bank_del" data-id="' . $row->id_bank . '">Hapus</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function tabel_paket()
	{
		$this->load->model('M_admin');
		$query = $this->M_admin->tabel_paket();
		$data = array();
		$no = 0;
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_paket;
			$data[$no][2] = "Rp " . number_format($row->harga, 2, ',', '.');
			$data[$no][3] = $row->masa_aktif;
			$data[$no][4] = $row->deskripsi;
			$data[$no][5] = '<button type="button" class="btn btn-warning btn-round" id="paket_edit" data-id="' . $row->id_paket_promo . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="paket_del" data-id="' . $row->id_paket_promo . '">Hapus</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function tabel_toko()
	{
		$this->load->model('M_admin');
		$query = $this->M_admin->tabel_toko();
		$data = array();
		$no = 0;
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_toko;
			$data[$no][2] = $row->alamat;
			$data[$no][3] = '<button type="button" class="btn btn-warning btn-round" id="toko_edit" data-id="' . $row->id_toko_member . '">Ubah</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	public function tampil_kordinator()
	{
		$this->load->model('M_admin');
		$res = $this->M_admin->tampil_kordinator()->result_array();
		$arr = array();
		foreach ($res as $dt) {
			$arr[] = array(
				'ID' => $dt['ID'],
				'USERNAME' => $dt['USERNAME']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	public function tampil_pic()
	{
		$this->load->model('M_admin');
		$rm = $this->input->post('rm');
		$res = $this->M_admin->tampil_pic($rm)->result_array();
		$arr = array();
		foreach ($res as $dt) {
			if ($dt['PIC_AMBIL'] == '') {
				$pic_ambil = '-';
			} else {
				$pic_ambil = $dt['PIC_AMBIL'];
			}

			if ($dt['DATE_AMBIL'] == '') {
				$tgl_ambil = '-';
			} else {
				$tgl_ambil = date('d-M-Y H:i:s', strtotime($dt['DATE_AMBIL']));
			}

			$arr[] = array(
				'pic_ambil' => $pic_ambil,
				'tgl_ambil' => $tgl_ambil
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	function tabel_jasa()
	{
		$this->load->model('M_properti');
		/* $nama = $_SESSION['nama'];*/
		$query = $this->M_properti->tabel_jasa();
		$data = array();
		$no = 0;
		// $status = '';
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_jasa;
			$data[$no][2] = '<button type="button" class="btn btn-warning btn-round" id="mod_jasa_edit" data-id="' . $row->id_jasa . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="mod_jasa_del" data-id="' . $row->id_jasa . '">Hapus</button>';
			$no++;
		}
		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	public function simpan_user()
	{
		$this->load->model('M_admin');
		$nama_user = addslashes($this->input->post("nama_user"));
		$password_user = addslashes($this->input->post("password_user"));
		$hak_user = $this->input->post("hak_user");
		$password = hash('sha256', $password_user);
		$email = $this->input->post("email");

		$this->db->trans_start();

		$data = array(
			"nama" => $nama_user,
			"password" => $password,
			"hak" => $hak_user,
			"email" => $email,
			"create_at" => date("Y-m-d H:i:s")
		);

		// print_r($data);exit();
		$this->M_admin->set_user_baru($data);

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

	public function simpan_bank()
	{
		$this->load->model('M_admin');
		$nama_bank = addslashes($this->input->post("nama_bank"));

		$this->db->trans_start();
		$data = array(
			"nama_bank" => $nama_bank,
			"create_at" => date("Y-m-d H:i:s")
		);

		// print_r($data);exit();
		$this->M_admin->set_bank_baru($data);

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

	public function simpan_paket()
	{
		$this->load->model('M_admin');
		$nama_paket = addslashes($this->input->post("nama_paket"));
		$harga_paket = $this->input->post("harga_paket");
		$masa_aktif = $this->input->post("masa_aktif");
		$deskripsi = $this->input->post("deskripsi");
		$id_admin = $_SESSION['iduser'];

		$this->db->trans_start();
		$data = array(
			"nama_paket" => $nama_paket,
			"masa_aktif" => $masa_aktif,
			"harga" => preg_replace("/[^0-9]/", "", $harga_paket),
			"deskripsi" => $deskripsi,
			"id_admin" => $id_admin,
			"create_at" => date("Y-m-d H:i:s")
		);

		// print_r($data);exit();
		$this->M_admin->set_paket_baru($data);

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

	public function simpan_toko()
	{
		$this->load->model('M_admin');
		$id_member = $_SESSION['iduser'];
		$nama_toko = addslashes($this->input->post("nama_toko"));
		$long = $this->input->post("long_toko");
		$lat = $this->input->post("lat_toko");
		$alamat = $this->input->post("alamat_toko");

		$this->db->trans_start();

		$data = array(
			"id_member" => $id_member,
			"nama_toko" => $nama_toko,
			"lokasi_lng" => $long,
			"lokasi_lat" => $lat,
			"alamat" => $alamat,
			"create_at" => date("Y-m-d H:i:s")
		);

		// print_r($data);exit();
		$this->M_admin->set_toko_baru($data);

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

	function simpan_jasa()
	{
		$this->load->model('m_properti');
		$nama_jasa = $this->input->post('nama_jasa');
		$data = array();

		$data = array(
			"nama_jasa" => $nama_jasa
		);
		// print_r($data);exit();
		$query = $this->m_properti->simpan_jasa($data);

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

	function baca_user_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_admin->get_user_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_member;
			$data[1] = $row->nama;
			$data[2] = $row->password;
			$data[3] = $row->email;
			$data[4] = $row->hak;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function baca_bank_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_admin->get_bank_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_bank;
			$data[1] = $row->nama_bank;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function baca_paket_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_admin->get_paket_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_paket_promo;
			$data[1] = $row->nama_paket;
			$data[2] = $row->masa_aktif;
			$data[3] = $row->harga;
			$data[4] = $row->deskripsi;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function baca_toko_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_admin->get_toko_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_toko_member;
			$data[1] = $row->nama_toko;
			$data[2] = $row->lokasi_lng;
			$data[3] = $row->lokasi_lat;
			$data[4] = $row->alamat;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function baca_jasa_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_properti->get_jasa_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_jasa;
			$data[1] = $row->nama_jasa;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function simpan_user_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$nama = addslashes($this->input->post("ed_nama_user"));
		$password_user = addslashes($this->input->post("ed_password_user"));
		$password = hash('sha256', $password_user);
		$email = $this->input->post("ed_email");
		$hak_user = $this->input->post("ed_hak_user");

		if ($password_user == '') {
			$data = array(
				"nama" => $nama,
				"email" => $email,
				"hak" => $hak_user,
				"update_at" => date("Y-m-d H:i:s")
			);
		} else {
			$data = array(
				"nama" => $nama,
				"password" => $password,
				"email" => $email,
				"hak" => $hak_user,
				"update_at" => date("Y-m-d H:i:s")
			);
		}

		/* print_r($data);
		exit(); */
		$cek = $this->M_admin->cek_user_edit(addslashes($nama), $id_edit)->num_rows();
		$sts = "Nama Admin sudah ada";
		if ($cek == 0) {
			$query = $this->M_admin->update_user($id_edit, $data);
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

	public function simpan_bank_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$nama_bank = addslashes($this->input->post("ed_nama_bank"));

		$data = array(
			"nama_bank" => $nama_bank,
			"update_at" => date("Y-m-d H:i:s")
		);
		/* print_r($data);
		exit(); */
		$cek = $this->M_admin->cek_bank_edit(addslashes($nama_bank), $id_edit)->num_rows();
		$sts = "Nama Bank sudah ada";
		if ($cek == 0) {
			$query = $this->M_admin->update_bank($id_edit, $data);
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

	public function simpan_paket_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$nama_paket = addslashes($this->input->post("ed_nama_paket"));
		$harga_paket = $this->input->post("ed_harga_paket");
		$masa_aktif = $this->input->post("ed_masa_aktif");
		$deskripsi = $this->input->post("ed_deskripsi");
		$id_admin = $_SESSION['iduser'];

		$data = array(
			"nama_paket" => $nama_paket,
			"masa_aktif" => $masa_aktif,
			"harga" => $harga_paket,
			"deskripsi" => $deskripsi,
			"id_admin" => $id_admin,
			"update_at" => date("Y-m-d H:i:s")
		);
		/* print_r($data);
		exit(); */
		$cek = $this->M_admin->cek_paket_edit(addslashes($nama_paket), $id_edit)->num_rows();
		$sts = "Nama paket sudah ada";
		if ($cek == 0) {
			$query = $this->M_admin->update_paket($id_edit, $data);
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

	public function simpan_toko_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$nama_toko = addslashes($this->input->post("ed_nama_toko"));
		$lat_toko = $this->input->post("ed_lat_toko");
		$long_toko = $this->input->post("ed_long_toko");
		$alamat_toko = $this->input->post("ed_alamat_toko");
		$id_member = $_SESSION['iduser'];

		$data = array(
			"id_member" => $id_member,
			"nama_toko" => $nama_toko,
			"lokasi_lng" => $long_toko,
			"lokasi_lat" => $lat_toko,
			"alamat" => $alamat_toko,
			"update_at" => date("Y-m-d H:i:s")
		);
		/* print_r($data);
		exit(); */
		$cek = $this->M_admin->cek_toko_edit(addslashes($nama_toko), $id_edit)->num_rows();
		$sts = "Nama toko sudah ada";
		if ($cek == 0) {
			$query = $this->M_admin->update_toko($id_edit, $data);
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

	function simpan_jasa_edit()
	{
		$this->load->model('M_properti');
		$id_edit = $this->input->post("id_edit");
		$nama_jasa = $this->input->post('ed_nama_jasa');
		$data = array();

		$data = array(
			"nama_jasa" => $nama_jasa
		);

		$cek = $this->M_properti->cek_jasa_edit(addslashes($nama_jasa), $id_edit)->num_rows();
		$sts = "Nama Jasa sudah ada";
		if ($cek == 0) {
			$query = $this->M_properti->update_jasa($id_edit, $data);
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

	public function hapus_user()
	{
		$this->load->model('M_admin');
		$id_hapus = $this->input->post("id_hapus");
		$data = array(
			"delete_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_admin->hapus_user($id_hapus, $data);
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

	public function hapus_bank()
	{
		$this->load->model('M_admin');
		$id_hapus = $this->input->post("id_hapus");
		$data = array(
			"delete_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_admin->hapus_bank($id_hapus, $data);
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

	public function hapus_paket()
	{
		$this->load->model('M_admin');
		$id_hapus = $this->input->post("id_hapus");
		$data = array(
			"delete_at" => date("Y-m-d H:i:s")
		);

		$query = $this->M_admin->hapus_paket($id_hapus, $data);
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

	public function hapus_jasa()
	{
		$this->load->model('M_properti');
		$id_hapus = $this->input->post("id_hapus");

		$query = $this->M_properti->hapus_jasa($id_hapus);
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
