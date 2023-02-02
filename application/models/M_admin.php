<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	private $pk = "`id_member`";
	private $table_name = "m_member";

	function tabel_user()
	{
		$sql = "SELECT * FROM ($this->table_name) WHERE delete_at is null;";
		return $this->db->query($sql);
	}

	function tabel_bank()
	{
		$sql = "SELECT * FROM m_bank WHERE delete_at is	null;";
		return $this->db->query($sql);
	}

	function tabel_paket()
	{
		$sql = "SELECT * FROM m_paket_promo WHERE delete_at is null;";
		return $this->db->query($sql);
	}

	function tabel_toko()
	{
		$sql = "SELECT * FROM m_toko_member;";
		return $this->db->query($sql);
	}

	function set_user_baru($data)
	{
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}

	function set_bank_baru($data)
	{
		$this->db->insert('m_bank', $data);
		return $this->db->insert_id();
	}

	function set_paket_baru($data)
	{
		$this->db->insert('m_paket_promo', $data);
		return $this->db->insert_id();
	}

	function set_toko_baru($data)
	{
		$this->db->insert('m_toko_member', $data);
		return $this->db->insert_id();
	}

	function get_user_edit($id_edit)
	{
		$sql = "SELECT * FROM ($this->table_name) WHERE ($this->pk)='{$id_edit}';";
		return $this->db->query($sql);
	}

	function get_bank_edit($id_edit)
	{
		$sql = "SELECT * FROM m_bank WHERE id_bank='{$id_edit}';";
		return $this->db->query($sql);
	}

	function get_paket_edit($id_edit)
	{
		$sql = "SELECT * FROM m_paket_promo WHERE id_paket_promo='{$id_edit}';";
		return $this->db->query($sql);
	}

	function get_toko_edit($id_edit)
	{
		$sql = "SELECT * FROM m_toko_member WHERE id_toko_member='{$id_edit}';";
		return $this->db->query($sql);
	}

	function cek_user_edit($nama, $id_edit)
	{
		$sql = "SELECT nama FROM ($this->table_name) WHERE nama='{$nama}' AND ($this->pk)!='{$id_edit}';";
		return $this->db->query($sql);
	}

	function cek_bank_edit($nama, $id_edit)
	{
		$sql = "SELECT nama_bank FROM m_bank WHERE nama_bank='{$nama}' AND id_bank!='{$id_edit}';";
		return $this->db->query($sql);
	}

	function cek_paket_edit($nama, $id_edit)
	{
		$sql = "SELECT nama_paket FROM m_paket_promo WHERE nama_paket='{$nama}' AND id_paket_promo!='{$id_edit}';";
		return $this->db->query($sql);
	}

	function cek_toko_edit($nama, $id_edit)
	{
		$sql = "SELECT nama_toko FROM m_toko_member WHERE nama_toko='{$nama}' AND id_toko_member!='{$id_edit}';";
		return $this->db->query($sql);
	}

	function update_user($id, $data)
	{
		$this->db->where($this->pk, $id);
		return $this->db->update($this->table_name, $data);
	}

	function update_bank($id, $data)
	{
		$this->db->where('id_bank', $id);
		return $this->db->update('m_bank', $data);
	}

	function update_paket($id, $data)
	{
		$this->db->where('id_paket_promo', $id);
		return $this->db->update('m_paket_promo', $data);
	}

	function update_toko($id, $data)
	{
		$this->db->where('id_toko_member', $id);
		return $this->db->update('m_toko_member', $data);
	}

	function hapus_user($id, $data)
	{
		$this->db->where($this->pk, $id);
		return $this->db->update($this->table_name, $data);
	}

	function hapus_bank($id, $data)
	{
		$this->db->where('id_bank', $id);
		return $this->db->update('m_bank', $data);
	}

	function hapus_paket($id, $data)
	{
		$this->db->where('id_paket_promo', $id);
		return $this->db->update('m_paket_promo', $data);
	}

	function hapus_toko($id, $data)
	{
		$this->db->where('id_toko_member', $id);
		return $this->db->update('m_toko_member', $data);
	}

	function update_stat_barang($id_permintaan, $status_barang)
	{
		$sql = "UPDATE permintaan SET STATUS_BARANG = '{$status_barang}' WHERE ID = '{$id_permintaan}';";
		return $this->db->query($sql);
	}

	function update_no_admin($id_member, $data)
	{
		$sql_cek = "SELECT * FROM m_member WHERE hak = 'admin' AND set_contact = 'Ya' AND delete_at IS NULL";
		$q_cek = $this->db->query($sql_cek);
		if ($q_cek->num_rows() == 0) {
			$this->db->where($this->pk, $id_member);
			return $this->db->update($this->table_name, $data);
		} else {
			$this->db->where($this->pk, $id_member);
			$q_upd = $this->db->update($this->table_name, $data);
			if ($q_upd) {
				$sql = "UPDATE m_member SET set_contact = 'Tidak' WHERE id_member != '{$id_member}' and hak = 'admin' and delete_at is null;";
			}
			return $this->db->query($sql);
		}
	}

	function list_user($tipe)
	{
		if ($tipe == 'member') {
			$sql = "SELECT * FROM m_member;";
			return $this->db->query($sql);
		} else if ($tipe == 'non_member') {
			$sql = "SELECT CONCAT(android_merk, ' - ', android_version) nama, api_key FROM m_nonmember;";
			return $this->db->query($sql);
		} else {
			$sql = "SELECT nama, api_key FROM m_member WHERE api_key IS NOT NULL 
			UNION ALL
			SELECT CONCAT(android_merk, ' - ', android_version) nama, api_key FROM m_nonmember
			WHERE api_key IS NOT NULL;";
			return $this->db->query($sql);
		}
	}
}
