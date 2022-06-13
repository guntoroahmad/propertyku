<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_properti extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	/* private $pk = "`ID`";
	private $table_name = "permintaan"; */

	function get_urut()
	{
		$query = "SELECT MAX(RIGHT(KODE_PERMINTAAN,8))+1 maks FROM ($this->table_name);";
		$last = $this->db->query($query)->result_array();
		foreach ($last as $row) {
			$urut = $row['maks'];
		};

		if ($urut == '') {
			$urut = 1;
		} else {
			$urut = $urut;
		}

		$nolnya = 8 - strlen($urut);
		$no_rm = 'RM-' . str_repeat("0", $nolnya) . $urut;
		return $no_rm;
	}

	function list_provinsi()
	{
		$sql = "SELECT * FROM provinces";
		return $this->db->query($sql);
	}

	function list_kotakab($id_prov)
	{
		$sql = "SELECT * FROM regencies WHERE province_id = '{$id_prov}'";
		return $this->db->query($sql);
	}

	function list_kecamatan($id_kotakab)
	{
		$sql = "SELECT * FROM districts WHERE regency_id = '{$id_kotakab}'";
		return $this->db->query($sql);
	}

	function list_kelurahan($id_kecamatan)
	{
		$sql = "SELECT * FROM villages WHERE district_id = '{$id_kecamatan}'";
		return $this->db->query($sql);
	}

	function tabel_properti()
	{
		$sql = "SELECT mt.id_toko_produk_member, mt.id_toko_member, mt.nama_properti, r.name nama_kota_kab, mp.nama_properti tipe_properti, mj.jenis_properti, ms.nama_sertifikat, mt.harga, mt.delete_at
		FROM m_toko_produk_member mt
		LEFT JOIN regencies r
		ON mt.id_regencies = r.id
		LEFT JOIN m_tipe_properti mp
		ON mt.id_tipe_properti = mp.id_tipe_properti
		LEFT JOIN m_jenis_properti mj
		ON mt.id_jenis_properti = mj.id_jenis_properti
		LEFT JOIN m_sertifikat ms
		ON mt.id_sertifikat = ms.id_sertifikat
		WHERE mt.delete_at IS NULL and mt.status = 1
		ORDER BY mt.id_toko_produk_member DESC;";
		return $this->db->query($sql);
	}

	function tabel_tipe()
	{
		$sql = "SELECT * FROM m_tipe_properti WHERE delete_at IS NULL;";
		return $this->db->query($sql);
	}

	function tabel_jenis()
	{
		$sql = "SELECT * FROM m_jenis_properti WHERE delete_at IS NULL;";
		return $this->db->query($sql);
	}

	function tabel_sertifikat()
	{
		$sql = "SELECT * FROM m_sertifikat WHERE delete_at IS NULL;";
		return $this->db->query($sql);
	}

	function tabel_sosial_media()
	{
		$sql = "SELECT * FROM m_sosial_media WHERE delete_at IS NULL;";
		return $this->db->query($sql);
	}

	function cek_data_properti($nama_properti)
	{
		$sql = "SELECT * FROM m_toko_produk_member WHERE nama_properti = '{$nama_properti}' AND status = 1;";
		return $this->db->query($sql);
	}

	function simpan_properti($data)
	{
		$this->db->insert('m_toko_produk_member', $data);
		return $this->db->insert_id();
	}

	function simpan_properti_img($data)
	{
		$this->db->insert('m_toko_produk_member_foto', $data);
		return $this->db->insert_id();
	}

	function simpan_tipe($data)
	{
		$this->db->insert('m_tipe_properti', $data);
		return $this->db->insert_id();
	}

	function simpan_jenis($data)
	{
		$this->db->insert('m_jenis_properti', $data);
		return $this->db->insert_id();
	}

	function simpan_sertifikat($data)
	{
		$this->db->insert('m_sertifikat', $data);
		return $this->db->insert_id();
	}

	function simpan_sosmed($data)
	{
		$this->db->insert('m_sosial_media', $data);
		return $this->db->insert_id();
	}

	function get_properti_edit($id_edit)
	{
		$sql = "SELECT * FROM m_toko_produk_member WHERE id_toko_produk_member='{$id_edit}';";
		return $this->db->query($sql);
	}

	function get_tipe_edit($id_edit)
	{
		$sql = "SELECT * FROM m_tipe_properti WHERE id_tipe_properti='{$id_edit}';";
		return $this->db->query($sql);
	}

	function get_jenis_edit($id_edit)
	{
		$sql = "SELECT * FROM m_jenis_properti WHERE id_jenis_properti='{$id_edit}';";
		return $this->db->query($sql);
	}

	function get_sertifikat_edit($id_edit)
	{
		$sql = "SELECT * FROM m_sertifikat WHERE id_sertifikat='{$id_edit}';";
		return $this->db->query($sql);
	}

	function get_sosmed_edit($id_edit)
	{
		$sql = "SELECT * FROM m_sosial_media WHERE id='{$id_edit}';";
		return $this->db->query($sql);
	}

	function cek_properti_edit($nama_properti, $id_edit)
	{
		$sql = "SELECT nama_properti FROM m_toko_produk_member WHERE nama_properti = '{$nama_properti}' AND id_toko_produk_member != '{$id_edit}' AND status = 1;";
		return $this->db->query($sql);
	}

	function cek_tipe_edit($tipe, $id_edit)
	{
		$sql = "SELECT nama_properti FROM m_tipe_properti WHERE nama_properti='{$tipe}' AND id_tipe_properti != '{$id_edit}';";
		return $this->db->query($sql);
	}

	function cek_jenis_edit($jenis, $id_edit)
	{
		$sql = "SELECT jenis_properti FROM m_jenis_properti WHERE jenis_properti='{$jenis}' AND id_jenis_properti != '{$id_edit}';";
		return $this->db->query($sql);
	}

	function cek_sertifikat_edit($sertifikat, $id_edit)
	{
		$sql = "SELECT nama_sertifikat FROM m_sertifikat WHERE nama_sertifikat='{$sertifikat}' AND id_sertifikat != '{$id_edit}';";
		return $this->db->query($sql);
	}

	function update_properti($id, $data)
	{
		$this->db->where('id_toko_produk_member', $id);
		return $this->db->update('m_toko_produk_member', $data);
	}

	function update_tipe($id, $data)
	{
		$this->db->where('id_tipe_properti', $id);
		return $this->db->update('m_tipe_properti', $data);
	}

	function update_jenis($id, $data)
	{
		$this->db->where('id_jenis_properti', $id);
		return $this->db->update('m_jenis_properti', $data);
	}

	function update_sertifikat($id, $data)
	{
		$this->db->where('id_sertifikat', $id);
		return $this->db->update('m_sertifikat', $data);
	}

	function update_sosmed($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('m_sosial_media', $data);
	}

	function hapus_tipe($id, $data)
	{
		$this->db->where('id_tipe_properti', $id);
		return $this->db->update('m_tipe_properti', $data);
	}

	function hapus_jenis($id, $data)
	{
		$this->db->where('id_jenis_properti', $id);
		return $this->db->update('m_jenis_properti', $data);
	}

	function hapus_sertifikat($id, $data)
	{
		$this->db->where('id_sertifikat', $id);
		return $this->db->update('m_sertifikat', $data);
	}

	function hapus_sosmed($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('m_sosial_media', $data);
	}

	/* function simpan_permintaan_barang($data)
    {

        $result = $this->db->query("INSERT INTO permintaan_barang ( KODE_PERMINTAAN, ID_BARANG, JUMLAH, JUMLAH_UPD, STOK, TIPE_BARANG, TANGGAL) VALUES " . $data);
        return $result;
    } */
}
