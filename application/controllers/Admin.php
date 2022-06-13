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

	function tabel_user()
	{
		$this->load->model('M_admin');
		$query = $this->M_admin->tabel_user();
		$data = array();
		$no = 0;
		foreach ($query->result() as $row) {

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->nama_admin;
			$data[$no][2] = $row->email;
			$data[$no][3] = '<button type="button" class="btn btn-warning btn-round" id="user_edit" data-id="' . $row->id_admin . '">Ubah</button>
                                <button type="button" class="btn btn-danger btn-round" id="user_del" data-id="' . $row->id_admin . '">Hapus</button>';
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

	public function simpan_user()
	{
		$this->load->model('M_admin');
		$nama_user = addslashes($this->input->post("nama_user"));
		$password_user = addslashes($this->input->post("password_user"));
		$password = hash('sha256', $password_user);
		$email = $this->input->post("email");

		$this->db->trans_start();

		$data = array(
			"nama_admin" => $nama_user,
			"password" => $password,
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

	function baca_user_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_admin->get_user_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->id_admin;
			$data[1] = $row->nama_admin;
			$data[2] = $row->password;
			$data[3] = $row->email;
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

	public function simpan_user_edit()
	{
		$this->load->model('M_admin');
		$id_edit = $this->input->post("id_edit");
		$nama_user = addslashes($this->input->post("ed_nama_user"));
		$password_user = addslashes($this->input->post("ed_password_user"));
		$password = hash('sha256', $password_user);
		$email = $this->input->post("ed_email");

		if ($password_user == '') {
			$data = array(
				"nama_admin" => $nama_user,
				"email" => $email,
				"update_at" => date("Y-m-d H:i:s")
			);
		} else {
			$data = array(
				"nama_admin" => $nama_user,
				"password" => $password,
				"email" => $email,
				"update_at" => date("Y-m-d H:i:s")
			);
		}

		/* print_r($data);
		exit(); */
		$cek = $this->M_admin->cek_user_edit(addslashes($nama_user), $id_edit)->num_rows();
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

	public function ubah_stat_barang()
	{
		$this->load->model('M_admin');
		$id_permintaan = $this->input->post("id_permintaan");
		$status_barang = 'sudah';
		$query = $this->M_admin->update_stat_barang($id_permintaan, $status_barang);
		$sts = "";
		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal update data";
		}
		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}

	public function ubah_stat_form()
	{
		$this->load->model('M_admin');
		$id_form = $this->input->post("id_form");
		$pic_ambil = $this->input->post("pic_ambil");
		$query = $this->M_admin->update_stat_form($id_form, $pic_ambil);
		$sts = "";
		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal update data";
		}
		$kirim = array(
			"sts" => $sts
		);
		$this->output->set_content_type('application/json')
			->set_output(json_encode($kirim));
	}
}
