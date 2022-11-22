<?php

class Kembali extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['nomor_induk'])) {
            $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible">
            Maaf, anda belum login!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>');
            redirect('Login');
        }
        $this->load->model('M_kembali');
    }

    public function index()
    {
        $isi['isi'] = 'Kembali/V_kembali';
        $isi['judul'] = 'Data Pengembalian Buku';
        $isi['data'] = $this->M_kembali->getData();
        $isi['data1'] = $this->list2();
        $this->load->view('v_dashboard', $isi);
    }
    public function list2()
    {
        $this->db->where('kembali.nomor_induk', $this->session->userdata('nomor_induk'));
        return $this->db->get('kembali')->result();
    }
}
