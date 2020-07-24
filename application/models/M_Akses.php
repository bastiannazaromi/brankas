<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Akses extends CI_Model
{

    public function get()
    {
        $this->db->select('*');
        $this->db->from('tbakses');

        return $this->db->get()->result_array();
    }

    public function editAkses()
    {
        $data = [
            "akses" => $this->input->post('akses', true)
        ];

        $this->db->where('id', 1);
        $this->db->update('tbakses', $data);
    }
}
