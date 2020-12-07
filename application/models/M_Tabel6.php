<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_Tabel6 extends CI_Model
{

    public function get_bukti_tabel_6($idRecord)
    {
        // $this->db->select('*');
        $this->db->select('deskripsi');
        $this->db->select('pathFile');
        $this->db->select('kategori');
        $this->db->from('Penelitian');
        $this->db->join('bukti', 'Penelitian.idPenelitian = bukti.idRecord', 'inner');
        $this->db->join('kategori', 'bukti.idKategori = kategori.idKategori', 'inner');
        $this->db->where('idRecord', $idRecord);
        $result = $this->db->get();

        return $result;
    }

    public function get_row($id)
    {
        $this->db->select('*');
        $this->db->from('Penelitian');
        $this->db->where('idPenelitian', $id);
        $result = $this->db->get();

        return $result;
    }

    /* End of file M_Tabel6.php */
}
