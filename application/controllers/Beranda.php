<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');


class beranda extends CI_Controller {

	function __construct() {
    parent::__construct();

    $this->redirect_url = 'beranda';
		$this->load->library('session');

        if(empty($this->session->userdata('username'))){
            header('location: '.base_url());
        }
        if(!isset($_SESSION['username'])) {
               include_once("login.php");
               exit;
        }

    }

    public function index(){

        $this->load->model('M_pemesanan');
        $data['count'] = $this->M_pemesanan->cek_pemesanan_baru();
        $data['pemesananbaru'] = $this->M_pemesanan->pemesanan_baru();

        $this->load->view('header', $data);
        if($this->session->userdata('hak_akses') == 1){
        $this->load->view('beranda', $data);
        }elseif($this->session->userdata('hak_akses') == 2){
        $this->load->view('beranda_pengemudi');
        }
        $this->load->view('footer', $data);

  }

}
?>
