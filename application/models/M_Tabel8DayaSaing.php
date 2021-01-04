<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel8DayaSaing extends CI_Model {
    
        public function get_bukti_tabel($subsection, $id){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $id);
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