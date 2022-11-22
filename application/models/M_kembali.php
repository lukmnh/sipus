<?php

class M_kembali extends CI_Model
{

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('kembali');
        $this->db->join('anggota', 'kembali.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'kembali.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function filterDataLaporan($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('kembali');
        $this->db->join('anggota', 'kembali.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'kembali.id_buku = buku.id_buku');
        $this->db->where('kembali.tgl_pinjam >=', $tgl_awal);
        $this->db->where('kembali.tgl_pinjam <=', $tgl_akhir);
        return $this->db->get()->result();
    }
}
