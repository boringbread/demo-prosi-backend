<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Login extends CI_Controller
{

    // CONTROLLER UNTUK MENANGANI LOGIN
    public function login()
    {
        // Getting input from website
        // $username = htmlspecialchars($this->input->post('username'));
        // $password = htmlspecialchars($this->input->post('password'));

        $is_login = FALSE;
        $data = json_decode(file_get_contents("php://input"), TRUE);
        
        $username = $data['Username'];
        $password = $data['Password'];

        // return $this->serveApi($array);
        

        // Load Model
        $this->load->model('M_User');

        // Check users whether it is available or not
        if ($this->M_User->getUserData($username) == NULL) {
            return $this->serveApi($is_login);
        }

        // Getting data
        $user_data = $this->M_User->getUserData($username)->row();

        // Check passwords, go through if match
        if (password_verify($password, $user_data->Passwords) == 1) {
            $is_login=true;
            return $this->serveApi($is_login);
        } else {
            return $this->serveApi($is_login);
        }
    }

    public function test()
    {
        print(password_verify('test123', '$2y$10$NorTNcmEMm7HJRn0utcNPOp6ewFEQ9pnXvkxYl21UmSsdmkgBtka6'));
        // return "test123";

        // $array = array(
        //     'color' => 'red',
        //     'shape' => 'round',
        //     'size'  => ''
        // );

        // return $array;


    }

    protected function serveApi($data) {
		echo json_encode([
			"status" => true,
			"result" => $data
        ]);
        return;
	}
}

    
    /* End of file C_Login.php */
