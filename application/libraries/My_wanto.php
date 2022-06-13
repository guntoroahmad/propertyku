<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_wanto {

    protected $CI;
    function __construct() {
        $this->CI = & get_instance();
    }

    function cek() {
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
        if ($this->CI->session->has_userdata('email')) {
            redirect(base_url("home"));
            exit();
        }
    }

    function cek_login() {
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
        if (!$this->CI->session->has_userdata('hak')) {
            redirect(base_url("login"));
            exit();
        }
    }

    function resize_image($file, $w, $h) {
        $width = imagesx($file);
        $height = imagesy($file);
        $r = $width / $height;

        if ($w / $h > $r) {
            $newwidth = $h * $r;
            $newheight = $h;
        } else {
            $newheight = $w / $r;
            $newwidth = $w;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $file, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        return $dst;
    }
    
    function seribu($angka){
        return number_format($angka,0,",",".");
    }

}
