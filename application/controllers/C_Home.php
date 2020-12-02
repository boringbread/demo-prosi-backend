<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Tabel6', 'tabel6');
		$this->load->model('M_Global', 'global');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('layout/V_Require');
		$this->load->view('layout/V_Header_Home');
		$this->load->view('V_Home');
		$this->load->view('layout/V_Footer');
	}

	public function loadUnggahBukti()
	{
		$idKriteria 			= $this->input->post('idKriteria');
		$x 						= $this->global->getKriteria($idKriteria)->row_array();
		$data['kriteria'] 		= $x['subKriteria'];
		$data['keterangan'] 	= $this->input->post('keterangan');
		$data['id'] 			= $this->input->post('id');
		$data['idKriteria'] 	= $this->input->post('idKriteria');
		$data['kategori']		= $this->global->getKategori()->result_array();

		$this->load->view('layout/V_Require');
		$this->load->view('V_UnggahBukti', $data);
		$this->load->view('layout/V_Footer');
	}

	public function unggahBukti()
	{
		// Getting Post Data
		$deskripsi 	= $this->input->post('deskripsi');
		$idKategori	= $this->input->post('idKategori');
		$upload 	= $_FILES['upload'];
		$dname 		= explode('.', $upload['name']);
		$extension 	= end($dname);
		$idKriteria = trim($this->input->post('idKriteria'));
		$id 		= trim($this->input->post('id'));

		// Setting upload bukti
		$config['upload_path'] 		= './upload/' . $idKriteria;
		$config['file_name'] 		= $id;
		$config['allowed_types'] 	= 'gif|jpg|png|xlsx|csv|xls|pdf';
		$config['max_size']  		= '10000';

		// Initialize CI Function
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('upload')) {
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		} else {
			$data = array('upload' => $this->upload->data());
		}

		// Storing data to db
		$this->global->storeData('-', base_url($config['upload_path']) . '/' . $id . '.' . $extension, $deskripsi, $idKriteria, $idKategori, $id);

		// Load View
		redirect('/melibatkanMahasiswa', 'refresh');
	}
}
