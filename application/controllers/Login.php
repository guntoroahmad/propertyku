<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
		$this->load->view("v_login");
	}

	function logout()
	{
		$newdata = array(
			// 'iduser',
			// 'email',
			'nama',
			'hak'
		);
		$this->session->unset_userdata($newdata);
		redirect(base_url());
	}

	function logout_user()
	{
		$newdata = array(
			'km_iduser',
			'km_email',
			'km_nama',
			'km_alamat'
		);
		$this->session->unset_userdata($newdata);
		redirect(base_url());
	}

	function cek()
	{
		$this->load->model("M_login");
		$username = addslashes($this->input->post("user"));
		$pass = addslashes($this->input->post("pass"));
		$password = hash('sha256', $pass);
		// print_r($username.' - '.$pass.'-'.$password);return false;
		$query = $this->M_login->cek_login_member($username, $password);
		$data = array();
		if ($query->num_rows() > 0) {
			$row = $this->M_login->cek_login_member($username, $password)->row();
			$newdata = array(
				'iduser' => $row->id_member,
				'nama' => $row->nama,
				/* 'hak' => $row->HAK,
				'kord' => $row->KORD, */
			);

			// print_r($newdata);exit();
			$this->session->set_userdata($newdata);
			$data = array(
				"sts" => "ok",
			);
		} else {
			$data = array(
				"sts" => "Username / Password Salah",
				"pass" => $password
			);
		}

		$kirim = $data;

		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function cek_tes()
	{
		$username = addslashes($this->input->post("user"));
		$pass = addslashes($this->input->post("pass"));
		if($username == 'admin'){
			$hak = 'admin';
		}else if($username == 'user'){
			$hak = 'user';
		}else{
			$hak = 'kord';
		}

		$newdata = array(
			'nama' => $username,
			'hak' => $hak
		);
		// print_r($newdata);return false;
		$this->session->set_userdata($newdata);
		$data = array(
			"sts" => "ok"
		);

		$kirim = $data;

		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}
}
