<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('Kategori_model');
        $this->load->model('Supplier_model');
        $this->load->model('Barang_model');
        $this->load->model('Pembeli_model');
        // check_pengguna();
    }


    public function datatransaksikeluar_t()
    {
        $data['title'] = 'Transaksi Masuk';
        $dt['tb_pengguna'] = $this->db->get_where('tb_pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/header_dashboard', $data);
        $this->load->view('template/topbar', $dt);
        $this->load->view('template/sidebar_pengguna');
        $this->load->view('transaksikeluar/data_transaksikeluar', $data);
        $this->load->view('template/footer_dashboard');
    }
}
