<?php

class M_dashboard extends CI_Model
{

    public function hitungAnggota()
    {
        return $this->db->count_all('anggota');
    }

    public function hitungBuku()
    {
        return $this->db->count_all('buku');
    }

    public function hitungPinjam()
    {
        return $this->db->count_all('pinjam');
    }

    public function hitungKembali()
    {
        return $this->db->count_all('kembali');
    }

    public function hitungUser()
    {
        return $this->db->count_all('login');
    }

    public function update($id, $isi)
    {
        $this->db->set($isi);
        $this->db->where('nomor_induk', $id);
        $this->db->update('login');
        if ($this->db->affected_rows > 0)
            return true;
        else
            return false;
    }

    public function cekOldPass($id, $oldPass)
    {
        $this->db->where('nomor_induk', $id);
        $this->db->where('password', $oldPass);
        $que = $this->db->get('login');
        if ($que->num_rows() > 0)
            return true;
        else
            return false;
    }
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('login');
    }
}
