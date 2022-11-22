<?php

class Pinjam extends CI_Controller
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
        $this->load->model('M_pinjam');
    }

    public function index()
    {
        $isi['isi'] = 'Pinjam/V_Pinjam';
        $isi['judul'] = 'Data Peminjaman';
        $isi['data'] = $this->M_pinjam->get_data_pinjam();
        $isi['data1'] = $this->list2();
        $this->load->view('V_dashboard', $isi);
    }

    public function list2()
    {
        $this->db->where('pinjam.nomor_induk', $this->session->userdata('nomor_induk'));
        return $this->db->get('pinjam')->result();
    }


    public function get_anggota()
    {
        // $this->db->select('*');
        $this->db->query("SELECT * FROM anggota where nomor_induk='" . $this->session->nomor_induk . "'")->row_array();
        // $this->db->where('nomor_induk', $this->session->userdata('nomor_induk'));
    }

    public function tambah()
    {
        $isi['isi'] = 'Pinjam/Form_tambah';
        $isi['judul'] = 'Form Tambah Data Peminjaman';
        $isi['id_pinjam'] = $this->M_pinjam->id_pinjam();
        $isi['id_anggota'] = $this->get_anggota();
        $isi['peminjam'] = $this->db->get('anggota')->result();
        $isi['buku'] = $this->db->get('buku')->result();
        $this->load->view('V_dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'id_pinjam' => $this->input->post('id_pinjam'),
            'nomor_induk' => $this->input->post('nomor_induk'),
            'id_anggota' => $this->input->post('id_anggota'),
            'id_buku' => $this->input->post('id_buku'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
        );
        $que = $this->db->insert('pinjam', $data);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data added successfully');
            redirect('pinjam');
        }
    }
    //CREATE TRIGGER `jml_after_pinjam` AFTER INSERT ON `pinjam` FOR EACH ROW UPDATE buku SET buku.jumlah = buku.jumlah -1 WHERE buku.id_buku = new.id_buku
    public function jumlah()
    {
        $id = $this->input->post('id');
        $data = $this->M_pinjam->jumlah($id);
        echo json_encode($data);
    }

    public function kembalikan($id)
    {
        $data = $this->M_pinjam->get_data_by_id_pj($id);
        $kembalikan = array(
            'nomor_induk' => $data['nomor_induk'],
            'id_anggota' => $data['id_anggota'],
            'id_buku' => $data['id_buku'],
            'tgl_pinjam' => $data['tgl_pinjam'],
            'tgl_kembali' => $data['tgl_kembali'],
            'tgl_kembalikan' => date('Y-m-d'),
        );
        $que = $this->db->insert('kembali', $kembalikan);
        if ($que = true) {
            $delete = $this->M_pinjam->deletePJ($id);
            if ($delete = true) {
                $this->session->set_flashdata('info', 'The book has been successfully returned.');
                redirect('pinjam');
            }
        }
    }
}
