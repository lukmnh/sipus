<?php

class M_login extends CI_Model
{
    public function auth($user, $pass)

    {
        $pass = md5($pass);
        $user = $this->db->where('nomor_induk', $user);
        $pass = $this->db->where('password', $pass);
        $query = $this->db->get('login');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $session = array(
                    'id' => $row->id,
                    'nama' => $row->nama,
                    'nomor_induk' => $row->nomor_induk,
                    'password' => $row->password,
                    'level' => $row->level
                );
                $this->session->set_userdata($session);
            }
            redirect('Dashboard');
        } else {
            $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible">
            NISN atau password salah!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>');
            redirect('Login');
        }
    }
}
