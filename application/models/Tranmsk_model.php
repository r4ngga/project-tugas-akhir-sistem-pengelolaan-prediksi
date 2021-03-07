<?php

class Tranmsk_model extends CI_Model
{

	public function tambahbrgmsk()
	{
		$data = [
			"no_faktur" => $this->input->post('no_faktur', true),
			"id_user" => $this->input->post('id_user', true),
			"tgl_masuk" => $this->input->post('tgl_masuk', true),
			"id_supplier" => $this->input->post('id_supplier', true),
			"hasil_totalhrgbeli" => $this->input->post('hasil_totalhrgbeli', true)
		];
		$this->db->insert('tb_brg_msk', $data);
	}

	public function jumlah_databrgmsk()
	{
		return $this->db->get('tb_brg_msk')->num_rows();
	}

	public function getdatabrgmsk()
	{
		return $this->db->get('tb_brg_msk')->result_array();
	}

	public function tampilsemuanofakturlimit()
	{
		$this->db->select('*');
		$this->db->from('tb_brg_msk');
		$this->db->join('tb_detail_brgmsk', 'tb_detail_brgmsk.no_faktur = tb_brg_msk.no_faktur');
		$this->db->join('tb_supplier', 'tb_supplier.id_supplier = tb_brg_msk.id_supplier');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgmsk.id_barang');
		$this->db->order_by('no_urut_masuk', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tampilsemuanofaktur()
	{
		$this->db->select('*');
		$this->db->from('tb_brg_msk');
		$this->db->join('tb_detail_brgmsk', 'tb_detail_brgmsk.no_faktur = tb_brg_msk.no_faktur');
		$this->db->join('tb_supplier', 'tb_supplier.id_supplier = tb_brg_msk.id_supplier');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgmsk.id_barang');
		$this->db->order_by('no_urut_masuk ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function carifakturberdasarkantanggal()
	{
		$awalperiode = $this->input->post('awalperiode', true);
		$akhirperiode = $this->input->post('akhirperiode', true);
		$this->db->select('*');
		$this->db->from('tb_brg_msk');
		$this->db->join('tb_detail_brgmsk', 'tb_detail_brgmsk.no_faktur = tb_brg_msk.no_faktur');
		$this->db->join('tb_supplier', 'tb_supplier.id_supplier = tb_brg_msk.id_supplier');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgmsk.id_barang');
		$this->db->where(array('tb_brg_msk.tgl_masuk >=' => $awalperiode));
		$this->db->where(array('tb_brg_msk.tgl_masuk <=' => $akhirperiode));
		$this->db->order_by('no_urut_masuk ASC');
		$tb_brg_msk = $this->db->get();
		return $tb_brg_msk->result_array();
	}

	public function tampilnofaktur($limit, $mulai)
	{
		$this->db->select('*');
		$this->db->from('tb_brg_msk');
		$this->db->join('tb_detail_brgmsk', 'tb_detail_brgmsk.no_faktur = tb_brg_msk.no_faktur');
		$this->db->join('tb_supplier', 'tb_supplier.id_supplier = tb_brg_msk.id_supplier');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgmsk.id_barang');
		$this->db->limit($limit, $mulai);
		$this->db->order_by('no_urut_masuk ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function carifaktur($limit, $mulai)
	{
		$awalperiode = $this->input->post('awalperiode', true);
		$akhirperiode = $this->input->post('akhirperiode', true);
		$this->db->select('*');
		$this->db->from('tb_brg_msk');
		$this->db->join('tb_detail_brgmsk', 'tb_detail_brgmsk.no_faktur = tb_brg_msk.no_faktur');
		$this->db->join('tb_supplier', 'tb_supplier.id_supplier = tb_brg_msk.id_supplier');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_brgmsk.id_barang');
		$this->db->where(array('tb_brg_msk.tgl_masuk >=' => $awalperiode));
		$this->db->where(array('tb_brg_msk.tgl_masuk <=' => $akhirperiode));
		$this->db->limit($limit, $mulai);
		$this->db->order_by('no_urut_masuk ASC');
		$tb_brg_msk = $this->db->get();
		return $tb_brg_msk->result_array();
	}
}
