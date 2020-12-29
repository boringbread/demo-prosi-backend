<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_Tabel3Profil extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            if ( ! $this->session->userdata('logged_in'))
            { 
                redirect('login');
            }
            $this->load->model('M_Tabel3Kinerja', 'tabel');
            $this->load->model('M_Tabel3Profil', 'tabelProfil');
            $this->load->model('Api', 'api');
            $this->load->database();
        }

        // Fungsi untuk load data dari SP
        public function loadView(){
            $data['table3a1'] = $this->api->tabel3a1();
            $data['table3a2'] = $this->api->tabel3a2();
            $data['table3a3'] = $this->api->tabel3a3();
            $data['table3a4'] = $this->api->tabel3a4();

            $this->load->view('layout/V_Require');
            $this->load->view('layout/V_Header');
            $this->load->view('pages/kriteria3/V_Tabel3Profil', $data);
            $this->load->view('layout/V_Footer');
        }

        // Fungsi untuk mengambil data bukti berdasar 1 ID
        public function getBukti($subsection, $index)
        {
            switch ($subsection) {
                case '311':
                    $data = $this->tabelProfil->get_bukti_tabel($index)->result_array();
                    break;
                case '312':
                    $namaDosen = base64_decode($index);
                    $data = $this->tabelProfil->get_bukti_tabel_3a2($namaDosen)->result_array();
                    break;
                case '313':
                    $data = $this->tabelProfil->get_bukti_tabel_3a3($index)->result_array();
                    break;
                case '314':
                    $namaDosen = base64_decode($index);
                    $data = $this->tabelProfil->get_bukti_tabel_3a4($namaDosen)->result_array();
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