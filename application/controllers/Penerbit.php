<?php

class Penerbit extends CI_Controller
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
        $this->load->model('M_penerbit');
    }

    public function index()
    {
        $isi['isi'] = 'Penerbit/V_penerbit';
        $isi['judul'] = 'Data penerbit';
        $isi['data'] =  $this->db->get('penerbit')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah()
    {
        $isi['isi'] = 'Penerbit/Form_tambah';
        $isi['judul'] = 'Data penerbit';
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data['nama_penerbit'] = $this->input->post('nama_penerbit');
        $que = $this->db->insert('penerbit', $data);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data added successfully');
            redirect('Penerbit');
        }
    }

    public function ubah($id)
    {
        $isi['isi'] = 'Penerbit/Form_edit';
        $isi['judul'] = 'Form Edit Penerbit';
        $isi['data'] = $this->M_penerbit->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_penerbit = $this->input->post('id_penerbit');
        $data['nama_penerbit'] = $this->input->post('nama_penerbit');
        $que = $this->M_penerbit->update($id_penerbit, $data);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data changed successfully');
            redirect('Penerbit');
        }
    }

    public function hapus($id)
    {
        $que = $this->M_penerbit->hapus($id);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data erased successfully');
            redirect('Penerbit');
        }
    }
}
