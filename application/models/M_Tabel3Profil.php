<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel3Profil extends CI_Model {
    
        public function get_bukti_tabel($NIDN){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('DosenTetapUPPS_TD');
            $this->db->join('bukti', 'DosenTetapUPPS_TD.NIDN = bukti.namaB', 'inner');
            $this->db->where('NIDN', $NIDN);
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3a2($namaB){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('namaB', $namaB);
            $this->db->where('idKriteria', '312');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3a3($namaB){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('namaB', $namaB);
            $this->db->where('idKriteria', '313');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3a4($namaB){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('namaB', $namaB);
            $this->db->where('idKriteria', '314');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_row($id){
            $this->db->select('*');
            $this->db->from('Penelitian');
            $this->db->where('idPenelitian', $id);
            $result = $this->db->get();
            
            return $result;
            
        }
    
    /* End of file M_Tabel6.php */
        }
    

?>