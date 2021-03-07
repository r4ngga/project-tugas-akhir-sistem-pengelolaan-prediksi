<?php

class Pembeli_model extends CI_model
{
    public function cekIdPembeli()
    {
        $query = $this->db->query("SELECT MAX(id_pembeli) as idnya from tb_pembeli");
        $hasil = $query->row();
        return $hasil->idnya;
    }

    public function getAlldatPembeli($limit, $mulai)
    {
        return $query = $this->db->get('tb_pembeli', $limit, $mulai)->result_array();
    }

    public function getdataPembeli()
    {
        return $this->db->get('tb_pembeli')->result_array();
    }

    function jumlah_datapembeli()
    {
        return $this->db->get('tb_pembeli')->num_rows();
    }

    public function tambahdatPembeli()
    {
        $data = [
            "id_pembeli" => $this->input->post('id_pembeli', true),
            "nama_pembeli" => $this->input->post('nama_pembeli', true),
            "alamat_pembeli" => $this->input->post('alamat_pembeli', true),
            "notlp_pembeli" => $this->input->post('notlp_pembeli', true)
        ];
        $this->db->insert('tb_pembeli', $data);
    }

    public function hapusdatPembeli_m($id_pembeli)
    {
        $this->db->where('id_pembeli', $id_pembeli);
        $this->db->delete('tb_pembeli');
    }

    public function ubahdatPembeli()
    {
        $data = [
            "nama_pembeli" => $this->input->post('nama_pembeli', true),
            "alamat_pembeli" => $this->input->post('alamat_pembeli', true),
            "notlp_pembeli" => $this->input->post('notlp_pembeli', true)
        ];
        $this->db->where('id_pembeli', $this->input->post('id_pembeli'));
        $this->db->update('tb_pembeli', $data);
    }

    public function caridatPembeli()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_pembeli', $keyword);
        $this->db->or_like('nama_pembeli', $keyword);
        $this->db->or_like('alamat_pembeli', $keyword);
        return $this->db->get('tb_pembeli')->result_array();
    }
}
