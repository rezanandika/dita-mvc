<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');


class pengemudi extends CI_Controller {

	function __construct() {
    parent::__construct();

    $this->redirect_url = 'pengemudi';
    $this->load->model('M_pengemudi');
    $this->load->library('session');

    if(empty($this->session->userdata('username'))){
        header('location: '.base_url());
    }

    }

    public function index(){

        $this->load->model('M_pengguna');
        $data['caripengemudi'] = $this->M_pengguna->ambil_pengemudi();
        $this->load->model('M_pemesanan');
        $data['count'] = $this->M_pemesanan->cek_pemesanan_baru();
        $data['pemesananbaru'] = $this->M_pemesanan->pemesanan_baru();

        $this->load->view('header', $data);
        $this->load->view('pengemudi', $data);
        $this->load->view('footer', $data);
    }

    public function Cari_jadwal_berangkat(){

        //$data['carijadwalberangkat'] = $this->M_jadwal_berangkat->cari_jadwal_berangkat();
        $data['carijadwalberangkat'] = $this->M_pengemudi->cari_jadwal_berangkat();
        $data['caribypengemudi'] = $this->M_pengemudi->cari_by_pengemudi();

        if(count($data['carijadwalberangkat']) > 0){
        $this->load->view('cari_jadwal_pengemudi', $data); 
        }else{
            echo "<div style='text-align: center'><a> -- Data Tidak Ditemukan -- </a></div>";
        }
    }

    public function update_jadwal(){
        //$id = $_POST['id'];
        $kodejadwal = $_POST['kodejadwal'];
        $idpemesanan = $_POST['idpemesanan'];
        
        foreach ($kodejadwal as $key => $id) {
                $menuData = array(
                    'kode_jadwal'  => $id,
                    'status'     => 3,
                );
                $this->db->where('kode_jadwal', $id);
                $this->db->update('jadwal_berangkat', $menuData);
        }
        foreach ($idpemesanan as $key => $idp) {
            $menu = array(
                'id_pemesanan'  => $idp,
                'status'     => 3,
            );
            $this->db->where('id_pemesanan', $idp);
            $this->db->update('pemesanan', $menu);
        }
        $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('pengemudi', 'refresh');
    }

}
?>
