<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Data extends CI_Model
{

    public function save($no_kartu, $keterangan)
    {
        $tanggal = date('Y-m-d H:i:s');

        $data = [
            "waktu" => $tanggal,
            "no_kartu" => $no_kartu,
            "keterangan" => $keterangan
        ];

        $this->db->insert('tbrekap', $data);
    }

    public function cek_kartu($no_kartu)
    {
        $this->db->select('*');
        $this->db->from('tbuser');
        $this->db->where('no_kartu', $no_kartu);

        return $this->db->get()->result_array();
    }

    public function daftar($no_kartu)
    {
        $data = [
            "nama" => "Default",
            "no_kartu" => $no_kartu,
            "status" => "Belum ACC",
            "created" => time()
        ];

        $this->db->insert('tbuser', $data);
    }
}
