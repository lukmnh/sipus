<?php

class M_pinjam extends CI_Model
{
    public function id_pinjam()
    {
        $this->db->select('RIGHT(pinjam.id_pinjam,3) as kode', false);
        $this->db->order_by('id_pinjam', 'desc');
        $this->db->limit(1);
        $que = $this->db->get('pinjam');
        if ($que->num_rows() <> 0) {
            $data = $que->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PJ" . $kodemax;
        return $kodejadi;
    }

    public function jumlah($id)
    {
        $this->db->select('jumlah');
        $this->db->from('buku');
        $this->db->where('id_buku', $id);
        return $this->db->get()->row_array();
    }

    public function get_data_pinjam()
    {

        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->join('anggota', 'pinjam.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function get_data_by_id_pj($id)
    {
        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->join('anggota', 'pinjam.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
        $this->db->where('pinjam.id_pinjam', $id);
        return $this->db->get()->row_array();
    }

    public function deletePJ($id)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->delete('pinjam');
    }

    public function getAllDataLaporan()
    {
        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->join('anggota', 'pinjam.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function filterDataLaporan($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->join('anggota', 'pinjam.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
        $this->db->where('pinjam.tgl_pinjam >=', $tgl_awal);
        $this->db->where('pinjam.tgl_pinjam <=', $tgl_akhir);
        return $this->db->get()->result();
    }
}
