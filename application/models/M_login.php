<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    private $table_name = "m_admin";
    private $table_google ="member";
    function __construct() {
        parent::__construct();
    }

    function cek_login($username, $pass) {
        $sql = "SELECT * FROM $this->table_name WHERE email ='{$username}' AND password = '{$pass}'";
		// print_r($sql);exit();
        return $this->db->query($sql);
    }

    function cek_login_member($email, $pass) {
        $sql = "SELECT * FROM m_member WHERE email='{$email}' AND password='{$pass}' and hak = 'admin';";
        // print_r($sql);exit();
        return $this->db->query($sql);
    }

    function get_login_info($username) {
        $this->db->where("username",$username);
        $this->db->limit(1);
        $query=$this->db->get($this->table_google);
        return ($query->num_rows()>0)?$query->row():FALSE;
    }

    function email_reset($password,$email){
        $sql = "UPDATE member SET password = '{$password}' WHERE email = '{$email}';";
        // print_r($sql);exit();
        return $this->db->query($sql);
    }

    function reset_data() {
        // produk 
        $this->db->set('a.FLAG', 0);
        $this->db->update('produk as a');
        // kategori_produk
        $this->db->set('b.FLAG', 0);
        $this->db->update('kategori_produk as b');
        // sub_kategori_produk
        $this->db->set('c.FLAG', 0);
        $this->db->update('sub_kategori_produk as c');
        // produk_detail_topping 
        $this->db->set('d.FLAG', 0);
        $this->db->update('produk_detail_topping as d');
        // topping
        $this->db->set('e.FLAG', 0);
        $this->db->update('topping as e');
        // topping_harga
        $this->db->set('f.FLAG', 0);
        $this->db->update('topping_harga as f');
    }
}
