<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Login extends CI_Controller
{

    public function getData()
    {
        $this->load->model('Penelitian');
        return $this->serveApi($this->Penelitian->getData());
    }

    // CONTROLLER UNTUK MENANGANI LOGIN

}
