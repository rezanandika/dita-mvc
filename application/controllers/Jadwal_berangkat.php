<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');


class jadwal_berangkat extends CI_Controller {

	function __construct() {
    parent::__construct();

    $this->redirect_url = 'jadwal_berangkat';
    $this->load->model('M_jadwal_berangkat');
    $this->load->library('session');

    if(empty($this->session->userdata('username'))){
        header('location: '.base_url());
    }

    }

    public function index(){

        $data['jadwalberangkat'] = $this->M_jadwal_berangkat->jadwal_berangkat();
        $this->load->model('M_pemesanan');
        $data['count'] = $this->M_pemesanan->cek_pemesanan_baru();
        $data['pemesananbaru'] = $this->M_pemesanan->pemesanan_baru();

        $this->load->view('header', $data);
        $this->load->view('jadwal_berangkat', $data);
        $this->load->view('footer', $data);
    }

    public function cari_jadwal_berangkat(){

        $data['carijadwalberangkat'] = $this->M_jadwal_berangkat->cari_jadwal_berangkat();
        $data['caribypengemudi'] = $this->M_jadwal_berangkat->cari_by_pengemudi();

        if(count($data['carijadwalberangkat']) > 0){
            $this->load->view('cari_jadwal_berangkat', $data); 
        }else{
            echo "<div style='text-align: center'><a> -- Data Tidak Ditemukan -- </a></div>";
        }
    }

    public function ubah_jadwal_berangkat(){
        $this->load->model('M_pemesanan');
        $data['count'] = $this->M_pemesanan->cek_pemesanan_baru();
        $data['pemesananbaru'] = $this->M_pemesanan->pemesanan_baru();

        $this->load->view('header', $data);
        $this->load->view('ubah_jadwal_berangkat', $data);
        $this->load->view('footer', $data);
    }

}
?>
