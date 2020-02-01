<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		if ($this->session->userdata('status') === 'login') {
			if ($this->session->userdata('type') === 'user') {
				$data = array(
					'users' => $this->modPemesanan->loadUser()
				);
				$this->load->view('template/header');
				$this->load->view('home/pemesanan', $data);
				$this->load->view('template/footer');
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

	public function list()
	{
		$data['load'] = $this->modPemesanan->load();
		$this->load->view('template/header');
		$this->load->view('home/list', $data);
		$this->load->view('template/footer');
	}

	public function loadLayanan()
	{
		$data = $this->modPemesanan->load()->result();
		echo json_encode($data);
	}

	public function cekInvoice()
	{
		$invoiceID = $this->input->get('invoice');
		if (!preg_match('/^\d+$/', $invoiceID) || empty($invoiceID)) {
			$this->session->set_flashdata('invoiceInfo', 'Nomor invoice hanya bisa format angka!');
			redirect('');
		}

		$data['invoiceData'] = $this->modPemesanan->cekInvoice($invoiceID)->result() ?? false;
		if (!$data['invoiceData']) {
			$this->session->set_flashdata('invoiceInfo', 'Nomor invoice yang anda cari tidak ditemukan!');
			redirect('');
		}
		// print_r(json_encode($data['invoiceData']));
		$identitas = $data['invoiceData'][0];
		$layanan = [];
		$sum = 0;
		foreach ($data['invoiceData'] as $key => $value) {
			$sum += $data['invoiceData'][$key]->sub_total;
			array_push($layanan, array(
				'id_layanan' => $data['invoiceData'][$key]->id_layanan,
				'nama' => $data['invoiceData'][$key]->layanan, 'harga' => $data['invoiceData'][$key]->sub_total
			));
		}
		$hasil['result'] = array(
			'invoiceNumber' => $identitas->id_order,
			'id_user' => $identitas->id_user,
			'nama' => $identitas->nama,
			'alamat' => $identitas->alamat,
			'tanggal' => $identitas->tanggal,
			'status' => $identitas->status,
			'pesan' => $layanan,
			'layananTotal' => $sum,
			'ongkos' => $identitas->ongkos,
			'total' => $identitas->total_harga,
		);
		// print_r(json_encode($hasil['result']));

		$this->load->view('template/header');
		$this->load->view('home/invoice', $hasil);
		$this->load->view('template/footer');
	}

	public function do_pemesanan()
	{
		if (empty($_POST['pesanan'])) {
			show_404();
		}

		$data = json_decode($this->input->post('pesanan'), true);
		$id_user = $data['id_user'];
		array_push($data['invoiceNumber'] =  $this->invoiceGenerate($id_user));
		if (write_file("./files/file00{$id_user}.json", json_encode($data))) {
			echo "success";
		} else {
			echo "failed";
		}
	}

	private function invoiceGenerate($id = null)
	{
		$randomNumber = mt_rand(1, 99);
		$date = new DateTime('now');
		return (int)("{$id}0" . $date->format('dm') . $randomNumber);
	}

	public function confirmPemesanan($id = null)
	{
		$data = @file_get_contents("./files/file00{$id}.json") or show_404();
		$pesanan['result'] = json_decode($data, true);
		// clear
		$this->load->view('template/header');
		$this->load->view('home/confirm', $pesanan);
		$this->load->view('template/footer');
	}

	public function pesanSekarang($id = null)
	{
		$data = @file_get_contents("./files/file00{$id}.json") or show_404();
		$hasil['result'] = json_decode($data, true);
		// clear
		$pecahHasilJSON = $hasil['result'];
		$orders = array(
			'id_order' => $pecahHasilJSON['invoiceNumber'],
			'id_user' => $pecahHasilJSON['id_user'],
			'tanggal' => $pecahHasilJSON['tanggal'],
			'total_harga' => $pecahHasilJSON['total']
		);
		$this->modPemesanan->insertOrders($orders);
		$this->modPemesanan->insertPesanan($pecahHasilJSON['pesan'], $pecahHasilJSON['invoiceNumber']);
		$this->modPemesanan->updateUserPesanan($orders['id_user']);
		unlink("./files/file00{$id}.json");
		$this->session->set_flashdata('pesanBerhasil', "Pemesanan berhasil, nomor invoice anda adalah {$pecahHasilJSON['invoiceNumber']}");
		redirect('');
	}
}

/* End of file Pemesanan_controller.php */
