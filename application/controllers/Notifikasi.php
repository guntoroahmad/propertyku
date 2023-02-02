<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	private $url_gambar = "../assets/img/brand/logo.png";
	private $api_firebase = "AAAAoyGUsmE:APA91bEMU2LPDLGNI92RKxl6T-FHzCTfc3HkIjTRxIf_cwMgAN9GX3GlykJ9akRS6SbHcnaOUDBRsV16Tb2iBM3kJbOfMh598nS3RMpMeHMVZar58dT60JgEjTn0Hen9-Qt_9wZ4_2Dv";
	public function index()
	{
		$this->load->view("temp/v_head");
		$this->load->view("temp/v_menubar");
		$this->load->view("temp/v_navbar");
		$this->load->view('v_notifikasi');
		$this->load->view("temp/v_foot");
	}

	public function notif_to()
	{
		$pesan = $this->input->post('pesan_notifikasi');
		$apikey = $this->input->post('nama_user');
		// print_r($nama_user);
		// exit();
		$apikeyq = $this->api_firebase;
		$to = array();
		// array_push($to, $nama_user);

		foreach ($apikey as $val) {
			array_push($to, $val);
		}

		$registrationIds = $to;
		$judul = "Propertyku";
		$pesan = $pesan;
		$msg = array(
			'message' => strip_tags(substr($pesan, 0, 3000)),
			'title' => $judul,
			'soundname' => "default",
			'notId' => time(),
			'icon' => 'meeting',
			'vibrate' => 1,
			//additionalData
			// 'id_nya' => $id_penjualan,
			'sub_pesan' => $pesan,
			'ke_hal' => "",
			// 'ke_hal' => "chats",
			'image' => $this->url_gambar,
			"ledColor" => array(0, 0, 255, 0),
			"vibrationPattern" => array(1000, 500, 500, 500),
			// "priority" => 2
			// you can also add images, additionalData
		);
		$fields = array(
			'registration_ids' => $registrationIds,
			'notification' => [
				'title' => $judul,
				'body' => strip_tags(substr($pesan, 0, 3000)),
			],
			'priority' => 'high',
			'data' => $msg
		);
		// print_r($fields);exit();
		/* if($jenis_mobile == 'IOS'){
            $fields = array(
                'registration_ids' => $registrationIds,
                'notification' => [
                    'title' => $judul,
                    'body' => strip_tags(substr($pesan, 0, 3000)),
                ],
                'priority' => 'high',
                'data' => $msg
            );    
        }else{
            $fields = array(
                'registration_ids' => $registrationIds,
                'notification' => [
                    'title' => $judul,
                    'body' => strip_tags(substr($pesan, 0, 3000)),
                ],
                'priority' => 'high',
                'data' => $msg
            );
        } */
		// print_r($fields);exit();
		$headers = array(
			'Authorization: key=' . $apikeyq,
			'Content-Type: application/json'
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = json_decode(curl_exec($ch), true);
		curl_close($ch);
		// print_r($result);
		/* exit();
		return $result; */
		echo json_encode($result);
	}
}
