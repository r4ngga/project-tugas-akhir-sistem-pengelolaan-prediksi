<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('Kategori_model');
		$this->load->model('Supplier_model');
		$this->load->model('Barang_model');
		$this->load->model('Pembeli_model');
		$this->load->model('Pengguna_model');
		$this->load->model('Trankeluar_model');
		$this->load->model('Tranmsk_model');
		$this->load->model('Tranretur_model');
		// check_pengguna();
	}
	public function index()
	{
		$data['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Pengguna Dashboard';
		$data['tb_brg_msk'] = $this->Tranmsk_model->tampilsemuanofakturlimit();
		$data['tb_brg_keluar'] = $this->Trankeluar_model->tampilsemuanomernotalimit();
		$data['tb_retur'] = $this->Tranretur_model->tampilsemuareturbaranglimit();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('pengguna/index', $data);
		$this->load->view('template/footer_dashboard');
	}

	public function datasupplier_p()
	{
		$data['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Data Supplier';
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'pengguna/datasupplier_p/';
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
		$dt['tb_supplier'] = $this->Supplier_model->getAlldatSupplier($config['per_page'], $from);
		if ($this->input->post('keyword')) {
			$dt['tb_supplier'] = $this->Supplier_model->caridataSupplier();
		}
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('supplier/data_supplier', $dt);
		$this->load->view('template/footer_dashboard');
	}

	public function datakategori_p()
	{
		$data['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Data Kategori';
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'pengguna/datakategori_p/';
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
		$dt['tb_kategori'] = $this->Kategori_model->getAlldatKategori($config['per_page'], $from);
		if ($this->input->post('keyword')) {
			$dt['tb_kategori'] = $this->Kategori_model->caridataKategori();
		}
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('kategori/data_kategori', $dt);
		$this->load->view('template/footer_dashboard');
	}

	public function databarang_p()
	{
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Data Barang';
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'pengguna/databarang_p/';
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
		$kat['tb_kategori'] = $this->Kategori_model->setNamaKategori();
		$dt['tb_brg'] = $this->Barang_model->getAlldatBarang($config['per_page'], $from);
		if ($this->input->post('keyword')) {
			$dt['tb_brg'] = $this->Barang_model->caridataBarang();
		}
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		// $dt['tb_brg'] = $this->Barang_model->getAlldatBarang();
		$dt['tb_kategori'] = $this->Kategori_model->getdataKategori();
		$this->load->view('barang/data_barang', $dt);
		$this->load->view('template/footer_dashboard');
	}

	public function settingpengguna_p()
	{
		$data['title'] = 'Setting';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		$this->load->view('setting/form_setting', $dt);
		$this->load->view('template/footer_dashboard');
	}

	public function editsettpengguna_p()
	{
		$this->form_validation->set_rules('id_user', 'Id Pengguna', 'required|trim');
		$this->form_validation->set_rules('nama_pengguna', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('pasword', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menyimpan perubahan, karena terdapat kesalahan!!
           </div>');
			redirect('pengguna/settingpengguna_p');
		} else {
			$this->Pengguna_model->ubahdataSetting();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Berhasil menyimpan perubahan!!
               </div>');
			redirect('pengguna/settingpengguna_p');
		}
	}

	public function datapembeli_p()
	{
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Data Pembeli';
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'pengguna/datapembeli_p/';
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
		// $dt['tb_pembeli'] = $this->Pembeli_model->getAlldatPembeli();
		$this->load->view('pembeli/data_pembeli', $data);
		$setAutoId = $this->Pembeli_model->cekIdPembeli();
		// contoh PBL0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$setnourut = substr($setAutoId, 3, 4);
		$idPembeliSekarang = $setnourut + 1;
		$setIdview = array('id_pembeli' => $idPembeliSekarang);
		$this->load->view('template/footer_dashboard', $setIdview);
	}

	public function datatransaksimasuk_p()
	{
		$data['title'] = 'Transaksi Masuk';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'pengguna/datatransaksimasuk_p/';
		$jumlah_data = $this->Barang_model->jumlah_databarang();
		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 2;

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
		//$data['tb_barang'] = $this->Barang_model->getAlldatBarang($config['per_page'], $from);
		$data['tb_barang'] = $this->Barang_model->getAllBarang();

		// $data['tb_barang'] = $this->Barang_model->getdataBarang();


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

	public function datatransaksikeluar_p()
	{
		$data['title'] = 'Transaksi Keluar';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['tb_barang'] = $this->Barang_model->getAllBarang();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		$data['tb_pembeli'] = $this->Pembeli_model->getdataPembeli();
		$this->load->view('transaksikeluar/data_transaksikeluar', $data);
		$this->load->view('template/footer_dashboard');
	}

	public function TambahPembeli()
	{
		$this->form_validation->set_rules('id_pembeli', 'Id Pembeli', 'required|trim|is_unique[tb_pembeli.id_pembeli]');
		$this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required|trim');
		$this->form_validation->set_rules('alamat_pembeli', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('notlp_pembeli', 'No Tlp', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan data pembeli, karena terdapat kesalahan!!
           </div>');
			redirect('pengguna/datapembeli_p');
		} else {
			$this->Pembeli_model->tambahdatPembeli();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menambahkan data pembeli!!
           </div>');
			redirect('pengguna/datapembeli_p');
		}
	}

	public function EditPembeli()
	{
		$this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required|trim');
		$this->form_validation->set_rules('alamat_pembeli', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('notlp_pembeli', 'No Tlp', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal mengganti data pembeli, karena terdapat kesalahan!!
           </div>');
			redirect('pengguna/datapembeli_p');
		} else {
			$this->Pembeli_model->ubahdatPembeli();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses mengganti data pembeli!!
           </div>');
			redirect('pengguna/datapembeli_p');
		}
	}

	public function HapusPembeli()
	{
		$this->form_validation->set_rules('id_pembeli', 'Id Pembeli', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menghapus data pembeli, karena terdapat kesalahan!!
           </div>');
			redirect('pengguna/datapembeli_p');
		} else {
			$id_pembeli = $this->input->post('id_pembeli');
			$this->Pembeli_model->hapusdatPembeli_m($id_pembeli);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menghapus data pembeli!!
           </div>');
			redirect('pengguna/datapembeli_p');
		}
	}

	public function TransBarangKeluar()
	{
		$this->form_validation->set_rules('no_nota', 'No Nota', 'required|trim');
		$this->form_validation->set_rules('id_user', 'Id Pengguna', 'required|trim');
		$this->form_validation->set_rules('tglkeluar', 'Tgl Keluar', 'required|trim');
		$this->form_validation->set_rules('hasil_totalhrgjual', 'Subtotal', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan transaksi barang keluar, karena terdapat kesalahan!!
           </div>');
			redirect('pengguna/datatransaksikeluar_p');
		} else {
			$this->Trankeluar_model->tambahbrgkeluar();
			$nomer_nota = $this->input->post('nonota');
			$id_barang = $this->input->post('idbarang');
			$harga_beli = $this->input->post('harga_beli');
			$harga_jual = $this->input->post('harga_jual');
			$jumlah_brgkeluar = $this->input->post('jumlah_brgkeluar');
			$total_harga_jual = $this->input->post('total_harga_jual');
			$detaildata = array();
			foreach ($nomer_nota as $key => $value) {
				$detaildata[] = array(
					'no_nota' => $value,
					'id_barang' => $id_barang[$key],
					'harga_beli' => $harga_beli[$key],
					'harga_jual' => $harga_jual[$key],
					'jumlah_brgkeluar' => $jumlah_brgkeluar[$key],
					'total_harga_jual' => $total_harga_jual[$key]
				);
			}
			$this->db->insert_batch('tb_detail_brgkeluar', $detaildata);
			$count_nota = count($this->input->post('nonota'));
			for ($x = 0; $x < $count_nota; $x++) {
				$qty = $this->input->post('stok')[$x];
				$idbarang = $this->input->post('idbarang');
				$update_stok = array('stok' => $qty);
				$this->db->where('id_barang', $idbarang[$x]);
				$this->db->update('tb_barang', $update_stok);
			}

			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menambahkan transaksi barang keluar!!
           </div>');
			redirect('pengguna/datatransaksikeluar_p');
		}
	}

	public function datatransaksiretur_p()
	{
		$data['title'] = 'Retur Barang';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['tb_barang'] = $this->Barang_model->getAllBarang();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		if ($this->input->post('keyword')) {
			$data['tb_brg_keluar'] = $this->Trankeluar_model->carinomernota();
		}
		$this->load->view('returbarang/data_returbarang', $data);
		$this->load->view('template/footer_dashboard');
	}

	public function TransReturBarang()
	{
		$this->form_validation->set_rules('kd_retur', 'Kode Retur', 'required|trim');
		$this->form_validation->set_rules('tglretur', 'Tanggal Kembali', 'required|trim');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('id_user', 'Id Pengguna', 'required|trim');
		$this->form_validation->set_rules('id_pembeli', 'Id Pembeli', 'required|trim');
		$this->form_validation->set_rules('no_nota', 'Nomer Nota', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan transaksi pengembalian barang, karena terdapat kesalahan!!
           </div>');
			redirect('pengguna/datatransaksiretur_p');
		} else {
			$this->Tranretur_model->tambahretur();
			$nomer_nota = $this->input->post('nonota');

			for ($x = 0; $x < count($nomer_nota); $x++) {
				$jumlahbrgkembali = $this->input->post('stok')[$x];
				$jumlahdefault = $this->input->post('stokdefault')[$x];
				if ($jumlahbrgkembali > $jumlahdefault) {
					$kd_retur = $this->input->post('kd_retur');
					$this->Tranretur_model->hapusretur($kd_retur);
					$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                    Gagal menambahkan transaksi pengembalian barang, karena terdapat kesalahan yaitu jumlah barang yang dikembalikan lebih banyak daripada jumlah yang terdapat di nota!!
                    </div>');
					redirect('pengguna/datatransaksiretur_p');
				} else {
					$kode_retur =  $this->input->post('kd_retur');
					$id_barang = $this->input->post('idbarang')[$x];
					$hrg_jual = $this->input->post('hargajual')[$x];
					$nourut = $this->input->post('nourutkeluar')[$x];
					$qtykembali = $this->input->post('stok')[$x];
					//untuk memasukkan data ke dalam tabel detail reutur pengembalian barang
					$setquery = "INSERT INTO tb_detail_retur(kd_retur, id_barang, harga_jual, jumlah_brgkembali)  VALUES ('$kode_retur','$id_barang','$hrg_jual','$jumlahbrgkembali')";
					$this->db->query($setquery);
					// //untuk melakukan update barang yang masuk
					$testquery = "UPDATE tb_barang SET stok=(stok + '$qtykembali') WHERE id_barang='$id_barang'";
					$this->db->query($testquery);
					//untuk melakuka update no urut transaksi barang yang keluar
					$tesquery = "UPDATE tb_detail_brgkeluar SET jumlah_brgkeluar=(jumlah_brgkeluar - '$jumlahbrgkembali') WHERE no_urut_keluar='$nourut'";
					$this->db->query($tesquery);
					// $this->Tranretur_model->tambahretur();
				}
			}

			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menambahkan transaksi pengembalian barang!!
           </div>');
			redirect('pengguna/datatransaksiretur_p');
		}
	}

	public function datalaporankeluar_p()
	{
		$data['title'] = 'Laporan Barang Keluar';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['tb_brg_keluar'] = $this->Trankeluar_model->tampilsemuanomernota();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		if ($this->input->post('awalperiode') && $this->input->post('akhirperiode')) {
			if ($this->input->post('awalperiode') > $this->input->post('akhirperiode')) {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                    Gagal melakukan pencarian karena tanggal awal lebih besar daripada tanggal akhir!!
                    </div>');
				redirect('pengguna/datalaporankeluar_p');
			} else {
				$data['tb_brg_keluar'] = $this->Trankeluar_model->carinotaberdasarkantanggal();
			}
		}
		$data['tgl1'] = $this->input->post('awalperiode');
		$data['tgl2'] = $this->input->post('akhirperiode');
		$this->load->view('laporan/laporan_barangkeluar', $data);
		$this->load->view('template/footer_dashboard');
	}


	public function datalaporanrtur_p()
	{
		$data['title'] = 'Laporan Retur Barang';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['tb_retur'] = $this->Tranretur_model->tampilsemuareturbarang();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		if ($this->input->post('awalperiode') && $this->input->post('akhirperiode')) {
			if ($this->input->post('awalperiode') > $this->input->post('akhirperiode')) {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                    Gagal melakukan pencarian karena tanggal awal lebih besar daripada tanggal akhir!!
                    </div>');
				redirect('pengguna/datalaporanrtur_p');
			} else {
				$data['tb_retur'] = $this->Tranretur_model->carireturberdasarkantanggal();
			}
		}
		$data['tgl1'] = $this->input->post('awalperiode');
		$data['tgl2'] = $this->input->post('akhirperiode');
		$this->load->view('laporan/laporan_returbarang', $data);
		$this->load->view('template/footer_dashboard');
	}

	public function excelcetakbrgkeluar()
	{
		$tgl_awal = $this->input->post('awalperiode');
		$tgl_akhir = $this->input->post('akhirperiode');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$setExcelprop = new PHPExcel();
		$setExcelprop->getProperties()->setCreator("On Computer");
		$setExcelprop->getProperties()->setLastModifiedBy("On Computer");
		$setExcelprop->getProperties()->setTitle("Laporan Barang Keluar");

		$setExcelprop->setActiveSheetIndex(0);
		$setExcelprop->getActiveSheet()->setCellValue('C1', 'Laporan Barang Keluar On Computer');

		//$setExcelprop->setActiveSheetIndex(1);
		$setExcelprop->getActiveSheet()->setCellValue('B2', 'Jl. Anggajaya, Sanggrahan, Condongcatur, Yogyakarta, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281');

		//$setExcelprop->setActiveSheetIndex(1);
		$setExcelprop->getActiveSheet()->setCellValue('A4', 'Nomer Nota');
		$setExcelprop->getActiveSheet()->setCellValue('B4', 'Urutan Keluar');
		$setExcelprop->getActiveSheet()->setCellValue('C4', 'Nama Pembeli');
		$setExcelprop->getActiveSheet()->setCellValue('D4', 'Id Barang');
		$setExcelprop->getActiveSheet()->setCellValue('E4', 'Nama Barang');
		$setExcelprop->getActiveSheet()->setCellValue('F4', 'Tanggal');
		$setExcelprop->getActiveSheet()->setCellValue('G4', 'Harga Jual');
		$setExcelprop->getActiveSheet()->setCellValue('H4', 'QTY');
		$setExcelprop->getActiveSheet()->setCellValue('I4', 'Total Harga Jual');

		$baris = 5;

		if ($this->input->post('awalperiode') && $this->input->post('akhirperiode')) {
			if ($this->input->post('awalperiode') > $this->input->post('akhirperiode')) {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                    Gagal mencetak karena tanggal awal lebih besar daripada tanggal akhir!!
                    </div>');
				redirect('pengguna/datalaporankeluar_p');
			} else {
				$setExcelprop->getActiveSheet()->setCellValue('B3', 'Dari ' . $tgl_awal . ' sampai ' . $tgl_akhir . '.');
				$data['tb_brg_keluar'] = $this->Trankeluar_model->carinotaberdasarkantanggal();
				foreach ($data['tb_brg_keluar'] as $dtbk) {
					$setExcelprop->getActiveSheet()->setCellValue('A' . $baris, $dtbk['no_nota']);
					$setExcelprop->getActiveSheet()->setCellValue('B' . $baris, $dtbk['no_urut_keluar']);
					$setExcelprop->getActiveSheet()->setCellValue('C' . $baris, $dtbk['nama_pembeli']);
					$setExcelprop->getActiveSheet()->setCellValue('D' . $baris, $dtbk['id_barang']);
					$setExcelprop->getActiveSheet()->setCellValue('E' . $baris, $dtbk['nama_barang']);
					$setExcelprop->getActiveSheet()->setCellValue('F' . $baris, $dtbk['tgl_keluar']);
					$setExcelprop->getActiveSheet()->setCellValue('G' . $baris, $dtbk['harga_jual']);
					$setExcelprop->getActiveSheet()->setCellValue('H' . $baris, $dtbk['jumlah_brgkeluar']);
					$setExcelprop->getActiveSheet()->setCellValue('I' . $baris, $dtbk['total_harga_jual']);
					$baris++;
				}
				$filenamenya = "Laporan_Barang_Keluar_$tgl_awal $tgl_akhir" . '.xlsx';
			}
		} else {
			$setExcelprop->getActiveSheet()->setCellValue('B3', 'Semua data');
			$data['tb_brg_keluar'] = $this->Trankeluar_model->tampilsemuanomernota();
			foreach ($data['tb_brg_keluar'] as $dtbk) {
				$setExcelprop->getActiveSheet()->setCellValue('A' . $baris, $dtbk['no_nota']);
				$setExcelprop->getActiveSheet()->setCellValue('B' . $baris, $dtbk['no_urut_keluar']);
				$setExcelprop->getActiveSheet()->setCellValue('C' . $baris, $dtbk['nama_pembeli']);
				$setExcelprop->getActiveSheet()->setCellValue('D' . $baris, $dtbk['id_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('E' . $baris, $dtbk['nama_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('F' . $baris, $dtbk['tgl_keluar']);
				$setExcelprop->getActiveSheet()->setCellValue('G' . $baris, $dtbk['harga_jual']);
				$setExcelprop->getActiveSheet()->setCellValue('H' . $baris, $dtbk['jumlah_brgkeluar']);
				$setExcelprop->getActiveSheet()->setCellValue('I' . $baris, $dtbk['total_harga_jual']);
				$baris++;
			}
			$filenamenya = "Laporan_Barang_Keluar_SemuaData" . '.xlsx';
		}
		$setExcelprop->getActiveSheet()->setTitle('Laporan_Barang_Keluar');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $filenamenya . '"');
		header('Cache-Control: max-age=0');
		$writer = PHPExcel_IOFactory::createWriter($setExcelprop, 'Excel2007');
		$writer->save('php://output');
		exit;
	}

	public function excelcetakbrgkembali()
	{
		$tgl_awal = $this->input->post('awalperiode');
		$tgl_akhir = $this->input->post('akhirperiode');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$setExcelprop = new PHPExcel();
		$setExcelprop->getProperties()->setCreator("On Computer");
		$setExcelprop->getProperties()->setLastModifiedBy("On Computer");
		$setExcelprop->getProperties()->setTitle("Laporan Barang Kembali");

		$setExcelprop->setActiveSheetIndex(0);
		$setExcelprop->getActiveSheet()->setCellValue('C1', 'Laporan Barang Kembali On Computer');

		$setExcelprop->getActiveSheet()->setCellValue('B2', 'Jl. Anggajaya, Sanggrahan, Condongcatur, Yogyakarta, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281');

		$setExcelprop->getActiveSheet()->setCellValue('A4', 'Kode Retur');
		$setExcelprop->getActiveSheet()->setCellValue('B4', 'Urutan Kembali');
		$setExcelprop->getActiveSheet()->setCellValue('C4', 'Nomer Nota');
		$setExcelprop->getActiveSheet()->setCellValue('D4', 'Id Barang');
		$setExcelprop->getActiveSheet()->setCellValue('E4', 'Nama Barang');
		$setExcelprop->getActiveSheet()->setCellValue('F4', 'Tanggal');
		$setExcelprop->getActiveSheet()->setCellValue('G4', 'Harga Jual');
		$setExcelprop->getActiveSheet()->setCellValue('H4', 'QTY');

		$baris = 5;

		if ($this->input->post('awalperiode') && $this->input->post('akhirperiode')) {
			if ($this->input->post('awalperiode') > $this->input->post('akhirperiode')) {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                    Gagal mencetak karena tanggal awal lebih besar daripada tanggal akhir!!
                    </div>');
				redirect('pengguna/datalaporanrtur_p');
			} else {
				$setExcelprop->getActiveSheet()->setCellValue('B3', 'Dari ' . $tgl_awal . ' sampai ' . $tgl_akhir . '.');
				$data['tb_retur'] = $this->Tranretur_model->carireturberdasarkantanggal();
				foreach ($data['tb_retur'] as $dtbr) {
					$setExcelprop->getActiveSheet()->setCellValue('A' . $baris, $dtbr['kd_retur']);
					$setExcelprop->getActiveSheet()->setCellValue('B' . $baris, $dtbr['no_urut_kembali']);
					$setExcelprop->getActiveSheet()->setCellValue('C' . $baris, $dtbr['no_nota']);
					$setExcelprop->getActiveSheet()->setCellValue('D' . $baris, $dtbr['id_barang']);
					$setExcelprop->getActiveSheet()->setCellValue('E' . $baris, $dtbr['nama_barang']);
					$setExcelprop->getActiveSheet()->setCellValue('F' . $baris, $dtbr['tgl_retur']);
					$setExcelprop->getActiveSheet()->setCellValue('G' . $baris, $dtbr['harga_jual']);
					$setExcelprop->getActiveSheet()->setCellValue('H' . $baris, $dtbr['jumlah_brgkembali']);
					$baris++;
				}
				$filenamenya = "Laporan_Barang_Kembali_$tgl_awal $tgl_akhir" . '.xlsx';
			}
		} else {
			$setExcelprop->getActiveSheet()->setCellValue('B3', 'Semua data');
			$data['tb_retur'] = $this->Tranretur_model->tampilsemuareturbarang();
			foreach ($data['tb_retur'] as $dtbr) {
				$setExcelprop->getActiveSheet()->setCellValue('A' . $baris, $dtbr['kd_retur']);
				$setExcelprop->getActiveSheet()->setCellValue('B' . $baris, $dtbr['no_urut_kembali']);
				$setExcelprop->getActiveSheet()->setCellValue('C' . $baris, $dtbr['no_nota']);
				$setExcelprop->getActiveSheet()->setCellValue('D' . $baris, $dtbr['id_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('E' . $baris, $dtbr['nama_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('F' . $baris, $dtbr['tgl_retur']);
				$setExcelprop->getActiveSheet()->setCellValue('G' . $baris, $dtbr['harga_jual']);
				$setExcelprop->getActiveSheet()->setCellValue('H' . $baris, $dtbr['jumlah_brgkembali']);
				$baris++;
			}
			$filenamenya = "Laporan_Barang_Kembali_SemuaData" . '.xlsx';
		}
		$setExcelprop->getActiveSheet()->setTitle('Laporan_Barang_Kembali');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $filenamenya . '"');
		header('Cache-Control: max-age=0');
		$writer = PHPExcel_IOFactory::createWriter($setExcelprop, 'Excel2007');
		$writer->save('php://output');
		exit;
	}
}
