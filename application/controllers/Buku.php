<?php

class Buku extends CI_Controller
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
        $this->load->model('M_buku');
    }

    public function index()
    {
        $isi['isi'] = 'Buku/V_buku';
        $isi['judul'] = 'Data Buku';
        $isi['data'] = $this->M_buku->get_data_buku();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah()
    {
        $isi['isi'] = 'Buku/Form_tambah';
        $isi['judul'] = 'Data buku';
        $isi['id_buku'] = $this->M_buku->id_buku();
        $isi['pengarang'] = $this->db->get('pengarang')->result();
        $isi['penerbit'] = $this->db->get('penerbit')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'id_pengarang' => $this->input->post('id_pengarang'),
            'id_penerbit' => $this->input->post('id_penerbit'),
            'judul_buku' => $this->input->post('judul_buku'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'rak' => $this->input->post('rak'),
            'jumlah' => $this->input->post('jumlah')
        );
        $que = $this->db->insert('buku', $data);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data added successfully');
            redirect('Buku');
        }
    }

    public function ubah($id)
    {
        $isi['isi'] = 'Buku/Form_edit';
        $isi['judul'] = 'Form Edit Buku';
        $isi['data'] = $this->M_buku->edit($id);
        $isi['pengarang'] = $this->db->get('pengarang')->result();
        $isi['penerbit'] = $this->db->get('penerbit')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_buku = $this->input->post('id_buku');
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'judul_buku' => $this->input->post('judul_buku'),
            'id_pengarang' => $this->input->post('id_pengarang'),
            'id_penerbit' => $this->input->post('id_penerbit'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'jumlah' => $this->input->post('jumlah')
        );
        $que = $this->M_buku->update($id_buku, $data);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data changed successfully');
            redirect('Buku');
        }
    }

    public function hapus($id)
    {
        $que = $this->M_buku->hapus($id);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data erased successfully');
            redirect('Buku');
        }
    }
}
