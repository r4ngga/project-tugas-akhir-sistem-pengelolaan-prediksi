<?php

class Tranretur_model extends CI_Model
{

	public function tambahretur()
	{
		$data = [
			"kd_retur" => $this->input->post('kd_retur', true),
			"no_nota" => $this->input->post('no_nota', true),
			"tgl_retur" => $this->input->post('tglretur', true),
			"keterangan" => $this->input->post('ket', true),
			"id_user" => $this->input->post('id_user', true),
			"id_pembeli" => $this->input->post('id_pembeli', true)
		];
		$this->db->insert('tb_retur', $data);
	}

	public function hapusretur($kd_retur)
	{
		$this->db->where('kd_retur', $kd_retur);
		$this->db->delete('tb_retur');
	}

	public function jumlah_databrgkembali()
	{
		return $this->db->get('tb_retur')->num_rows();
	}

	public function getdatabrgkembali()
	{
		return $this->db->get('tb_retur')->result_array();
	}

	public function tampilsemuareturbaranglimit()
	{
		$this->db->select('*');
		$this->db->from('tb_retur');
		$this->db->join('tb_detail_retur', 'tb_detail_retur.kd_retur = tb_retur.kd_retur');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_retur.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_retur.id_barang');
		$this->db->order_by('no_urut_kembali', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tampilsemuareturbarang()
	{
		$this->db->select('*');
		$this->db->from('tb_retur');
		$this->db->join('tb_detail_retur', 'tb_detail_retur.kd_retur = tb_retur.kd_retur');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_retur.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_retur.id_barang');
		$this->db->order_by('no_urut_kembali ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function carireturberdasarkantanggal()
	{
		$awalperiode = $this->input->post('awalperiode', true);
		$akhirperiode = $this->input->post('akhirperiode', true);
		$this->db->select('*');
		$this->db->from('tb_retur');
		$this->db->join('tb_detail_retur', 'tb_detail_retur.kd_retur = tb_retur.kd_retur');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_retur.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_retur.id_barang');
		$this->db->where(array('tb_retur.tgl_retur >=' => $awalperiode));
		$this->db->where(array('tb_retur.tgl_retur <=' => $akhirperiode));
		$tb_retur = $this->db->get();
		return $tb_retur->result_array();
	}

	public function tampilreturbarang($limit, $mulai)
	{
		$this->db->select('*');
		$this->db->from('tb_retur');
		$this->db->join('tb_detail_retur', 'tb_detail_retur.kd_retur = tb_retur.kd_retur');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_retur.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_retur.id_barang');
		$this->db->limit($limit, $mulai);
		$this->db->order_by('no_urut_kembali ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cariretur($limit, $mulai)
	{
		$awalperiode = $this->input->post('awalperiode', true);
		$akhirperiode = $this->input->post('akhirperiode', true);
		$this->db->select('*');
		$this->db->from('tb_retur');
		$this->db->join('tb_detail_retur', 'tb_detail_retur.kd_retur = tb_retur.kd_retur');
		$this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_retur.id_pembeli');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_retur.id_barang');
		$this->db->where(array('tb_retur.tgl_retur >=' => $awalperiode));
		$this->db->where(array('tb_retur.tgl_retur <=' => $akhirperiode));
		$this->db->limit($limit, $mulai);
		$this->db->order_by('no_urut_kembali ASC');
		$tb_retur = $this->db->get();
		return $tb_retur->result_array();
	}
}
