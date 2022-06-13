<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    private $pk = "`ID`";
    private $table_name = "barang";

    function tabel_tipe()
    {
        $sql = "SELECT * FROM ($this->table_name) ORDER BY NAMA_BARANG ASC;";
        return $this->db->query($sql);
    }

    function set_barang_baru($data)
    {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    function set_stok_baru($data)
    {
        $this->db->insert('permintaan_barang', $data);
        return $this->db->insert_id();
    }

    function cek_stok_barang($id)
    {
        $sql = "SELECT * FROM barang WHERE ID = {$id};";
        return $this->db->query($sql);
    }

    function get_barang_edit($id_edit)
    {
        $sql = "SELECT * FROM ($this->table_name) WHERE ($this->pk)='{$id_edit}';";
        return $this->db->query($sql);
    }

    function cek_barang_edit($barang, $id_edit)
    {
        $sql = "SELECT NAMA_BARANG FROM ($this->table_name) WHERE NAMA_BARANG='{$barang}' AND ($this->pk)!='{$id_edit}';";
        return $this->db->query($sql);
    }

    function update_barang($id, $data)
    {
        $this->db->where($this->pk, $id);
        return $this->db->update($this->table_name, $data);
    }

    function upd_stok_barang($id_stok_barang, $data)
    {
        $this->db->where($this->pk, $id_stok_barang);
        return $this->db->update($this->table_name, $data);
    }

    function hapus_barang($id)
    {
        $this->db->where($this->pk, $id);
        return $this->db->delete($this->table_name);
    }

    function push_permintaan_baru($data)
    {
        $this->db->insert('permintaan_barang', $data);
        return $this->db->insert_id();
    }

    public function push_stok_baru()
    {
        $this->db->trans_start();

        $sql = "SELECT ID, JUMLAH, JENIS_SATUAN FROM barang;";

        $get = $this->db->query($sql)->result_array();
        // $this->db->truncate('approval.ms_menu_magnetar');

        $result = array();
        foreach ($get as $row) {
            $result[] = array(
                'ID_BARANG'     => $row['ID'],
                'JUMLAH_UPD'    => $row['JUMLAH'],
                'STOK'          => $row['JUMLAH'],
                'JENIS_SATUAN'  => $row['JENIS_SATUAN'],
                'TIPE_BARANG'   => 2,
                'TANGGAL_UPD'   => date("Y-m-d H:i:s")
            );
        }
        // print_r($result);exit();
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('permintaan_barang', $result);
        $this->db->trans_complete();
    }
}
