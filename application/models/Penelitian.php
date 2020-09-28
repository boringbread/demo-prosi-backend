<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_User extends CI_Model
{
    // Get exact user
    function getData()
    {
        $hasil = $this->db->query(
            " EXEC [dbo].[Tabel6a_PenelitianDTPSMahasiswa]
            "
        )->result_array();
    }
}
