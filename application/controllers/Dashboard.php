<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login'))) {
			$this->session->set_flashdata('flash-error', 'Anda Belum Login');
			redirect('Auth', 'refresh');
		}

		$this->load->model('M_Riwayat', 'riwayat');
		$this->load->model('M_User', 'user');
		$this->load->model('M_Akses', 'akses');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] = 'backend/dashboard';
		$data['user'] = $this->user->getAll();
		$data['riwayat'] = $this->riwayat->getAll();
		$data['riwayat_hari_ini'] = $this->riwayat->getHariIni();

		$this->load->view('backend/index', $data);
	}

	public function dashboard_realtime()
	{
		$data = [
			"user" => count($this->user->getAll()),
			"riwayat" => count($this->riwayat->getAll()),
			"hari_ini" => count($this->riwayat->getHariIni())
		];

		echo json_encode($data);
	}

	public function profile()
	{
		$data['title'] = 'Profile';
		$data['page'] = 'backend/profile';
		$this->load->view('backend/index', $data);
	}

	public function editProfile()
	{
		if ($this->input->post('password', true)) {
			$data = [
				"nama" => $this->input->post('nama', true),
				"password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
			];
		} else {
			$data = [
				"nama" => $this->input->post('nama', true)
			];
		}

		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbadmin', $data);

		$this->session->set_flashdata('flash-sukses', 'Profile berhasil diedit');
		redirect('Dashboard/profile');
	}

	public function riwayat()
	{
		$data['title'] = 'Daftar Riwayat';
		$data['page'] = 'backend/riwayat';
		$data['riwayat'] = $this->riwayat->getJoin();
		$this->load->view('backend/index', $data);
	}

	public function user()
	{
		$data['title'] = 'Daftar User';
		$data['page'] = 'backend/user';
		$data['user'] = $this->user->getAll();
		$this->load->view('backend/index', $data);
	}

	public function akses()
	{
		$data['title'] = 'Akses Brankas';
		$data['page'] = 'backend/akses';
		$data['akses'] = $this->akses->get();
		$this->load->view('backend/index', $data);
	}

	public function editAkses()
	{
		$this->akses->editAkses();
		$this->session->set_flashdata('flash-success', 'Akses berhasil diedit');
		redirect('Dashboard/akses');
	}

	public function hapusRiwayat($id)
	{
		$this->riwayat->hapusRiwayat($id);
		$this->session->set_flashdata('flash-sukses', 'Data berhasil dihapus');
		redirect('Dashboard/riwayat');
	}

	public function addUser()
	{
		$this->user->addUser();
		$this->session->set_flashdata('flash-sukses', 'User berhasil ditambahkan');

		redirect('Dashboard/user');
	}

	public function editUser()
	{
		$this->user->editUser();
		$this->session->set_flashdata('flash-success', 'User berhasil diedit');
		redirect('Dashboard/user');
	}

	public function hapusUser($id)
	{
		$this->user->hapusUser($id);
		$this->session->set_flashdata('flash-sukses', 'User berhasil dihapus');
		redirect('Dashboard/user');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */