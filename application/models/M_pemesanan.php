<?php 
 
class m_pemesanan extends CI_Model{
	function pemesanan_baru(){
		 $query = $this->db->query('SELECT * FROM pemesanan JOIN kota_asal on pemesanan.id_kota_asal = kota_asal.id_kota_asal JOIN kota_tujuan on pemesanan.id_kota_tujuan = kota_tujuan.id_kota_tujuan WHERE status = 5 GROUP BY tanggal_berangkat ORDER BY tanggal_berangkat ASC')->result_array();
		 return $query;
	}

	function cek_pemesanan_baru(){
		$query = $this->db->query('SELECT * FROM pemesanan WHERE status = 5')->num_rows();
		return $query;
    }

	function pemesanan_diterima(){
		$query = $this->db->query('SELECT * FROM pemesanan LEFT JOIN kota_asal on pemesanan.id_kota_asal = kota_asal.id_kota_asal LEFT JOIN kota_tujuan on pemesanan.id_kota_tujuan = kota_tujuan.id_kota_tujuan WHERE status = 4')->result_array();
		return $query;
	   }
	   
	function cari_pemesanan_diterima(){
		$tanggal = $this->input->get('id');

		$query = $this->db->query('SELECT pemesanan.id_pemesanan, pemesanan.nama_pemesan, pemesanan.telp_pemesan, pemesanan.jumlah_pemesanan, pemesanan.tanggal_berangkat, pemesanan.id_kota_asal, pemesanan.id_kota_tujuan, pemesanan.lokasi_penjemputan, pemesanan.harga, pemesanan.id_pengemudi, pemesanan.status, kota_asal.nama_kota_asal, kota_tujuan.nama_kota_tujuan, pemesanan.total_harga, users.nama FROM pemesanan LEFT JOIN kota_asal on pemesanan.id_kota_asal = kota_asal.id_kota_asal JOIN kota_tujuan on pemesanan.id_kota_tujuan = kota_tujuan.id_kota_tujuan LEFT JOIN users on pemesanan.id_pengemudi = users.id_user WHERE pemesanan.status NOT IN(2,5) AND tanggal_berangkat = "'.$tanggal.'" ')->result_array();
		return $query;
	   }

	function cek_kode_berangkat_sama(){
		$result = array_unique($this->input->post('tanggalberangkat'));
		$tanggal = implode($result);
		$pengemudi = $this->input->post('pengemudi');
		$query = $this->db->query('SELECT MAX(kode_jadwal) as kode_jadwal from jadwal_berangkat WHERE tanggal_berangkat = "'.$tanggal.'" AND id_pengemudi = "'.$pengemudi.'" ')->row();
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