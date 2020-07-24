<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function save()
    {
        $this->load->model('M_Data', 'data');

        $no_kartu = $this->input->get('no_kartu');

        $kartu = $this->data->cek_kartu($no_kartu);

        if ($kartu) // kartu ada / tidak kosong
        {
            if ($kartu[0]["status"] == "ACC") {
                $keterangan = "No Kartu dikenali";
                $this->data->save($no_kartu, $keterangan);
                echo "Sukses";
            } else {
                $keterangan = "Kartu belum di ACC";
                $this->data->save($no_kartu, $keterangan);
                echo "Maaf kartu belum di ACC";
            }
        } else {
            $keterangan = "No Kartu tidak dikenali";
            $this->data->save($no_kartu, $keterangan);
            echo "Maaf";
        }
    }

    public function akses()
    {
        $this->db->select('*');
        $this->db->from('tbakses');

        $hasil = $this->db->get()->result_array();

        echo $hasil[0]["akses"];
    }

    public function daftar()
    {
        $this->load->model('M_Data', 'data');

        $no_kartu = $this->input->get('no_kartu');

        $kartu = $this->data->cek_kartu($no_kartu);

        if ($kartu) // kartu ada / tidak kosong
        {
            echo "Maaf";
        } else {
            $this->data->daftar($no_kartu);
            echo "Sukses";
        }
    }
}
