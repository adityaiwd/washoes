<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') === 'login') {
			if ($this->session->userdata('type') === 'user') { 
				
			} else {
				echo "<script>
					alert('Akses dilarang!');
					window.location.href='" . base_url() . "';
				</script>";
			}
		} else {
			echo "<script>
				alert('Silahkan login terlebih dahulu');
				window.location.href='" . base_url('login') . "';
			</script>";
		}
	}

	public function index()
	{
		$data['user'] = $this->modUser->loadUser();
		$data['order'] = $this->modUser->loadOrder();

		$this->load->view('template/header');
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	public function changePassword(){
		$this->load->view('template/header');
		$this->load->view('user/password');
		$this->load->view('template/footer');
		
	}
}

/* End of file User_controller.php */
