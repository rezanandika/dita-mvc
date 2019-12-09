<?php 
 
class m_harga extends CI_Model{
	function ambil_harga(){

		 $query = $this->db->query('SELECT * FROM harga LEFT JOIN kota_asal on harga.id_kota_asal = kota_asal.id_kota_asal LEFT JOIN kota_tujuan on harga.id_kota_tujuan = kota_tujuan.id_kota_tujuan')->result_array();
		 return $query;
	}

   	function cek_harga(){
		$kotaasal = $this->input->post('inskotaasal');
		$kotatujuan = $this->input->post('inskotatujuan');

		$query = $this->db->query('SELECT id_kota_asal, id_kota_tujuan FROM harga WHERE id_kota_asal = "'.$kotaasal.'" AND id_kota_tujuan = "'.$kotatujuan.'" ')->num_rows();
		return $query;
	   }
	   
	
	function cek_harga_user(){
		if($this->input->get('asal') != NULL){
		$kotaasal = $this->input->get('asal'); 
		}else{
			$kotaasal = '0';
		}
		if($this->input->get('tujuan') != NULL){
		$kotatujuan = $this->input->get('tujuan'); 
		}else{
			$kotatujuan = '0';
		}

		$query = $this->db->query('SELECT harga FROM harga WHERE id_kota_asal = "'.$kotaasal.'" AND id_kota_tujuan = "'.$kotatujuan.'" ')->row();
		return $query;
	}

	// function update($where,$data,$table){
	// 	$this->db->where($where);
	// 	$this->db->update($table,$data);
	// }	

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
 
}