<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Login extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_user', 'user');
	}

    public function loadView() {
        $this->load->view('layout/V_Require');
		$this->load->view('V_Login');
		$this->load->view('layout/V_Footer');
    }

    public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->user->getUserData($username);

		// echo ($password);

		$pass_hashed = "";
		
		if($result != NULL) {
			$pass_hashed = $result[0]['passwords'];
		}
		
		//  Checking password
		if (password_verify($password, $pass_hashed)) {

			$array = array(
				'logged_in' => 'true',
				'username' => $username
			);

			$this->session->set_userdata( $array );

			redirect('/','refresh');
			
		} else {
			$this->session->set_flashdata('error', 'Username atau Password anda salah');
			
			redirect('/login','refresh');
			
		}
	}

	public function logout(){
		
		$this->session->sess_destroy();
		
		
		redirect('/','refresh');
		
		 
	}
}

    
    /* End of file C_Login.php */
