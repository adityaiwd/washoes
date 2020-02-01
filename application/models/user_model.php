<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function loadUser()
	{
		$this->db->select('u.id_user, u.nama,u.username,u.alamat, u.email, k.nama AS kelurahan, c.nama AS kecamatan');
		$this->db->from('users u');
		$this->db->join('kelurahan k', 'u.id_kelurahan = k.id_kelurahan');
		$this->db->join('kecamatan c', 'u.id_kecamatan = c.id_kecamatan');
		$this->db->where('username', $this->session->userdata('user_id'));
		return $this->db->get()->result();
	}

	private function checkUserId(){
		$this->db->select('id_user');
		$this->db->from('users');
		$this->db->where('username', $this->session->userdata('user_id'));
		return $this->db->get()->result()[0]->id_user;
	}
	public function loadOrder()
	{
		$this->db->where('id_user', $this->checkUserId());
		return $this->db->get('orders')->result();
	}
	public function ubahPassword()
	{ }
}

/* End of file User_model.php */
