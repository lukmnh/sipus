<?php

class M_ebook extends CI_Model
{
    public $table = 'ebook';
    public function id_ebook()
    {
        $this->db->select('RIGHT(ebook.id_ebook,3) as kode', false);
        $this->db->order_by('id_ebook', 'desc');
        $this->db->limit(1);
        $que = $this->db->get('ebook');
        if ($que->num_rows() <> 0) {
            $data = $que->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "EBK" . $kodemax;
        return $kodejadi;
    }

    public function getData($id)
    {
        $hasil = $this->db->where('id_ebook', $id)->get('ebook');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function tambah($data)
    {
        $que = $this->db->insert('ebook', $data);
        return $que;
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('ebook');
        $this->db->where('id_ebook', $id);
        return $this->db->get()->row_array();
    }
    public function update($tabel, $where, $data)
    {
        $this->db->from($tabel);
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }
    public function hapus($id)
    {
        $this->db->where('id_ebook', $id);
        $this->db->delete('ebook');
    }
}
