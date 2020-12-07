<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel7 extends CI_Model {
    
        public function get_bukti_tabel_7($idPKM){
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->select('idRecord');
            $this->db->select('namaB');
            $this->db->select('kategori');
            $this->db->from('Abdimas');
            $this->db->join('bukti', 'Abdimas.idAbdimas = bukti.idRecord', 'inner');
            $this->db->join('kategori', 'bukti.idKategori = kategori.idKategori', 'inner');
            $this->db->where('idAbdimas', $idPKM);
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