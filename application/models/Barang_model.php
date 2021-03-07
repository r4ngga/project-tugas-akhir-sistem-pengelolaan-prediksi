<?php

class Barang_model extends CI_model
{
	public function getAlldatBarang($limit, $mulai)
	{
		$this->db->select('*');
		$this->db->from('tb_barang');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
		$this->db->limit($limit, $mulai);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllBarang()
	{
		$this->db->select('*');
		$this->db->from('tb_barang');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllBarangLimit()
	{
		$this->db->select('*');
		$this->db->from('tb_barang');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
		$this->db->where('stok =', 0);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getdataBarang()
	{
		return $this->db->get('tb_barang')->result_array();
	}

	public function jumlah_databarang()
	{
		return $this->db->get('tb_barang')->num_rows();
	}

	public function tambahdatBarang()
	{
		$data = [
			"id_barang" => $this->input->post('id_barang', true),
			"id_kategori" => $this->input->post('id_kategori', true),
			"nama_barang" => $this->input->post('nama_barang', true),
			"harga_beli" => $this->input->post('harga_beli', true),
			"harga_jual" => $this->input->post('harga_jual', true),
			"spesifikasi" => $this->input->post('spesifikasi', true),
			"stok" => $this->input->post('stok', true)
		];
		$this->db->insert('tb_barang', $data);
	}

	public function hapusdatBarang_m($id_barang)
	{
		$this->db->where('id_barang', $id_barang);
		$this->db->delete('tb_barang');
	}

	public function ubahdataBarang()
	{
		$data = [
			"id_barang" => $this->input->post('id_barang', true),
			"id_kategori" => $this->input->post('id_kategori', true),
			"nama_barang" => $this->input->post('nama_barang', true),
			"harga_beli" => $this->input->post('harga_beli', true),
			"harga_jual" => $this->input->post('harga_jual', true),
			"spesifikasi" => $this->input->post('spesifikasi', true),
			"stok" => $this->input->post('stok', true)
		];
		$this->db->where('id_barang', $this->input->post('id_barang'));
		$this->db->update('tb_barang', $data);
	}

	public function caridataBarang()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->select('*');
		$this->db->from('tb_barang');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
		$this->db->where(array('tb_barang.id_barang' => $keyword));
		$this->db->or_like('nama_barang', $keyword);
		$this->db->or_like('nama_kategori', $keyword);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function transcaribrg($limit, $mulai)
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->select('*');
		$this->db->from('tb_barang');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
		$this->db->where(array('tb_barang.id_barang' => $keyword));
		$this->db->or_like('nama_barang', $keyword);
		$this->db->or_like('nama_kategori', $keyword);
		$this->db->limit($limit, $mulai);
		$query = $this->db->get();
		return $query->result_array();
	}
}
