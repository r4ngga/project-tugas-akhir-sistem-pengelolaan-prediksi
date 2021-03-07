<?php

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengguna_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->GoDefaultPage();

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		} else {
			$this->loginproses();
			//memanggil fungsi untuk login
		}
	}

	private function loginproses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek_userId = $this->db->get_where('tb_pengguna', ['username' => $username])->row_array();
		if ($cek_userId) {
			if (password_verify($password, $cek_userId['pasword'])) {
				$data = [
					'username' => $cek_userId['username'],
					'jenis_akses' => $cek_userId['jenis_akses']
				];
				$this->session->set_userdata($data);
				if ($cek_userId['jenis_akses'] == "admin") {
					redirect('admin');
				} else if ($cek_userId['jenis_akses'] == "pemilik") {
					redirect('pemilik');
				} else {
					redirect('pengguna');
				}
			} else {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                Password akun anda salah!
              </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
				  Username akun anda salah!
				</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->GoDefaultPage();
		$setAutoId = $this->Pengguna_model->cekIdPengguna();
		// contoh USR0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$setnourut = substr($setAutoId, 3, 4);
		$idUserSekarang = $setnourut + 1;
		$setIdview = array('id_user' => $idUserSekarang);
		// $this->load->view("barang", $data);
		// $auto_id['iduser'] = $this->Pengguna_model->generateIdPengguna();

		$this->form_validation->set_rules('nama_pengguna', 'Nama pengguna', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_pengguna.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_pengguna.email]');
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[4]|matches[confirm_password]',
			[
				'matches' => 'password tidak sama',
				'min_length' => 'password minimal diatas 3 karakter'
			]
		);
		$this->form_validation->set_rules(
			'confirm_password',
			'Confirm Password',
			'required|trim|min_length[4]',
			[
				'matches' => 'password tidak sama',
				'min_length' => 'password minimal diatas 3 karakter'
			]
		);
		$data['title'] = 'Register';
		if ($this->form_validation->run() == false) {
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/register', $setIdview);
			$this->load->view('template/auth_footer');
		} else {
			$this->Pengguna_model->tambahdatPengguna();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Registrasi sukses, akun sudah selesai dibuat!!
           </div>');
			redirect('auth');
			//echo "sukses";
		}
	}

	public function forgotpassword()
	{
		$data['title'] = "Forgot Password";
		$this->load->view('template/auth_header', $data);
		$this->load->view('auth/forgot_password');
		$this->load->view('template/auth_footer');
	}

	public function forgotaction()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[4]|matches[password2]',
			[
				'matches' => 'password tidak sama',
				'min_length' => 'password minimal diatas 3 karakter'
			]
		);
		$this->form_validation->set_rules(
			'password2',
			'Confirm Password',
			'required|trim|min_length[4]',
			[
				'matches' => 'password tidak sama',
				'min_length' => 'password minimal diatas 3 karakter'
			]
		);
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
				Gagal reset password karena terjadi suatu kesalahan, silahkan ulangi lagi!!
			</div>');
			redirect('auth/forgotpassword');
		} else {
			$this->Pengguna_model->resetPasswordPengguna();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
				Selamat password akun ada telah direset!!
			</div>');
			redirect('auth/forgotpassword');
		}
	}

	public function log_out()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('jenis_akses');
		$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
    Anda berhasil keluar!!
   </div>');
		redirect('auth');
	}

	public function block()
	{
		$data['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		//echo "Welcome ".$data['user']['name'];
		$data['title'] = 'My Profile';
		$this->load->view('template/header_dashboard', $data);
		// $this->load->view('template/sidebar_pengguna', $data);
		// $this->load->view('template/topbar', $data);
		$this->load->view('auth/block');
		$this->load->view('template/footer_dashboard');
	}

	public function GoDefaultPage()
	{
		if ($this->session->userdata('jenis_akses') == "admin") {
			redirect('admin');
		} else if ($this->session->userdata('jenis_akses') == "pengguna") {
			redirect('pengguna');
		} else if ($this->session->userdata('jenis_akses') == "pemilik") {
			redirect('pemilik');
		} else {
			// jika ada jenis akses yg lain maka tambahkan disini
		}
	}
}
