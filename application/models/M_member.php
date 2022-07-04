<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_member extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	private $pk = "`ID`";
	private $table_name = "barang";

	function tabel_member_list()
	{
		$sql = "SELECT tpm.id_toko_promo, tm.nama_toko, pm.nama_properti, tp.nama_properti tipe_properti, jp.jenis_properti, pm.harga, tpm.status_verifikasi
		FROM t_promo_toko_produk_member tpm
		LEFT JOIN m_member m
		ON tpm.id_member = m.id_member
		INNER JOIN t_promo_iklan_slot pis
		ON pis.id_toko_promo = tpm.id_toko_promo
		INNER JOIN m_toko_produk_member pm
		ON pm.id_toko_produk_member = pis.id_produk_toko_member
		LEFT JOIN m_toko_member tm
		ON pm.id_toko_member = tm.id_toko_member
		LEFT JOIN m_tipe_properti tp
		ON pm.id_tipe_properti = tp.id_tipe_properti
		LEFT JOIN m_jenis_properti jp
		ON pm.id_jenis_properti = jp.id_jenis_properti
		WHERE m.hak = 'admin';";
		return $this->db->query($sql);
	}

	function update_future_list($id, $data)
	{
		$this->db->where('id_toko_promo', $id);
		return $this->db->update('t_promo_toko_produk_member', $data);
	}
}
