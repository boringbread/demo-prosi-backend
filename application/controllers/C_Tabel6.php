<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_Tabel6 extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            if ( ! $this->session->userdata('logged_in'))
            { 
                redirect('login');
            }
            $this->load->model('M_Tabel6', 'tabel');
            $this->load->model('Api', 'api');
            $this->load->database();
        }

        // Fungsi untuk load data dari SP (Kalo bisa load data dan load view nya pisahin sih)
        public function loadView(){
            $data['table6'] = $this->api->tabel6a();

            $this->load->view('layout/V_Require');
            $this->load->view('layout/V_Header');
            $this->load->view('pages/kriteria6/V_Tabel6', $data);
            $this->load->view('layout/V_Footer');
        }
    
        // Fungsi untuk mengambil data bukti berdasar 1 ID Penelitian
        public function getBukti($idPenelitian)
        {
            $data = $this->tabel->get_bukti_tabel_6($idPenelitian)->result_array();
            echo $this->serveApi($data);
        }

        public function getrow($id){
            $this->load->model('M_Tabel6');
            $data = $this->tabel->get_row($id)->row();
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