<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');


class home extends CI_Controller {

	function __construct() {
    parent::__construct();

    $this->redirect_url = 'home';
    //$this->load->module('Kota_asal');
    $this->load->library('session');
		date_default_timezone_set('Asia/Jakarta');

    }


  public function index(){
        $this->load->model('M_pemesanan');
        $data['count'] = $this->M_pemesanan->cek_pemesanan_baru();
        $data['pemesananbaru'] = $this->M_pemesanan->pemesanan_baru();

        $this->load->model('M_kota_asal');
        $this->load->model('M_kota_tujuan');

        $data['kota_asal'] = $this->M_kota_asal->ambil_kota();
        $data['kota_tujuan'] = $this->M_kota_tujuan->ambil_kota();
        $this->load->view('home', $data);
  }

  public function get_kode(){
      $akhir = $this->db->query("SELECT MAX(id_pemesanan) as id_pemesanan from pemesanan")->row();
      $in = substr($akhir->id_pemesanan, 5, 3);

      $in++;
      $date = substr(date('Y'), 2);
      $char = $date.'PSN';
      $last = $char. sprintf('%03s',$in);
      $first = substr($akhir->id_pemesanan, 0, 3);
      $kodebooking = $last;

      return $kodebooking;
  }

  public function insert(){

        $this->load->model('M_kota_asal');
        $this->load->model('M_kota_tujuan');

        $data['kota_asal'] = $this->M_kota_asal->ambil_kota();
        $data['kota_tujuan'] = $this->M_kota_tujuan->ambil_kota();
        
        $nama = $_POST['namapenumpang'];
        $telp = $_POST['telppenumpang'];
        $kodetelp = '62';
        $jumlah = $_POST['jumlahpenumpang'];
        $tanggal = $_POST['tanggalberangkat'];
        $asal = $_POST['kotaasal'];
        $tujuan = $_POST['kotatujuan'];
        $harga = $_POST['harga'];
        $totalharga = $_POST['totalharga'];
        $lokasijemput = $_POST['lokasipenjemputan'];
        $input = date('Y-m-d H:i:s');

        $data['nama'] = $nama;
        $data['telp'] = $telp;
        $data['jumlah'] = $jumlah;
        $data['tanggal'] = $tanggal;
        $data['asal'] = $asal;
        $data['tujuan'] = $tujuan;
        $data['lokasijemput'] = $lokasijemput;
        $data['harga'] = $harga;
        $data['totalharga'] = $totalharga;

        $arr = array( 
            'id_pemesanan' => $this->get_kode(),
            'nama_pemesan'	=>  $nama , 
            'telp_pemesan'=>  $kodetelp.''.$telp, 
            'jumlah_pemesanan'	=>  $jumlah,
            'tanggal_berangkat' => $tanggal,
            'id_kota_asal' => $asal,
            'id_kota_tujuan' => $tujuan,
            'harga' => $harga,
            'total_harga' => $totalharga,
            'lokasi_penjemputan' => $lokasijemput,
            'waktu_order' => $input,
            'status' => 5,
            'id_pengemudi' => ''

        );

        $this->db->insert('pemesanan', $arr);
        if($this->db->affected_rows() > 0){
            $data['cek'] = $this->get_kode();
            $this->load->view('pesan_sukses', $data);
        }else{
            $this->session->set_flashdata('error', 'Anda gagal memesan');
            redirect('home', 'refresh');
        }

  }

    public function cek_harga_user(){
        $this->load->model('M_harga');
        $data = $this->M_harga->cek_harga_user();
        if(count($data) > 0){
        echo $data->harga; 
        }
    }


  
}