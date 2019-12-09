<?php 
 
class m_pengguna extends CI_Model{
	function ambil_admin(){
		$user = $this->session->userdata('id_user');
		$query = $this->db->query('SELECT * FROM users WHERE hak_akses = 1 and id_user = "'.$user.'" ')->result_array();
		return $query;
	}

	function ambil_pengemudi(){
		$query = $this->db->query('SELECT * FROM users WHERE hak_akses = 2')->result_array();
		return $query;
   	}

	function ambil_sess_pengemudi(){
		$sess = $this->session->userdata('username');
		
		$query = $this->db->query('SELECT * FROM users WHERE hak_akses = 2 AND username = "'.$sess.'" ')->result_array();
		return $query;
   	}

   	function cek_insert_admin(){
		$user = $this->input->post('insusername');

		$query = $this->db->query('SELECT username FROM users WHERE username = "'.$user.'" AND hak_akses = 1 ')->num_rows();
		return $query;
	}
	   
	function cek_insert_pengemudi(){
		$user = $this->input->post('insusername');

		$query = $this->db->query('SELECT username FROM users WHERE username = "'.$user.'" AND hak_akses = 2 ')->num_rows();
		return $query;
	}
	   
	function cek_update_admin(){
		$user = $this->input->post('updusername');

		$query = $this->db->query('SELECT username FROM users WHERE username = "'.$user.'" AND hak_akses = 1 ')->num_rows();
		return $query;
	}

	function cek_update_pengemudi(){
		$user = $this->input->post('updusername');

		$query = $this->db->query('SELECT username FROM users WHERE username = "'.$user.'" AND hak_akses = 2 ')->num_rows();
		return $query;
	}

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
 
}