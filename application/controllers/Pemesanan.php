<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');


class pemesanan extends CI_Controller {

	function __construct() {
    parent::__construct();

    $this->redirect_url = 'pemesanan';
    $this->load->model('M_pemesanan');
    $this->load->library('session');

    if(empty($this->session->userdata('username'))){
        header('location: '.base_url());
    }

    }

    public function index(){

    }

    public function pemesanan_baru(){

        $data['pemesananbaru'] = $this->M_pemesanan->pemesanan_baru();
        $this->load->model('M_pemesanan');
        $data['count'] = $this->M_pemesanan->cek_pemesanan_baru();
        $data['pemesananbaru'] = $this->M_pemesanan->pemesanan_baru();

        $this->load->view('header', $data);
        $this->load->view('pemesanan_baru', $data);
        $this->load->view('footer', $data);
    }

    public function pemesanan_diterima(){

        $data['pemesananditerima'] = $this->M_pemesanan->pemesanan_diterima();
        $this->load->model('M_pemesanan');
        $data['count'] = $this->M_pemesanan->cek_pemesanan_baru();
        $data['pemesananbaru'] = $this->M_pemesanan->pemesanan_baru();

        $this->load->view('header', $data);
        $this->load->view('pemesanan_diterima', $data);
        $this->load->view('footer', $data);
    }

    public function cari_pemesanan_diterima(){

        $this->load->model('M_pengguna');
        $this->load->model('M_kota_asal');
        $this->load->model('M_kota_tujuan');

        $data['caripemesananditerima'] = $this->M_pemesanan->cari_pemesanan_diterima();
        $data['caripengemudi'] = $this->M_pengguna->ambil_pengemudi();
        $data['kota_asal'] = $this->M_kota_asal->ambil_kota();
        $data['kota_tujuan'] = $this->M_kota_tujuan->ambil_kota();

        if(count($data['caripemesananditerima']) > 0){
        
        $this->load->view('cari_pesanan_diterima', $data); 
        }else{
            echo "<div style='text-align: center'><a> -- Data Tidak Ditemukan -- </a></div>";
        }
    }
    

    public function insert_jadwal(){

        $this->load->model('m_jadwal_berangkat');

        $idpemesanan = $_POST['idpemesanan'];
        $tanggalberangkat = $_POST['tanggalberangkat'];
        $kotaasal = $_POST['kotaasal'];
        $kotatujuan = $_POST['kotatujuan'];
        $pengemudi = $_POST['pengemudi'];
        $cek = $_POST['cek'];
        $kodejadwal = $this->M_jadwal_berangkat->cari_kode_berangkat();
        $kodejadwalsama = $this->M_pemesanan->cek_kode_berangkat_sama();
        $jumlahpemesanan = $_POST['jumlahpemesanan'];
        $status = 1;

        $arr = array();
        foreach ($idpemesanan as $key => $id) {
            if(isset($cek[$key]) == 1){
            
            if($kodejadwalsama->kode_jadwal != NULL){
                array_push($arr, 
                    array(
                        'id_pemesanan' => $id, 
                        'tanggal_berangkat' => $tanggalberangkat[$key], 
                        'id_pengemudi' => $pengemudi, 
                        'id_kota_asal' => $kotaasal[$key],
                        'id_kota_tujuan' => $kotatujuan[$key],
                        'kode_jadwal' => $kodejadwalsama->kode_jadwal,
                        'jumlah_pemesanan' => $jumlahpemesanan[$key],
                        'status' => 1
                        
                    )); 
            }else{
                array_push($arr, 
                    array(
                        'id_pemesanan' => $id, 
                        'tanggal_berangkat' => $tanggalberangkat[$key], 
                        'id_pengemudi' => $pengemudi, 
                        'id_kota_asal' => $kotaasal[$key],
                        'id_kota_tujuan' => $kotatujuan[$key],
                        'kode_jadwal' => $kodejadwal->kode_jadwal+1,
                        'jumlah_pemesanan' => $jumlahpemesanan[$key],
                        'status' => 1
                        
                    )); 
        
            }
            //print_r($arr);
            $this->db->insert_batch('jadwal_berangkat', $arr);
            $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');

            }
          }

         

        foreach ($idpemesanan as $key => $id) {
            if(isset($cek[$key]) == 1){

                $menuData = array(
                    'id_pemesanan'         => $id,
                    'status'     => intval($status),
                    'id_pengemudi' => $pengemudi,
                    
                );
                $this->db->where('id_pemesanan', $id);
                $this->db->update('pemesanan', $menuData);
            }

        }
        
        redirect('pemesanan/pemesanan_diterima');

    }

    public function update_pemesanan_baru(){
        $id = $_POST['id'];
        $status = $_POST['status'];
     
        $data = array(
            'status'	=>  $status, 
        );
     
        $where = array(
            'id_pemesanan' => $id
        );

        $this->m_pemesanan->update($where,$data,'pemesanan');
        $this->session->set_flashdata('success', 'Data Berhasil Diproses');
        redirect('pemesanan/pemesanan_baru', 'refresh');
    }

    public function update_pemesanan_diterima(){

        $this->load->model('jadwal_berangkat/m_jadwal_berangkat');
        $idpemesanan = $_POST['updid'];
        $namapemesan = $_POST['updnamapemesan'];
        $telepon = $_POST['updtelepon'];
        $tanggalberangkat = $_POST['updtanggalberangkat'];
        $kotaasal = $_POST['updkotaasal'];
        $kotatujuan = $_POST['updkotatujuan'];
        $jumlahpemesanan = $_POST['updjumlah'];
        $totalharga = $_POST['updtotalharga'];
     
        $data = array(
            'nama_pemesan' => $namapemesan,
            'telp_pemesan' => $telepon,
            'tanggal_berangkat' => $tanggalberangkat, 
            'id_kota_asal' => $kotaasal,
            'id_kota_tujuan' => $kotatujuan,
            'jumlah_pemesanan' => $jumlahpemesanan,
            'total_harga' => $totalharga,
        );

        $arr = array(
            'tanggal_berangkat' => $tanggalberangkat,
            'id_kota_asal' => $kotaasal,
            'id_kota_tujuan' => $kotatujuan,
            'jumlah_pemesanan' => $jumlahpemesanan,
        );
     
        $where = array(
            'id_pemesanan' => $idpemesanan
        );

        $this->M_pemesanan->update($where,$data,'pemesanan');
        $this->M_jadwal_berangkat->update($where,$arr,'jadwal_berangkat');
        $this->session->set_flashdata('success', 'Data Berhasil Diproses');
        redirect('pemesanan/pemesanan_diterima', 'refresh');
    }
 

}
?>
