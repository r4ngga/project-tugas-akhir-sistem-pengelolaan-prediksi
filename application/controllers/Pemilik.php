<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_login();
		check_logout();
		$this->load->model('Pengguna_model');
		$this->load->model('Barang_model');
		$this->load->model('Kategori_model');
		$this->load->model('Supplier_model');
		$this->load->model('Prediksi_model');
	}

	public function index()
	{
		$data['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Pemilik Dashboard';
		$data['tb_barang'] =  $this->Barang_model->getAllBarangLimit();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('pemilik/index', $data);
		$this->load->view('template/footer_dashboard');
	}

	public function datapengguna_o()
	{
		$data['title'] = 'Data Pengguna';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'pemilik/datapengguna_o/';
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

	public function settingpengguna_o()
	{
		$data['title'] = 'Setting';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		$this->load->view('setting/form_setting', $dt);
		$this->load->view('template/footer_dashboard');
	}

	public function editsettpengguna_o()
	{
		$this->form_validation->set_rules('id_user', 'Id Pengguna', 'required|trim');
		$this->form_validation->set_rules('nama_pengguna', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('pasword', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menyimpan perubahan, karena terdapat kesalahan!!
           </div>');
			redirect('pemilik/settingpengguna_o');
		} else {
			$this->Pengguna_model->ubahdataSetting();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Berhasil menyimpan perubahan!!
               </div>');
			redirect('pemilik/settingpengguna_o');
		}
	}

	public function TambahPengguna()
	{
		$this->form_validation->set_rules('nama_pengguna', 'Nama pengguna', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_pengguna.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_pengguna.email]');
		$this->form_validation->set_rules('jenis_akses', 'jenis_akses', 'required|trim');
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
		//$data['title'] = 'Register';
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal Menambahkan akun pengguna, karena terdapat kesalahan!!
           </div>');
			redirect('pemilik/datapengguna_o');
		} else {
			//  $this->load->view('template/footer_dashboard', $setIdview);
			$this->Pengguna_model->tambahdatPenggunaPemilik();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Sukses menambahkan akun pengguna!!
               </div>');
			redirect('pemilik/datapengguna_o');
		}
		//echo "sukses";
	}

	public function EditPengguna()
	{
		$this->form_validation->set_rules('id_user', 'Id Pengguna', 'required|trim');
		$this->form_validation->set_rules('nama_pengguna', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('jenis_akses', 'Jenis Akses', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menyimpan perubahan data pengguna, karena terdapat kesalahan!!
           </div>');
			redirect('pemilik/datapengguna_o');
		} else {
			$this->Pengguna_model->ubahdataPengguna();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Berhasil menyimpan perubahan!!
               </div>');
			redirect('pemilik/datapengguna_o');
		}
	}

	public function HapusPengguna()
	{
		$this->form_validation->set_rules('id_user', 'Id Pengguna', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menghapus data pengguna, karena terdapat kesalahan!!
           </div>');
			redirect('pemilik/datapengguna_o');
		} else {
			$id_user = $this->input->post('id_user');
			$this->Pengguna_model->hapusdatPengguna_m($id_user);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menghapus data pengguna!!
           </div>');
			redirect('pemilik/datapengguna_o');
		}
	}

	public function dataprediksibarang()
	{
		$data['title'] = 'Hitung Prediksi Barang';
		$data['rand_string'] = random_string('alnum', 8);
		$data['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$data['tb_barang'] = $this->Barang_model->getAllBarang();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('template/sidebar', $data);
		if ($this->input->post('idbrghit')) {
			$data['idbarangnya'] = $this->Prediksi_model->Getnamabarang();
			$jumlahnya = $this->Prediksi_model->HitPeriodePertama();
			$hasil_sum = 0;
			$hasil_sum2 = 0;
			$hasil_sum3 = 0;
			foreach ($jumlahnya as $jumlah) {
				$jumlah['jumlah_brgkeluar'];
				$hasil_sum += $jumlah['jumlah_brgkeluar'];
			}
			$hasilpertama = $hasil_sum;
			$data['dataperiode1'] = $hasilpertama;
			$jumlahnyake2 = $this->Prediksi_model->HitPeriodeKedua();
			foreach ($jumlahnyake2 as $jumlah) {
				$jumlah['jumlah_brgkeluar'];
				$hasil_sum2 += $jumlah['jumlah_brgkeluar'];
			}
			$hasilkedua = $hasil_sum2;
			$data['dataperiode2'] = $hasilkedua;
			// $dt['tampilhasilkedua'] = $hasil_sum2;
			$jumlahnyake3 = $this->Prediksi_model->HitPeriodeKetiga();
			foreach ($jumlahnyake3 as $jumlah) {
				$jumlah['jumlah_brgkeluar'];
				$hasil_sum3 += $jumlah['jumlah_brgkeluar'];
			}
			$hasilketiga = $hasil_sum3;
			$data['dataperiode3'] = $hasilketiga;
		}

		$this->load->view('hitungprediksi/hitung_prediksi', $data);
		$this->load->view('template/footer_dashboard');
	}

	public function hitungprediksi()
	{
		$this->form_validation->set_rules('idbrghit', 'Id Barang', 'required|trim');
		$this->form_validation->set_rules('pilihbulan', 'Bulan', 'required');
		$this->form_validation->set_rules('pilihtahun', 'Tahun', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
		    Tidak bisa menghitung prediksi, karena terdapat kesalahan!!
		   </div>');
			redirect('pemilik/dataprediksibarang');
		} else {
			if (
				$this->input->post('periodeke1') && $this->input->post('periodeke2') && $this->input->post('periodeke3')
				&& $this->input->post('thnke1') && $this->input->post('thnke2') && $this->input->post('thnke3')
			) {
				$jumlahnya = $this->Prediksi_model->HitPeriodePertama();
				$hasil_sum = 0;
				$hasil_sum2 = 0;
				$hasil_sum3 = 0;
				foreach ($jumlahnya as $jumlah) {
					$jumlah['jumlah_brgkeluar'];
					$hasil_sum += $jumlah['jumlah_brgkeluar'];
				}
				//$dt['tampilhasil'] = $hasil_sum;
				$hasilpertama = $hasil_sum;
				$dt['tampilhasil'] = $hasil_sum;
				$jumlahnyake2 = $this->Prediksi_model->HitPeriodeKedua();
				foreach ($jumlahnyake2 as $jumlah) {
					$jumlah['jumlah_brgkeluar'];
					$hasil_sum2 += $jumlah['jumlah_brgkeluar'];
				}
				$hasilkedua = $hasil_sum2;
				$dt['tampilhasilkedua'] = $hasil_sum2;
				// $dt['tampilhasilkedua'] = $hasil_sum2;
				$jumlahnyake3 = $this->Prediksi_model->HitPeriodeKetiga();
				foreach ($jumlahnyake3 as $jumlah) {
					$jumlah['jumlah_brgkeluar'];
					$hasil_sum3 += $jumlah['jumlah_brgkeluar'];
				}
				$dt['tampilhasilketiga'] = $hasil_sum3;
				$hasilketiga = $hasil_sum3;
				//$dt['tampilhasilketiga'] = $hasil_sum3;
				$wma = ($hasilpertama * 0.1) + ($hasilkedua * 0.3) + ($hasilketiga * 0.6) / (0.1 + 0.3 + 0.6);
				$dt['tampilwma'] = $wma;
				$this->Prediksi_model->Simpanhasilprediksi($wma);
				$this->input->post('kd_prediksi');
				$dt['tb_prediksi'] = $this->Prediksi_model->Carihasilprediksi();
				$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
		                Sukses melakukan penghitungan!!
		                </div>');
				$data['title'] = 'Hasil Prediksi Barang';
				$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
				$this->load->view('template/header_dashboard', $data);
				$this->load->view('template/topbar', $dt);
				$this->load->view('template/sidebar', $dt);
				$this->load->view('tampilprediksi/tampil_prediksi', $dt);
				$this->load->view('template/footer_dashboard');
			} else {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
		                Gagal melakukan penghitungan, karena terdapat kesalahan seperti terdapat kolom yang kosong!!
		                </div>');
				redirect('pemilik/dataprediksibarang');
			}
		}
	}

	public function showdata()
	{
		$jumlahnya = $this->Prediksi_model->HitPeriodePertama();
		$hasil_sum = 0;
		foreach ($jumlahnya as $jumlah) {
			$jumlah['jumlah_brgkeluar'];
			$hasil_sum += $jumlah['jumlah_brgkeluar'];
		}
		$hasilpertama = $hasil_sum;
		$data['dataperiode1'] = $hasilpertama;
	}

	public function datalaporanprediksi()
	{
		$data['title'] = 'Laporan Hasil Prediksi';
		$dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
		$dt['tb_prediksi'] = $this->Prediksi_model->tampilsemuahasilprediksi();
		$this->load->view('template/header_dashboard', $data);
		$this->load->view('template/topbar', $dt);
		$this->load->view('template/sidebar', $dt);
		if ($this->input->post('keyword')) {
			$dt['tb_prediksi'] = $this->Prediksi_model->caridataprediksi();
		}
		$this->load->view('laporan/laporan_prediksi', $dt);
		$this->load->view('template/footer_dashboard');
	}

	public function hitungprediksibarang()
	{
		$this->form_validation->set_rules('id_barang', 'Id Barang', 'required|trim');
		$this->form_validation->set_rules('nama_barang', 'Id Pengguna', 'required|trim');
		$this->form_validation->set_rules('waktu', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menyimpan perubahan, karena terdapat kesalahan!!
           </div>');
			redirect('pemilik/dataprediksibarang');
		} else {
			$idbrg = $this->input->post('id_barang');
			$waktuprediksi = $this->input->post('waktu');
			$this->db->select_sum('jumlah_brgkeluar');
			$this->db->select('jumlah_brgkeluar');
			$this->db->from('tb_detail_brgkeluar');
			$this->db->join('tb_brg_keluar', 'tb_brg_keluar.no_nota = tb_detail_brgkeluar.no_nota');
			$this->db->where('id_barang', $idbrg);
			$this->db->where(array('tb_retur.tgl_retur >=' => ''));
			$this->db->where(array('tb_retur.tgl_retur <=' => ''));
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
                Berhasil menyimpan perubahan!!
               </div>');
			redirect('pemilik/dataprediksibarang');
		}
	}

	public function excelcetakhasilprediksi()
	{
		$pencarian = $this->input->post('keyword');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$setExcelprop = new PHPExcel();
		$setExcelprop->getProperties()->setCreator("On Computer");
		$setExcelprop->getProperties()->setLastModifiedBy("On Computer");
		$setExcelprop->getProperties()->setTitle("Laporan Hasil Prediksi Barang");

		$setExcelprop->setActiveSheetIndex(0);
		$setExcelprop->getActiveSheet()->setCellValue('C1', 'Laporan Hasil Prediksi Barang On Computer');

		//$setExcelprop->setActiveSheetIndex(1);
		$setExcelprop->getActiveSheet()->setCellValue('B2', 'Jl. Anggajaya, Sanggrahan, Condongcatur, Yogyakarta, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281');

		//$setExcelprop->setActiveSheetIndex(1);
		$setExcelprop->getActiveSheet()->setCellValue('A4', 'Kode Prediksi');
		$setExcelprop->getActiveSheet()->setCellValue('B4', 'Id Barang');
		$setExcelprop->getActiveSheet()->setCellValue('C4', 'Nama Barang');
		$setExcelprop->getActiveSheet()->setCellValue('D4', 'Bulan yang di Prediksi');
		$setExcelprop->getActiveSheet()->setCellValue('E4', 'Tahun yang di Prediksi');
		$setExcelprop->getActiveSheet()->setCellValue('F4', 'Hasil Prediksi');
		$setExcelprop->getActiveSheet()->setCellValue('G4', 'Pembulatan Prediksi');
		$baris = 5;

		if ($this->input->post('keyword')) {
			$setExcelprop->getActiveSheet()->setCellValue('B3', 'Menampilkan barang secara spesifik dengan Id atau nama barang ' . $pencarian);
			$data['tb_prediksi'] = $this->Prediksi_model->caridataprediksi();
			foreach ($data['tb_prediksi'] as $dtp) {
				if ($dtp['bulan_prediksi'] == "01") {
					$setnamabulan = "Januari";
				} else if ($dtp['bulan_prediksi'] == "02") {
					$setnamabulan = "Februari";
				} else if ($dtp['bulan_prediksi'] == "03") {
					$setnamabulan = "Maret";
				} else if ($dtp['bulan_prediksi'] == "04") {
					$setnamabulan = "April";
				} else if ($dtp['bulan_prediksi'] == "05") {
					$setnamabulan = "Mei";
				} else if ($dtp['bulan_prediksi'] == "06") {
					$setnamabulan = "Juni";
				} else if ($dtp['bulan_prediksi'] == "07") {
					$setnamabulan = "Juli";
				} else if ($dtp['bulan_prediksi'] == "08") {
					$setnamabulan = "Agustus";
				} else if ($dtp['bulan_prediksi'] == "09") {
					$setnamabulan = "September";
				} else if ($dtp['bulan_prediksi'] == "10") {
					$setnamabulan = "Oktober";
				} else if ($dtp['bulan_prediksi'] == "11") {
					$setnamabulan = "November";
				} else if ($dtp['bulan_prediksi'] == "12") {
					$setnamabulan = "Desember";
				}
				$setExcelprop->getActiveSheet()->setCellValue('A' . $baris, $dtp['kd_prediksi']);
				$setExcelprop->getActiveSheet()->setCellValue('B' . $baris, $dtp['id_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('C' . $baris, $dtp['nama_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('D' . $baris, $setnamabulan);
				$setExcelprop->getActiveSheet()->setCellValue('E' . $baris, $dtp['tahun_prediksi']);
				$setExcelprop->getActiveSheet()->setCellValue('F' . $baris, $dtp['hasil_prediksi']);
				$setExcelprop->getActiveSheet()->setCellValue('G' . $baris, round($dtp['hasil_prediksi']));
				$baris++;
			}
			$filenamenya = "Laporan_Hasil_Prediksi_Barang_$pencarian" . '.xlsx';
		} else {
			$setExcelprop->getActiveSheet()->setCellValue('B3', 'Semua data');
			$data['tb_prediksi'] = $this->Prediksi_model->tampilsemuahasilprediksi();
			foreach ($data['tb_prediksi'] as $dtp) {
				if ($dtp['bulan_prediksi'] == "01") {
					$setnamabulan = "Januari";
				} else if ($dtp['bulan_prediksi'] == "02") {
					$setnamabulan = "Februari";
				} else if ($dtp['bulan_prediksi'] == "03") {
					$setnamabulan = "Maret";
				} else if ($dtp['bulan_prediksi'] == "04") {
					$setnamabulan = "April";
				} else if ($dtp['bulan_prediksi'] == "05") {
					$setnamabulan = "Mei";
				} else if ($dtp['bulan_prediksi'] == "06") {
					$setnamabulan = "Juni";
				} else if ($dtp['bulan_prediksi'] == "07") {
					$setnamabulan = "Juli";
				} else if ($dtp['bulan_prediksi'] == "08") {
					$setnamabulan = "Agustus";
				} else if ($dtp['bulan_prediksi'] == "09") {
					$setnamabulan = "September";
				} else if ($dtp['bulan_prediksi'] == "10") {
					$setnamabulan = "Oktober";
				} else if ($dtp['bulan_prediksi'] == "11") {
					$setnamabulan = "November";
				} else if ($dtp['bulan_prediksi'] == "12") {
					$setnamabulan = "Desember";
				}
				$setExcelprop->getActiveSheet()->setCellValue('A' . $baris, $dtp['kd_prediksi']);
				$setExcelprop->getActiveSheet()->setCellValue('B' . $baris, $dtp['id_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('C' . $baris, $dtp['nama_barang']);
				$setExcelprop->getActiveSheet()->setCellValue('D' . $baris, $setnamabulan);
				$setExcelprop->getActiveSheet()->setCellValue('E' . $baris, $dtp['tahun_prediksi']);
				$setExcelprop->getActiveSheet()->setCellValue('F' . $baris, $dtp['hasil_prediksi']);
				$setExcelprop->getActiveSheet()->setCellValue('G' . $baris, round($dtp['hasil_prediksi']));
				$baris++;
			}
			$filenamenya = "Laporan_Hasil_Prediksi_Barang_SemuaData" . '.xlsx';
		}
		$setExcelprop->getActiveSheet()->setTitle('Laporan Hasil Prediksi Barang');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $filenamenya . '"');
		header('Cache-Control: max-age=0');
		$writer = PHPExcel_IOFactory::createWriter($setExcelprop, 'Excel2007');
		ob_get_clean();
		$writer->save('php://output');
		exit;
	}
}
