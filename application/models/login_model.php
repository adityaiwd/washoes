<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function register($data)
    {
        $this->db->insert('users', $data);
    }

    public function login($username, $password)
    { 
		$query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
		return $query->num_rows() > 0 ? true : false;
	}

	public function getKelurahan($data){
		return $this->db->query("SELECT (SELECT nama FROM kecamatan kec WHERE kec.ID_KECAMATAN = kel.ID_KECAMATAN) as NAMA, kel.ID_KECAMATAN FROM kelurahan kel WHERE kel.ID_KELURAHAN = $data")->result();
	}
}

/* End of file Login_model.php */
