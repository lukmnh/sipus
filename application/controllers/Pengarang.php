<?php

class Pengarang extends CI_Controller
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
        $this->load->model('M_pengarang');
    }

    public function index()
    {
        $isi['isi'] = 'Pengarang/V_pengarang';
        $isi['judul'] = 'Data pengarang';
        $isi['data'] =  $this->db->get('pengarang')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah()
    {
        $isi['isi'] = 'Pengarang/Form_tambah';
        $isi['judul'] = 'Data pengarang';
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data['nama_pengarang'] = $this->input->post('nama_pengarang');
        $que = $this->db->insert('pengarang', $data);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data added successfully');
            redirect('Pengarang');
        }
    }

    public function ubah($id)
    {
        $isi['isi'] = 'Pengarang/Form_edit';
        $isi['judul'] = 'Form Edit Pengarang';
        $isi['data'] = $this->M_pengarang->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_pengarang = $this->input->post('id_pengarang');
        $data['nama_pengarang'] = $this->input->post('nama_pengarang');
        $que = $this->M_pengarang->update($id_pengarang, $data);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data changed successfully');
            redirect('Pengarang');
        }
    }

    public function hapus($id)
    {
        $que = $this->M_pengarang->hapus($id);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data erased successfully');
            redirect('Pengarang');
        }
    }
}
