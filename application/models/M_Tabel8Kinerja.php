<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel8Kinerja extends CI_Model {
    
        public function get_bukti_tabel($subsection, $idPenelitian){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idPenelitian);
            $this->db->where('idSubKriteria', $subsection);

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