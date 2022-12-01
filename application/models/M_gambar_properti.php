<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_gambar_properti extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    private $pk = "`id_toko_produk_member`";
    private $table_name = "m_toko_produk_member_foto";
    
    function get_data(){
        $sql="SELECT * FROM {$this->table_name} order by {$this->pk} ASC";
        return $this->db->query($sql);
    }
    
    function set_data($data) {
        return $this->db->insert($this->table_name, $data);
    }

	function set_cover_data($data) {
        return $this->db->insert('m_berita_cover', $data);
    }
    
    function delete_data($id) {
        $this->db->where($this->pk, $id);
        return $this->db->delete($this->table_name);
    }

	function delete_cover_data($id) {
        $this->db->where('id', $id);
        return $this->db->delete('m_berita_cover');
    }
    
    function update_data($id, $data) {
        $this->db->where($this->pk, $id);
        return $this->db->update($this->table_name, $data);
    }
    
    function get_data_edit($id_edit){
        $sql="SELECT * FROM {$this->table_name} WHERE id_toko_produk_member='{$id_edit}';";
        return $this->db->query($sql);
    }

	function get_cover_edit($id_edit){
        $sql="SELECT * FROM m_berita_cover WHERE id_berita='{$id_edit}';";
        return $this->db->query($sql);
    }
    
    function get_edit_pic_outlet($id_edit){
        $sql="SELECT * FROM outlet WHERE ID_OUTLET='{$id_edit}'";
        return $this->db->query($sql);
    }
    
    function update_foto_outlet($id, $data) {
        $this->db->where("ID_OUTLET", $id);
        return $this->db->update("outlet", $data);
    }
    
}
