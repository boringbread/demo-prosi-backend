<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Global extends CI_Model {

	public function getKriteria($idKriteria){
		$this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('idKriteria', $idKriteria);
        $result = $this->db->get();
        
        return $result;
	}

	public function storeData($namaBukti, $pathFile, $deskripsi, $idKriteria, $idKategori, $temaPenelitian){
		$this->db->select("count(*) as 'table'");
        $this->db->from('bukti');
        $result = $this->db->get()->row()->table;

        $idBukti = $result+1;

		$data = array(
				'idBukti'			=> $idBukti,
		        'namaBukti' 		=> $namaBukti,
		        'pathFile' 			=> $pathFile,
		        'deskripsi' 		=> $deskripsi,
		        'idKriteria' 		=> $idKriteria,
		        'idKategori' 		=> $idKategori,
		        'temaPenelitian' 	=> $temaPenelitian
		);

		$this->db->insert('bukti', $data);
	}

	public function getKategori(){
		$this->db->select('*');
        $this->db->from('kategori');
        $result = $this->db->get();
        
        return $result;
	}

}

/* End of file M_Global.php */
/* Location: ./application/models/M_Global.php */

?>