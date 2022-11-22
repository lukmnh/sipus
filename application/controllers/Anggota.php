<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
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
        $this->load->model('M_anggota');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $isi['isi'] = 'Anggota/V_anggota';
        $isi['judul'] = 'Data Anggota';
        $isi['data'] = $this->db->get('anggota')->result();
        $isi['data1'] = $this->list2();
        $this->load->view('v_dashboard', $isi);
    }
    public function list2()
    {
        $this->db->where('anggota.nomor_induk', $this->session->userdata('nomor_induk'));
        return $this->db->get('anggota')->result();
    }

    public function tambah()
    {
        $isi['isi'] = 'Anggota/Form_tambah';
        $isi['judul'] = 'Form Tambah Anggota';
        $isi['nisn'] = $this->db->get('anggota')->result();
        $isi['id_anggota'] = $this->M_anggota->id_anggota();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {

        $this->form_validation->set_rules(
            'nomor_induk',
            'nomor_induk',
            'required|is_unique[login.nomor_induk]',
            ['is_unique' => 'Nomor Induk has already registered']
        );
        $this->form_validation->set_rules('password', 'password', 'required|min_length[4]');
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $id_anggota = $this->input->post('id_anggota');
            $nisn = ($this->input->post('nomor_induk'));
            $password = md5($this->input->post('password'));
            $nama = $this->input->post('nama_anggota');
            $kelas = $this->input->post('kelas');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');

            $datauser = array(
                'nomor_induk' => $nisn,
                'nama' => $nama,
                'password' => $password,
                'level' => 2,
            );
            $this->db->insert('login', $datauser);

            // $id_anggota = $this->db->insert_id();
            $data = array(
                'id_anggota' => $id_anggota,
                'nomor_induk' => $nisn,
                'nama_anggota' => $nama,
                'kelas' => $kelas,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'no_hp' => $no_hp
            );
            $que = $this->db->insert('anggota', $data);
            if ($que = true) {
                $this->session->set_flashdata('info', 'Data added successfully');
                redirect('Anggota');
            }
        }
    }

    public function ubah($id)
    {
        $isi['isi'] = 'Anggota/Form_edit';
        $isi['judul'] = 'Form Edit Anggota';
        $isi['data'] = $this->M_anggota->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_anggota = $this->input->post('id_anggota');
        $data = array(
            'id_anggota' => $this->input->post('id_anggota'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'kelas' => $this->input->post('kelas'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp')
        );
        $que = $this->M_anggota->update($id_anggota, $data);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data changed successfully');
            redirect('Anggota');
        }
    }

    public function hapus($id)
    {
        $que = $this->M_anggota->hapus($id);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data erased successfully');
            redirect('Anggota');
        }
    }
}
