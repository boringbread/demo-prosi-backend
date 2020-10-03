<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_Tabel6 extends CI_Controller {
    
        public function getBukti($namaPenelitian)
        {
            $this->load->model('M_Tabel6');
            $data = $this->M_Tabel6->get_bukti_tabel_6($namaPenelitian)->result_array();
            $this->serveApi($data);

        }

        protected function serveApi($data) {
            echo json_encode([
                "status" => true,
                "result" => $data
            ]);
            return;
        }
    
    }
    
    /* End of file C_Tabel6.php */
    
?>