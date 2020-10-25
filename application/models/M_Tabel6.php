<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_Tabel6 extends CI_Model
{

    public function get_bukti_tabel_6($idPenelitian)
    {
        $this->db->select('namaBukti');
        $this->db->select('deskripsi');
        $this->db->select('pathFile');
        $this->db->from('Penelitian');
        $this->db->join('bukti', 'Penelitian.idPenelitian = bukti.temaPenelitian', 'inner');
        $this->db->where('idPenelitian', $idPenelitian);
        $result = $this->db->get();

        return $result;
    }

    public function test_Post($nama, $jenis, $file, $deskripsi, $idPenelitian)
    {

        $this->db->select("count(*) as 'table'");
        $this->db->from('bukti');
        $result = $this->db->get()->row()->table;

        $idBukti = $result + 1;

        // print_r(base_url().'upload/KUIS%20PKn%20-%201.pdf');

        $data = array(
            'idBukti' => $idBukti,
            'namaBukti' => $nama,
            'pathFile' => $jenis,
            'deskripsi' => $deskripsi,
            'idKriteria' => 6,
            'idKategori' => 2,
            'temaPenelitian' => $idPenelitian
        );
        $this->db->insert('bukti', $data);
    }

    public function inputBukti($idBukti, $namaBukti, $path, $deskripsi, $idKriteria, $idKategori, $temaPeneliatian)
    {
        $data = array(
            'idBukti' => $idBukti,
            'namaBukti' => $namaBukti,
            'pathFile' => $path,
            'deskripsi' => $deskripsi,
            'idKriteria' => $idKriteria,
            'idKategori' => $idKategori,
            'temaPenelitian' => $temaPeneliatian
        );
        $this->db->insert('bukti', $data);
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
