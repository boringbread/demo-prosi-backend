<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel3Kinerja extends CI_Model {
    
        public function get_bukti_tabel($idRecord){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '321');
            $this->db->order_by("namaB", "desc");
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b2($idRecord){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '322');
            $this->db->order_by("namaB", "desc");
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b3($idRecord){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '323');
            $this->db->order_by("namaB", "desc");
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b41($idRecord){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '3241');
            $this->db->order_by("namaB", "desc");
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b42($idRecord){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '3242');
            $this->db->order_by("namaB", "desc");
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b43($idRecord){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '3243');
            $this->db->order_by("namaB", "desc");
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b5($idRecord){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '325');
            $this->db->order_by("namaB", "desc");
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_row($id){
            $this->db->select('*');
            $this->db->from('Penelitian');
            $this->db->where('idPenelitian', $id);
            $this->db->order_by("namaB", "desc");
            $result = $this->db->get();
            
            return $result;
            
        }
    
    /* End of file M_Tabel6.php */
        }
