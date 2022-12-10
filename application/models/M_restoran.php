<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_restoran extends CI_Model
{
    //simpan data ke database ke tabael
    public function simpan($data)
    {
        $this->db->insert('restoran', $data);
    }

    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('restoran');
        $this->db->order_by('id_restoran', 'desc');
        return $this->db->get()->result();
    }

    //mengambil data berdasarkan id lokasi
    public function detail($id_restoran)
    {
        $this->db->select('*');
        $this->db->from('restoran');
        $this->db->where('id_restoran', $id_restoran);
        return $this->db->get()->row();
    }

    public function edit($edit)
    {
        $this->db->where('id_restoran', $edit['id_restoran']);
        $this->db->update('restoran', $edit);
    }

    public function delete($data)
    {
        $this->db->where('id_restoran', $data['id_restoran']);
        $this->db->delete('restoran', $data);
    }
}

/* End of file M_restoran.php */
