<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Global extends CI_Model
{

	public function getKriteria($idKriteria)
	{
		$this->db->select('*');
		$this->db->from('subkriteria');
		$this->db->where('idSubKriteria', $idKriteria);
		$result = $this->db->get();

		return $result;
	}

	public function storeData($namaBukti, $pathFile, $deskripsi, $idKriteria, $idKategori, $namaB)
	{
		$this->db->select("count(*) as 'table'");
		$this->db->from('bukti');
		$result = $this->db->get()->row()->table;

		$idBukti = $result + 1;

		$data = array(
			'idBukti'			=> $idBukti,
			'namaBukti' 		=> $namaBukti,
			'pathFile' 			=> $pathFile,
			'deskripsi' 		=> $deskripsi,
			'idKriteria' 		=> $idKriteria,
			'idKategori' 		=> $idKategori,
			'namaB' 	=> $namaB
		);

		$this->db->insert('bukti', $data);
	}

	public function getKategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$result = $this->db->get();

		return $result;
	}

	public function inputBukti($idBukti, $namaBukti, $path, $deskripsi, $idSubKriteria, $idKategori, $namaB)
    {
        $data = array(
            'idBukti' => $idBukti,
            'namaB' => $namaBukti,
            'pathFile' => $path,
            'deskripsi' => $deskripsi,
            'idSubKriteria' => $idSubKriteria,
            'idKategori' => $idKategori,
            'idRecord' => $namaB
        );
        $this->db->insert('bukti', $data);
    }
}

/* End of file M_Global.php */
/* Location: ./application/models/M_Global.php */
