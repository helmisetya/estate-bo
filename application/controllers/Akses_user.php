<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses_user extends CI_Controller
{
    public function index()
    {
        $this->load->view('errors/akses_terbatas'); 
    }
}