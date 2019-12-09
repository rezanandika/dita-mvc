<?php 
 
class m_kota_tujuan extends CI_Model{
	function ambil_kota(){
		 $query = $this->db->query('SELECT * FROM kota_tujuan')->result_array();
		 return $query;
	}

   	function cek_kota(){
		$kota = $this->input->post('inskota');

		$query = $this->db->query('SELECT nama_kota_tujuan FROM kota_tujuan WHERE nama_kota_tujuan = "'.$kota.'" ')->num_rows();
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