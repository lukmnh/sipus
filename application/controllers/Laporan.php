<?php

class Laporan extends CI_Controller
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
        $this->load->model('M_kembali');
        $this->load->model('M_buku');
        $this->load->helper('tgl_indo_helper');
        $this->load->library('pdf_report');
    }

    public function peminjam()
    {

        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $this->session->set_userdata('tgl_awal', $tgl_awal);
        $this->session->set_userdata('tgl_akhir', $tgl_akhir);

        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $isi['isi'] = 'Laporan/V_laporan';
            $isi['judul'] = 'Laporan Peminjaman';
            $isi['data'] = $this->M_pinjam->getAllDataLaporan();
        } else {
            $isi['isi'] = 'Laporan/V_laporan';
            $isi['judul'] = 'Laporan Peminjaman';
            $isi['data'] = $this->M_pinjam->filterDataLaporan($tgl_awal, $tgl_akhir);
        }
        $this->load->view('V_dashboard', $isi);
    }

    public function pdfReports()
    {
        if (empty($this->session->userdata('tgl_awal')) || empty($this->session->userdata('tgl_akhir'))) {
            $isi['data'] = $this->M_pinjam->getAllDataLaporan();
            $this->load->view('Laporan/pdfReports', $isi);
        } else {
            $isi['data'] = $this->M_pinjam->filterDataLaporan($this->session->userdata('tgl_awal'), $this->session->userdata('tgl_akhir'));
            $this->load->view('Laporan/pdfReports', $isi);
        }
    }

    public function pengembalian()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $this->session->set_userdata('tgl_awal', $tgl_awal);
        $this->session->set_userdata('tgl_akhir', $tgl_akhir);

        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $isi['isi'] = 'Laporan/V_pengembalian';
            $isi['judul'] = 'Laporan Pengembalian';
            $isi['data'] = $this->M_kembali->getData();
        } else {
            $isi['isi'] = 'Laporan/V_pengembalian';
            $isi['judul'] = 'Laporan Pengembalian';
            $isi['data'] = $this->M_kembali->filterDataLaporan($tgl_awal, $tgl_akhir);
        }
        $this->load->view('V_dashboard', $isi);
    }
    public function pdfPengembalian()
    {
        if (empty($this->session->userdata('tgl_awal')) || empty($this->session->userdata('tgl_akhir'))) {
            $isi['data'] = $this->M_kembali->getData();
            $this->load->view('Laporan/pdfPengembalian', $isi);
        } else {
            $isi['data'] = $this->M_kembali->filterDataLaporan($this->session->userdata('tgl_awal'), $this->session->userdata('tgl_akhir'));
            $this->load->view('Laporan/pdfPengembalian', $isi);
        }
    }

    public function pdfAnggota()
    {
        $isi['data'] = $this->db->get('anggota')->result();
        $this->load->view('Laporan/pdfAnggota', $isi);
    }
    public function buku()
    {
        $tgl_awal = $this->input->post('thn_awal');
        $tgl_akhir = $this->input->post('thn_akhir');

        $this->session->set_userdata('thn_awal', $tgl_awal);
        $this->session->set_userdata('thn_akhir', $tgl_akhir);

        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $isi['isi'] = 'Buku/V_buku';
            $isi['judul'] = 'Data Buku';
            $isi['data'] = $this->M_buku->get_data_buku();
        } else {
            $isi['isi'] = 'Buku/V_buku';
            $isi['judul'] = 'Data Buku';
            $isi['data'] = $this->M_buku->filterDataLaporan($tgl_awal, $tgl_akhir);
        }
        $this->load->view('V_dashboard', $isi);
    }
    public function pdfBuku()
    {
        if (empty($this->session->userdata('thn_awal')) || empty($this->session->userdata('thn_akhir'))) {
            $isi['data'] = $this->M_buku->get_data_buku();
            $this->load->view('Laporan/pdfBuku', $isi);
        } else {
            $isi['data'] = $this->M_buku->filterDataLaporan($this->session->userdata('thn_awal'), $this->session->userdata('thn_akhir'));
            $this->load->view('Laporan/pdfBuku', $isi);
        }
    }
}
