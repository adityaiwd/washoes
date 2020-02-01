<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function load($type = null)
	{
		return $this->db->order_by('nama', 'asc')->get($type);
	}

	public function login($username, $password)
	{
		$query = $this->db->get_where('admin', array('username' => $username, 'password' => $password));
		return $query->num_rows() > 0 ? true : false;
	}

	public function loadOrder()
	{
		return $this->db->order_by('tanggal','DESC')->get('orders')->result();
	}

	public function loadOrderDetail($id_order)
	{
		return $this->db->query("SELECT o.id_order, u.id_user, u.nama, u.alamat ,o.tanggal, 
		(kelHarga + kecHarga) AS ongkos, kecamatanNama, kelurahanNama,
		(SELECT l.nama FROM layanan l WHERE p.id_layanan = l.id_layanan) AS layanan, p.id_layanan, p.sub_total, 
		(SELECT s.stat FROM status s where o.status = s.id_status) AS status, o.total_harga 
		FROM orders o JOIN users u ON o.id_user = u.id_user JOIN pesanan p ON o.id_order = p.id_order 
		JOIN (SELECT nama AS kelurahanNama, id_kelurahan, harga AS kelHarga FROM kelurahan) AS kel ON u.id_kelurahan = kel.id_kelurahan 
		JOIN (SELECT nama AS kecamatanNama, id_kecamatan, harga AS kecHarga FROM kecamatan) AS kec ON u.id_kecamatan = kec.id_kecamatan 
		WHERE o.id_order = $id_order")->result();
	}

	public function loadPesanan($id_order)
	{
		return $this->db->query("SELECT p.id_pesanan, l.nama, p.sub_total FROM pesanan p 
		JOIN layanan l on l.id_layanan = p.id_layanan WHERE p.id_order = $id_order")->result();
	}

	public function loadStatus()
	{
		return $this->db->get('status');
	}

	public function delete($var, $type, $uid)
	{
		if ($type == "order") {
			$this->db->delete('pesanan', array('id_order' => $var));
			$this->db->delete('orders', array('id_order' => $var));
			$this->db->query("UPDATE users 
			SET pesanan = pesanan - 1
			WHERE id_user = '" . $uid . "'");
		}
	}

	public function loadUser()
	{
		return $this->db->query("SELECT u.id_user, kel.nama AS kelurahan, kec.nama AS kecamatan, u.nama, u.username, u.email, u.alamat FROM users u 
		JOIN kelurahan kel on kel.id_kelurahan = u.id_kelurahan JOIN kecamatan kec on kec.id_kecamatan = u.id_kecamatan")->result();
	}

	public function updateOrder($data)
	{
		$this->db->where('id_order', $data['id_order'])->update('orders', array('status' => $data['status']));
	}

	public function count($var){
		return $this->db->query("SELECT COUNT(*) AS jml FROM $var")->result_array();
	}
}

/* End of file Admin_model.php */
