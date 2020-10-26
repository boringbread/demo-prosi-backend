<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

class C_Upload extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url', 'file'));
	}

	function index()
	{
		$this->load->view('upload_view');
	}


	//Untuk proses upload foto
	function proses_upload()
	{
		$this->load->Model('M_Tabel6');
		$this->db->select_max('idBukti');
		$z = $this->db->get('bukti')->row_array();
		$iterator = $z['idBukti'];
		$kategori = $this->input->post('kategori');
		$idData = $this->input->post('id');
		$kriteria = $this->input->post('kriteria');
		$deskripsi = $this->input->post('deskripsi');
		$config['upload_path']   = FCPATH . 'upload/' . $kriteria . "/";
		$config['allowed_types'] = '*';
		$config['file_name'] = $kategori . '_' . $idData . '_(' . $iterator . ')';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$path = base_url() . "upload/" . $kriteria . "/";


		if ($this->upload->do_upload('userfile')) {
			$pathDB = $path . $this->upload->data('file_name');
			$nama = $this->upload->data('file_name');
			$idDB = $iterator + 1;
			$this->M_Tabel6->inputBukti($idDB, $nama, $pathDB, $deskripsi, $kriteria, $kategori, $idData);
			$this->db->select_max('idBukti');
		}
	}


	//Untuk menghapus foto
}
