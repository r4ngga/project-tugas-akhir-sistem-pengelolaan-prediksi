 <?php

	class Prediksi_model extends CI_Model
	{

		public function Getnamabarang()
		{
			$keyword = $this->input->post('idbrghit', true);
			$this->db->like('id_barang', $keyword);
			return $this->db->get('tb_barang')->result_array();
		}

		public function Simpanhasilprediksi($wma)
		{
			$data = [
				"kd_prediksi" => $this->input->post('kd_prediksi', true),
				"id_barang" => $this->input->post('idbrghit', true),
				"hasil_prediksi" => $wma,
				"bulan_prediksi" => $this->input->post('pilihbulan', true),
				"tahun_prediksi" => $this->input->post('pilihtahun', true)
			];
			$this->db->insert('tb_prediksi', $data);
		}

		public function Carihasilprediksi()
		{
			$kd_prediksi = $this->input->post('kd_prediksi', true);
			$this->db->like('kd_prediksi', $kd_prediksi);
			return $this->db->get('tb_prediksi')->result_array();
		}

		public function hitprediksi()
		{
			$idbrg = $this->input->post('idbrghit');
			//$this->db->query("SELECT SUM(jumlah_brgkeluar) AS jumlah_brgkeluar FROM tb_detail_brgkeluar");
			$this->db->select_sum('jumlah_brgkeluar');
			$tampilhasil = $this->db->get('tb_detail_brgkeluar');
			return $tampilhasil->result_array();
		}

		public function setdata_brgkeluar()
		{
			$bulan = $this->input->post('pilihbulan', true);
			$tahun = $this->input->post('pilihtahun', true);
			$idbrg = $this->input->post('idbrghit');
			$this->db->select('jumlah_brgkeluar');
			$this->db->from('tb_brg_keluar');
			$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
			$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
			$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
			$this->db->where('MONTH(tb_brg_keluar.tgl_keluar)', $bulan);
			$this->db->where('YEAR(tb_brg_keluar.tgl_keluar)', $tahun);
			$this->db->where('tb_detail_brgkeluar.id_barang', $idbrg);
			$hasilhit = $this->db->get();
			return $hasilhit->result_array();
		}

		public function HitPeriodePertama()
		{
			$bulanke1 = $this->input->post('periodeke1', true);
			$tahunke1 = $this->input->post('thnke1', true);
			$idbrg = $this->input->post('idbrghit');
			$this->db->select('jumlah_brgkeluar');
			$this->db->from('tb_brg_keluar');
			$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
			$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
			$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
			$this->db->where('MONTH(tb_brg_keluar.tgl_keluar)', $bulanke1);
			$this->db->where('YEAR(tb_brg_keluar.tgl_keluar)', $tahunke1);
			$this->db->where('tb_detail_brgkeluar.id_barang', $idbrg);
			$hasilhit = $this->db->get();
			return $hasilhit->result_array();
		}

		public function HitPeriodeKedua()
		{
			$bulanke1 = $this->input->post('periodeke2', true);
			$tahunke1 = $this->input->post('thnke2', true);
			$idbrg = $this->input->post('idbrghit');
			$this->db->select('jumlah_brgkeluar');
			$this->db->from('tb_brg_keluar');
			$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
			$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
			$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
			$this->db->where('MONTH(tb_brg_keluar.tgl_keluar)', $bulanke1);
			$this->db->where('YEAR(tb_brg_keluar.tgl_keluar)', $tahunke1);
			$this->db->where('tb_detail_brgkeluar.id_barang', $idbrg);
			$hasilhit = $this->db->get();
			return $hasilhit->result_array();
		}

		public function HitPeriodeKetiga()
		{
			$bulanke3 = $this->input->post('periodeke3', true);
			$tahunke3 = $this->input->post('thnke3', true);
			$idbrg = $this->input->post('idbrghit');
			$this->db->select('jumlah_brgkeluar');
			$this->db->from('tb_brg_keluar');
			$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
			$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
			$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
			$this->db->where('MONTH(tb_brg_keluar.tgl_keluar)', $bulanke3);
			$this->db->where('YEAR(tb_brg_keluar.tgl_keluar)', $tahunke3);
			$this->db->where('tb_detail_brgkeluar.id_barang', $idbrg);
			$hasilhit = $this->db->get();
			return $hasilhit->result_array();
		}

		public function set_brgkeluar()
		{
			$awalperiode = $this->input->post('awalperiode', true);
			$akhirperiode = $this->input->post('akhirperiode', true);
			$idbrg = $this->input->post('idbrghit');
			for ($x = 0; $x <= 2; $x++) {
				$this->db->select('jumlah_brgkeluar');
				$this->db->from('tb_brg_keluar');
				$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
				$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
				$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');

				$this->db->where(array('tb_brg_keluar.tgl_keluar >=' => $awalperiode[$x]));
				$this->db->where(array('tb_brg_keluar.tgl_keluar <=' => $akhirperiode[$x]));
				$this->db->where('tb_detail_brgkeluar.id_barang', $idbrg);
				$hasilhit = $this->db->get();
				return $hasilhit->result_array();
			}
		}

		public function caridataprediksi()
		{
			$keyword = $this->input->post('keyword', true);
			$this->db->select('*');
			$this->db->from('tb_prediksi');
			$this->db->join('tb_barang', 'tb_barang.id_barang = tb_prediksi.id_barang');
			$this->db->where(array('tb_prediksi.kd_prediksi' => $keyword));
			$this->db->or_like(array('tb_prediksi.id_barang' => $keyword));
			$this->db->or_like('nama_barang', $keyword);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function tampilsemuahasilprediksi()
		{
			$this->db->select('*');
			$this->db->from('tb_prediksi');
			$this->db->join('tb_barang', 'tb_barang.id_barang = tb_prediksi.id_barang');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
