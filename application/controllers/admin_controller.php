<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		if ($this->session->userdata('status') === 'login') {
			if ($this->session->userdata('type') === 'admin') { } else {
				echo "<script>
					alert('Akses dilarang!');
					window.location.href='" . base_url() . "';
				</script>";
			}
		} else {
			echo "<script>
				alert('Silahkan login terlebih dahulu');
				window.location.href='" . base_url('administrator') . "';
			</script>";
		}
	}

	public function index()
	{
		$data = array(
			'users' => $this->modAdmin->count('users'),
			'orders' => $this->modAdmin->count('orders'),
			'kecamatan' => $this->modAdmin->count('kecamatan'),
			'kelurahan' => $this->modAdmin->count('kelurahan')
		);
		$this->load->view('admin/header');
		$this->load->view('admin/dashboard',$data);		
		$this->load->view('admin/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	public function getDataPesan($var = null)
	{
		if (!$var) {
			show_404();
		}

		$data['pesanan'] = $this->modAdmin->loadPesanan($var);
		$this->load->view('admin/header');
		$this->load->view('admin/pesanan_data', $data);
		$this->load->view('admin/footer');
	}

	public function getDataDaerah()
	{
		$data = array(
			'kelurahan' => $this->modAdmin->load('kelurahan'),
			'kecamatan' => $this->modAdmin->load('kecamatan')
		);

		$this->load->view('admin/header');
		$this->load->view('admin/daerah_data', $data);
		$this->load->view('admin/footer');
	}

	public function getDataUser()
	{
		$data['user'] = $this->modAdmin->loadUser();
		$this->load->view('admin/header');
		$this->load->view('admin/users_data', $data);
		$this->load->view('admin/footer');
	}

	public function getDataOrder()
	{
		$data['order'] = $this->modAdmin->loadOrder();
		$this->load->view('admin/header');
		$this->load->view('admin/orders_data', $data);
		$this->load->view('admin/footer');
	}

	public function editDataOrder($id)
	{
		$data['order'] = $this->modAdmin->loadOrderDetail($id);
		$hasil['status'] = $this->modAdmin->loadStatus();

		$identitas = $data['order'][0];
		$layanan = [];
		$sum = 0;
		foreach ($data['order'] as $key => $value) {
			$sum += $data['order'][$key]->sub_total;
			array_push($layanan, array(
				'id_layanan' => $data['order'][$key]->id_layanan,
				'nama' => $data['order'][$key]->layanan, 'harga' => $data['order'][$key]->sub_total
			));
		}

		$hasil['result'] = array(
			'invoiceNumber' => $identitas->id_order,
			'id_user' => $identitas->id_user,
			'nama' => $identitas->nama,
			'alamat' => $identitas->alamat,
			'kecamatan' => $identitas->kecamatanNama,
			'kelurahan' => $identitas->kelurahanNama,
			'tanggal' => $identitas->tanggal,
			'status' => $identitas->status,
			'pesan' => $layanan,
			'layananTotal' => $sum,
			'ongkos' => $identitas->ongkos,
			'total' => $identitas->total_harga,
		);
		// echo json_encode($hasil['result']);
		$this->load->view('admin/header');
		$this->load->view('admin/edit_order', $hasil);
		$this->load->view('admin/footer');
	}

	public function do_editDataOrder()
	{
		$data = array(
			'id_order' => $this->input->post('id_order'),
			'status' => $this->input->post('status')
		);
		$id = $data['id_order'];
		$this->modAdmin->updateOrder($data);
		$this->session->set_flashdata('orderEdit', "No Invoice {$id} berhasil diedit");
		redirect('order');
	}

	public function deleteDataOrder($id, $id_user)
	{
		$this->modAdmin->delete($id, 'order', $id_user);
		$this->session->set_flashdata('orderDel', "No Invoice {$id} berhasil dihapus");
		redirect('order');
	}

	// public function deleteDataUser($id)
	// {
	// 	$this->modAdmin->delete($id, 'users');
	// 	$this->session->set_flashdata('userDel', "User {$id} berhasil dihapus");
	// 	redirect('users');
	// }
}

/* End of file Admin_controller.php */
