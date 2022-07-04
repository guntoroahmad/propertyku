<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	private $pk = "`id_berita`";
	private $table_name = "t_berita";

	function tabel_berita()
	{
		$sql = "SELECT * FROM ($this->table_name);";
		return $this->db->query($sql);
	}

	function simpan_berita($data)
	{
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}

	function get_berita_edit($id_edit)
	{
		$sql = "SELECT * FROM ($this->table_name) WHERE ($this->pk)='{$id_edit}';";
		return $this->db->query($sql);
	}

	function cek_berita_edit($judul, $id_edit)
	{
		$sql = "SELECT judul FROM ($this->table_name) WHERE judul='{$judul}' AND ($this->pk)!='{$id_edit}';";
		return $this->db->query($sql);
	}

	function update_berita($id, $data)
	{
		$this->db->where($this->pk, $id);
		return $this->db->update($this->table_name, $data);
	}

	/* function hapus_berita($id, $data)
	{
		$this->db->where($this->pk, $id);
		return $this->db->update($this->table_name, $data);
	} */

	function hapus_berita($id) {
        $this->db->where($this->pk, $id);
        return $this->db->delete($this->table_name);
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
