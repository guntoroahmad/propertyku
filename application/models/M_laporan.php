<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    private $pk = "`ID`";
    private $table_name = "permintaan";
    private $tbl_permintaan_barang = "permintaan_barang";

    function tabel_laporan_user($kode_rm)
    {
        $sql = "SELECT pb.ID, b.ID ID_BARANG, pb.KODE_PERMINTAAN, b.NAMA_BARANG, pb.JUMLAH, pb.JUMLAH_UPD, b.JUMLAH STOK, pb.JENIS_SATUAN, pb.CATATAN, pb.TANGGAL, pb.TANGGAL_UPD
                FROM permintaan_barang pb
                LEFT JOIN barang b
                ON pb.ID_BARANG = b.ID
                WHERE pb.KODE_PERMINTAAN ='{$kode_rm}';";
        return $this->db->query($sql);
    }

    function simpan_permintaan($data)
    {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    function simpan_permintaan_barang($data)
    {
        $this->db->trans_begin();
        $this->db->insert_batch($this->tbl_permintaan_barang, $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function get_barang_edit($id_edit)
    {
        $sql = "SELECT pb.*, b.NAMA_BARANG, b.JUMLAH STOK
                FROM permintaan_barang pb
                INNER JOIN barang b
                ON pb.ID_BARANG = b.ID
                WHERE pb.ID ='{$id_edit}';";
        return $this->db->query($sql);
    }

    function cek_barang_edit($barang, $rm_edit)
    {
        $sql = "SELECT *
                FROM ($this->tbl_permintaan_barang)
                WHERE ID_BARANG = '{$barang}'
                AND KODE_PERMINTAAN ='{$rm_edit}';";
        return $this->db->query($sql);
    }

    function update_barang($id, $data)
    {
        $this->db->where('ID', $id);
        return $this->db->update($this->tbl_permintaan_barang, $data);
    }

    function hapus_barang_user($id)
    {
        $this->db->where($this->pk, $id);
        return $this->db->delete($this->tbl_permintaan_barang);
    }

    function submit_user($rm)
    {
        $sql = "UPDATE permintaan SET STATUS = 'ver1', DATE_UPD = NOW() WHERE KODE_PERMINTAAN = '{$rm}';";
        return $this->db->query($sql);
    }

    function submit_kord($rm)
    {
        $sql = "UPDATE permintaan SET STATUS = 'selesai', DATE_UPD = NOW() WHERE KODE_PERMINTAAN = '{$rm}';";
        return $this->db->query($sql);
    }

    function upd_permintaan_admin($data, $kode_permintaan)
    {
        $this->db->where('KODE_PERMINTAAN', $kode_permintaan);
        $this->db->update('permintaan', $data);
    }
    
}
