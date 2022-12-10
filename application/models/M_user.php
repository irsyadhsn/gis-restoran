<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    //simpan data ke database ke tabael
    public function simpan($data)
    {
        $this->db->insert('user', $data);
    }

    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }

    //mengambil data berdasarkan id lokasi
    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }

    public function edit($edit)
    {
        $this->db->where('id_user', $edit['id_user']);
        $this->db->update('user', $edit);
    }

    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('user', $data);
    }
}

/* End of file M_user.php */
