<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_Login extends CI_Controller {
    
        // CONTROLLER UNTUK MENANGANI LOGIN
        public function login()
        {
            // Getting input from website
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Load Model
            $this->load->model('M_User');
            
            
            // Check users whether it is available or not
            if($this->M_User->getUserData($username) == NULL){
                redirect('/','refresh');
                exit();
            }
            
            // Getting data
            $user_data = $this->M_User->getUserData($username)->row();

            // Check passwords, go through if match
            if (password_verify($password, $user_data->Passwords) == 1){
                redirect('/dashboard','refresh');
            } else {
                $this->session->set_flashdata('error', 'Mohon maaf, username atau password anda salah.');
                redirect('/','refresh');
            }
           
        }
        
        public function test(){
            print(password_verify('test123', '$2y$10$NorTNcmEMm7HJRn0utcNPOp6ewFEQ9pnXvkxYl21UmSsdmkgBtka6'));
        }
    
    }

    
    /* End of file C_Login.php */
    

?>