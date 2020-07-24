<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Riwayat extends CI_Model {

	public function getAll()
	{
        $this->db->select('*');
        $this->db->from('tbrekap');
        $this->db->order_by('id', 'desc');

        return $this->db->get()->result_array();
    }

    public function getHariIni()
    {
        $tanggal = date('Y-m-d');

        $this->db->select('*');
        $this->db->from('tbrekap');
        $this->db->where('DATE(waktu)', $tanggal);

        return $this->db->get()->result_array();
    }

    public function getJoin()
    {
        $this->db->select('tbrekap.id, tbrekap.waktu, tbrekap.no_kartu, tbrekap.keterangan, tbuser.nama');
        $this->db->from('tbrekap');
        $this->db->join('tbuser', 'tbrekap.no_kartu = tbuser.no_kartu', 'left');
        $this->db->order_by('waktu', 'desc');
     
        return $this->db->get()->result_array();
    }

    public function hapusRiwayat($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tbrekap', ['id' => $id]);
    }

}