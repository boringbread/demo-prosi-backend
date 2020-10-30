<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_Tabel3Profil extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_Tabel3Kinerja', 'tabel');
            $this->load->model('M_Tabel3Profil', 'tabelProfil');
            $this->load->model('Api', 'api');
            $this->load->database();
        }

        // Fungsi untuk load data dari SP (Kalo bisa load data dan load view nya pisahin sih)
        public function loadView(){
            $data['table3a1'] = $this->api->tabel3a1();
            $data['table3a2'] = $this->api->tabel3a2();
            $data['table3a3'] = $this->api->tabel3a3();
            $data['table3a4'] = $this->api->tabel3a4();
            $data['table3b1'] = $this->api->tabel3b1();
            $data['table3b2'] = $this->api->tabel3b2();
            $data['table3b3'] = $this->api->tabel3b3();
            $data['table3b4a'] = $this->api->tabel3b4Jurnal();
            $data['table3b4b'] = $this->api->tabel3b4Seminar();
            $data['table3b4c'] = $this->api->tabel3b4Tulisan();
            $data['table3b5'] = $this->api->tabel3b5();
            $data['table3b7'] = $this->api->tabel3b7();

            $this->load->view('layout/V_Require');
            $this->load->view('layout/V_Header');
            $this->load->view('pages/kriteria3/V_Tabel3Profil', $data);
            $this->load->view('layout/V_Footer');
        }
    
        // Fungsi untuk mengambil data bukti berdasar 1 ID Penelitian
        public function getBukti($subsection, $index)
        {
                    $data = $this->tabelProfil->get_bukti_tabel($index)->result_array();
            // case $subsection:
            //     case '3a1':
            //     case '3a2'
            //         $data = $this->tabelProfil->get_bukti_tabel_3a2($index)->result_array();
            //     break;
            echo $this->serveApi($data);
        }

        public function getrow($id){
            $this->load->model('M_Tabel6');
            $data = $this->M_Tabel6->get_row($id)->row();
            $this->serveApi($data);
        }
        
        // Fungsi untuk melempar data dalam bentuk JSon
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