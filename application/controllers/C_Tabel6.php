<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_Tabel6 extends CI_Controller {

        public function loadView(){
            $this->load->database();
            $this->db->query("SET NOCOUNT ON");
            $data['table6'] = $this->db->query("EXEC Tabel6a_PenelitianDTPSMahasiswa")->result_array();
            $this->db->query("SET NOCOUNT OFF");
            // print_r($data);
            // exit();
            $this->load->view('layout/V_Header');
            $this->load->view('pages/kriteria6/V_Tabel6', $data);
            $this->load->view('layout/V_Footer');
        }
    
        public function getBukti($idPenelitian)
        {
            $this->load->model('M_Tabel6');
            $data = $this->M_Tabel6->get_bukti_tabel_6($idPenelitian)->result_array();
            echo $this->serveApi($data);
        }

        public function unggahBukti(){
            $data = json_decode(file_get_contents("php://input"), TRUE);

            $nama = $data['nama'];
            $jenis = $data['jenis'];
            $deskripsi = $data['deskripsi'];
            // $file = $data['File'];
            // $file_path = $file;
            $idPenelitian = $data['idPenelitian'];

            $this->load->model('M_Tabel6');
            $this->M_Tabel6->test_Post($nama, $jenis, $file, $deskripsi, $idPenelitian);

            // $this->serveApi($file_path);
        }

        public function getrow($id){
            $this->load->model('M_Tabel6');
            $data = $this->M_Tabel6->get_row($id)->row();
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