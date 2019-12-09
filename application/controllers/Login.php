<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct() {
    parent::__construct();

    $this->redirect_url = 'login';
    $this->load->library('session');
    $this->load->model('M_login');
		date_default_timezone_set('Asia/Jakarta');

    }

   public function index(){
    if($this->session->userdata('username')){
       redirect('beranda');
    }
    $this->load->view('login');

  }
    
    function aksi_login(){

      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $data = array(
        'username' => $username,
        'password' => $password
        );
      $cek = $this->M_login->cek_login("users",$data)->result_array();

      if(count($cek) == 1){
        foreach ($cek as $cek) {
            $hak_akses = $cek['hak_akses'];
            $sess_data['isLogin'] = TRUE;
            $sess_data['id_user'] = $cek['id_user'];
            $sess_data['username'] = $cek['username'];
            $sess_data['hak_akses'] = $cek['hak_akses'];
            $this->session->set_userdata($sess_data, $data);
        }
   
        redirect('beranda','refresh');
   
      }else{
        $this->session->set_flashdata('error', 'Username atau Password Tidak Sesuai');
				redirect('login','refresh');
      }
    }

		function logout() {

			$this->session->sess_destroy();
			redirect('login');
    }

}
?>
