<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel6 extends CI_Model {
    
        public function get_bukti_tabel_6($namaPenelitian){

            $this->db->select('pathFile');
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->from('Penelitian');
            $this->db->join('bukti', 'Penelitian.judul = bukti.temaPenelitian', 'inner');
            $this->db->where('idPenelitian', $namaPenelitian);
            $result = $this->db->get();
            
            return $result;
            
        }
            
    }
    
    /* End of file M_Tabel6.php */
    

?>