<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
	}

	function user()
	{
		$data['rm'] = $this->uri->segment(3);
		$data['stat'] = $this->uri->segment(4);
		$this->load->view("temp/v_head");
		$this->load->view('v_laporan', $data);
	}

	function admin()
	{
		$data['rm'] = $this->uri->segment(3);
		$data['stat'] = $this->uri->segment(4);
		/* $this->load->view("temp/v_head");
		$this->load->view('v_laporan', $data); */
		$this->load->view("temp/v_head");
		$this->load->view('v_laporan_admin', $data);
	}

	function kord()
	{
		$data['rm'] = $this->uri->segment(3);
		$data['stat'] = $this->uri->segment(4);
		$this->load->view("temp/v_head");
		$this->load->view('v_laporan_kord', $data);
	}

	function tabel_laporan()
	{
		$this->load->model('M_laporan');
		$kode_rm = $this->input->post('rm');
		$stat = $this->input->post('stat');
		// print_r($stat);exit();
		$hak = $_SESSION['hak'];
		$query = $this->M_laporan->tabel_laporan_user($kode_rm);
		$no = 0;
		$jumlah = '';
		$jumlah_upd = '';
		$disetujui = '';
		$satuan = '';
		$aksi = '';
		$data = array();

		foreach ($query->result() as $row) {

			$jumlah = $row->JUMLAH . ' ' . $row->JENIS_SATUAN;
			if ($hak == 'user') {
				if ($row->JUMLAH_UPD == '') {
					$disetujui = '-';
					$satuan = '-';
				} else {
					$disetujui = $row->JUMLAH_UPD;
					$satuan = $row->JENIS_SATUAN;
				}

				if ($stat == 'baru') {
					$aksi = '<td>
							<button type="button" class="btn btn-info btn-round" id="edit_barang_user" data-id="' . $row->ID . '">Edit</button>
							<button type="button" class="btn btn-danger btn-round" id="hapus_barang_user" data-id="' . $row->ID . '">Hapus</button>
						</td>';
				} else {
					$aksi = '-';
				}
			} else if ($hak == 'admin') {
				if ($row->JENIS_SATUAN == 'Lembar') {
					$option = '<option value="">Jenis Satuan</option>
								<option value="Lembar" selected>Lembar</option>
								<option value="Buku">Buku</option>
								<option value="Map">Map</option>';
				} else if ($row->JENIS_SATUAN == 'Buku') {
					$option = '<option value="">Jenis Satuan</option>
								<option value="Lembar">Lembar</option>
								<option value="Buku" selected>Buku</option>
								<option value="Map">Map</option>';
				} else if ($row->JENIS_SATUAN == 'Map') {
					$option = '<option value="">Jenis Satuan</option>
								<option value="Lembar">Lembar</option>
								<option value="Buku">Buku</option>
								<option value="Map" selected>Map</option>';
				} else {
					$option = '<option value="" selected>Jenis Satuan</option>
								<option value="Lembar">Lembar</option>
								<option value="Buku">Buku</option>
								<option value="Map">Map</option>';
				}

				if ($row->JUMLAH_UPD == '') {
					$jumlah_upd = $row->JUMLAH;
				} else {
					$jumlah_upd = $row->JUMLAH_UPD;
				}

				if ($stat == 'ver2' || $stat == 'selesai') {
					$disetujui = $row->JUMLAH_UPD;
					$satuan = $row->JENIS_SATUAN;
					if ($row->CATATAN == '') {
						$aksi = '-';
					} else {
						$aksi = $row->CATATAN;
					}
				} else {
					$disetujui = '<div class="form-row">
								<div class="form-group">
									<input type="hidden" class="form-control id_pbarang" id="id_pbarang" name="id_pbarang[]" value="' . $row->ID . '">
									<input type="hidden" class="form-control stok_barang" id="stok_barang" name="stok_barang[]" value="' . $row->STOK . '">
									<input type="hidden" class="form-control id_barang" id="id_barang" name="id_barang[]" value="' . $row->ID_BARANG . '">
									<input type="text" class="form-control input_jum" id="input_jum" name="input_jum[]" placeholder="Jumlah" value="' . $jumlah_upd . '">
								</div>
							</div>';
					$satuan = '<div class="form-row">
								<div class="form-group ">
									<select id="inputState" name="jenis_satuan[]" class="form-control jenis_satuan">
										 ' . $option . '
									</select>
								</div>
							</div>';
					if ($row->CATATAN == '') {
						$aksi = '<div class="form-group">
									<textarea class="form-control" id="catatan" name="catatan[]" rows="3"></textarea>
								</div>';
					} else {
						$aksi = $row->CATATAN;
					}
				}
			} else {
				if ($row->JUMLAH_UPD == '') {
					$disetujui = '-';
					$satuan = '-';
				} else {
					$disetujui = $row->JUMLAH_UPD;
					$satuan = $row->JENIS_SATUAN;
				}
				
				if ($row->CATATAN == '') {
					$aksi = '-';
				} else {
					$aksi = $row->CATATAN;
				}
			}

			$data[$no][0] = $no + 1;
			$data[$no][1] = $row->NAMA_BARANG;
			$data[$no][2] = $jumlah;
			$data[$no][3] = $disetujui;
			$data[$no][4] = $satuan;
			$data[$no][5] = $aksi;
			$no++;
		}

		$kirim = array(
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($kirim));
	}

	function baca_barang_edit()
	{
		$this->load->model('M_laporan');
		$id_edit = $this->input->post("id_edit");
		$query = $this->M_laporan->get_barang_edit($id_edit);
		$data = array();
		foreach ($query->result() as $row) {
			$data[0] = $row->ID;
			$data[1] = $row->ID_BARANG;
			$data[2] = $row->JUMLAH;
			$data[3] = $row->JENIS_SATUAN;
			$data[4] = $row->STOK;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function simpan_barang_edit()
	{
		$this->load->model('M_laporan');
		$id_edit = $this->input->post("id_edit");
		$rm_edit = $this->input->post("rm_edit");
		$stok_edit = $this->input->post("stok_edit");
		// $id_user = $_SESSION['ses_id'];
		// $id_user = 1;
		$nama_barang = $this->input->post("ed_nama_barang");
		$jumlah = $this->input->post("ed_jumlah");
		$jenis_satuan = $this->input->post("ed_jenis_satuan");
		$stok = $stok_edit - $jumlah;
		$data = array(
			"ID_BARANG" => $nama_barang,
			"JUMLAH" => $jumlah,
			"JENIS_SATUAN" => $jenis_satuan,
			// "STOK" => $stok,
			"TANGGAL" => date("Y-m-d H:i:s")
		);
		//    print_r($data);exit();
		// $cek = $this->M_laporan->cek_barang_edit(addslashes($nama_barang), $rm_edit)->num_rows();
		// $sts = "Nama Barang sudah ada";
		// if ($cek == 0) {
		$query = $this->M_laporan->update_barang($id_edit, $data);
		if ($query) {
			$sts = "ok";
		} else {
			$sts = "Gagal Simpan Data";
		}
		// }
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
				'NAMA_BARANG' => $dt['NAMA_BARANG']
			);
		}

		$data = array(
			'data' => $arr
		);
		echo json_encode($arr);
	}

	public function hapus_barang_user()
	{
		$this->load->model('M_laporan');
		$id_hapus = $this->input->post("id_hapus");
		$query = $this->M_laporan->hapus_barang_user($id_hapus);
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

	public function submit_user()
	{
		$this->load->model('M_laporan');
		$rm = $this->input->post("rm");
		$query = $this->M_laporan->submit_user($rm);
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

	function submit_admin()
	{
		$this->load->model('M_laporan');
		// $nama = $_SESSION['nama'];
		$kode_permintaan = $this->input->post('kode_permintaan');
		$pbarang = $this->input->post('id_pbarang');
		$id_barang = $this->input->post('id_barang');
		$jumlah = $this->input->post('input_jum');
		$jenis_satuan = $this->input->post('jenis_satuan');
		$catatan = $this->input->post('catatan');
		$stok = $this->input->post('stok_barang');
		$data = array();

		$data_permintaan = array(
			"KODE_PERMINTAAN" => $kode_permintaan,
			// "PIC" => $nama,
			// "STATUS" => 'ver2',
			"STATUS" => 'selesai',
			"DATE_UPD" => date("Y-m-d H:i:s")
		);
		// print_r($data_permintaan);
		$query = $this->M_laporan->upd_permintaan_admin($data_permintaan, $kode_permintaan);

		for ($i = 0; $i < count($pbarang); $i++) {
			$data[$i] = array(
				'ID' => $pbarang[$i],
				'JUMLAH_UPD' => $jumlah[$i],
				'STOK' => $stok[$i] - $jumlah[$i],
				'JENIS_SATUAN' => $jenis_satuan[$i],
				'CATATAN' => $catatan[$i],
				'TANGGAL_UPD' => date("Y-m-d H:i:s")
			);
		}

		// print_r($data);
		$query .= $this->db->update_batch('permintaan_barang', $data, 'ID');

		for ($y = 0; $y < count($id_barang); $y++) {
			$datay[$y] = array(
				'ID' => $id_barang[$y],
				'JUMLAH' => $stok[$y] - $jumlah[$y],
			);
		}

		// print_r($datay);return false;
		$query .= $this->db->update_batch('barang', $datay, 'ID');
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

	public function submit_kord()
	{
		$this->load->model('M_laporan');
		$rm = $this->input->post("rm");
		$query = $this->M_laporan->submit_kord($rm);
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
