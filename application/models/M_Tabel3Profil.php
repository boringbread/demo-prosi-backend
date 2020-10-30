<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Tabel3Profil extends CI_Model {
    
        public function get_bukti_tabel($NIDN){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('DosenTetapUPPS_TD');
            $this->db->join('bukti', 'DosenTetapUPPS_TD.NIDN = bukti.temaPenelitian', 'inner');
            $this->db->where('NIDN', $NIDN);
            $result = $this->db->get();
            
            return $result; 
        }

        public function get_bukti_tabel_3a2($nomor){
            $this->db->select('namaBukti');
            $this->db->select('deskripsi');
            $this->db->select('pathFile');
            $this->db->from('DosenTetapUPPS_TD');
            $this->db->join('bukti', 'DosenTetapUPPS_TD.No# = bukti.temaPenelitian', 'inner');
            $this->db->where('No#', $nomor);
            $result = $this->db->get();
            
            return $result; 
        }

        public function test_Post($nama, $jenis, $file, $deskripsi, $idPenelitian){

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
                'temaPenelitian' => $idPenelitian
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