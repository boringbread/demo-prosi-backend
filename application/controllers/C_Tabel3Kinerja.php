<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_Tabel3Kinerja extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_Tabel3Kinerja', 'tabel');
            $this->load->model('Api', 'api');
            $this->load->database();
        }

        // Fungsi untuk load data dari SP
        public function loadView(){
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
            $this->load->view('pages/kriteria3/V_Tabel3Kinerja', $data);
            $this->load->view('layout/V_Footer');
        }

        // Fungsi untuk mengambil data bukti berdasar 1 ID
        public function getBukti($subsection, $index)
        {
            switch ($subsection) {
                case '321':
                    $index = base64_decode($index);
                    $data = $this->tabel->get_bukti_tabel($index)->result_array();
                    break;
                case '322':
                    $namaDosen = base64_decode($index);
                    $data = $this->tabel->get_bukti_tabel_3b2($namaDosen)->result_array();
                    break;
                case '323':
                    $namaDosen = base64_decode($index);
                    $data = $this->tabel->get_bukti_tabel_3b3($namaDosen)->result_array();
                    break;
                case '3241':
                    $bukti = base64_decode($index);
                    $data = $this->tabel->get_bukti_tabel_3b41($bukti)->result_array();
                    break;
                case '3242':
                    $bukti = base64_decode($index);
                    $data = $this->tabel->get_bukti_tabel_3b42($bukti)->result_array();
                    break;
                case '3243':
                    $bukti = base64_decode($index);
                    $data = $this->tabel->get_bukti_tabel_3b43($bukti)->result_array();
                    break;
                case '325':
                    $namaDosen = base64_decode($index);
                    $data = $this->tabel->get_bukti_tabel_3b5($namaDosen)->result_array();
                    break;
                default:
                    break;
            }
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