<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller
{

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('home/index');
		$this->load->view('template/footer');
	}

	public function do_logout()
	{
		if ($this->session->userdata('type') === "user") {
			$this->session->sess_destroy();
			redirect();
		} else {
			redirect();
		}
	}
}

/* End of file Dashboard_controller.php */
