<?php

class Kategori_model extends CI_model
{
    public function cekIdKategori()
    {
        $query = $this->db->query("SELECT MAX(id_kategori) as idnya from tb_kategori");
        $hasil = $query->row();
        return $hasil->idnya;
    }

    public function getAlldatKategori($limit, $mulai)
    {
        return $query = $this->db->get('tb_kategori', $limit, $mulai)->result_array();
    }

    public function getdataKategori()
    {
        return $this->db->get('tb_kategori')->result_array();
    }

    public function jumlah_datakategori()
    {
        return $this->db->get('tb_kategori')->num_rows();
    }

    public function setNamaKategori()
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        // $this->db->
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahdatKategori()
    {
        $data = [
            "id_kategori" => $this->input->post('id_kategori', true),
            "nama_kategori" => $this->input->post('nama_kategori', true)
        ];
        $this->db->insert('tb_kategori', $data);
    }

    public function hapusdatKategori_m($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('tb_kategori');
    }

    public function ubahdataKategori()
    {
        $data = [
            "nama_kategori" => $this->input->post('nama_kategori', true)
        ];
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('tb_kategori', $data);
    }

    public function caridataKategori()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_kategori', $keyword);
        $this->db->or_like('nama_kategori', $keyword);
        return $this->db->get('tb_kategori')->result_array();
    }
}
