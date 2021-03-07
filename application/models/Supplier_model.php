<?php

class Supplier_model extends CI_model
{
	public function cekIdSupplier()
	{
		$query = $this->db->query("SELECT MAX(id_supplier) as idnya from tb_supplier");
		$hasil = $query->row();
		return $hasil->idnya;
	}

	public function getAlldatSupplier($limit, $mulai)
	{
		return $query = $this->db->get('tb_supplier', $limit, $mulai)->result_array();
	}

	public function getdataSupplier()
	{
		return $this->db->get('tb_supplier')->result_array();
	}

	public function jumlah_datasupplier()
	{
		return $this->db->get('tb_supplier')->num_rows();
	}

	public function tambahdatSupplier()
	{
		$data = [
			"id_supplier" => $this->input->post('id_supplier', true),
			"nama_supplier" => $this->input->post('nama_supplier', true),
			"alamat" => $this->input->post('alamat', true),
			"no_tlp" => $this->input->post('no_tlp', true)
		];
		$this->db->insert('tb_supplier', $data);
	}

	public function hapusdatSupplier_m($id_supplier)
	{
		$this->db->where('id_supplier', $id_supplier);
		$this->db->delete('tb_supplier');
	}

	public function ubahdataSupplier()
	{
		$data = [
			"nama_supplier" => $this->input->post('nama_supplier', true),
			"alamat" => $this->input->post('alamat', true),
			"no_tlp" => $this->input->post('no_tlp', true)
		];
		$this->db->where('id_supplier', $this->input->post('id_supplier'));
		$this->db->update('tb_supplier', $data);
	}

	public function caridataSupplier()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('id_supplier', $keyword);
		$this->db->or_like('nama_supplier', $keyword);
		$this->db->or_like('alamat', $keyword);
		return $this->db->get('tb_supplier')->result_array();
	}
}
