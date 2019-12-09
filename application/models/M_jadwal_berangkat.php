<?php 
 
class m_jadwal_berangkat extends CI_Model{
	function jadwal_berangkat(){
		$query = $this->db->query('SELECT * FROM jadwal_berangkat LEFT JOIN kota_asal on jadwal_berangkat.id_kota_asal = kota_asal.id_kota_asal LEFT JOIN kota_tujuan on jadwal_berangkat.id_kota_tujuan = kota_tujuan.id_kota_tujuan LEFT JOIN pemesanan on jadwal_berangkat.id_pemesanan = pemesanan.id_pemesanan WHERE jadwal_berangkat.status = 1')->result_array();
		return $query;
	}
	   
	function cari_jadwal_berangkat(){
		$tanggal = $this->input->get('id');

		$query = $this->db->query('SELECT jadwal_berangkat.id_jadwal, jadwal_berangkat.kode_jadwal, jadwal_berangkat.id_pemesanan, pemesanan.nama_pemesan, jadwal_berangkat.id_pengemudi, users.nama, SUM(jadwal_berangkat.jumlah_pemesanan) as jumlah_pemesanan FROM jadwal_berangkat LEFT JOIN kota_asal on jadwal_berangkat.id_kota_asal = kota_asal.id_kota_asal LEFT JOIN kota_tujuan on jadwal_berangkat.id_kota_tujuan = kota_tujuan.id_kota_tujuan LEFT JOIN pemesanan on jadwal_berangkat.id_pemesanan = pemesanan.id_pemesanan LEFT JOIN users on jadwal_berangkat.id_pengemudi = users.id_user WHERE jadwal_berangkat.status = 1 AND jadwal_berangkat.tanggal_berangkat = "'.$tanggal.'" GROUP BY jadwal_berangkat.kode_jadwal, jadwal_berangkat.id_pengemudi')->result_array();
		return $query;
	}

	function cari_by_pengemudi(){
		$tanggal = $this->input->get('id');

		$query = $this->db->query('SELECT jadwal_berangkat.id_jadwal, jadwal_berangkat.kode_jadwal, jadwal_berangkat.id_pemesanan, pemesanan.nama_pemesan, jadwal_berangkat.id_pengemudi, SUM(jadwal_berangkat.jumlah_pemesanan) as jumlah_pemesanan FROM jadwal_berangkat LEFT JOIN kota_asal on jadwal_berangkat.id_kota_asal = kota_asal.id_kota_asal LEFT JOIN kota_tujuan on jadwal_berangkat.id_kota_tujuan = kota_tujuan.id_kota_tujuan LEFT JOIN pemesanan on jadwal_berangkat.id_pemesanan = pemesanan.id_pemesanan WHERE jadwal_berangkat.status = 1 AND jadwal_berangkat.tanggal_berangkat = "'.$tanggal.'" GROUP BY jadwal_berangkat.kode_jadwal, jadwal_berangkat.id_pemesanan')->result_array();
		return $query;
	}
	   
	function cari_kode_berangkat(){

		$query = $this->db->query("SELECT MAX(kode_jadwal) as kode_jadwal from jadwal_berangkat")->row();
		return $query;
	}

	// function cek_kode_berangkat_sama(){
	// 	$tanggal = $this->input->post('tanggalberangkat');
	// 	$pengemudi = $this->input->post('pengemudi');
	// 	$query = $this->db->query("SELECT MAX(kode_jadwal) as kode_jadwal from jadwal_berangkat where tanggal_berangkat = '".$tanggal."' and id_pengemudi = '".$pengemudi."' ")->row();
	// 	return $query;
	// }

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

// 	function hapus($where,$table){
// 		$this->db->where($where);
// 		$this->db->delete($table);
// 	}
 
}