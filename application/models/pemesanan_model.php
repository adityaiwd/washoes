<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{

	public function load()
	{
		return $this->db->get('layanan');
	}

	public function insert($data)
	{
		$this->db->insert('pemesanan', $data);
	}

	public function loadUser()
	{
		$this->db->select('u.id_user, u.nama,u.username,u.alamat, k.nama AS kelurahan, c.nama AS kecamatan, k.harga AS kel_harga, c.harga AS kec_harga, u.pesanan');
		$this->db->from('users u');
		$this->db->join('kelurahan k', 'u.id_kelurahan = k.id_kelurahan');
		$this->db->join('kecamatan c', 'u.id_kecamatan = c.id_kecamatan');
		$this->db->where('username', $this->session->userdata('user_id'));
		return $this->db->get();
	}

	public function cekInvoice($var = null)
	{
		$query = $this->db->query("SELECT o.id_order, u.id_user, u.nama, 
			CONCAT(u.alamat ,\" \", kelurahanNama,\" \", kecamatanNama) AS alamat ,o.tanggal, (kelHarga + kecHarga) AS ongkos,
			(SELECT l.nama FROM layanan l WHERE p.id_layanan = l.id_layanan) AS layanan, p.id_layanan, p.sub_total, 
			(SELECT s.stat FROM status s where o.status = s.id_status) AS status, o.total_harga 
			FROM orders o JOIN users u ON o.id_user = u.id_user JOIN pesanan p ON o.id_order = p.id_order 
			JOIN (SELECT nama AS kelurahanNama, id_kelurahan, harga AS kelHarga FROM kelurahan) AS kel ON u.id_kelurahan = kel.id_kelurahan 
			JOIN (SELECT nama AS kecamatanNama, id_kecamatan, harga AS kecHarga FROM kecamatan) AS kec ON u.id_kecamatan = kec.id_kecamatan 
			WHERE o.id_order = {$var}");
		return $query;
	}

	public function insertOrders($data)
	{
		$this->db->insert('orders', $data);
	}
	public function insertPesanan($data, $id_order)
	{
		foreach ($data as $key => $value) {
			$listPesan = array(
				'id_order' => $id_order,
				'id_layanan' => $data[$key]['id_layanan'],
				'sub_total' => $data[$key]['harga']
			);
			$this->db->insert('pesanan', $listPesan);
		}
	}
	public function updateUserPesanan($var)
	{
		$this->db->query("UPDATE users 
		SET pesanan = pesanan + 1
		WHERE id_user = '" . $var . "'");
	}
}

/* End of file Pemesanan_model.php */
