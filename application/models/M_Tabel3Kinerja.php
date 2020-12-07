<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel3Kinerja extends CI_Model {
    
        public function get_bukti_tabel($idRecord){
            $this->db->select('namaB');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '321');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b2($idRecord){
            $this->db->select('namaB');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '322');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b3($idRecord){
            $this->db->select('namaB');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '323');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b4($idRecord){
            $this->db->select('namaB');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '324');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b5($idRecord){
            $this->db->select('namaB');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('idRecord', $idRecord);
            $this->db->where('idSubKriteria', '325');
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
