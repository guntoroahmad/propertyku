<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	private $pk = "`id_admin`";
	private $table_name = "m_admin";

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

	function cek_user_edit($nama, $id_edit)
	{
		$sql = "SELECT nama_admin FROM ($this->table_name) WHERE nama_admin='{$nama}' AND ($this->pk)!='{$id_edit}';";
		return $this->db->query($sql);
	}

	function cek_bank_edit($nama, $id_edit)
	{
		$sql = "SELECT nama_bank FROM m_bank WHERE nama_bank='{$nama}' AND id_bank!='{$id_edit}';";
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

	function update_stat_barang($id_permintaan, $status_barang)
	{
		$sql = "UPDATE permintaan SET STATUS_BARANG = '{$status_barang}' WHERE ID = '{$id_permintaan}';";
		return $this->db->query($sql);
	}

	function update_stat_form($id_permintaan, $pic_ambil)
	{
		$sql = "UPDATE permintaan SET STATUS_PERMINTAAN = 'selesai', PIC_AMBIL = '{$pic_ambil}', DATE_AMBIL = NOW() WHERE ID = '{$id_permintaan}';";
		return $this->db->query($sql);
	}
}
