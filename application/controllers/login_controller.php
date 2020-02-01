<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('status') === "login") {
			if ($this->session->userdata('type') === "user") {
				echo "<script>
				alert('Anda sudah terhubung');
				window.location.href='" . base_url() . "';
				</script>";
			} else if ($this->session->userdata('type') === "admin") {
				echo "<script>
				alert('Anda sudah terhubung');
				window.location.href='" . base_url() . "';
				</script>";
			}
		}
	}

	public function index()
	{
		$this->load->view('login/login');
	}

	public function administrator()
	{
		$this->load->view('login/administrator');
	}

	public function register()
	{
		$data['kelurahan'] = $this->modAdmin->load('kelurahan');
		$this->load->view('login/register', $data);
	}

	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'username', 'required|min_length[6]|max_length[16]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[16]');

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			if ($this->modLogin->login($username, md5($password)) === true) {

				$data_session = array(
					'user_id' => $username,
					'status' => "login",
					'type' => "user"
				);

				$this->session->set_userdata($data_session);

				echo "<script>
                	window.location.href='" . site_url() . "';
                	</script>";
			} else {
				echo "<script>
					alert('Username dan Password salah!');
					window.location.href='" . site_url() . "';
					</script>";
			}
		}
	}

	public function do_register()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$id_kelurahan = $this->input->post('kelurahan');
		$id_kecamatan = $this->input->post('kecamatan');

		$this->form_validation->set_rules('nama', 'nama', 'required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('username', 'username', 'required|min_length[6]|max_length[16]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[16]');
		$this->form_validation->set_rules('email', 'email', 'required|min_length[1]|max_length[100]|valid_email');
		$this->form_validation->set_rules('alamat', 'alamat', 'required|min_length[7]|max_length[200]');

		if ($this->form_validation->run() == false) {
			$this->register();
		} else {
			$data = array(
				'id_kelurahan' => $id_kelurahan,
				'id_kecamatan' => $id_kecamatan,
				'nama' => $nama,
				'username' => $username,
				'password' => md5($password),
				'alamat' => $alamat,
				'email' => $email
			);

			$this->modLogin->register($data);
			// $this->session->set_flashdata('name', 'value');
			redirect('');
		}
	}

	public function do_alogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'username', 'required|min_length[6]|max_length[16]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[16]');

		if ($this->form_validation->run() == false) {
			$this->administrator();
		} else {
			if ($this->modAdmin->login($username, md5($password)) === true) {

				$data_session = array(
					'admin_id' => $username,
					'status' => "login",
					'type' => "admin"
				);

				$this->session->set_userdata($data_session);

				echo "<script>
					window.location.href='" . site_url('admin') . "';
					alert('Login Berhasil');
                	</script>";
			} else {
				echo "<script>
					alert('Username dan Password salah!');
					window.location.href='" . site_url('alogin') . "';
					</script>";
			}
		}
	}

	public function cek_kelurahan($val = null)
	{
		if ($val < 0) return;
		$data = $this->modLogin->getKelurahan($val);
		echo json_encode($data);
	}
}

/* End of file Login_controller.php */
