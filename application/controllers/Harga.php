<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');


class harga extends CI_Controller {

	function __construct() {
    parent::__construct();

    $this->redirect_url = 'harga';
    $this->load->model('M_harga');
    $this->load->library('session');

    if(empty($this->session->userdata('username'))){
        header('location: '.base_url());
    }

    }

    public function index(){
        $this->load->model('M_pemesanan');
        $this->load->model('M_kota_asal');
        $this->load->model('M_kota_tujuan');
        $data['harga'] = $this->M_harga->ambil_harga();
        $data['count'] = $this->M_pemesanan->cek_pemesanan_baru();
        $data['pemesananbaru'] = $this->M_pemesanan->pemesanan_baru();
        $data['kota_asal'] = $this->M_kota_asal->ambil_kota();
        $data['kota_tujuan'] = $this->M_kota_tujuan->ambil_kota();
        
        $this->load->view('header', $data);
        $this->load->view('harga', $data);
        $this->load->view('footer', $data);
    }

    public function insert(){

        $kotaasal = $_POST['inskotaasal'];
        $kotatujuan = $_POST['inskotatujuan'];
        $harga = $_POST['insharga'];

        $data = array( 
            'id_kota_asal'	=>  $kotaasal,
            'id_kota_tujuan'	=>  $kotatujuan,
            'harga'	=>  $harga 
        );

        $cek = $this->M_harga->cek_harga();

        if($cek > 0){
            $this->session->set_flashdata('error', 'Data Gagal Ditambahkan, Kota Asal dan Kota Tujuan Sudah Ada');
        }else{
            $this->db->insert('harga', $data);
            $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
        }

        redirect('harga', 'refresh');

    }

    // public function update(){
    //     $id = $_POST['id'];
    //     $kota = $_POST['updnamakota'];
     
    //     $data = array(
    //         'nama_kota'	=>  $kota , 
    //     );
     
    //     $where = array(
    //         'id_kota_tujuan' => $id
    //     );

    //     $this->M_kota_tujuan->update($where,$data,'kota_tujuan');
    //     $this->session->set_flashdata('success', 'Data Berhasil Diubah');
    //     redirect('Kota_tujuan', 'refresh');
    // }

    public function hapus($id){
		$where = array('id_harga'=> $id);
        $this->M_harga->hapus($where,'harga');
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		redirect('harga', 'refresh');
    }
 

}
?>
