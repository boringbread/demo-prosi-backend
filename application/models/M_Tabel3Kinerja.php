<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel3Kinerja extends CI_Model {
    
        public function get_bukti_tabel($namaB){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('namaB', $namaB);
            $this->db->where('idKriteria', '321');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b2($namaB){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('namaB', $namaB);
            $this->db->where('idKriteria', '322');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b3($namaB){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('namaB', $namaB);
            $this->db->where('idKriteria', '323');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b4($namaB){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('namaB', $namaB);
            $this->db->where('idKriteria', '324');
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3b5($namaB){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('bukti');
            $this->db->where('idRecord', $namaB);
            $this->db->where('idKriteria', '325');
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
