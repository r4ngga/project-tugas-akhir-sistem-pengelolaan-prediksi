<?php

class Trankeluar_model extends CI_model
{

	public function tambahbrgkeluar()
	{
		$cekpembeli = $this->input->post('id_pbl');
		if ($cekpembeli == '') {
			$data = [
				"no_nota" => $this->input->post('no_nota', true),
				"id_user" => $this->input->post('id_user', true),
				"id_pembeli" => "anonim",
				"tgl_keluar" => $this->input->post('tglkeluar', true),
				"hasil_totalhrgjual" => $this->input->post('hasil_totalhrgjual', true)
			];
			$this->db->insert('tb_brg_keluar', $data);
		} else {
			$data = [
				"no_nota" => $this->input->post('no_nota', true),
				"id_user" => $this->input->post('id_user', true),
				"id_pembeli" => $this->input->post('id_pbl', true),
				"tgl_keluar" => $this->input->post('tglkeluar', true),
				"hasil_totalhrgjual" => $this->input->post('hasil_totalhrgjual', true)
			];
			$this->db->insert('tb_brg_keluar', $data);
		}
	}

	public function carinomernota()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->select('*');
		$this->db->from('tb_brg_keluar');
		$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
		$this->db->where(array('tb_brg_keluar.no_nota' => $keyword));
		$tb_brg_keluar = $this->db->get();
		if ($tb_brg_keluar->num_rows() > 0) {
			return $tb_brg_keluar->result_array();
		}
	}

	public function jumlah_databrgkeluar()
	{
		return $this->db->get('tb_brg_keluar')->num_rows();
	}

	public function getdatabrgkeluar()
	{
		return $this->db->get('tb_brg_keluar')->result_array();
	}

	public function carinotaberdasarkantanggal()
	{
		$awalperiode = $this->input->post('awalperiode', true);
		$akhirperiode = $this->input->post('akhirperiode', true);
		$this->db->select('*');
		$this->db->from('tb_brg_keluar');
		$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
		$this->db->where(array('tb_brg_keluar.tgl_keluar >=' => $awalperiode));
		$this->db->where(array('tb_brg_keluar.tgl_keluar <=' => $akhirperiode));
		$tb_brg_keluar = $this->db->get();
		return $tb_brg_keluar->result_array();
	}

	public function tampilsemuanomernotalimit()
	{
		$this->db->select('*');
		$this->db->from('tb_brg_keluar');
		$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
		$this->db->order_by('no_urut_keluar', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tampilsemuanomernota()
	{
		$this->db->select('*');
		$this->db->from('tb_brg_keluar');
		$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
		$this->db->order_by('no_urut_keluar ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tampilnomernota($limit, $mulai)
	{
		$this->db->select('*');
		$this->db->from('tb_brg_keluar');
		$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
		$this->db->limit($limit, $mulai);
		$this->db->order_by('no_urut_keluar ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function carinota($limit, $mulai)
	{
		$awalperiode = $this->input->post('awalperiode', true);
		$akhirperiode = $this->input->post('akhirperiode', true);
		$this->db->select('*');
		$this->db->from('tb_brg_keluar');
		$this->db->join('tb_detail_brgkeluar', 'tb_detail_brgkeluar.no_nota = tb_brg_keluar.no_nota');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_brg_keluar.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgkeluar.id_barang');
		$this->db->where(array('tb_brg_keluar.tgl_keluar >=' => $awalperiode));
		$this->db->where(array('tb_brg_keluar.tgl_keluar <=' => $akhirperiode));
		$this->db->order_by('no_urut_keluar ASC');
		$this->db->limit($limit, $mulai);
		$tb_brg_keluar = $this->db->get();
		return $tb_brg_keluar->result_array();
	}
}
