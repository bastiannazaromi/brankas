<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbuser');
        $this->db->order_by('id', 'desc');

        return $this->db->get()->result_array();
    }

    public function hapusUser($id)
    {
        $this->db->delete('tbuser', ['id' => $id]);
    }

    public function addUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "no_kartu" => $this->input->post('kartu', true),
            "status" => $this->input->post('status', true),
            "created" => time()
        ];

        $this->db->insert('tbuser', $data);
    }

    public function editUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "no_kartu" => $this->input->post('kartu', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbuser', $data);
    }
}
