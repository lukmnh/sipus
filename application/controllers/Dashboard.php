<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->model('M_dashboard');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $isi['isi'] = 'V_home';
        $isi['judul'] = 'Dashboard';
        $isi['anggota'] = $this->M_dashboard->hitungAnggota();
        $isi['buku'] = $this->M_dashboard->hitungBuku();
        $isi['pinjam'] = $this->M_dashboard->hitungPinjam();
        $isi['kembali'] = $this->M_dashboard->hitungKembali();
        $isi['user'] = $this->M_dashboard->hitungUser();
        $this->load->view('v_dashboard', $isi);
    }

    public function account()
    {
        $isi['data'] = $this->db->get_where('login', ['nomor_induk' => $this->session->userdata('nomor_induk')])->row_array();


        $this->form_validation->set_rules('passwordSekarang', 'Password Sekarang', 'required');
        $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required|min_length[4]|matches[passwordBaru1]');
        $this->form_validation->set_rules('passwordBaru1', 'Confirm Password Baru', 'required|min_length[4]|matches[passwordBaru]');

        if ($this->form_validation->run() == FALSE) {
            $isi['isi'] = 'V_changepass';
            $isi['judul'] = 'Change Password';
            $this->load->view('v_dashboard', $isi);
        } else {
            $isi = array(
                'password' => md5($this->input->post('passwordBaru')),
            );
            //cek pass lama
            $result = $this->M_dashboard->cekOldPass(
                $this->session->userdata('nomor_induk'),
                md5($this->input->post('passwordSekarang'))
            );
            if ($result > 0 and $result === true) {
                //update data
                $result = $this->M_dashboard->update($this->session->userdata('nomor_induk'), $isi);
                $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                return redirect('Dashboard/account');
                // } else if () {
                //     $this->session->set_flashdata('info', 
                //             '<div class="alert alert-danger" role="alert">Password yang sekarang sama!</div>');
                //             return redirect('Dashboard/account');
            } else {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-danger" role="alert">Password yang sekarang Salah!</div>'
                );
                return redirect('Dashboard/account');
            }
        }
    }

    public function detailAccount()
    {
        $isi['data'] = $this->db->get_where('login', ['nomor_induk' => $this->session->userdata('nomor_induk')])->row_array();
        $isi['isi'] = 'V_account';
        $isi['judul'] = 'Detail account';
        // $isi['data'] = $this->db->get('login')->result();
        $isi['data'] = $this->list();
        $this->load->view('v_dashboard', $isi);
    }

    public function list()
    {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('level = 2');
        $que = $this->db->get();
        return $que->result();
    }

    public function tambahAccount()
    {
        $isi['data'] = $this->db->get_where('login', ['nomor_induk' => $this->session->userdata('nomor_induk')])->row_array();


        $this->form_validation->set_rules('nomor_induk', 'nomor_induk', 'required|is_unique[login.nomor_induk]', ['is_unique' => 'Nomor Induk has already registered']);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[4]', ['min_length' => 'Password too short!']);
        if ($this->form_validation->run() == FALSE) {
            $isi['isi'] = 'tambah_akun';
            $isi['judul'] = 'Form Tambah Akun Admin';
            $this->load->view('v_dashboard', $isi);
        } else {
            $nama = $this->input->post('nama');
            $nisn = ($this->input->post('nomor_induk'));
            $password = md5($this->input->post('password'));

            $datauser = array(
                'nama' => $nama,
                'nomor_induk' => $nisn,
                'password' => $password,
                'level' => 1,
            );
            $que = $this->db->insert('login', $datauser);
            if ($que = true) {
                $this->session->set_flashdata('info', 'Data added successfully');
                redirect('Dashboard/detailAccount');
            }
        }
    }
    public function hapusUser($id)
    {
        $que = $this->M_dashboard->hapus($id);
        if ($que = true) {
            $this->session->set_flashdata('info', 'Data erased successfully');
            redirect('Dashboard/detailAccount');
        }
    }
}

  //     $result = $this->M_dashboard->update($this->session->userdata('nomor_induk'), $isi);
            //     if ($result > 0) {
            //         $this->session->set_flashdata('info', '<b>Berhasil: </b>Password berhasil diubah!');
            //         return redirect('Dashboard/account');
            //     } else {
            //         $this->session->set_flashdata('info', 
            //         '<div class="alert alert-danger" role="alert">Password yang sekarang sama!</div>');
            //         return redirect('Dashboard/account');
            //     }
            // } else {
            //     $this->session->set_flashdata('info', 
            //     '<div class="alert alert-danger" role="alert">Password yang sekarang Salah!</div>');
            //     return redirect('Dashboard/account');
            // }
 // $passwordSekarang = $this->input->post('passwordSekarang');
                // $passwordBaru = $this->input->post('passwordBaru');
                // if (!password_verify($passwordSekarang, $isi['login']['password'])) {
                //     $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Password yang sekarang Salah!</div>');
                //     redirect('Dashboard/account');
                // } else {
                //     if ($passwordSekarang == $passwordBaru) {
                //         $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Password yang baru tidak boleh sama!</div>');
                //         redirect('Dashboard/account');
                //     } else {
                //         $password_hash = md5($passwordBaru);

                //         $this->db->set('password', $password_hash);
                //         $this->db->where('nomor_induk', $this->session->userdata('nomor_induk'));
                //         $this->db->update('login');
                //         $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                //         redirect('Dashboard/account');
                //     }
                // }
