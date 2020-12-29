<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel8Publikasi extends CI_Model {
    
        public function get_bukti_tabel_jurnal($id){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $id);
            $this->db->where('idSubKriteria', 8611);

            $result = $this->db->get();
            
            return $result;
        }

        public function get_bukti_tabel_seminar($id){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $id);
            $this->db->where('idSubKriteria', 8612);

            $result = $this->db->get();
            
            return $result;
        }

        public function get_bukti_tabel_karyaIlmiah($id){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $id);
            $this->db->where('idSubKriteria', 862);

            $result = $this->db->get();
            
            return $result;
        }

        public function get_bukti_tabel_luaran($id){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $id);
            $this->db->where('idSubKriteria', 863);

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