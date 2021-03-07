<?php

class Pengguna_model extends CI_model
{

	public function cekIdPengguna()
	{
		$query = $this->db->query("SELECT MAX(id_user) as idnya from tb_pengguna");
		$hasil = $query->row();
		return $hasil->idnya;
	}

	public function getAlldatPengguna($limit, $mulai)
	{
		// $jenis_aksesnya = array("admin", "pengguna");
		// $this->db->where('jenis_akses', $jenis_aksesnya);
		return $query = $this->db->get('tb_pengguna', $limit, $mulai)->result_array();
	}

	public function jumlah_datapengguna()
	{
		return $this->db->get('tb_pengguna')->num_rows();
	}

	public function resetPasswordPengguna()
	{
		$usernamenya = $this->input->post('username', true);
		$data = [
			"pasword" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)
		];
		$this->db->where('username', $usernamenya);
		$this->db->update('tb_pengguna', $data);
	}

	public function tambahdatPengguna()
	{
		$data = [
			"id_user" => $this->input->post('id_user', true),
			"nama_pengguna" => $this->input->post('nama_pengguna', true),
			"username" => $this->input->post('username', true),
			"email" => $this->input->post('email', true),
			"pasword" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
			"jenis_akses" => "pengguna"
		];
		$this->db->insert('tb_pengguna', $data);
	}

	public function tambahdatPenggunaPemilik()
	{
		$data = [
			"id_user" => $this->input->post('id_user', true),
			"nama_pengguna" => $this->input->post('nama_pengguna', true),
			"username" => $this->input->post('username', true),
			"email" => $this->input->post('email', true),
			"pasword" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
			"jenis_akses" => $this->input->post('jenis_akses', true)
		];
		$this->db->insert('tb_pengguna', $data);
	}

	public function hapusdatPengguna_m($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('tb_pengguna');
	}

	public function ubahdataPengguna()
	{
		$data = [
			"nama_pengguna" => $this->input->post('nama_pengguna', true),
			"username" => $this->input->post('username', true),
			"email" => $this->input->post('email', true),
			"jenis_akses" => $this->input->post('jenis_akses', true)
			//"pasword" => $this->input->post('pasword', true)
		];
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('tb_pengguna', $data);
	}

	public function ubahdataSetting()
	{
		$data = [
			"nama_pengguna" => $this->input->post('nama_pengguna', true),
			"username" => $this->input->post('username', true),
			"email" => $this->input->post('email', true),
			"pasword" => password_hash($this->input->post('pasword', true), PASSWORD_DEFAULT)
		];
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('tb_pengguna', $data);
	}

	public function caridataPengguna()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_pengguna', $keyword);
		$this->db->or_like('username', $keyword);
		$this->db->or_like('email', $keyword);
		return $this->db->get('tb_pengguna')->result_array();
	}

	public function setIdPengguna($id_user)
	{
		$this->db->from('tb_pengguna');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		return $query->row();
	}
}
