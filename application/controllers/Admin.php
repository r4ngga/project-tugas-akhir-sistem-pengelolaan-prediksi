<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('Pengguna_model');
		$this->load->model('Kategori_model');
		$this->load->model('Supplier_model');
		$this->load->model('Barang_model');
		$this->load->model('Pembeli_model');
		$this->load->model('Tranmsk_model');
		$this->load->model('Trankeluar_model');
		$this->load->model('Tranretur_model');
		// check_admin();
	}

	public function index()
	{
		$data['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Admin Dashboard';
		$data['tb_brg_msk'] = $this->Tranmsk_model->tampilsemuanofakturlimit();
		$data['tb_brg_keluar'] = $this->Trankeluar_model->tampilsemuanomernotalimit();
		$data['tb_retur'] = $this->Tranretur_model->tampilsemuareturbaranglimit();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer_dashboard');
	}

	public function databarang()
	{
		$data['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Data Barang';
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/databarang/';
		$jumlah_data = $this->Barang_model->jumlah_databarang();
		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 5;

		$config['full_tag_open'] = '<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['next_link'] = 'Selanjutnya';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = 'Sebelumnya';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['first_link'] = 'Awal';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Akhir';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['attributes'] = array('class' => 'page-link');

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		// $this->db->limit($config['per_page'], $from);
		$kat['tb_kategori'] = $this->Kategori_model->setNamaKategori();
		$dt['tb_brg'] = $this->Barang_model->getAlldatBarang($config['per_page'], $from);
		if ($this->input->post('keyword')) {
			$dt['tb_brg'] = $this->Barang_model->caridataBarang();
		}
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('template/sidebar', $data);
		$dt['tb_kategori'] = $this->Kategori_model->getdataKategori();
		$this->load->view('barang/data_barang', $dt);
		$this->load->view('template/footer_dashboard', $kat);
	}

	public function datakategori()
	{
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Data Kategori';
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/datakategori/';
		$jumlah_data = $this->Kategori_model->jumlah_datakategori();
		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 5;

		$config['full_tag_open'] = '<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['next_link'] = 'Selanjutnya';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = 'Sebelumnya';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['first_link'] = 'Awal';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Akhir';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['attributes'] = array('class' => 'page-link');

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['tb_kategori'] = $this->Kategori_model->getAlldatKategori($config['per_page'], $from);
		if ($this->input->post('keyword')) {
			$data['tb_kategori'] = $this->Kategori_model->caridataKategori();
		}
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		$setAutoId = $this->Kategori_model->cekIdKategori();
		// contoh KAT0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$setnourut = substr($setAutoId, 3, 4);
		$idKatSekarang = $setnourut + 1;
		$setIdview = array('id_kategori' => $idKatSekarang);
		$this->load->view('kategori/data_kategori', $data);
		$this->load->view('template/footer_dashboard', $setIdview);
	}

	public function datapengguna()
	{
		$data['title'] = 'Data Pengguna';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/datapengguna/';
		$jumlah_data = $this->Pengguna_model->jumlah_datapengguna();
		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 5;

		$config['full_tag_open'] = '<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['next_link'] = 'Selanjutnya';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = 'Sebelumnya';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['first_link'] = 'Awal';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Akhir';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['attributes'] = array('class' => 'page-link');

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['tb_pengguna'] = $this->Pengguna_model->getAlldatPengguna($config['per_page'], $from);
		if ($this->input->post('keyword')) {
			$data['tb_pengguna'] = $this->Pengguna_model->caridataPengguna();
		}
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		$this->load->view('pengguna/data_pengguna', $data);
		$setAutoId = $this->Pengguna_model->cekIdPengguna();
		// contoh USR0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$setnourut = substr($setAutoId, 3, 4);
		$idUserSekarang = $setnourut + 1;
		$setIdview = array('id_user' => $idUserSekarang);
		$this->load->view('template/footer_dashboard', $setIdview);
	}

	public function editsettpengguna()
	{
		$this->form_validation->set_rules('id_user', 'Id Pengguna', 'required|trim');
		$this->form_validation->set_rules('nama_pengguna', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('pasword', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menyimpan perubahan, karena terdapat kesalahan!!
           </div>');
			redirect('admin/settingpengguna');
		} else {
			$this->Pengguna_model->ubahdataSetting();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Berhasil menyimpan perubahan!!
               </div>');
			redirect('admin/settingpengguna');
		}
	}

	public function datasupplier()
	{
		$data['title'] = 'Data Supplier';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/datasupplier/';
		$jumlah_data = $this->Supplier_model->jumlah_datasupplier();
		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 5;

		$config['full_tag_open'] = '<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['next_link'] = 'Selanjutnya';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = 'Sebelumnya';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['first_link'] = 'Awal';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Akhir';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['attributes'] = array('class' => 'page-link');
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['tb_supplier'] = $this->Supplier_model->getAlldatSupplier($config['per_page'], $from);
		if ($this->input->post('keyword')) {
			$data['tb_supplier'] = $this->Supplier_model->caridataSupplier();
		}
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		$this->load->view('supplier/data_supplier', $data);
		$setAutoId = $this->Supplier_model->cekIdSupplier();
		// contoh SPP0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$setnourut = substr($setAutoId, 3, 4);
		$idSupplierSekarang = $setnourut + 1;
		$setIdview = array('id_supplier' => $idSupplierSekarang);
		$this->load->view('template/footer_dashboard', $setIdview);
	}

	public function datapembeli()
	{
		$data['title'] = 'Data Pembeli';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/datapembeli/';
		$jumlah_data = $this->Pembeli_model->jumlah_datapembeli();
		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 5;

		$config['full_tag_open'] = '<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['next_link'] = 'Selanjutnya';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = 'Sebelumnya';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['first_link'] = 'Awal';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Akhir';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['attributes'] = array('class' => 'page-link');

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['tb_pembeli'] = $this->Pembeli_model->getAlldatPembeli($config['per_page'], $from);
		if ($this->input->post('keyword')) {
			$data['tb_pembeli'] = $this->Pembeli_model->caridatPembeli();
		}
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		$this->load->view('pembeli/data_pembeli', $data);
		$this->load->view('template/footer_dashboard');
	}

	public function settingpengguna()
	{
		$data['title'] = 'Setting';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		$this->load->view('setting/form_setting', $dt);
		$this->load->view('template/footer_dashboard');
	}

	public function datatransaksimasuk()
	{
		$data['title'] = 'Transaksi Masuk';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		//$data['tb_barang'] = $this->Barang_model->getAlldatBarang($config['per_page'], $from);
		$data['tb_barang'] = $this->Barang_model->getAllBarang();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		$data['tb_supplier'] = $this->Supplier_model->getdataSupplier();
		if ($this->input->post('keyword')) {
			$data['tb_barang'] = $this->Barang_model->caridataBarang();
		}
		$this->load->view('transaksimasuk/data_transaksimasuk', $data);
		$this->load->view('template/footer_dashboard');
	}


	public function TambahBarang()
	{
		$this->form_validation->set_rules('id_barang', 'Id Barang', 'required|trim|is_unique[tb_barang.id_barang]');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim|numeric');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|trim|numeric');
		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');
		// $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_pengguna.email]');
		//$data['title'] = 'Register';
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan data barang, karena terdapat kesalahan!!
           </div>');
			redirect('admin/databarang');
		} else {
			//  $this->load->view('template/footer_dashboard', $setIdview);
			$this->Barang_model->tambahdatBarang();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Sukses menambahkan data barang!!
               </div>');
			redirect('admin/databarang');
		}
	}

	public function SetVal_EditPengguna($id_user)
	{
		$data = $this->Pengguna_model->setIdPengguna($id_user);
		echo json_encode($data);
	}

	public function TambahKategori()
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal Menambahkan kategori, karena terdapat kesalahan!!
           </div>');
			redirect('admin/datakategori');
		} else {
			$this->Kategori_model->tambahdatKategori();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses Menambahkan kategori!!
           </div>');
			redirect('admin/datakategori');
		}
	}

	public function TambahSupplier()
	{
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'No Tlp', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal Menambahkan supplier, karena terdapat kesalahan!!
           </div>');
			redirect('admin/datasupplier');
		} else {
			$this->Supplier_model->tambahdatSupplier();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses Menambahkan supplier!!
           </div>');
			redirect('admin/datasupplier');
		}
	}

	public function EditKategori()
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal mengganti data kategori, karena terdapat kesalahan!!
           </div>');
			redirect('admin/datakategori');
		} else {
			$this->Kategori_model->ubahdataKategori();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses mengganti data kategori!!
           </div>');
			redirect('admin/datakategori');
		}
	}

	public function EditSupplier()
	{
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'No Tlp', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal mengganti data supplier, karena terdapat kesalahan!!
           </div>');
			redirect('admin/datasupplier');
		} else {
			$this->Supplier_model->ubahdataSupplier();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses mengganti data supplier!!
           </div>');
			redirect('admin/datasupplier');
		}
	}

	public function EditBarang()
	{
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim|numeric');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|trim|numeric');
		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal mengganti data barang, karena terdapat kesalahan!!
           </div>');
			redirect('admin/databarang');
		} else {
			$this->Barang_model->ubahdataBarang();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Sukses mengganti data barang!!
               </div>');
			redirect('admin/databarang');
		}
	}

	public function HapusKategori()
	{
		$this->form_validation->set_rules('id_kategori', 'Id Kategori', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Gagal menghapus data kategori, karena terdapat kesalahan!!
           </div>');
			redirect('admin/datakategori');
		} else {
			$id_kategori = $this->input->post('id_kategori');
			$this->Kategori_model->hapusdatKategori_m($id_kategori);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menghapus data kategori!!
           </div>');
			redirect('admin/datakategori');
		}
	}

	public function HapusSupplier()
	{
		$this->form_validation->set_rules('id_supplier', 'Id Supplier', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
           Gagal menghapus data supplier, karena terdapat kesalahan!!
           </div>');
			redirect('admin/datasupplier');
		} else {
			$id_supplier = $this->input->post('id_supplier');
			$this->Supplier_model->hapusdatSupplier_m($id_supplier);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Sukses menghapus data supplier!!
               </div>');
			redirect('admin/datasupplier');
		}
	}

	public function HapusBarang()
	{
		$this->form_validation->set_rules('id_barang', 'Id Barang', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
           Gagal menghapus data barang, karena terdapat kesalahan!!
           </div>');
			redirect('admin/databarang');
		} else {
			$id_barang = $this->input->post('id_barang');
			$this->Barang_model->hapusdatBarang_m($id_barang);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
           Sukses menghapus data barang!!
           </div>');
			redirect('admin/databarang');
		}
	}

	public function TransBarangMasuk()
	{
		$this->form_validation->set_rules('no_faktur', 'No Faktur', 'required|trim');
		$this->form_validation->set_rules('id_user', 'Id Pengguna', 'required|trim');
		$this->form_validation->set_rules('tgl_masuk', 'Tgl Masuk', 'required|trim');
		$this->form_validation->set_rules('id_supplier', 'Id Supplier', 'required|trim');
		$this->form_validation->set_rules('hasil_totalhrgbeli', 'Subtotal', 'required|trim');
		// $this->form_validation->set_rules('id_barang', 'Id Barang', 'required|trim');
		if ($this->form_validation->run() == false || $this->input->post('hasil_totalhrgbeli') == '0') {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan transaksi barang masuk, karena terdapat kesalahan!!
           </div>');
			redirect('admin/datatransaksimasuk');
		} else {
			$this->Tranmsk_model->tambahbrgmsk();
			$no_faktur = $this->input->post('nofaktur');
			$harga_beli = $this->input->post('harga_beli');
			$jumlah_brgmsk = $this->input->post('jumlah_brgmsk');
			$id_barang = $this->input->post('idbarang');
			$total_harga_beli = $this->input->post('total_harga_beli');
			$detaildata = array();
			foreach ($no_faktur as $key => $value) {
				$detaildata[]  = array(
					'no_faktur' => $value,
					'id_barang' => $id_barang[$key],
					'harga_beli' => $harga_beli[$key],
					'jumlah_brgmsk' => $jumlah_brgmsk[$key],
					'total_harga_beli' => $total_harga_beli[$key]
				);
			}
			$this->db->insert_batch('tb_detail_brgmsk', $detaildata);
			$count_barang = count($this->input->post('nofaktur'));
			for ($x = 0; $x < $count_barang; $x++) {

				$qty = $this->input->post('stok')[$x];
				$idbarang = $this->input->post('idbarang');
				$update_stok = array('stok' => $qty);
				$this->db->where('id_barang', $idbarang[$x]);
				$this->db->update('tb_barang', $update_stok);
			}

			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Sukses Menambahkan transaksi barang masuk!!
               </div>');
			redirect('admin/datatransaksimasuk');
		}
	}

	public function DetailTransBarangMasuk()
	{
		$detail_tranmasuk = $this->input->post('data_tabel');
		//$this->Tranmmsk_model->tmbhdetailbrgmsk($detail_tranmasuk);
		//$status = $this->Tranmsk_model->tmbhdetailbrgmsk($detail_tranmasuk);
		$cekdetail = $this->Tranmsk_model->ubahstokbarang($detail_tranmasuk);
		$this->output->set_content_type('application/json');
		// echo json_encode(array('status' => $status));
		echo json_encode(array('cekdetail' => $cekdetail));
		// $this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
		//     Sukses Menambahkan transaksi barang masuk!!
		//    </div>');
		// redirect('admin/datatransaksimasuk');
	}

	public function datalaporanmasuk()
	{
		$data['title'] = 'Laporan Barang Masuk';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['tb_brg_msk'] = $this->Tranmsk_model->tampilsemuanofaktur();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		if ($this->input->post('awalperiode') && $this->input->post('akhirperiode')) {
			if ($this->input->post('awalperiode') > $this->input->post('akhirperiode')) {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                    Gagal melakukan pencarian karena tanggal awal lebih besar daripada tanggal akhir!!
                    </div>');
				redirect('admin/datalaporanmasuk');
			} else {
				$data['tb_brg_msk'] = $this->Tranmsk_model->carifakturberdasarkantanggal();
			}
		}
		$data['tgl1'] = $this->input->post('awalperiode');
		$data['tgl2'] = $this->input->post('akhirperiode');
		$this->load->view('laporan/laporan_barangmasuk', $data);
		$this->load->view('template/footer_dashboard');
	}

	public function excelcetakbrgmasuk()
	{
		$tgl_awal = $this->input->post('awalperiode');
		$tgl_akhir = $this->input->post('akhirperiode');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$setExcelprop = new PHPExcel();
		$setExcelprop->getProperties()->setCreator("On Computer");
		$setExcelprop->getProperties()->setLastModifiedBy("On Computer");
		$setExcelprop->getProperties()->setTitle("Laporan Barang Masuk");

		$setExcelprop->setActiveSheetIndex(0);
		$setExcelprop->getActiveSheet()->setCellValue('C1', 'Laporan Barang Masuk On Computer');

		$setExcelprop->getActiveSheet()->setCellValue('B2', 'Jl. Anggajaya, Sanggrahan, Condongcatur, Yogyakarta, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281');

		$setExcelprop->getActiveSheet()->setCellValue('A4', 'Nomer Faktur');
		$setExcelprop->getActiveSheet()->setCellValue('B4', 'Urutan Masuk');
		$setExcelprop->getActiveSheet()->setCellValue('C4', 'Nama Supplier');
		$setExcelprop->getActiveSheet()->setCellValue('D4', 'Id Barang');
		$setExcelprop->getActiveSheet()->setCellValue('E4', 'Nama Barang');
		$setExcelprop->getActiveSheet()->setCellValue('F4', 'Tanggal');
		$setExcelprop->getActiveSheet()->setCellValue('G4', 'Harga Beli');
		$setExcelprop->getActiveSheet()->setCellValue('H4', 'QTY');
		$setExcelprop->getActiveSheet()->setCellValue('I4', 'Total Harga Beli');

		$baris = 5;

		if ($this->input->post('awalperiode') && $this->input->post('akhirperiode')) {
			if ($this->input->post('awalperiode') > $this->input->post('akhirperiode')) {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                    Gagal mencetak laporan karena tanggal awal lebih besar daripada tanggal akhir!!
                    </div>');
				redirect('admin/datalaporanmasuk');
			} else {
				$setExcelprop->getActiveSheet()->setCellValue('B3', 'Dari ' . $tgl_awal . ' sampai ' . $tgl_akhir . '.');
				$data['tb_brg_msk'] = $this->Tranmsk_model->carifakturberdasarkantanggal();
				foreach ($data['tb_brg_msk'] as $dtbm) {
					$setExcelprop->getActiveSheet()->setCellValue('A' . $baris, $dtbm['no_faktur']);
					$setExcelprop->getActiveSheet()->setCellValue('B' . $baris, $dtbm['no_urut_masuk']);
					$setExcelprop->getActiveSheet()->setCellValue('C' . $baris, $dtbm['nama_supplier']);
					$setExcelprop->getActiveSheet()->setCellValue('D' . $baris, $dtbm['id_barang']);
					$setExcelprop->getActiveSheet()->setCellValue('E' . $baris, $dtbm['nama_barang']);
					$setExcelprop->getActiveSheet()->setCellValue('F' . $baris, $dtbm['tgl_masuk']);
					$setExcelprop->getActiveSheet()->setCellValue('G' . $baris, $dtbm['harga_beli']);
					$setExcelprop->getActiveSheet()->setCellValue('H' . $baris, $dtbm['jumlah_brgmsk']);
					$setExcelprop->getActiveSheet()->setCellValue('I' . $baris, $dtbm['total_harga_beli']);
					$baris++;
				}
				$filenamenya = "Laporan_Barang_Masuk_$tgl_awal $tgl_akhir" . '.xlsx';
			}
		} else {
			$setExcelprop->getActiveSheet()->setCellValue('B3', 'Semua data');
			$data['tb_brg_msk'] = $this->Tranmsk_model->tampilsemuanofaktur();
			foreach ($data['tb_brg_msk'] as $dtbm) {
				$setExcelprop->getActiveSheet()->setCellValue('A' . $baris, $dtbm['no_faktur']);
				$setExcelprop->getActiveSheet()->setCellValue('B' . $baris, $dtbm['no_urut_masuk']);
				$setExcelprop->getActiveSheet()->setCellValue('C' . $baris, $dtbm['nama_supplier']);
				$setExcelprop->getActiveSheet()->setCellValue('D' . $baris, $dtbm['id_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('E' . $baris, $dtbm['nama_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('F' . $baris, $dtbm['tgl_masuk']);
				$setExcelprop->getActiveSheet()->setCellValue('G' . $baris, $dtbm['harga_beli']);
				$setExcelprop->getActiveSheet()->setCellValue('H' . $baris, $dtbm['jumlah_brgmsk']);
				$setExcelprop->getActiveSheet()->setCellValue('I' . $baris, $dtbm['total_harga_beli']);
				$baris++;
			}
			$filenamenya = "Laporan_Barang_Masuk_SemuaData" . '.xlsx';
		}
		$setExcelprop->getActiveSheet()->setTitle('Laporan_Barang_Masuk');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $filenamenya . '"');
		header('Cache-Control: max-age=0');
		$writer = PHPExcel_IOFactory::createWriter($setExcelprop, 'Excel2007');
		$writer->save('php://output');
		exit;
	}
}
