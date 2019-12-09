<?php 
 
class m_pengemudi extends CI_Model{
	function cari_jadwal_berangkat(){
		$tanggal = $this->input->get('id');
		if($this->session->userdata('hak_akses') == 2){
			$pengemudi = $this->input->get('idx');
		}else{
			$pengemudi = $this->input->get('idxall');
		}

		$query = $this->db->query('SELECT jadwal_berangkat.id_jadwal, jadwal_berangkat.kode_jadwal, jadwal_berangkat.id_pemesanan, pemesanan.nama_pemesan, jadwal_berangkat.id_pengemudi, users.nama, SUM(jadwal_berangkat.jumlah_pemesanan) as jumlah_pemesanan FROM jadwal_berangkat LEFT JOIN kota_asal on jadwal_berangkat.id_kota_asal = kota_asal.id_kota_asal LEFT JOIN kota_tujuan on jadwal_berangkat.id_kota_tujuan = kota_tujuan.id_kota_tujuan LEFT JOIN pemesanan on jadwal_berangkat.id_pemesanan = pemesanan.id_pemesanan LEFT JOIN users on jadwal_berangkat.id_pengemudi = users.id_user WHERE jadwal_berangkat.status = 1 AND jadwal_berangkat.tanggal_berangkat = "'.$tanggal.'" AND jadwal_berangkat.id_pengemudi = "'.$pengemudi.'" GROUP BY jadwal_berangkat.kode_jadwal, jadwal_berangkat.id_pengemudi')->result_array();
		return $query;
	}

	function cari_by_pengemudi(){
		$tanggal = $this->input->get('id');
		if($this->session->userdata('hak_akses') == 2){
			$pengemudi = $this->input->get('idx');
		}else{
			$pengemudi = $this->input->get('idxall');
		}

		$query = $this->db->query('SELECT jadwal_berangkat.id_jadwal, jadwal_berangkat.kode_jadwal, jadwal_berangkat.id_pemesanan, pemesanan.nama_pemesan, jadwal_berangkat.id_pengemudi, SUM(jadwal_berangkat.jumlah_pemesanan) as jumlah_pemesanan, pemesanan.telp_pemesan FROM jadwal_berangkat JOIN kota_asal on jadwal_berangkat.id_kota_asal = kota_asal.id_kota_asal JOIN kota_tujuan on jadwal_berangkat.id_kota_tujuan = kota_tujuan.id_kota_tujuan JOIN pemesanan on jadwal_berangkat.id_pemesanan = pemesanan.id_pemesanan WHERE jadwal_berangkat.status = 1 AND jadwal_berangkat.tanggal_berangkat = "'.$tanggal.'" AND jadwal_berangkat.id_pengemudi = "'.$pengemudi.'" GROUP BY jadwal_berangkat.kode_jadwal, jadwal_berangkat.id_pemesanan')->result_array();
		return $query;
	}

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

// 	function hapus($where,$table){
// 		$this->db->where($where);
// 		$this->db->delete($table);
// 	}
 
}