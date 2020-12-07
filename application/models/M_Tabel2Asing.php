<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel2Asing extends CI_Model {
    
        public function get_bukti_tabel($idRecord){
            $this->db->select('*');
            $this->db->from('bukti');
            $this->db->where('idSubKriteria', 22);
            $this->db->where('idRecord', $idRecord);
            $result = $this->db->get();
            
            return $result;
            
        }

        public function test_Post($nama, $jenis, $file, $deskripsi, $namaB){

            $this->db->select("count(*) as 'table'");
            $this->db->from('bukti');
            $result = $this->db->get()->row()->table;

            $idBukti = $result+1;

            // print_r(base_url().'upload/KUIS%20PKn%20-%201.pdf');

            $data = array(
                'idBukti' => $idBukti,
                'namaBukti' => $nama,
                'pathFile' => $jenis,
                'deskripsi' => $deskripsi,
                'idKriteria' => 6,
                'idKategori' => 2,
                'namaB' => $namaB
            );
            $this->db->insert('bukti', $data);
            
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